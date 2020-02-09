<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function welcome($rules)
{
    line('Welcome to the Brain Game!');
    line($rules);

    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    return $name;
}

function run(array $game, string $name)
{
    foreach ($game as $turn) {
        line('Question: %s', $turn['question']);
        $answer = prompt('Your answer');

        if ($answer !== $turn['correct']) {
            line(
                "'%s' is wrong answer ;(. Correct answer was '%s'.",
                $answer,
                $turn['correct']
            );

            line("Let's try again, %s!", $name);
            return false;
        }
        line("Correct!");
    }
    
    line("Congratulations, %s!", $name);
    return true;
}
