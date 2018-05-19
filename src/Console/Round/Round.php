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
        if ($attacker->isStunned()) {
            $attacker->setStunned(false);
            return $this->resultFactory->make('stunned', $attacker, $defender);
        }

        if ($defender->hasEvaded()) {
            $defender->setEvaded(false);
            $attacker->getFirstCombatant()->getHealth()->apply(10);

            return $this->resultFactory->make('evaded', $attacker, $defender);
        }

        if ($attacker->hasAttackDoubled()) {

            return $this->resultFactory->make('attack', $attacker, $defender);
        }
    }
}