<?php

$depthFile = fopen('depths.txt', "r");

$increases = 0;
$depth = (int)fgets($depthFile);
while (($line = fgets($depthFile)) !== false) {
    $nextDepth = (int)$line;
    if ($depth < $nextDepth) {
        $increases++;
    }
    $depth = $nextDepth;
}

echo $increases.PHP_EOL;