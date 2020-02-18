<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Flow\run;

const GAME_RULES = 'Find the greatest common divisor of given numbers.';

function getExpression()
{
    $num1 = rand(1, 100);
    $num2 = rand(1, 100);

    return "{$num1} {$num2}";
}

function findGcd($num1, $num2)
{
    $lowest = $num1 < $num2 ? $num1 : $num2;
    for ($i = $lowest; $i >= 1; $i--) {
        if ($num1 % $i === 0 && $num2 % $i === 0) {
            $gcd = $i;
            break;
        }
    }
    return isset($gcd) ? $gcd : '1';
}

function getCorrect(string $expression)
{
    $exploded = explode(" ", $expression);
    $num1 = $exploded[0];
    $num2 = $exploded[1];
    
    $gcd = findGcd($num1, $num2);

    return (string) $gcd;
}

function startGame()
{
    $game = function () {
        $question = getExpression();
        $correct = getCorrect($question);

        $gameRound = [
            'question' => $question,
            'correct' => $correct
        ];
        return $gameRound;
    };

    run($game, GAME_RULES);
}
