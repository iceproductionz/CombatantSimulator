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
            throw new InvalidValue('$className does not reference a valid name', 0, __FILE__, $className);
        }
        if (!is_subclass_of($className, \Console\Model\Value\Value::class)) {
            throw new InvalidValue('$className does not reference a value object: '. $className, 0, __FILE__, $className);
        }
        $initialValue = random_int($min, $max);

        return new $className ($initialValue);
    }


}