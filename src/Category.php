<?php

namespace Yahtzee;

class Category
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var ScoreCalculator
     */
    private $scoreCalculator;
    /**
     * @var int
     */
    private $value;

    /**
     * Category constructor.
     *
     * @param ScoreCalculator $scoreCalculator
     * @param $name
     * @param int $value
     */
    public function __construct(ScoreCalculator $scoreCalculator, $name, $value)
    {
        $this->name = $name;
        $this->scoreCalculator = $scoreCalculator;
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param Dice $dice
     *
     * @return mixed
     */
    public function getScore(Dice $dice)
    {
        return $this->scoreCalculator->calculate($this->value, $dice);
    }
}
