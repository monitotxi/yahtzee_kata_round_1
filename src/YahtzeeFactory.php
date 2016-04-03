<?php

namespace Yahtzee;

class YahtzeeFactory
{
    /**
     * @param ConsoleInterface   $console
     * @param DieRollerInterface $dieRoller
     *
     * @return Yahtzee
     */
    public static function makeYahtzee(ConsoleInterface $console, DieRollerInterface $dieRoller)
    {
        $consoleNotifier = new ConsoleNotifier($console);

        return new Yahtzee(
            self::makeCategories(),
            new Scores(),
            $consoleNotifier,
            self::makeRound($console, $consoleNotifier, $dieRoller)
        );
    }

    /**
     * @return array
     */
    private static function makeCategories()
    {
        $categoriesList = [
            1 => 'Ones',
            2 => 'Twos',
            3 => 'Threes',
        ];
        $categories = [];
        foreach ($categoriesList as $categoryValue => $categoryName) {
            $categories[] = new Category(new ScoreCalculator(), $categoryName, $categoryValue);
        }

        return $categories;
    }

    /**
     * @param ConsoleInterface   $console
     * @param ConsoleNotifier    $consoleNotifier
     * @param DieRollerInterface $dieRoller
     *
     * @return Round
     */
    private static function makeRound(
        ConsoleInterface $console,
        ConsoleNotifier $consoleNotifier,
        DieRollerInterface $dieRoller
    ) {
        return new Round(
            self::makeDice($dieRoller),
            new InputLine($console),
            $consoleNotifier
        );
    }

    /**
     * @param DieRollerInterface $dieRoller
     *
     * @return Dice
     */
    public static function makeDice(DieRollerInterface $dieRoller)
    {
        $dice = [];
        for ($i = 1; $i <= 5; ++$i) {
            $dice[$i] = new PlayerDie($dieRoller);
        }

        return new Dice($dice);
    }
}
