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

function ask($question, $correctAnswer)
{
    line("Question: %s", $question);
    $answer = prompt('Your answer');
    if ($answer !== $correctAnswer) {
        line("'" . $answer . "' is wrong answer ;(. Correct answer was '" . $correctAnswer . "'.");
        return false;
    } else {
        line('Correct!');
        return true;
    }
}
