<?php

namespace BrainGames\Games\Even;

use function BrainGames\Flow\run;

const GAME_RULES = 'Answer "yes" if the number is even, othervise answer "no"';

function isEven(int $num)
{
    return $num % 2 === 0;
}

function getCorrect($num)
{
    return isEven($num) ? 'yes' : 'no';
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
