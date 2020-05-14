<?php

namespace BrainGames\Prime;

use function BrainGames\Flow\runGame;

use const BrainGames\Flow\ROUNDS_COUNT;

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

function runBrainPrime()
{
    $gameInstruction = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $data = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $lowerBound = 1;
        $upperBound = 100;
        $question = rand($lowerBound, $upperBound);
        $correctAnswer = isPrime($question) ? 'yes' : 'no';
        $data[] = [$question, $correctAnswer];
    }
    runGame($gameInstruction, $data);
}
