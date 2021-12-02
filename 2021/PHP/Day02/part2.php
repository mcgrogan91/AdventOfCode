<?php

$movementFile = fopen('movements.txt', "r");

$horizontal = $depth = $aim = 0;
while (($line = fgets($movementFile)) !== false) {
    $instructions = explode(" ", trim($line));
    switch($instructions[0]) {
        case 'forward':
            $horizontal += $instructions[1];
            $depth += ($aim * $instructions[1]);
            break;
        case 'down':
            $aim += $instructions[1];
            break;
        case 'up':
            $aim -= $instructions[1];
            break;
    }
}

echo ($horizontal * $depth).PHP_EOL;