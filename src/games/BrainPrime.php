<?php

namespace BrainGames\BrainPrime;

use function BrainGames\Cli\runGame;

use const BrainGames\Cli\ROUNDS_COUNT;

function isPrime($num)
{
    if ($num < 2) {
        return false;
    }
    for ($i = 2; $i <= ($num / 2); $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }
    return true;
}

function prepareQuestion()
{
    $lowerBound = 1;
    $upperBound = 100;
    $question = rand($lowerBound, $upperBound);
    return $question;
}

function runBrainPrime()
{
    $gameInstruction = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $data = [];
    for ($i = 1; $i <= ROUNDS_COUNT; $i++) {
        $question = prepareQuestion();
        $correctAnswer = isPrime($question) ? 'yes' : 'no';
        $data[$i - 1][0] = $question;
        $data[$i - 1][1] = $correctAnswer;
    }
    runGame($gameInstruction, $data);
}
