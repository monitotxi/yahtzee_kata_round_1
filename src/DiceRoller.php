<?php

namespace Yahtzee;

class DiceRoller
{
    /**
     * @var array
     */
    private $currentDice;

    /**
     * @var array
     */
    private $all;

    /**
     * Dice constructor.
     *
     * @param array $dice
     */
    public function __construct(array $dice)
    {
        $this->currentDice = $dice;
        $this->all = array_keys($dice);
    }

    /**
     * @return array
     */
    public function rollAll()
    {
        return $this->roll($this->all);
    }

    /**
     * @param array $diceToRoll
     *
     * @return array
     */
    public function roll(array $diceToRoll)
    {
        foreach ($diceToRoll as $dieNumber) {
            $this->currentDice[$dieNumber]->roll();
        }
    }

    /**
     * @return array
     */
    public function getResults()
    {
        $results = [];
        foreach ($this->all as $dieNumber) {
            $results[$dieNumber] = $this->currentDice[$dieNumber]->getResult();
        }

        return $results;
    }
}
