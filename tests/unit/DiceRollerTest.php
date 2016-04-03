<?php

use Yahtzee\DieRollerInterface;
use Yahtzee\YahtzeeFactory;

class DiceTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function have_5_dice()
    {
        $dieRoller = $this->getMock(DieRollerInterface::class);
        $dice = YahtzeeFactory::makeDice($dieRoller);
        $dice->rollAll();
        $this->assertCount(5, $dice->getResults());
    }

    /**
     * @test
     */
    public function re_roll_dice_specified_and_preserve_others()
    {
        $dieRoller = $this->getMock(DieRollerInterface::class);
        $dieRoller->method('roll')->will($this->onConsecutiveCalls(3, 4, 6, 5, 1, 2, 5));
        $dice = YahtzeeFactory::makeDice($dieRoller);
        $dice->rollAll();
        $dice->roll([1, 3]);
        $expected = [
            1 => 2,
            2 => 4,
            3 => 5,
            4 => 5,
            5 => 1,
        ];
        $this->assertEquals($expected, $dice->getResults());
    }
}
