<?php

require 'src/LongNumber.php';
require 'src/LongNumberSumCalculator.php';

echo "Enter 'q' to quit application\n";
while (true) {
    $a = setOrQuit("Enter  a: ");
    $b = setOrQuit("Enter  b: ");

    $calculator = new LongNumberSumCalculator($a, $b);
    printf("a plus b: %s\n\n", $calculator->execute()->getNumber());
}

function setOrQuit($msg)
{
    echo $msg;
    $answer = trim(fgets(STDIN));
    if ($answer === 'q') {
        exit;
    }

    return $answer;
}
