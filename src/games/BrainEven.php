<?php

namespace BrainGames\BrainEven;

use function cli\line;
use function BrainGames\Cli\welcome;
use function BrainGames\Cli\ask;

function runBrainEven()
{
    $gameInstruction = 'Answer "yes" if the number is even, otherwise answer "no".';
    $name = welcome($gameInstruction);

    $roundsCount = 3;
    $lowerBound = 1;
    $upperBound = 100;

    for ($i = 1; $i <= $roundsCount; $i++) {
        $number = rand($lowerBound, $upperBound);
        $correctAnswer = $number % 2 === 0 ? 'yes' : 'no';
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
