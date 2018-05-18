<?php

namespace Console\Model\Combatant;

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
     * Brute constructor.
     *
     * @param Health $health
     * @param Strength $strength
     * @param Defence $defence
     * @param Speed $speed
     * @param Luck $luck
     */
    public function __construct(Health $health, Strength $strength, Defence $defence, Speed $speed, Luck $luck)
    {
        $this->health = $health;
        $this->strength = $strength;
        $this->defence = $defence;
        $this->speed = $speed;
        $this->luck = $luck;
    }

    /**
     * Get Health
     *
     * @return Health
     */
    public function getHealth(): Health
    {
        return $this->health;
    }

    /**
     * Get Strength
     *
     * @return Strength
     */
    public function getStrength(): Strength
    {
        return $this->strength;
    }

    /**
     * Get Defence
     *
     * @return Defence
     */
    public function getDefence(): Defence
    {
        return $this->defence;
    }

    /**
     * Get Speed
     *
     * @return Speed
     */
    public function getSpeed(): Speed
    {
        return $this->speed;
    }

    /**
     * Get Luck
     *
     * @return Luck
     */
    public function getLuck(): Luck
    {
        return $this->luck;
    }
}
