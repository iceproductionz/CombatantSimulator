<?php

namespace Console\Factory\Combatant;

use Console\Factory\Value;
use Console\Model\Value\Defence;
use Console\Model\Value\Health;
use Console\Model\Value\Luck;
use Console\Model\Value\Speed;
use Console\Model\Value\Strength;

/**
 * Class Swordsman
 *
 * @package Console\Factory\Combatant
 */
class Swordsman implements Combatant
{
    /**
     * @var Value
     */
    private $factoryValue;

    /**
     * Swordsman constructor.
     *
     * @param Value $factoryValue
     */
    public function __construct(Value $factoryValue)
    {
        $this->factoryValue = $factoryValue;
    }

    /**
     * @return Value[]
     */
    public function getConditions(): array
    {
        return [
            'health'    => $this->factoryValue->make(40, 60, Health::class),
            'strength'  => $this->factoryValue->make(60, 70, Strength::class),
            'defence'   => $this->factoryValue->make(20, 30, Defence::class),
            'speed'     => $this->factoryValue->make(90, 100, Speed::class),
            'luck'      => $this->factoryValue->make(30, 50, Luck::class),
        ];
    }

    /**
     * @return \Console\Model\Combatant\Combatant
     */
    public function make()
    {
        $conditions = $this->getConditions();
        $health     = $conditions['health'];
        $strength   = $conditions['strength'];
        $defence    = $conditions['defence'];
        $speed      = $conditions['speed'];
        $luck       = $conditions['luck'];

        return new \Console\Model\Combatant\Swordsman($health, $strength, $defence, $speed, $luck);
    }
}