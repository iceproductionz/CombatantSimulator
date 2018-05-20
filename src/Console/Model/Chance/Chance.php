<?php

namespace Console\Model\Chance;

class Chance
{
    /**
     * @param int $input
     * @return bool
     */
    public function __invoke(int $input)
    {
        $chance = random_int(0, 100);

        return ($chance < $input);
    }

}