<?php

use Yahtzee\Console;

class FakeConsole extends Console
{
    /**
     * @var array
     */
    private $output = [];
    /**
     * @var array
     */
    private $input;
    /**
     * @var int
     */
    private $position = 0;

    /**
     * FakeConsole constructor.
     *
     * @param array $input
     */
    public function __construct(array $input = [])
    {
        $this->input = $input;
    }

    /**
     * @param string $line
     */
    public function printLine($line)
    {
        $this->output[] = $line;
    }

    /**
     * @return array
     */
    public function getOutput()
    {
        return $this->output;
    }

    /**
     * @return string
     */
    public function readLine()
    {
        $line = $this->input[$this->position];
        ++$this->position;

        return $line;
    }
}
