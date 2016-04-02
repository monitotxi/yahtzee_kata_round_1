<?php

namespace Yahtzee;

class Round
{
    /**
     * @var DiceRoller
     */
    private $diceRoller;
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
     * @param DiceRoller      $diceRoller
     * @param InputLine       $inputLine
     * @param ConsoleNotifier $consoleNotifier
     */
    public function __construct(DiceRoller $diceRoller, InputLine $inputLine, ConsoleNotifier $consoleNotifier)
    {
        $this->diceRoller = $diceRoller;
        $this->inputLine = $inputLine;
        $this->consoleNotifier = $consoleNotifier;
    }

    /**
     * @return DiceRoller
     */
    public function run()
    {
        $this->diceRoller->rollAll();
        $this->consoleNotifier->dice($this->diceRoller);
        $this->reRun();

        return $this->diceRoller;
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
        $this->diceRoller->roll($diceToReRoll);
        $this->consoleNotifier->dice($this->diceRoller);
    }
}
