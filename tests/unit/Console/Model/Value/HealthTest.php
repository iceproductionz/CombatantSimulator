<?php

namespace CombatantSimulator\Test\Unit\Console\Model\Value;

use Console\Exception\InvalidValue;
use Console\Model\Value\Health;
use Console\Model\Value\Value;
use PHPUnit\Framework\TestCase;
use TypeError;

class HealthTest extends TestCase
{
    /**
     * @return array
     */
    public function provideConstructionValues(): array
    {
        return [
            [
                -1,
                InvalidValue::class
            ],
            [
                0,
                InvalidValue::class
            ],
            [
                65,
                null
            ],
            [
                100,
               null
            ],
            [
                150,
                InvalidValue::class
            ],
            [
                '',
                TypeError::class
            ]
        ];
    }

    /**
     *
     * @dataProvider provideConstructionValues
     *
     * @param mixed $value
     * @param string $exception
     */
    public function testConstruction($value, $exception) : void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }
        $sut = new Health($value);

        $this->assertInstanceOf(Value::class, $sut);
        $this->assertInstanceOf(Health::class, $sut);
    }

    /**
     * Get Current Health
     */
    public function testGetValue() : void
    {
        $value = 54;
        $sut = new Health($value);

        $this->assertSame($value, $sut->getValue());
    }

    /**
     * Apply Damage to
     */
    public function testApply()
    {
        $damage = 13;
        $initialValue = 54;
        $newValue = $initialValue - $damage;
        $sut = new Health($initialValue);

        // Initial Value
        $this->assertSame($initialValue, $sut->getValue());

        // Apply Damage
        $sut->apply($damage);

        // New Value
        $this->assertSame($newValue, $sut->getValue());
    }
}