<?php

namespace Console\Factory\Combatant;

use Console\Factory\Value;
use Console\Model\Chance\Chance;
use Console\Model\Player\Combatant\Grappler as Model;
use Console\Model\Value\Defence;
use Console\Model\Value\Health;
use Console\Model\Value\Luck;
use Console\Model\Value\Speed;
use Console\Model\Value\Strength;

class Grappler implements Combatant
{
    /**
     * @var Value
     */
    private $factoryValue;
    /**
     * @var Chance
     */
    private $chance;

    /**
     * Grappler constructor.
     *
     * @param Chance $chance
     * @param Value $factoryValue
     */
    public function __construct(Chance $chance, Value $factoryValue)
    {
        $this->factoryValue = $factoryValue;
        $this->chance = $chance;
    }

    /**
     * @return Value[]
     */
    public function getConditions(): array
    {
        return [
            'health'    => $this->factoryValue->make(60, 100, Health::class),
            'strength'  => $this->factoryValue->make(75, 80, Strength::class),
            'defence'   => $this->factoryValue->make(35, 40, Defence::class),
            'speed'     => $this->factoryValue->make(60, 80, Speed::class),
            'luck'      => $this->factoryValue->make(30, 40, Luck::class),
        ];
    }

    /**
     * @return Model
     */
    public function make()
    {
        $conditions = $this->getConditions();
        $health     = $conditions['health'];
        $strength   = $conditions['strength'];
        $defence    = $conditions['defence'];
        $speed      = $conditions['speed'];
        $luck       = $conditions['luck'];

        return new Model($this->chance, $health, $strength, $defence, $speed, $luck);
    }
}
