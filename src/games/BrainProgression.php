<?php

namespace BrainGames\BrainProgression;

use function BrainGames\Cli\welcome;
use function BrainGames\Cli\getName;
use function BrainGames\Cli\playRound;

function prepareQuestion()
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

    for ($j = 1; $j <= 10; $j++) {
        if ($j === $placeInProgression) {
            $progression = $progression . '..' . ' ';
        } else {
            $progression = $progression . (string) ($startProgression + $j * $stepProgression) . ' ';
        }
    }
    return $progression;
}

function prepareCorrectAnswer($question)
{
    $progression = explode(' ', $question);
    $startProgression = $progression[0] !== '..' ? $progression[0] : $progression[2] - ($progression[2] - $progression[1]) * 2;
    $stepProgression = $progression[0] !== '..' && $progression[1] !== '..' ? $progression[1] - $progression[0] : $progression[3] - $progression[2];
    $placeInProgression = array_search('..', $progression);
    $correctAnswer = $startProgression + $placeInProgression * $stepProgression;
    return (string) $correctAnswer;
}

function runBrainProgression()
{
    $gameInstruction = 'What number is missing in the progression?';
    welcome($gameInstruction);
    $name = getName();
    $roundNumber = 1;
    $nextRoundNumber = 2;
    while ($roundNumber === $nextRoundNumber - 1) {
        $question = prepareQuestion();
        $correctAnswer = prepareCorrectAnswer($question);
        $roundNumber = playRound($roundNumber, $question, $correctAnswer, $name);
        $nextRoundNumber += 1;
    }
}
