<?php

namespace Console\Model\Player\Attack;

/**
 * Interface Skill
 *
 * @package Console\Model\Player\Skill
 */
interface Attack
{
    /**
     * @return bool
     */
    public function isAttackDoubled() : bool;
}
