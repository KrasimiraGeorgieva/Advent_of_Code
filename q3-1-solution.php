<?php

$inputRows = file("q3-input.txt", FILE_IGNORE_NEW_LINES);
$name = [];
$programsName = [];
foreach ($inputRows as $row) {
    $names = explode(' -> ', trim($row));
    if (count($names) > 1) {
        $discParts = explode(', ', trim($names[1]));
        foreach ($discParts as $discPart) {
            array_push($programsName, $discPart);
        }
    }
    $disc = explode(' ', trim($names[0]));
    array_push($name, $disc[0]);
}

$output = array_diff($name, $programsName);

foreach ($output as $out){
    echo PHP_EOL.$out; // uownj
}