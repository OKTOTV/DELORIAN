<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class TagMergerCommand extends ContainerAwareCommand {

    protected function configure()
    {
        $this
            ->setName('oktolab:delorian:merge_tags')
            ->setDescription('merge one tag into another and remove the former')
            ->addArgument('bad_tag', InputArgument::REQUIRED, 'The slug of the bad tag you want to remove')
            ->addArgument('good_tag', InputArgument::REQUIRED, 'The slug of the good tag you want to use');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get('doctrine.orm.entity_manager');

        $good_tag = $em->getRepository('AppBundle:Tag')->findOneBy(['slug' => $input->getArgument('good_tag')]);
        $bad_tag = $em->getRepository('AppBundle:Tag')->findOneBy(['slug' => $input->getArgument('bad_tag')]);

        if ($good_tag && $bad_tag) {
            $episodes = ($em->getRepository('AppBundle:Tag')->findEpisodesWithTag($bad_tag, 0, true, $this->getContainer()->getParameter('oktolab_media.episode_class')))->getResult();
            foreach ($episodes as $episode) {
                $episode->removeTag($bad_tag);
                $added = false;
                foreach ($episode->getTags() as $tag) {
                    if ($tag->getSlug() == $good_tag->getSlug()) {
                        $added = true;
                    }
                }
                if (!$added) {
                    $episode->addTag($good_tag);
                }
                $em->persist($episode);
            }
            $em->flush();
            $em->remove($bad_tag);

            $output->writeln(sprintf('merged tag %s into %s', $bad_tag->getSlug(), $good_tag->getSlug()));
        } else {
            $output->writeln('One or both tags not found');
        }

    }
}
