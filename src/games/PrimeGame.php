<?php

namespace BrainGames\Games\PrimeGame;

function getRules()
{
    return 'Answer "yes" if given number is prime. Otherwise answer "no".';
}

function getQuestion()
{
    $question = rand(1, 99);

    return $question;
}

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

function getGame()
{
    $game = function () {
        $question = getQuestion();
        $correct = getCorrect($question);

        $gameRound = [
            'question' => $question,
            'correct' => $correct
        ];
        return $gameRound;
    };

    return $game;
}
