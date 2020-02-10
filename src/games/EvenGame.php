<?php

namespace BrainGames\Games\EvenGame;

function isEven(int $num)
{
    return $num % 2 === 0;
}

function getRules()
{
    return 'Answer "yes" if the number is even, othervise answer "no"';
}

function getRandomNum()
{
    $first = 1;
    $last = 99;

    return rand($first, $last);
}

function getCorrect($num)
{
    return isEven($num) ? 'yes' : 'no';
}

function getGame()
{
    $game = function () {
        $question = getRandomNum();
        $correct = getCorrect($question);

        $gameRound = [
            'question' => $question,
            'correct' => $correct
        ];
        return $gameRound;
    };

    return $game;
}
