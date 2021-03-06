<?php

namespace BrainGames\Progression;

use function BrainGames\Flow\runGame;

use const BrainGames\Flow\ROUNDS_COUNT;

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
    $progression = [];
    $data = [];

    for ($j = 1; $j <= $lengthProgression; $j++) {
        if ($j === $placeInProgression) {
            $progression[] = '..';
            $correctAnswer = (string) ($startProgression + $j * $stepProgression);
        } else {
            $progression[] = $startProgression + $j * $stepProgression;
        }
    }
    $question = implode(' ', $progression);
    $data[] = $question;
    $data[] = $correctAnswer;
    return $data;
}

function runBrainProgression()
{
    $gameInstruction = 'What number is missing in the progression?';
    $data = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $data[$i] = prepareQuestionAndCorrectAnswer();
    }
    runGame($gameInstruction, $data);
}
