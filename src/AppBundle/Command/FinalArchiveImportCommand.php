<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\ORM\NonUniqueResultException;

use League\Flysystem\Filesystem;
use League\Flysystem\Adapter\Local;

class FinalArchiveImportCommand extends ContainerAwareCommand {

    protected function configure()
    {
        $this
            ->setName('oktolab:delorian:importFromFinalArchive')
            ->setDescription('Reverse Checks Episodes from Archive, consolidates information from flow and imports missing episodes. This happens on a per Series (Abbreviation) basis.')
            ->addArgument('abbreviation', InputArgument::REQUIRED, 'The abbreviation of the series to import.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $bprs_adapters = $this->getContainer()->getParameter('bprs_asset.adapters');
        $files = [];
        $flow_em = $this->getContainer()->get('doctrine.orm.flow_entity_manager');
        $repo = $flow_em->getRepository('OktolabDelorianBundle:Episode');
        // die(var_dump($bprs_adapters['archive']['path'].'/'.$input->getArgument('abbreviation')));
        $adapter = new Local($bprs_adapters['archive']['path'].'/'.$input->getArgument('abbreviation'));
        $filesystem = new filesystem($adapter);
        $contents = $filesystem->listContents('', true);
        // die(var_dump($contents));
        foreach ($contents as $object) {
            if ($object['type'] == 'file') {
                preg_match('/(?<abb>^[A-Z0-9#][A-Z0-9#][A-Z0-9#][A-Z0-9#])(?<season>\d?\d)x(?<episode>\d?\d\d)/', $object['basename'], $matches);
                if (array_key_exists(0, $matches)) {
                    $matches['object'] = $object;
                    $files[] = $matches; // found a file named by schema.
                }
            }
        }

        $output->writeln(sprintf('Finished check. Found [%d] episodes', count($files)));
        $output->writeln('Start matching Episodes to FLOW Database');

        $timetravelService = $this->getContainer()->get('delorian.timetravel');
        $oktolab_media = $this->getContainer()->get('oktolab_media');
        $alreadyfound = 0;
        foreach($files as $file) {
            $episode = $repo->findEpisodeByFileInformation(
                $file['abb'],
                $file['season'],
                $file['episode']
            );
            if (is_string($episode)) {
                $output->writeln('Cant Import due do faulty FLOW Entries: '.$error);
            } else {
                $output->writeln(sprintf('Found Episode [%s] for File [%s]', $episode->getId(), $file['object']['basename']));
                $local_episode = null;
                try {
                    $local_episode = $oktolab_media->getEpisode($episode->getId());
                } catch (NonUniqueResultException $e) {
                    $local_episode = false;
                }

                if (!$local_episode) {
                    $this->importEpisode($episode, $file);
                    $oktolab_media->addEncodeEpisodeJob($episode->getId());
                } else {
                    $alreadyfound++;
                }
            }
        }
        $output->writeln(sprintf('Already imported [%d] episodes', $alreadyfound));
    }

    /**
     * imports episode metadata from flow, copy episode video, add encode job
     */
    private function importEpisode($old_episode, $file)
    {
        $delorian_em = $this->getContainer()->get('doctrine.orm.delorian_entity_manager');
        $episode = $delorian_em->getRepository($this->getContainer()->getParameter('oktolab_media.episode_class'))->findOneBy(['uniqID' => $old_episode->getId()]);
        if (!$episode) {
            $episodeclass = $this->getContainer()->getParameter('oktolab_media.episode_class');
            $episode = new $episodeclass;
        }
        $old_series = $old_episode->getSeries();
        $series = $delorian_em->getRepository($this->getContainer()->getParameter('oktolab_media.series_class'))->findOneBy(['uniqID' => $old_series->getId()]);
        if (!$series) {
            $series_class = $this->getContainer()->getParameter('oktolab_media.series_class');
            $series = new $series_class;
        }
        $series->setUniqID($old_series->getId());
        $series->setName($old_series->getTitle());
        $series->setWebTitle($old_series->getWebAbbrevation());
        $series->setDescription($old_series->getAbstractTextPublic());
        $this->getContainer()->get('delorian.timetravel')->importSeriesPosterframe($series);

        if ($old_episode->getTitle() == "" || $old_episode->getTitle() == null ) {
            //use the name of the first clip
            $episodeclips = $this->getContainer()->get('delorian.flow')->getClips($old_episode->getId());
            if ($episodeclips) {
                $episode->setName($episodeclips[0]->getClip()->getTitle());
            }
        } else {
            $episode->setName($old_episode->getTitle());
        }
        $episode->setDescription($old_episode->getAbstractTextPublic());
        $episode->setUniqID($old_episode->getId());
        $episode->setOnlineStart($old_episode->getOnlineStartDate());
        $episode->setOnlineEnd($old_episode->getOnlineEndDate());
        $episode->setFirstranAt($old_episode->getFirstRanAt());
        $episode->setSeries($series);
        $delorian_em->persist($series);

        $this->getContainer()->get('delorian.timetravel')->importEpisodePosterframe($episode);
        $this->importEpisodeVideo($episode, $file);

    }

    private function importEpisodeVideo($episode, $file)
    {
        //add posterframe as Asset to the Episode
        $asset = $this->getContainer()->get('bprs.asset')->createAsset();
        $asset->setFilekey(uniqID().'.mov');
        $asset->setAdapter('video');
        $asset->setName($file['object']['basename']);
        $asset->setMimetype('video/quicktime');
        $filesystemMapper = $this->getContainer()->get($this->getContainer()->getParameter('bprs_asset.filesystem_map'));
        $filesystemMapper->copy(
            sprintf(
                '%s://%s/%s',
                'archive',
                $file['abb'],
                $file['object']['basename']
            ),
            sprintf(
                '%s://%s',
                $asset->getAdapter(),
                $asset->getFilekey()
            )
        );

        $episode->setVideo($asset);

        $delorian_em = $this->getContainer()->get('doctrine.orm.delorian_entity_manager');
        $delorian_em->persist($episode);
        $delorian_em->persist($asset);
        $delorian_em->flush();
        $delorian_em->clear();
    }
}
