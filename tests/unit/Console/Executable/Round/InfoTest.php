<?php

namespace CombatantSimulator\Test\Unit\Console\Executable\Round;

use Console\Executable\Round\Info;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Output\Output;

class InfoTest extends TestCase
{
    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|Output
     */
    private $output;

    protected function setUp()
    {
        parent::setUp();

        $this->output = $this->mockOutput();
    }

    public function testConstruction()
    {
        $sut = new Info($this->output);

        $this->assertInstanceOf(Info::class, $sut);

        return $sut;
    }

    public function testExecution()
    {
        $sut = $this->testConstruction();
        $this->output->expects($this->exactly(4))->method('writeln');
        $sut(1);
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|Output
     */
    private function mockOutput()
    {
        return $this->createMock(Output::class);
    }

}