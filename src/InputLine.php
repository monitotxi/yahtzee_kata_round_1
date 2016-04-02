<?php

namespace Yahtzee;

class InputLine
{
    /**
     * @var ConsoleInterface
     */
    private $console;

    /**
     * InputLine constructor.
     *
     * @param ConsoleInterface $console
     */
    public function __construct(ConsoleInterface $console)
    {
        $this->console = $console;
    }

    /**
     * @return array
     */
    public function readLine()
    {
        $input = $this->console->readLine();

        return $this->stringToDice($input);
    }

    /**
     * @param string $input
     *
     * @return array
     */
    private function stringToDice($input)
    {
        $result = [];
        if (preg_match_all('/D(\\d)+/', $input, $matches) != 0) {
            $result = $matches[1];
        }

        return $result;
    }
}
