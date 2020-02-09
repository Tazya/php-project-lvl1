<?php

namespace BrainGames\Games\GcdGame;

function getRules()
{
    return 'Find the greatest common divisor of given numbers.';
}

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

function game()
{
    $iterations = 3;

    $result = [];
    for ($i = 0; $i < $iterations; $i++) {
        $question = getExpression();
        $correct = getCorrect($question);
        $result[] = [
            'question' => $question,
            'correct' => $correct
        ];
    }

    return $result;
}
