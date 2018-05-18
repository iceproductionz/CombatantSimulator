<?php

namespace Console\Model\Value;

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