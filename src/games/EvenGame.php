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

function game()
{
    $firstRandomNum = 1;
    $lastRandomNum = 99;

    $result = [];
    $result['question'] = rand($firstRandomNum, $lastRandomNum);
    $result['correct'] = isEven($result['question']) ? 'yes' : 'no';

    return $result;
}
