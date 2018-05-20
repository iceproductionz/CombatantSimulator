<?php

declare(strict_types=1);

namespace Console\Executable\Round;

use Console\Model\Player\Player;
use Console\Model\Response\Result\Factory\Factory as ResultFactory;
use Console\Model\Response\Result\Result;

/**
 * Class Round
 *
 * @package Console\Round
 */
class Fight
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
     * Play single round actions
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

        if ($attacker->hasAttackDoubled()) {
            if ($attacker->hasStunned()) {
                $defender->setStunned(true);
            }
            $damage = ($attacker->getFirstCombatant()->getStrength()->getValue() * 2) - $defender->getFirstCombatant()->getDefence()->getValue();
            $defender->getFirstCombatant()->getHealth()->apply($damage);

            return $this->resultFactory->make('hit', $attacker, $defender, $damage);
        }

        if ($defender->isLucky()) {
            if ($defender->canCounterAttack()) {
                $attacker->getFirstCombatant()->getHealth()->apply(10);
                return $this->resultFactory->make('evaded', $attacker, $defender, $damage);
            }

            return $this->resultFactory->make('miss', $attacker, $defender, $damage);
        }
        if ($attacker->hasStunned()) {
            $defender->setStunned(true);
        }

        $damage = $attacker->getFirstCombatant()->getStrength()->getValue() - $defender->getFirstCombatant()->getDefence()->getValue();

        $defender->getFirstCombatant()->getHealth()->apply($damage);

        return $this->resultFactory->make('hit', $attacker, $defender, $damage);
    }
}
