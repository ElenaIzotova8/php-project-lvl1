<?php

namespace BrainGames\BrainGcd;

use function cli\line;
use function BrainGames\Cli\welcome;
use function BrainGames\Cli\ask;

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
    $name = welcome($gameInstruction);

    $roundsCount = 3;
    $lowerBound = 1;
    $upperBound = 100;

    for ($i = 1; $i <= $roundsCount; $i++) {
        $number1 = rand($lowerBound, $upperBound);
        $number2 = rand($lowerBound, $upperBound);
        $expression = $number1 . ' ' . $number2;

        $correctAnswer = (string) findGCD($number1, $number2);
    
        $isCorrect = ask($expression, $correctAnswer);
        if (!$isCorrect) {
            line("Let's try again, %s!", $name);
            break;
        } else {
            if ($i === $roundsCount) {
                line("Congratulations, %s!", $name); 
            }
        }
    }
}