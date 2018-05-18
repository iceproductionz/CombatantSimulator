<?php
/**
 * Created by PhpStorm.
 * User: ice
 * Date: 19/05/2018
 * Time: 00:07
 */

namespace Console\Model\Value;

/**
 * Class Speed
 *
 * @package Console\Model\Value
 */
class Speed
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
