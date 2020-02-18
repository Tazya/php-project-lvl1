<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Flow\run;

const GAME_RULES = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function getCorrect($question)
{
    $correct = isPrime((int) $question) ? "yes" : "no";
    return $correct;
}

function isPrime($num)
{
    if ($num < 2) {
        return false;
    }
    
    for ($i = 2; $i < $num; $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }
    return true;
}

function startGame()
{
    $game = function () {
        $question = rand(1, 99);
        $correct = getCorrect($question);

        $gameRound = [
            'question' => $question,
            'correct' => $correct
        ];
        return $gameRound;
    };

    run($game, GAME_RULES);
}
