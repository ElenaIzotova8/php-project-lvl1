<?php

namespace BrainGames\BrainPrime;

use function BrainGames\Cli\welcome;
use function BrainGames\Cli\getName;
use function BrainGames\Cli\playRound;

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

function prepareCorrectAnswer($question)
{
    $correctAnswer = isPrime($question) ? 'yes' : 'no';
    return $correctAnswer;
}

function runBrainPrime()
{
    $gameInstruction = 'Answer "yes" if given number is prime. Otherwise answer "no".';
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
