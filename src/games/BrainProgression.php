<?php

namespace BrainGames\BrainProgression;

use function cli\line;
use function BrainGames\Cli\welcome;
use function BrainGames\Cli\ask;

function runBrainProgression()
{
    $gameInstruction = 'What number is missing in the progression?';
    $name = welcome($gameInstruction);

    $roundsCount = 3;
    $lowerBoundStartProgression = 1;
    $upperBoundStartProgression = 10;
    $lowerBoundStepProgression = 1;
    $upperBoundStepProgression = 10;
    $lengthProgression = 10;

    for ($i = 1; $i <= $roundsCount; $i++) {
        $startProgression = rand($lowerBoundStartProgression, $upperBoundStartProgression);
        $stepProgression = rand($lowerBoundStepProgression, $upperBoundStepProgression);
        $placeInProgression = rand(1, $lengthProgression);
        $progression = '';

        for ($j = 1; $j <= 10; $j++) {
            if ($j === $placeInProgression) {
                $progression = $progression . '..' . ' ';
                $correctAnswer = $startProgression + $j * $stepProgression;
            } else {
                $progression = $progression . (string) ($startProgression + $j * $stepProgression) . ' ';
            }
        }

        $correctAnswer = (string) $correctAnswer;
    
        $isCorrect = ask($progression, $correctAnswer);
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
