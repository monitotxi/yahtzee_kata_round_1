<?php

namespace Yahtzee;

class Console implements ConsoleInterface
{
    /**
     * @param string $line
     */
    public function printLine($line)
    {
        echo $line."\n";
    }

    /**
     * @return string
     */
    public function readLine()
    {
        return readline();
    }
}
