<?php

namespace BrainGames\Games\ProgressionGame;

function getRules()
{
    return 'What number is missing in the progression?';
}

function getProgression(int $start, int $add, $length = 10)
{
    $progression = [];
    for ($i = 0, $current = $start; $i < $length; $i++, $current += $add) {
        $progression[] = $current;
    }
    return $progression;
}

function getQuestionAndCorrect()
{
    $start = rand(0, 99);
    $add = rand(1, 10);
    $progression = getProgression($start, $add);

    $hiddenIndex = rand(0, count($progression) - 1);

    $correct = (string) $progression[$hiddenIndex];
    
    $maskedProgression = $progression;
    $maskedProgression[$hiddenIndex] = '..';

    $question = implode(' ', $maskedProgression);

    return [
        'correct' => $correct,
        'question' => $question
    ];
}

function game()
{
    $iterations = 3;

    $result = [];
    for ($i = 0; $i < $iterations; $i++) {
        $result[] = getQuestionAndCorrect();
    }

    return $result;
}
