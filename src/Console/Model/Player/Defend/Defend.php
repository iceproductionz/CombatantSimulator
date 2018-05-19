<?php
/**
 * Created by PhpStorm.
 * User: ice
 * Date: 19/05/2018
 * Time: 12:09
 */

namespace Console\Model\Player\Defend;


interface Defend
{
    /**
     * @return bool
     */
    public function isStunned() : bool;

    /**
     * @return bool
     */
    public function hasEvaded() : bool;

}