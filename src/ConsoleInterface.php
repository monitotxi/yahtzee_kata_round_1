<?php

namespace Yahtzee;

interface ConsoleInterface
{
    /**
     * @param string $line
     */
    public function printLine($line);

    /**
     * @return string
     */
    public function readLine();
}
