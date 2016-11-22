<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use League\Flysystem\Filesystem;
use League\Flysystem\Adapter\Local;

$adapter = new Local(__DIR__.'/path/to/root');
$filesystem = new Filesystem($adapter);

class FilebasedImportCommand extends ContainerAwareCommand {

    protected function configure()
    {
        $this
            ->setName('oktolab:delorian:importFromShare')
            ->setDescription('Reverse Checks Episodes from Filenames and adds an Import Command');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $bprs_adapters = $this->getContainer()->getParameter('bprs_asset.adapters');
        $files = []; // files found in adapter;
        $flow_em = $this->getContainer()->get('doctrine.orm.flow_entity_manager');
        $repo = $flow_em->getRepository('OktolabDelorianBundle:Episode');
        foreach ($bprs_adapters as $bprs_adapter) {
            $adapter = new Local($bprs_adapter['path']);
            $filesystem = new filesystem($adapter);
            $contents = $filesystem->listContents('', true);
            foreach ($contents as $object) {
                if ($object['type'] == 'file') {
                    preg_match('/(?<abb>\D\D\D[A-Z#])(?<season>\d?\d)x(?<episode>\d?\d\d)/', $object['basename'], $matches);
                    // $output->writeln($matches['abb'].' '.$matches['season'].' '.$matches['episode']);
                    if (array_key_exists(0, $matches)) {
                        $files[] = $matches;
                        // $output->writeln($matches[0]);
                    }
                    // print_r($matches);
                }
            }
        }

        $episodeIds = [];
        $errors = [];
        $already_imported = [];
        $oktolabMediaService = $this->getContainer()->get('oktolab_media');
        $output->writeln('adding episode import job(s)');
        foreach($files as $file) {
            $episode = $repo->findEpisodeByFileInformation($file['abb'], $file['season'], $file['episode']);
            if (is_string($episode)) {
                $errors[] = $episode;
            } else {
                $output->write('.');
                usleep(100000);
                $already_imported_episode = $oktolabMediaService->getEpisode($episode->getId());
                if (null == $already_imported_episode) {
                    $episodeIds[] = $episode->getId();
                } else {
                    $already_imported[] = $episode->getId();
                }
            }
        }
        $output->writeln('');
        $output->writeln(sprintf('found a total of %s episodes', count($episodeIds)));

        // remove duplicates
        $toImport = array_unique($episodeIds);
        asort($toImport);

        $timetravelService = $this->getContainer()->get('delorian.timetravel');
        foreach ($toImport as $id) {
            $timetravelService->fluxCompensateEpisode($id);
            $output->writeln($id);
        }

        $output->writeln('This episodes are already imported');
        foreach($already_imported as $episode_id) {
            $output->writeln($episode_id);
        }

        asort($errors);
        if ($errors) {
            $output->writeln('Could not import due to faulty FLOW Database Entries');
            foreach ($errors as $error) {
                $output->writeln($error);
            }
        }
    }
}
