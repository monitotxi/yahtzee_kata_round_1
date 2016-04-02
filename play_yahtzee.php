<?php

require __DIR__.'/vendor/autoload.php';

use Yahtzee\DieRoller;
use Yahtzee\Console;
use Yahtzee\YahtzeeFactory;

$yahtzee = YahtzeeFactory::makeYahtzee(new Console(), new DieRoller());
$yahtzee->play();
