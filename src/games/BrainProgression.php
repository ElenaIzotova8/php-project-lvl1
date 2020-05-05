<?php

namespace BrainGames\BrainProgression;

use function BrainGames\Cli\runGame;

use const BrainGames\Cli\ROUNDS_COUNT;

function prepareQuestionAndCorrectAnswer()
{
    $lowerBoundStartProgression = 1;
    $upperBoundStartProgression = 10;
    $lowerBoundStepProgression = 1;
    $upperBoundStepProgression = 10;
    $lengthProgression = 10;

    $startProgression = rand($lowerBoundStartProgression, $upperBoundStartProgression);
    $stepProgression = rand($lowerBoundStepProgression, $upperBoundStepProgression);
    $placeInProgression = rand(1, $lengthProgression);
    $progression = '';
    $data = [];

    for ($j = 1; $j <= $lengthProgression; $j++) {
        if ($j === $placeInProgression) {
            $progression = $progression . '..' . ' ';
            $correctAnswer = (string) ($startProgression + $j * $stepProgression);
        } else {
            $progression = $progression . (string) ($startProgression + $j * $stepProgression) . ' ';
        }
    }
    $data[] = $progression;
    $data[] = $correctAnswer;
    return $data;
}

function runBrainProgression()
{
    $gameInstruction = 'What number is missing in the progression?';
    $data = [];
    for ($i = 1; $i <= ROUNDS_COUNT; $i++) {
        $data[$i - 1] = prepareQuestionAndCorrectAnswer();
    }
    runGame($gameInstruction, $data);
}
