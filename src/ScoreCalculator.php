<?php

namespace Yahtzee;

class ScoreCalculator
{
    /**
     * @param int        $value
     * @param DiceRoller $diceRoller
     *
     * @return int
     */
    public function calculate($value, DiceRoller $diceRoller)
    {
        $score = 0;
        $results = $diceRoller->getResults();
        foreach ($results as $dieValue) {
            if ($dieValue === $value) {
                ++$score;
            }
        }

        return $score;
    }
}
