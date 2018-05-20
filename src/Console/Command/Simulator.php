<?php

namespace Console\Command;

use Console\Executable\PlayerSelector\PlayerSelector;
use Console\Model\Player\Player;
use Console\Executable\Factory\Factory;
use Symfony\Component\Console\Helper\Table;
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

        $playerSelector = new PlayerSelector($input, $output, $this->getHelper('question'), $this->playerFactory);

        $players = [
            $playerSelector(),
            $playerSelector(),
        ];


        $helper = $this->getHelper('question');
        /**
         *  Run Fights
         */
        for ($i = 0; $i < 30; $i++) {
            $round = $this->roundFactory->make();
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
            $output->writeln('Round ' . ($i + 1));
            $output->writeln('');

            /**
             *  Current Table
             */
            $table = new Table($output);
            $table->setHeaders(['', 'Player', 'Combatant Type', 'Health', 'Strength', 'Defense']);
            $table->addRows([
                [
                    'Attacker',
                    $attacker->getName()->getValue(),
                    \get_class($attacker->getFirstCombatant()),
                    $attacker->getFirstCombatant()->getHealth()->getValue(),
                    $attacker->getFirstCombatant()->getStrength()->getValue(),
                    $attacker->getFirstCombatant()->getDefence()->getValue(),
                ],
                [
                    'Defender',
                    $defender->getName()->getValue(),
                    \get_class($defender->getFirstCombatant()),
                    $defender->getFirstCombatant()->getHealth()->getValue(),
                    $defender->getFirstCombatant()->getStrength()->getValue(),
                    $defender->getFirstCombatant()->getDefence()->getValue(),
                ]
            ]);
            $table->render();

            /***
             *  Execute round
             */
            $result = $round($attacker, $defender);

            /**
             *  Round Result
             */
            $output->writeln($result->getMessage()->getValue());
        }

    }
}