<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ImportProgramweekCommand extends ContainerAwareCommand {

    protected function configure()
    {
        $this
            ->setName('oktolab:delorian:import_programweek')
            ->setDescription('imports shitty program week xml from FLOW because reasons')
            ->addArgument('program_date', InputArgument::REQUIRED, 'datetime string (Y-m-d, etc) of the week you want to import the program from');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $date = new \DateTime($input->getArgument('program_date'));
        $monday = $this->getMonday($date);
        $path = sprintf(
            $this->getContainer()->getParameter('flow_program_path'),
            $monday->format('Y-m-d')
        );
        $flow_url = sprintf(
            $this->getContainer()->getParameter('flow_program_url'),
            $monday->format('Y-m-d')
        );

        $xml = @file_get_contents($flow_url);

        if (!$xml) {
          $output->writeln(sprintf('Could not fetch xml from: %s', $flow_url));
        } else {
            // die(var_dump($path));
            if (!@file_put_contents($path, $xml)) {
              $output->writeln(sprintf('Could not write xml to: %s', $path), 'ERROR');
            }
        }
    }

    private function getMonday($date)
    {
        $days = $date->format('N') - 1; // Monday = 1, Sunday = 7 - 1 = days of to monday
        if (0 == $days) {
            return $date;
        }
        return $date->modify(sprintf('-%d days', $days));
    }
}
