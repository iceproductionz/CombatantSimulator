<?php

namespace Console\Model\Value\Factory;

use Console\Model\Value\Text;

class Factory
{
    /**
     * Make Text Object
     *
     * @param string $value
     * @return Text
     */
    public function makeText(string $value) : Text
    {
        return new Text($value);
    }

}