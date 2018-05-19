<?php

namespace Console\Model\Value;

use Console\Assert\Assert;

/**
 * Class Health
 *
 * @package Console\Model\Value
 */
class Health implements Value
{
    /**
     * @var int
     */
    private $value;

    /**
     * Health constructor.
     *
     * @param int $value
     */
    public function __construct(int $value)
    {
        Assert::that($value)->greaterThan(0, '$value is not greater than zero');
        Assert::that($value)->lessThan(101, '$value is greater than 100');

        $this->value = $value;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * Apply damage to Health currently stored
     *
     * @param int $damage
     */
    public function apply(int $damage)
    {
        Assert::that($damage)->greaterThan(0, '$damage is not greater than zero');

        $this->value -= $damage;
    }
}