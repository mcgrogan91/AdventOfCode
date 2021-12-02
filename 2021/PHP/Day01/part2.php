<?php

$depthFile = fopen('depths.txt', "r");
$depths = [];

// Set up depths
$depths = [
    (int)fgets($depthFile),
    (int)fgets($depthFile),
    (int)fgets($depthFile),
];

$increases = 0;
while (($line = fgets($depthFile)) !== false) {
    $nextDepth = (int)$line;
    if (array_shift($depths) < $nextDepth) {
        $increases++;
    }
    $depths[] = $nextDepth;
}

echo $increases.PHP_EOL;