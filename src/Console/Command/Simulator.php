<?php

namespace Console\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Console\Provider\Console\Command;


class Simulator extends Command
{
    /**
     * {@inheritDoc}
     */
    protected function configure()
    {
        $this
            ->setName('simulator:simulate')
            ->setDescription('Simulator for fights between combatants')
            ->addArgument('combatant1', InputArgument::REQUIRED, 'First Fighter')
            ->addArgument('combatant2', InputArgument::REQUIRED, 'Second Fighter');
    }

    /**
     * {@inheritDoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $name = $input->getArgument('name');
        $text = 'Hello';

        if ($name) {
            $text .= ' '.$name;
        }

        if ($input->getOption('yell')) {
            $text = strtoupper($text);
        }

        $output->writeln($text);
    }
}