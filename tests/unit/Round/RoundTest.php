<?php

namespace CombatantSimulator\Test\Unit\Round;

use Console\Model\Player\Player;
use Console\Model\Response\Result\Hit;
use Console\Model\Response\Result\Evaded;
use Console\Model\Response\Result\Factory\Factory;
use Console\Model\Response\Result\Miss;
use Console\Model\Response\Result\Result;
use Console\Model\Response\Result\Stunned;
use Console\Round\Round;
use PHPUnit\Framework\TestCase;
use Tylercd100\Placeholders\Placeholders;

class RoundTest extends TestCase
{
    /**
     * TODO
     */
    public function testConstruction(): void
    {
    }

    /**
     * Test when an attacker is stunned
     */
    public function testStunned(): void
    {
        $factory = $this->mockFactory();

        $attacker =  $this->mockPlayer();
        $attacker->method('isStunned')->willReturn(true);
        $attacker->expects($this->once())->method('setStunned');

        $defender =  $this->mockPlayer();

        $sut = new Round($factory);

        $result = $sut($attacker, $defender);

        $this->assertInstanceOf(Result::class, $result);
        $this->assertInstanceOf(Stunned::class, $result);
    }

    /**
     * Test when an defender has evaded
     */
    public function testEvaded(): void
    {
        $factory = $this->mockFactory();

        $attacker =  $this->mockPlayer();

        $defender =  $this->mockPlayer();
        $defender->method('hasEvaded')->willReturn(true);
        $defender->expects($this->once())->method('setEvaded');

        $sut = new Round($factory);

        $result = $sut($attacker, $defender);

        $this->assertInstanceOf(Result::class, $result);
        $this->assertInstanceOf(Evaded::class, $result);
    }

    /**
     * Test when an attack misses the defender
     */
    public function testMiss(): void
    {
        $factory = $this->mockFactory();

        $attacker =  $this->mockPlayer();

        $defender =  $this->mockPlayer();
        $defender->method('isLucky')->willReturn(true);

        $sut = new Round($factory);

        $result = $sut($attacker, $defender);

        $this->assertInstanceOf(Result::class, $result);
        $this->assertInstanceOf(Miss::class, $result);
    }

    /**
     * Test when an attack hits  the defender
     */
    public function testHit(): void
    {
        $factory = $this->mockFactory();

        $attacker =  $this->mockPlayer();

        $defender =  $this->mockPlayer();

        $sut = new Round($factory);

        $result = $sut($attacker, $defender);

        $this->assertInstanceOf(Result::class, $result);
        $this->assertInstanceOf(Hit::class, $result);
    }

    /**
     * @return Factory
     */
    private function mockFactory(): Factory
    {
        return new Factory(new \StringTemplate\Engine, [
            'stunned' => '[attacker-name] is stunned, missed current round',
            'evaded'  => 'The defender [defender-name] evaded attack by [attacker-name]',
            'hit'     => '[attacker-name] delivered [damage] damage to [defender-name]',
            'miss'    => '[attacker-name] missed attack on [defender-name]'
        ]);
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|Player
     */
    private function mockPlayer()
    {
        return $this->createMock(Player::class);
    }
}