<?php

declare(strict_types=1);

namespace Console\Model\Player\Combatant;

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
     *
     * @return Luck
     */
    public function getLuck() : Luck;

    /**
     * Is Combatant Lucky
     *
     * @return bool
     */
    public function isLucky(): bool;

    /**
     * @return bool
     */
    public function hasAttackDoubled(): bool ;

    /**
     * @return bool
     */
    public function hasStunned(): bool;
}
