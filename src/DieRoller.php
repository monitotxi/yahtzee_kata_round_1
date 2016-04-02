<?php

namespace Yahtzee;

class DieRoller implements DieRollerInterface
{
    /**
     * @return int
     */
    public function roll()
    {
        return mt_rand(1, 6);
    }
}
