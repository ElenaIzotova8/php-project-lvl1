<?php

namespace BrainGames\Even;

use function BrainGames\Flow\runGame;

use const BrainGames\Flow\ROUNDS_COUNT;

function isEven($number)
{
    return $number % 2 === 0;
}

function runBrainEven()
{
    $data = [];
    $gameInstruction = 'Answer "yes" if the number is even, otherwise answer "no".';
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $lowerBound = 1;
        $upperBound = 100;
        $question = rand($lowerBound, $upperBound);
        $correctAnswer = isEven($question) ? 'yes' : 'no';
        $data[] = [$question, $correctAnswer];
    }
    runGame($gameInstruction, $data);
}
