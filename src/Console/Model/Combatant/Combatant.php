<?php

namespace Console\Model\Combatant;

use Console\Model\Value\Defence;
use Console\Model\Value\Health;
use Console\Model\Value\Luck;
use Console\Model\Value\Speed;
use Console\Model\Value\Strength;

interface Combatant
{
    /**
     * Get Health
     *
     * @return Health
     */
    public function getHealth() : Health;

    /**
     * Get Strength
     *
     * @return Strength
     */
    public function getStrength() : Strength;

    /**
     * Get Defence
     *
     * @return Defence
     */
    public function getDefence() : Defence;

    /**
     * Get Speed
     *
     * @return Speed
     */
    public function getSpeed() : Speed;

    /**
     * Get Luck
     *b
     * @return Luck
     */
    public function getLuck() : Luck;
}
