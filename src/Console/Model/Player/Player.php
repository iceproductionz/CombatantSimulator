<?php

namespace Console\Model\Player;

use Console\Model\Player\Combatant\Collection;
use Console\Model\Player\Combatant\Combatant;
use Console\Model\Value\Text;

class Player
{
    /**
     * @var Collection
     */
    private $combatants;

    /**
     * @var Text
     */
    private $name;

    /**
     * @var bool
     */
    private $stunned;

    /**
     * Player constructor.
     *
     * @param Text $name
     * @param bool $stunned
     * @param Collection $combatants
     */
    public function __construct(Text $name, bool $stunned, Collection $combatants)
    {
        $this->combatants = $combatants;
        $this->name       = $name;
        $this->stunned    = $stunned;
    }

    /**
     * @return Text
     */
    public function getName(): Text
    {
        return $this->name;
    }

    /**
     * @return bool
     */
    public function hasCombatant(): bool
    {
       return  !$this->combatants->isEmpty();
    }

    /**
     * @return Combatant
     */
    public function getFirstCombatant(): Combatant
    {
        return $this->combatants->getFirstCombatant();
    }

    /**
     * @return bool
     */
    public function isStunned(): bool
    {
        return $this->stunned;
    }

    /**
     * @param bool $stunned
     */
    public function setStunned(bool $stunned): void
    {
        $this->stunned = $stunned;
    }

    public function canCounterAttack(): bool
    {
        return $this->combatants->getFirstCombatant()->canCounterAttack();
    }

    /**
     * @return bool
     */
    public function hasAttackDoubled(): bool
    {
        return $this->combatants->getFirstCombatant()->hasAttackDoubled();
    }

    /**
     * @return bool
     */
    public function hasStunned(): bool
    {
        return $this->combatants->getFirstCombatant()->hasStunned();
    }

    /**
     * @return bool
     */
    public function isLucky(): bool
    {
        return $this->combatants->getFirstCombatant()->isLucky();
    }
}
