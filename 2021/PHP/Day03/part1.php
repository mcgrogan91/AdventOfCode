<?php

$diagnosticsFile = fopen('diagnostics.txt', "r");

$rows = 0;
$columns = array_fill(0, 12, 0);

while (($line = fgets($diagnosticsFile)) !== false) {
    $rows++;
    $line = trim($line);
    for($i = 0; $i < 12; $i++) {
        $columns[$i] += $line[$i];
    }
}
fclose($diagnosticsFile);

$gamma = "";
$epsilon = "";
foreach ($columns as $column) {
    if ($column >= $rows/2) {
        $gamma .= "1";
        $epsilon .= "0";
    } else {
        $gamma .= "0";
        $epsilon .= "1";
    }
}

echo "Gamma: $gamma: ".bindec($gamma).PHP_EOL;
echo "Epsilon: $epsilon: ".bindec($epsilon).PHP_EOL;
echo "Product: ".(bindec($gamma) * bindec($epsilon)).PHP_EOL;
die();