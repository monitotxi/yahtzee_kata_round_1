<?php

use Yahtzee\DiceRoller;
use Yahtzee\DieRollerInterface;
use Yahtzee\ScoreCalculator;
use Yahtzee\YahtzeeFactory;

class ScoreCalculatorTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function calculate_score_for_categories()
    {
        $scoreCalculator = new ScoreCalculator();
        $dice = $this->getDice();
        $scoreOnes = $scoreCalculator->calculate(1, $dice);
        $this->assertEquals(2, $scoreOnes);
        $scoreTwos = $scoreCalculator->calculate(2, $dice);
        $this->assertEquals(1, $scoreTwos);
    }

    /**
     * @return DiceRoller
     */
    private function getDice()
    {
        $dieRoller = $this->getMock(DieRollerInterface::class);
        $dieRoller->method('roll')->willReturnOnConsecutiveCalls(2, 1, 5, 1, 3);
        $dice = YahtzeeFactory::makeDiceRoller($dieRoller);
        $dice->rollAll();

        return $dice;
    }
}
