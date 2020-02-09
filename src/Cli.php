<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function run($game, string $rules)
{
    line('Welcome to the Brain Game!');
    line($rules);

    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    $limit = 3;

    for ($i = 0; $i < $limit; $i++) {
        $current = $game();
        line('Question: %s', $current['question']);
        $answer = prompt('Your answer');

        if ($answer !== $current['correct']) {
            line(
                "'%s' is wrong answer ;(. Correct answer was '%s'.",
                $answer,
                $current['correct']
            );

            line("Let's try again, %s!", $name);
            return false;
        }
        line("Correct!");
    }

    line("Congratulations, %s!", $name);
    return true;
}
