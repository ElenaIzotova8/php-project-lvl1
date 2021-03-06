<?php

namespace BrainGames\Gcd;

use function BrainGames\Flow\runGame;

use const BrainGames\Flow\ROUNDS_COUNT;

function findGCD($num1, $num2)
{
    if ($num1 === $num2) {
        return $num1;
    } else {
        return findGCD((min($num1, $num2)), abs($num1 - $num2));
    }
}

function runBrainGcd()
{
    $gameInstruction = 'Find the greatest common divisor of given numbers.';
    $data = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $lowerBound = 1;
        $upperBound = 100;
        $number1 = rand($lowerBound, $upperBound);
        $number2 = rand($lowerBound, $upperBound);
        $question = "{$number1} {$number2}";
        $correctAnswer = (string) findGCD($number1, $number2);
        $data[] = [$question, $correctAnswer];
    }
    runGame($gameInstruction, $data);
}
