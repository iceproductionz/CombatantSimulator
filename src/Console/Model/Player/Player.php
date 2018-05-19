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
     * @var bool
     */
    private $evaded;

    /**
     * @var Text
     */
    private $name;

    /**
     * @var bool
     */
    private $stunned;
    /**
     * @var bool
     */
    private $attackDoubled;
    /**
     * @var bool
     */
    private $lucky;

    /**
     * Player constructor.
     *
     * @param Text $name
     * @param bool $stunned
     * @param bool $evaded
     * @param bool $attackDoubled
     * @param bool $lucky
     * @param Collection $combatants
     */
    public function __construct(Text $name, bool $stunned, bool $evaded, bool $attackDoubled, bool $lucky, Collection $combatants)
    {
        $this->attackDoubled = $attackDoubled;
        $this->combatants = $combatants;
        $this->evaded     = $evaded;
        $this->name       = $name;
        $this->stunned    = $stunned;
        $this->lucky      = $lucky;
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

    /**
     * @return bool
     */
    public function hasEvaded(): bool
    {
        return $this->evaded;
    }

    /**
     * @param bool $evaded
     */
    public function setEvaded(bool $evaded): void
    {
        $this->evaded = $evaded;
    }

    /**
     * @return bool
     */
    public function hasAttackDoubled(): bool
    {
        return $this->attackDoubled;
    }

    /**
     * @return bool
     */
    public function isLucky(): bool
    {
        return $this->lucky;
    }
}
