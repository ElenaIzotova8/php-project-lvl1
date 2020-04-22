<?php

namespace BrainGames\BrainCalc;

use function cli\line;
use function BrainGames\Cli\welcome;
use function BrainGames\Cli\ask;

function runBrainCalc()
{
    $gameInstruction = 'What is the result of the expression?';
    $name = welcome($gameInstruction);

    $roundsCount = 3;
    $lowerBound = 1;
    $upperBound = 100;

    for ($i = 1; $i <= $roundsCount; $i++) {
        $number1 = rand($lowerBound, $upperBound);
        $number2 = rand($lowerBound, $upperBound);
        $operationNumber = rand(1, 3);
        
        switch ($operationNumber) {
            case 1:
                $operation = '+';
                $correctAnswer = $number1 + $number2;
                break;
            case 2:
                $operation = '-';
                $correctAnswer = $number1 - $number2;
                break;
            case 3:
                $operation = '*';
                $correctAnswer = $number1 * $number2;
                break;
        }

        $expression = $number1 . $operation . $number2;
        $correctAnswer = (string) $correctAnswer;
    
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
