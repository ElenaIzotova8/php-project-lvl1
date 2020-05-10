<?php

namespace BrainGames\BrainEven;

use function BrainGames\Cli\runGame;

use const BrainGames\Cli\ROUNDS_COUNT;

function isEven($number)
{
    return $number % 2 === 0;
}

function runBrainEven()
{
    $gameInstruction = 'Answer "yes" if the number is even, otherwise answer "no".';
    $data = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $lowerBound = 1;
        $upperBound = 100;
        $question = rand($lowerBound, $upperBound);
        $correctAnswer = isEven($question) ? 'yes' : 'no';
        $data[$i][0] = $question;
        $data[$i][1] = $correctAnswer;
    }
    runGame($gameInstruction, $data);
}
