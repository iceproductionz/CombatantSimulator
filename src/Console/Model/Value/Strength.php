<?php

namespace Console\Model\Value;

/**
 * Class Strength
 *
 * @package Console\Model\Value
 */
class Strength implements Value
{
    /**
     * @var int
     */
    private $value;

    /**
     * Strength constructor.
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