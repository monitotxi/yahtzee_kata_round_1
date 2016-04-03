<?php

namespace Yahtzee;

class ConsoleNotifier
{
    /**
     * @var ConsoleInterface
     */
    private $console;

    /**
     * ConsoleNotifier constructor.
     *
     * @param ConsoleInterface $console
     */
    public function __construct(ConsoleInterface $console)
    {
        $this->console = $console;
    }

    /**
     * @param array  $categories
     * @param Scores $scores
     */
    public function scores(array $categories, Scores $scores)
    {
        $this->printLine('Yahtzee score');
        $this->printCategoriesScores($categories, $scores);
        $this->printLine('Final score: '.$scores->total());
    }

    /**
     * @param $line
     */
    private function printLine($line)
    {
        $this->console->printLine($line);
    }

    /**
     * @param array  $categories
     * @param Scores $scores
     */
    private function printCategoriesScores(array $categories, Scores $scores)
    {
        $allScores = $scores->all();
        foreach ($categories as $category) {
            $this->printLine($category->getName().': '.$allScores[$category->getName()]);
        }
    }

    /**
     * @param $categoryName
     *
     * @return mixed
     */
    public function categoryName($categoryName)
    {
        $this->printLine('Category: '.$categoryName);
    }

    /**
     * @param Dice $dice
     */
    public function dice(Dice $dice)
    {
        $results = $dice->getResults();
        $line = 'Dice: ';
        foreach ($results as $key => $value) {
            $str = 'D'.$key.':'.$value.' ';
            $line .= $str;
        }
        $this->printLine(trim($line));
    }

    /**
     * @param $categoryName
     * @param $score
     */
    public function categoryScore($categoryName, $score)
    {
        $this->printLine('Category '.$categoryName.' score: '.$score);
    }

    /**
     * @param $time
     */
    public function diceReRun($time)
    {
        $this->printLine("[$time] Dice to re-run:");
    }
}
