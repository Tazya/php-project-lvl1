<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function showRules($rules)
{
    line('Welcome to the Brain Game!');
    line($rules);
}

function askName()
{
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    return $name;
}

function showQuestion($question)
{
    line('Question: %s', $question);
}

function askAnswer()
{
    $answer = prompt('Your answer');
    return $answer;
}

function showCorrect()
{
    line("Correct!");
}

function showWrong(string $userAsnwer, string $correct)
{
    line(
        "'%s' is wrong answer ;(. Correct answer was '%s'.",
        $userAsnwer,
        $correct
    );
}

function showCongratulations($name)
{
    line("Congratulations, %s!", $name);
}
