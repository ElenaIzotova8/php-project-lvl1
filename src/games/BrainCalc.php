<?php

namespace BrainGames\BrainCalc;

use function BrainGames\Cli\welcome;
use function BrainGames\Cli\getName;
use function BrainGames\Cli\playRound;

function addition($number1, $number2)
{
    return $number1 + $number2;
}

function subtraction($number1, $number2)
{
    return $number1 - $number2;
}

function multiplication($number1, $number2)
{
    return $number1 * $number2;
}

function prepareQuestion()
{
    $lowerBound = 1;
    $upperBound = 100;
    $operations = ['+', '-', '*'];

    $number1 = rand($lowerBound, $upperBound);
    $number2 = rand($lowerBound, $upperBound);
    $operationNumber = rand(0, count($operations) - 1);
    $operation = $operations[$operationNumber];
    $question = $number1 . ' ' . $operation . ' ' . $number2;
    return $question;
}

function prepareCorrectAnswer($question)
{
    $expression = explode(' ', $question);
    [$number1, $operation, $number2] = $expression;
    if ($operation === '+') {
        $correctAnswer = addition($number1, $number2);
    }
    if ($operation === '-') {
        $correctAnswer = subtraction($number1, $number2);
    }
    if ($operation === '*') {
        $correctAnswer = multiplication($number1, $number2);
    }
    return (string) $correctAnswer;
}

function runBrainCalc()
{
    $gameInstruction = 'What is the result of the expression?';
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