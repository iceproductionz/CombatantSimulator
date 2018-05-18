<?php

namespace Console\Factory;

use Console\Exception\InvalidValue;
use Console\Model\Value\Luck;

/**
 * Class Value
 *
 * @package Console\Factory
 */
class Value
{
    /**
     * @param int $min
     * @param int $max
     * @param string $className
     * @return Value
     */
    public function make(int $min, int $max, string $className)
    {
        if (!class_exists($className)) {
            throw new InvalidValue('$className does not reference a valid name');
        }
        if (!is_subclass_of($className, \Console\Model\Value\Value::class)) {
            throw new InvalidValue('$className does not reference a value object');

        }
        $initialValue = rand($min, $max);

        switch ($className) {
            case Luck::class:
                $initialValue = $initialValue / 100;
                return new $className ($initialValue);
            default:
                return new $className ($initialValue);
        }
    }


}