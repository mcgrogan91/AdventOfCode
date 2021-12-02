<?php

$movementFile = fopen('movements.txt', "r");

$horizontal = $depth = 0;
while (($line = fgets($movementFile)) !== false) {
    $instructions = explode(" ", trim($line));
    switch($instructions[0]) {
        case 'forward':
            $horizontal += $instructions[1];
            break;
        case 'down':
            $depth += $instructions[1];
            break;
        case 'up':
            $depth -= $instructions[1];
            break;
    }
}

echo ($horizontal * $depth).PHP_EOL;