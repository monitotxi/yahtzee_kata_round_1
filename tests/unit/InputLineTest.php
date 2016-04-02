<?php

use Yahtzee\ConsoleInterface;
use Yahtzee\InputLine;

class InputLineTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function read_user_input()
    {
        $console = $this->getMock(ConsoleInterface::class);
        $console->method('readLine')->willReturn('D2 D4');
        $inputLine = new InputLine($console);
        $dice = $inputLine->readLine();
        $this->assertEquals([2, 4], $dice);
    }

    /**
     * @test
     */
    public function read_empty_user_input()
    {
        $console = $this->getMock(ConsoleInterface::class);
        $console->method('readLine')->willReturn('');
        $inputLine = new InputLine($console);
        $dice = $inputLine->readLine();
        $this->assertEmpty($dice);
    }
}
