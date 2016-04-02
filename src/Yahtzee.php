<?php

namespace Yahtzee;

class Yahtzee
{
    /**
     * @var ConsoleNotifier
     */
    private $consoleNotifier;
    /**
     * @var Round
     */
    private $round;
    /**
     * @var Scores
     */
    private $scores;
    /**
     * @var array
     */
    private $categories;

    /**
     * Yahtzee constructor.
     *
     * @param array           $categories
     * @param Scores          $scores
     * @param ConsoleNotifier $consoleNotifier
     * @param Round           $round
     */
    public function __construct(array $categories, Scores $scores, ConsoleNotifier $consoleNotifier, Round $round)
    {
        $this->categories = $categories;
        $this->scores = $scores;
        $this->consoleNotifier = $consoleNotifier;
        $this->round = $round;
    }

    public function play()
    {
        foreach ($this->categories as $category) {
            $this->playCategory($category);
        }
        $this->consoleNotifier->scores($this->categories, $this->scores);
    }

    /**
     * @param Category $category
     */
    private function playCategory(Category $category)
    {
        $categoryName = $category->getName();
        $this->consoleNotifier->categoryName($categoryName);
        $dice = $this->round->run();
        $score = $category->getScore($dice);
        $this->scores->add($categoryName, $score);
        $this->consoleNotifier->categoryScore($categoryName, $score);
    }
}
