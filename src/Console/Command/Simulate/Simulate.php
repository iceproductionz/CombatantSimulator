<?php

namespace Console\Command\Simulate;

use Console\Executable\Player\Selector;
use Console\Executable\Player\Info;
use Console\Model\Player\Player;
use Console\Executable\Factory\Factory;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Console\Provider\Console\Command;


class Simulate extends Command
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
            ->setName('simulate:simulate')
            ->setDescription('Simulator for fights between combatants');
//            ->addArgument('combatant1', InputArgument::REQUIRED, 'First Fighter')
//            ->addArgument('combatant2', InputArgument::REQUIRED, 'Second Fighter');
    }

    /**
     * {@inheritDoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $this->playerFactory = $this->getContainer()['factory.player.player'];
        $this->roundFactory  = $this->getContainer()['round.factory.factory'];

        $roundInfo      = new \Console\Executable\Round\Info($output);
        $roundRun       = $this->roundFactory->make();
        $playerInfo     = new Info($output);
        $playerSelector = new Selector($input, $output, $this->getHelper('question'), $this->playerFactory);

        $players = [
            $playerSelector(),
            $playerSelector(),
        ];

        /**
         *  Run Fights
         */
        $i = 1;
        while (true) {
            /** @var Player $attacker */
            /** @var Player $defender */
            if ($i%2) {
                list($attacker, $defender) = $players;
            } else {
                list($defender, $attacker) = $players;
            }

            /**
             *  Round
             */
            $roundInfo($i);

            /**
             *  Player Information
             */
            $playerInfo($attacker, $defender);

            /***
             *  Execute round
             */
            $result = $roundRun($attacker, $defender);

            /**
             *  Round Result
             */
            $output->writeln($result->getMessage()->getValue());

            /**
             *  Round Result
             */
            if ($result->endGame()) {
                $output->writeln('');
                $output->writeln('');
                $output->writeln('Results: Attacker Wins');
                $playerInfo($attacker, $defender);
                break;
            }
            if ($i >=30) {
                $output->writeln('');
                $output->writeln('');
                $output->writeln('Results: Draw');
                $playerInfo($attacker, $defender);
                break;
            }
            $i++;
        }

    }
}