<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Flow\run;

const GAME_RULES = 'What is the result of the expression?';

function getExpression()
{
    $num1 = rand(1, 50);
    $num2 = rand(1, 10);

    $operators = ['+', '-', '*'];
    $operatorIndex = rand(0, count($operators) - 1);

    $operator = $operators[$operatorIndex];

    return "{$num1} {$operator} {$num2}";
}

function getCorrect(string $expression)
{
    $exploded = explode(" ", $expression);
    $num1 = $exploded[0];
    $num2 = $exploded[2];
    $operator = $exploded[1];

    switch ($operator) {
        case '+':
            $correct = $num1 + $num2;
            break;
        case '-':
            $correct = $num1 - $num2;
            break;
        case '*':
            $correct = $num1 * $num2;
            break;
    }

    return (string) $correct;
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
