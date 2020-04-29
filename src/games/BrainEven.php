<?php

namespace BrainGames\BrainEven;

use function BrainGames\Cli\welcome;
use function BrainGames\Cli\getName;
use function BrainGames\Cli\playRound;

function isEven($number)
{
    return $number % 2 === 0;
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
    $correctAnswer = isEven($question) ? 'yes' : 'no';
    return $correctAnswer;
}

function runBrainEven()
{
    $gameInstruction = 'Answer "yes" if the number is even, otherwise answer "no".';
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
