<?php

namespace Console\Model\Value;

/**
 * Class Defence
 *
 * @package Console\Model\Value
 */
class Defence implements Value
{
    /**
     * @var int
     */
    private $value;

    /**
     * Defence constructor.
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
