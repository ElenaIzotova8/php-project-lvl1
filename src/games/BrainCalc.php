<?php

namespace BrainGames\BrainCalc;

use function BrainGames\Cli\runGame;

use const BrainGames\Cli\ROUNDS_COUNT;

function prepareQuestionAndCorrectAnswer()
{
    $lowerBound = 1;
    $upperBound = 100;
    $operations = ['+', '-', '*'];
    $data = [];

    $number1 = rand($lowerBound, $upperBound);
    $number2 = rand($lowerBound, $upperBound);
    $operationNumber = rand(0, count($operations) - 1);
    $operation = $operations[$operationNumber];
    $question = $number1 . ' ' . $operation . ' ' . $number2;
    switch ($operation) {
        case '+':
            $correctAnswer = $number1 + $number2; break;
        case '-':
            $correctAnswer = $number1 - $number2; break;
        case '*':
            $correctAnswer = $number1 * $number2; break;
    }
    $data[] = $question;
    $data[] = (string) $correctAnswer;
    return $data;
}

function runBrainCalc()
{
    $gameInstruction = 'What is the result of the expression?';
    $data = [];
    for ($i = 1; $i <= ROUNDS_COUNT; $i++) {
        $data[$i - 1] = prepareQuestionAndCorrectAnswer();
    }
    runGame($gameInstruction, $data);
}
