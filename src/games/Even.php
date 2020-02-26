<?php

namespace BrainGames\games\Even;

use function BrainGames\Flow\run;

const GAME_TASK = 'Answer "yes" if the number is even, othervise answer "no"';

function isEven(int $num)
{
    return $num % 2 === 0;
}

function getCorrectAnswer($num)
{
    return isEven($num) ? 'yes' : 'no';
}

function startGame()
{
    $makeGameRound = function () {
        $question = rand(1, 99);
        $correctAnswer = getCorrectAnswer($question);

        $gameRound = [
            'question' => $question,
            'correctAnswer' => $correctAnswer
        ];
        return $gameRound;
    };

    run($makeGameRound, GAME_TASK);
}
