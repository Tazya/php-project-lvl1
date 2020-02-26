<?php

namespace BrainGames\games\Progression;

use function BrainGames\Flow\run;

const GAME_TASK = 'What number is missing in the progression?';

function getProgression(int $start, int $add, int $progressionLength)
{
    $progression = [];
    for ($i = 0, $current = $start; $i < $progressionLength; $i++, $current += $add) {
        $progression[] = $current;
    }
    return $progression;
}

function makeGameRound()
{
    $start = rand(0, 99);
    $add = rand(1, 10);
    $progressionLength = 10;

    $progression = getProgression($start, $add, $progressionLength);

    $hiddenIndex = array_rand($progression);

    $correctAnswer = (string) $progression[$hiddenIndex];
    
    $maskedProgression = $progression;
    $maskedProgression[$hiddenIndex] = '..';

    $question = implode(' ', $maskedProgression);

    return [
        'question' => $question,
        'correctAnswer' => $correctAnswer
    ];
}

function startGame()
{
    $makeGameRound = function () {
        return makeGameRound();
    };

    run($makeGameRound, GAME_TASK);
}
