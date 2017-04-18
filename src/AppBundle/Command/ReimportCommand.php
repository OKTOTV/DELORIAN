<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ReimportCommand extends ContainerAwareCommand {

    protected function configure()
    {
        $this
            ->setName('oktolab:delorian:reimport')
            ->setDescription('tries to reimport episodes with a technical status other than 50 (STATE_READY)');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get('doctrine.orm.entity_manager');
        $episodes = $em->createQuery(
            'SELECT e FROM '.$this->getContainer()->getParameter('oktolab_media.episode_class').' e WHERE e.technical_status != 50'
            )->getResult();

        $output->writeln(sprintf('FOUND %s Episodes! Start adding Jobs', count($episodes)));
        $delorian = $this->getContainer()->get('delorian.timetravel');
        foreach ($episodes as $episode) {
            $output->write('.');
            $delorian->fluxCompensateEpisode($episode->getUniqID());
        }
        $output->write('\n');
        $output->writeln('Jobs now in queue!');
    }
}
