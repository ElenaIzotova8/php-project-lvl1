<?php

namespace BrainGames\BrainGcd;

use function BrainGames\Cli\welcome;
use function BrainGames\Cli\getName;
use function BrainGames\Cli\playRound;

function findGCD($num1, $num2)
{
    if ($num1 === $num2) {
        return $num1;
    } else {
        return findGCD((min($num1, $num2)), abs($num1 - $num2));
    }
}

function prepareQuestion()
{
    $lowerBound = 1;
    $upperBound = 100;
    $number1 = rand($lowerBound, $upperBound);
    $number2 = rand($lowerBound, $upperBound);
    $question = $number1 . ' ' . $number2;
    return $question;
}

function prepareCorrectAnswer($question)
{
    [$number1, $number2] = explode(' ', $question);
    $correctAnswer = (string) findGCD($number1, $number2);
    return $correctAnswer;
}

function runBrainGcd()
{
    $gameInstruction = 'Find the greatest common divisor of given numbers.';
    welcome($gameInstruction);
    $name = getName();
    $roundNumber = 1;
    $nextRoundNumber = 2;
    while ($roundNumber === $nextRoundNumber - 1) {
        $question = prepareQuestion();
        $correctAnswer = prepareCorrectAnswer($question);
        $roundNumber = playRound($roundNumber, $question, $correctAnswer, $name);
        $nextRoundNumber += 1;
    }
}
