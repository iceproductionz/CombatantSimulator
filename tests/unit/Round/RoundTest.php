<?php

namespace CombatantSimulator\Test\Unit\Round;

use Console\Model\Player\Player;
use Console\Model\Response\Result\Result;
use Console\Model\Response\Result\Stunned;
use Console\Model\Value\Factory\Factory;
use Console\Round\Round;
use PHPUnit\Framework\TestCase;

class RoundTest extends TestCase
{
    public function testConstruction()
    {
    }

    /**
     * Test when a player is stunned
     */
    public function testStunnedAttacker() : void
    {
        $attacker =  $this->mockPlayer();
        $attacker->method('isStunned')->willReturn(true);
        $attacker->expects($this->once())->method('setStunned');

        $sut = new Round($this->mockFactory());

        $result = $sut($attacker);

        $this->assertInstanceOf(Result::class, $result);
        $this->assertInstanceOf(Stunned::class, $result);

    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|Factory
     */
    public function mockFactory()
    {
        return $this->createMock(Factory::class);
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|Player
     */
    public function mockPlayer()
    {
        return $this->createMock(Player::class);
    }


}