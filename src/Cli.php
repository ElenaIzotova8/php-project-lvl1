<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function welcome($instruction)
{
    line('Welcome to the Brain Games!');
    line($instruction);
}

function getName()
{
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function ask($question)
{
    line("Question: %s", $question);
    $answer = prompt('Your answer');
    return $answer;
}

function isCorrectAnswer($answer, $correctAnswer)
{
    return $answer === $correctAnswer;
}

function reportError($answer, $correctAnswer, $name)
{
    line("'" . $answer . "' is wrong answer ;(. Correct answer was '" . $correctAnswer . "'.");
    line("Let's try again, %s!", $name);
}

function reportCorrectAnswer()
{
    line('Correct!');
}

function reportWin($name)
{
    line("Congratulations, %s!", $name);
}

function playRound($roundNumber, $question, $correctAnswer, $name)
{
    $roundsCount = 3;
    $answer = ask($question);
    if (!isCorrectAnswer($answer, $correctAnswer)) {
        reportError($answer, $correctAnswer, $name);
        return $roundNumber;
    }
    if (isCorrectAnswer($answer, $correctAnswer) && $roundNumber < $roundsCount) {
        reportCorrectAnswer();
        $roundNumber += 1;
        return $roundNumber;
    }
    reportCorrectAnswer();
    reportWin($name);
    return $roundNumber;
}
