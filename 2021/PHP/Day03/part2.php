<?php

$diagnosticsFile = fopen('diagnostics.txt', "r");

$inputs = [];
while (($line = fgets($diagnosticsFile)) !== false) {
    $inputs[] = trim($line);
}
fclose($diagnosticsFile);

function getRating($inputs, callable $determiner)
{
    $index = 0;
    while(count($inputs) > 1) {
        $split = [
            0 => [],
            1 => []
        ];
        foreach ($inputs as $input) {
            $split[$input[$index]][] = $input;
        }
        $inputs = $determiner($split[0], $split[1]);
        $index++;
    }
    return bindec($inputs[0]);
}

$oxygenPicker = function($zeroList, $oneList) {
    if (count($zeroList) > count($oneList)) {
        return $zeroList;
    }
    return $oneList;
};
$scrubberPicker = function($zeroList, $oneList) {
    if (count($zeroList) <= count($oneList)) {
        return $zeroList;
    }
    return $oneList;
};

$oxygen = getRating($inputs, $oxygenPicker);
$scrubber = getRating($inputs, $scrubberPicker);

echo "Oxygen: $oxygen" . PHP_EOL;
echo "CO2: $scrubber" . PHP_EOL;
echo "Product: ". ($oxygen * $scrubber).PHP_EOL;