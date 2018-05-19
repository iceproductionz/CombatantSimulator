<?php

namespace Console\Model\Player\Combatant;

use Console\Model\Chance\Chance;
use Console\Model\Value\Defence;
use Console\Model\Value\Health;
use Console\Model\Value\Luck;
use Console\Model\Value\Speed;
use Console\Model\Value\Strength;

/**
 * Class Grappler
 *
 * @package Console\Model\Combatant
 */
class Grappler implements Combatant
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
     * Grappler constructor.
     *
     * @param Chance $chance
     * @param Health $health
     * @param Strength $strength
     * @param Defence $defence
     * @param Speed $speed
     * @param Luck $luck
     */
    public function __construct(Chance $chance, Health $health, Strength $strength, Defence $defence, Speed $speed, Luck $luck)
    {
        $this->health   = $health;
        $this->strength = $strength;
        $this->defence  = $defence;
        $this->speed    = $speed;
        $this->luck     = $luck;
        $this->chance   = $chance;
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

    /**
     * Is Combatant Lucky
     *
     * @return bool
     */
    public function isLucky(): bool
    {
        $chance = $this->chance;

        return $chance($this->luck->getValue());
    }

    /**
     * has Combatant Attack Doubled
     *
     * @return bool
     */
    public function hasAttackDoubled(): bool
    {
        return false;
    }
}
