<?php

namespace BrainGames\BrainPrime;

use function cli\line;
use function BrainGames\Cli\welcome;
use function BrainGames\Cli\ask;

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
    $name = welcome($gameInstruction);

    $roundsCount = 3;
    $lowerBound = 1;
    $upperBound = 100;

    for ($i = 1; $i <= $roundsCount; $i++) {
        $number = rand($lowerBound, $upperBound);
        $correctAnswer = isPrime($number) ? 'yes' : 'no';
    
        $isCorrect = ask($number, $correctAnswer);
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