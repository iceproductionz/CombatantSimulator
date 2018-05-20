<?php

namespace Console\Model\Player\Combatant;

use Console\Model\Chance\Chance;
use Console\Model\Value\Defence;
use Console\Model\Value\Health;
use Console\Model\Value\Luck;
use Console\Model\Value\Speed;
use Console\Model\Value\Strength;

class Brute implements Combatant
{
    /**
     * @var Health
     */
    private $health;

    /**
     * @var Strength
     */
    private $strength;

    /**
     * @var Defence
     */
    private $defence;

    /**
     * @var Speed
     */
    private $speed;

    /**
     * @var Luck
     */
    private $luck;

    /**
     * @var Chance
     */
    private $chance;

    /**
     * Brute constructor.
     *
     * @param Chance $chance
     * @param Health $health
     * @param Strength $strength
     * @param Defence $defence
     * @param Speed $speed
     * @param Luck $luck
     */
    public function __construct(
        Chance $chance,
        Health $health,
        Strength $strength,
        Defence $defence,
        Speed $speed,
        Luck $luck
    ) {
        $this->chance   = $chance;
        $this->defence  = $defence;
        $this->health   = $health;
        $this->luck     = $luck;
        $this->speed    = $speed;
        $this->strength = $strength;
    }

    /**
     * Get health
     *
     * @return Health
     */
    public function getHealth(): Health
    {
        return $this->health;
    }

    /**
     * Get strength
     *
     * @return Strength
     */
    public function getStrength(): Strength
    {
        return $this->strength;
    }

    /**
     * Get defence
     *
     * @return Defence
     */
    public function getDefence(): Defence
    {
        return $this->defence;
    }

    /**
     * Get speed
     *
     * @return Speed
     */
    public function getSpeed(): Speed
    {
        return $this->speed;
    }

    /**
     * Get luck
     *
     * @return Luck
     */
    public function getLuck(): Luck
    {
        return $this->luck;
    }

    /**
     * Is combatant lucky
     *
     * @return bool
     */
    public function isLucky(): bool
    {
        $chance = $this->chance;

        return $chance($this->luck->getValue());
    }

    /**
     * Has attack doubled
     *
     * @return bool
     */
    public function hasAttackDoubled(): bool
    {
        return false;
    }

    /**
     * Can evade
     *
     * @return bool
     */
    public function canCounterAttack(): bool
    {
        return false;
    }

    /**
     * @return bool
     */
    public function hasStunned(): bool
    {
        $chance = $this->chance;

        return $chance(0.02);
    }
}
