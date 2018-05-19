<?php

namespace Console\Round;

use Console\Model\Player\Player;
use Console\Model\Response\Result\Factory\Factory as ResultFactory;
use Console\Model\Response\Result\Result;
use Console\Model\Response\Result\Stunned;

class Round
{
    /**
     * @var ResultFactory
     */
    private $resultFactory;

    /**
     * Round constructor.
     *
     * @param ResultFactory $factory
     */
    public function __construct(ResultFactory $factory)
    {
        $this->resultFactory = $factory;
    }

    /**
     *
     *
     * @param Player $attacker
     * @param Player $defender
     * @return Result
     */
    public function __invoke(Player $attacker, Player $defender)
    {
        $damage = 0;

        if ($attacker->isStunned()) {
            $attacker->setStunned(false);
            return $this->resultFactory->make('stunned', $attacker, $defender, $damage);
        }

        if ($defender->hasEvaded()) {
            $damage = 10;

            $defender->setEvaded(false);
            $attacker->getFirstCombatant()->getHealth()->apply($damage);

            return $this->resultFactory->make('evaded', $attacker, $defender, $damage);
        }

        if ($attacker->hasAttackDoubled()) {
            $damage = ($attacker->getFirstCombatant()->getStrength()->getValue() * 2) - $defender->getFirstCombatant()->getDefence()->getValue();
            $defender->getFirstCombatant()->getHealth()->apply($damage);

            return $this->resultFactory->make('attack', $attacker, $defender, $damage);
        }

        if ($defender->isLucky()) {
            return $this->resultFactory->make('miss', $attacker, $defender, $damage);
        }

        $damage = $attacker->getFirstCombatant()->getStrength()->getValue() - $defender->getFirstCombatant()->getDefence()->getValue();

        $defender->getFirstCombatant()->getHealth()->apply($damage);

        return $this->resultFactory->make('hit', $attacker, $defender, $damage);
    }
}