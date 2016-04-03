<?php

namespace Yahtzee;

class ScoreCalculator
{
    /**
     * @param int  $value
     * @param Dice $dice
     *
     * @return int
     */
    public function calculate($value, Dice $dice)
    {
        $score = 0;
        $results = $dice->getResults();
        foreach ($results as $dieValue) {
            if ($dieValue === $value) {
                ++$score;
            }
        }

        return $score;
    }
}
