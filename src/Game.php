<?php

namespace BrainGames\Game;

use function cli\line;
use function cli\prompt;

function isEven(int $num)
{
    return $num % 2 === 0;
}

function startGame(string $name)
{
    $first_random_num = 1;
    $last_random_num = 99;
    $game_count = 3;
    for ($i = 0; $i < $game_count; $i++) {
        $current = rand($first_random_num, $last_random_num);
        $correct = isEven($current) ? 'yes' : 'no';
        line('Question: %s', $current);
        $answer = prompt('Your answer');
        if ($answer !== $correct) {
            line(
                "'%s' is wrong answer ;(. Correct answer was '%s'.",
                $answer,
                $correct
            );
            line("Let's try again, %s!", $name);
            return false;
        }
        line("Correct!");
    }
    line("Congratulations, %s!", $name);
}
