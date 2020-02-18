<?php

namespace BrainGames\Flow;

use function cli\line;
use function cli\prompt;

const MAX_GAME_ROUNDS = 3;

function run(callable $game, string $rules)
{
    line('Welcome to the Brain Game!');
    line($rules);

    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    for ($i = 0; $i < MAX_GAME_ROUNDS; $i++) {
        $gameRound = $game();
        $question = $gameRound['question'];
        $correct = $gameRound['correct'];
        
        line('Question: %s', $question);
        $answer = prompt('Your answer');

        if ($answer !== $correct) {
            line(
                "'%s' is wrong answer ;(. Correct answer was '%s'.",
                $answer,
                $correct
            );
            return false;
        }

        line("Correct!");
    }

    line("Congratulations, %s!", $name);
}
