<?php

namespace Console\Model\Value;

/**
 * Class Luck
 *
 * @package Console\Model\Value
 */
class Luck implements Value
{
    /**
     * @var int
     */
    private $value;

    /**
     * Luck constructor.
     *
     * @param int $value
     */
    public function __construct(int $value)
    {
        $this->value = $value;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }
}
