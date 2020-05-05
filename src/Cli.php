<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function runGame($instruction, $data)
{
    line('Welcome to the Brain Games!');
    line($instruction);
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    for ($i = 1; $i <= ROUNDS_COUNT; $i++) {
        $question = $data[$i - 1][0];
        $correctAnswer = $data[$i - 1][1];

        line("Question: %s", $question);
        $answer = prompt('Your answer');

        if ($answer !== $correctAnswer) {
            line("'" . $answer . "' is wrong answer ;(. Correct answer was '" . $correctAnswer . "'.");
            line("Let's try again, %s!", $name);
            break;
        }
        line('Correct!');
        if ($i === ROUNDS_COUNT) {
            line("Congratulations, %s!", $name);
        }
    }
}
