<?php

namespace Yahtzee;

class Round
{
    /**
     * @var Dice
     */
    private $dice;
    /**
     * @var InputLine
     */
    private $inputLine;
    /**
     * @var ConsoleNotifier
     */
    private $consoleNotifier;

    /**
     * Round constructor.
     *
     * @param Dice            $dice
     * @param InputLine       $inputLine
     * @param ConsoleNotifier $consoleNotifier
     */
    public function __construct(Dice $dice, InputLine $inputLine, ConsoleNotifier $consoleNotifier)
    {
        $this->dice = $dice;
        $this->inputLine = $inputLine;
        $this->consoleNotifier = $consoleNotifier;
    }

    /**
     * @return Dice
     */
    public function run()
    {
        $this->dice->rollAll();
        $this->consoleNotifier->dice($this->dice);
        $this->reRun();

        return $this->dice;
    }

    private function reRun()
    {
        $i = 1;
        do {
            $diceToReRun = $this->getDiceToReRun($i);
            if ($diceToReRun) {
                $this->reRunDice($diceToReRun);
            }
            ++$i;
        } while ($diceToReRun && $i <= 2);
    }

    /**
     * @param $i
     *
     * @return array
     */
    private function getDiceToReRun($i)
    {
        $this->consoleNotifier->diceReRun($i);

        return $this->inputLine->readLine();
    }

    /**
     * @param $diceToReRoll
     */
    private function reRunDice($diceToReRoll)
    {
        $this->dice->roll($diceToReRoll);
        $this->consoleNotifier->dice($this->dice);
    }
}
