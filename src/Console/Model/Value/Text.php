<?php

namespace Console\Model\Value;

class Text implements Value
{

    /**
     * @var string
     */
    private $value;

    /**
     * Text constructor.
     *
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValue() : string
    {
        return $this->value;
    }
}
