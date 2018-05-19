<?php
/**
 * Created by PhpStorm.
 * User: ice
 * Date: 19/05/2018
 * Time: 22:58
 */

namespace Console\Model\Chance;


class Chance
{

    /**
     * @param float $input
     *
     * @return bool
     */
    public function __invoke(float $input)
    {
        $input *= 100;

        $chance = random_int(0, 100);

        return ($chance < $input);
    }

}