<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function welcome($instruction)
{
    line('Welcome to the Brain Games!');
    line($instruction);
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function question($quest, $correctAns)
{
    line("Question: %s", $quest);
    $answer = prompt('Your answer');
    if ($answer !== $correctAns) {
        $wrong = "'" . $answer . "' is wrong answer ;(. Correct answer was '" . $correctAns . "'.";
        line($wrong);
        return false;
    } else {
        line('Correct!');
        return true;
    }
}
