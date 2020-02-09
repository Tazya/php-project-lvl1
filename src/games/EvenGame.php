<?php

namespace BrainGames\Games\EvenGame;

use function cli\line;
use function cli\prompt;

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

function game()
{
    $iterations = 3;

    $result = [];
    for ($i = 0; $i < $iterations; $i++) {
        $question = getRandomNum();
        $correct = getCorrect($question);
        $result[] = [
            'question' => $question,
            'correct' => $correct
        ];
    }

    return $result;
}
