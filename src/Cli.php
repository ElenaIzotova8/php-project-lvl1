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

function findGCD($num1, $num2)
{
    if ($num1 === $num2) {
        return $num1;
    } else {
        return findGCD((min($num1, $num2)), abs($num1 - $num2));
    }
}

function isPrime($num)
{
    if ($num === 1) {
        return true;
    }
    for ($i = 2; $i <= ($num / 2); $i++) {
        if ($num % $i === 0) {
            return false;
            break;
        }
    }
    return true;
}
