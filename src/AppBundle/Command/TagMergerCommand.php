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
        $em = $this->get('doctrine.orm.entity_manager');

        $good_tag = $em->getRepository('AppBundle:Tag')->findOneBy(['slug' => $input->getArgument('good_tag')]);
        $bad_tag = $em->getRepository('AppBundle:Tag')->findOneBy(['slug' => $input->getArgument('bad_tag')]);

        if ($good_tag && $bad_tag) {
            $em->createNativeQuery('update episode_tag set taginterface_id = :good_tag where taginterface_id = :bad_tag AND episode_id not in (select episode_id from episode_tag where taginterface_id = :good_tag')
                ->setParameter('good_tag', $good_tag->getId())
                ->setParameter('bad_tag', $bad_tag->getId())
                ->getResult();

            $em->createNativeQuery('delete from episode_tag where taginterface_id = :bad_tag')
                ->setParameter('bad_tag', $bad_tag->getId())
                ->getResult();

            $em->createNativeQuery('update series_tag set taginterface_id = :good_tag where taginterface_id = :bad_tag AND series_id not in (select series_id from series_tag where taginterface_id = :good_tag)')
                ->setParameter('good_tag', $good_tag->getId())
                ->setParameter('bad_tag', $bad_tag->getId())
                ->getResult();

            $em->createNativeQuery('delete from series_tag where taginterface_id = :bad_tag')
                ->setParameter('bad_tag', $bad_tag->getId())
                ->getResult();

            $em->createNativeQuery('Delete from tag where id = :bad_tag')
                ->setParameter('bad_tag', $bad_tag->getId())
                ->getResult();

            $output->println(sprintf('merged tag %s into %s', $bad_tag->getSlug(), $good_tag->getSlug()));
        } else {
            $output->println('One or both tags not found');
        }

    }
}
