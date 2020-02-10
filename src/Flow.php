<?php

namespace BrainGames\Flow;

use function BrainGames\Cli\showRules;
use function BrainGames\Cli\askName;
use function BrainGames\Cli\showQuestion;
use function BrainGames\Cli\askAnswer;
use function BrainGames\Cli\showCorrect;
use function BrainGames\Cli\showWrong;
use function BrainGames\Cli\showCongratulations;

const MAX_GAME_ROUNDS = 3;

function run(callable $game, string $rules)
{
    showRules($rules);
    $name = askName();

    for ($i = 0; $i < MAX_GAME_ROUNDS; $i++) {
        $gameRound = $game();
        $question = $gameRound['question'];
        $correct = $gameRound['correct'];
        
        showQuestion($question);
        $answer = askAnswer();

        if ($answer !== $correct) {
            showWrong($answer, $correct);
            return false;
        }
        showCorrect();
    }
    showCongratulations($name);
}
