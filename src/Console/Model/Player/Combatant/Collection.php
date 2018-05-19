<?php

namespace Console\Model\Player\Combatant;

use Console\Exception\NotFound;

class Collection
{
    /**
     * @var Combatant[]
     */
    private $list;

    /**
     * Collection constructor.
     *
     * @param Combatant[] ...$list
     */
    public function __construct(Combatant ...$list)
    {
        $this->list = $list;
    }

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return empty($this->list);
    }

    /**
     * @return Combatant
     */
    public function getFirstCombatant() : Combatant
    {
        if (empty($this->list)) {
            throw new NotFound('First combatant not found');
        }

        return reset($this->list);
    }
}
