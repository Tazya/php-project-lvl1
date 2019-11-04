<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;
use function BrainGames\Game\startGame;

function run()
{
    line('Welcome to the Brain Game!');
    line('Answer "yes" if the number is even, othervise answer "no"');

    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    startGame($name);
}
