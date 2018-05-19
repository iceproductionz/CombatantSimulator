<?php

namespace Console\Model\Value;

/**
 * Class Speed
 *
 * @package Console\Model\Value
 */
class Speed implements Value
{
    /**
     * @var int
     */
    private $value;

    /**
     * Speed constructor.
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
