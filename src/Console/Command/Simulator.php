<?php

namespace Console\Command;

use Console\Model\Chance\Chance;
use Console\Round\Factory\Factory;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Console\Provider\Console\Command;


class Simulator extends Command
{
    /**
     * @var \Console\Factory\Player\Player
     */
    private $playerFactory;

    /**
     * @var Factory
     */
    private $roundFactory;

    /**
     * {@inheritDoc}
     */
    protected function configure()
    {

        $this
            ->setName('simulator:simulate')
            ->setDescription('Simulator for fights between combatants');
//            ->addArgument('combatant1', InputArgument::REQUIRED, 'First Fighter')
//            ->addArgument('combatant2', InputArgument::REQUIRED, 'Second Fighter');
    }

    /**
     * {@inheritDoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $this->playerFactory  = $this->getContainer()['factory.player.player'];
        $this->roundFactory  = $this->getContainer()['round.factory.factory'];

        $players = [
            $this->playerFactory->make('John', 'brute'),
            $this->playerFactory->make('Mike', 'brute'),
        ];

        for ($i = 0; $i < 100; $i++) {
            $round = $this->roundFactory->make();
            if ($i%2) {
                list($attacker, $defender) = $players;
            } else {
                list($defender, $attacker) = $players;
            }



            $result = $round($attacker, $defender);

            $output->writeln($result->getMessage()->getValue());
        }

    }
}