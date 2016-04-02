<?php

namespace Yahtzee;

class Scores
{
    /**
     * @var array
     */
    private $scores = [];

    /**
     * @param string $categoryName
     * @param int    $score
     */
    public function add($categoryName, $score)
    {
        $this->scores[$categoryName] = $score;
    }

    /**
     * @return array
     */
    public function all()
    {
        return $this->scores;
    }

    /**
     * @return int
     */
    public function total()
    {
        return array_sum($this->scores);
    }
}
