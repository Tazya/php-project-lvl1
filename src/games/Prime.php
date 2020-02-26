<?php

namespace BrainGames\games\Prime;

use function BrainGames\Flow\run;

const GAME_TASK = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime($num)
{
    if ($num < 2) {
        return false;
    }
    
    for ($i = 2; $i <= $num / 2; $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }
    return true;
}

function startGame()
{
    $makeGameRound = function () {
        $question = rand(1, 99);
        $correctAnswer = isPrime($question) ? "yes" : "no";

        $gameRound = [
            'question' => $question,
            'correctAnswer' => $correctAnswer
        ];
        return $gameRound;
    };

    run($makeGameRound, GAME_TASK);
}
