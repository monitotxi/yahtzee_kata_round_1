<?php

namespace Yahtzee;

class PlayerDie
{
    /**
     * @var DieRollerInterface
     */
    private $dieRoller;
    /**
     * @var int
     */
    private $lastResult;

    /**
     * UserDie constructor.
     *
     * @param DieRollerInterface $dieRoller
     */
    public function __construct(DieRollerInterface $dieRoller)
    {
        $this->dieRoller = $dieRoller;
    }

    public function roll()
    {
        $this->lastResult = $this->dieRoller->roll();
    }

    /**
     * @return int
     */
    public function getResult()
    {
        return $this->lastResult;
    }
}
