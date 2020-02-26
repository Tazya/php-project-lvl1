<?php

namespace BrainGames\games\Calc;

use function BrainGames\Flow\run;

const GAME_TASK = 'What is the result of the expression?';

function getExpression()
{
    $num1 = rand(1, 50);
    $num2 = rand(1, 10);

    $operators = ['+', '-', '*'];
    $operator = array_rand(array_flip($operators));

    return "$num1 $operator $num2";
}

function getCorrectAnswer(string $expression)
{
    $exploded = explode(" ", $expression);
    [$num1, $operator, $num2] = $exploded;

    switch ($operator) {
        case '+':
            $correctAnswer = $num1 + $num2;
            break;
        case '-':
            $correctAnswer = $num1 - $num2;
            break;
        case '*':
            $correctAnswer = $num1 * $num2;
            break;
    }

    return (string) $correctAnswer;
}

function startGame()
{
    $makeGameRound = function () {
        $question = getExpression();
        $correctAnswer = getCorrectAnswer($question);

        $gameRound = [
            'question' => $question,
            'correctAnswer' => $correctAnswer
        ];
        return $gameRound;
    };

    run($makeGameRound, GAME_TASK);
}
