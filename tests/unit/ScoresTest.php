<?php

use Yahtzee\Scores;

class ScoresTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function calculate_total_score()
    {
        $scores = $this->createScores();
        $this->assertEquals(2 + 5, $scores->total());
    }

    /**
     * @return Scores
     */
    private function createScores()
    {
        $scores = new Scores();
        $scores->add('ones', 2);
        $scores->add('twos', 5);

        return $scores;
    }

    /**
     * @test
     */
    public function get_scores()
    {
        $scores = $this->createScores();
        $expected = [
            'ones' => 2,
            'twos' => 5,
        ];
        $this->assertEquals($expected, $scores->all());
    }
}
