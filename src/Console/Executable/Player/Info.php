<?php

namespace Console\Executable\Player;

use Console\Model\Player\Player;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Player Info
 *
 * @package Console\Executable\Player
 */
class Info
{
    /**
     * @var OutputInterface
     */
    private $output;

    /**
     * Info constructor.
     *
     * @param OutputInterface $output
     */
    public function __construct(OutputInterface $output)
    {
        $this->output = $output;
    }

    /**
     *
     *
     * @param Player $attacker
     * @param Player $defender
     */
    public function __invoke(Player $attacker, Player $defender)
    {
        /**
         *  Current Table
         */
        $table = new Table($this->output);
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
    }
}