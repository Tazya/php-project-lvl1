<?php

namespace BrainGames\Flow;

use function cli\line;
use function cli\prompt;

const MAX_GAME_ROUNDS_COUNT = 3;

function run(callable $makeGameRound, string $gameTask)
{
    line('Welcome to the Brain Game!');
    line($gameTask);

    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    for ($i = 0; $i < MAX_GAME_ROUNDS_COUNT; $i++) {
        ['question' => $question, 'correctAnswer' => $correctAnswer] = $makeGameRound();
        
        line('Question: %s', $question);
        $userAnswer = prompt('Your answer');

        if ($userAnswer !== $correctAnswer) {
            line(
                "'%s' is wrong answer ;(. Correct answer was '%s'.",
                $userAnswer,
                $correctAnswer
            );
            return;
        }

        line("Correct!");
    }

    line("Congratulations, %s!", $name);
}
