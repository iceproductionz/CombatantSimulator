<?php

namespace Console\Factory\Combatant;

use Console\Factory\Value;

interface Combatant
{

    /**
     * @return Value[]
     */
    public function getConditions() : array;

    /**
     * @return \Console\Model\Player\Combatant\Combatant
     */
    public function make();
}