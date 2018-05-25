<?php
// 2017 Day 5: A Maze of Twisty Trampolines, All Alike

require 'q2-input.txt';

$arr = file("q2-input.txt", FILE_IGNORE_NEW_LINES);

$jumpOffsets = 0;
$instructionIndex = 0;

do {
    $jumpOffsets += 1;
    $instructionIndex += $arr[$instructionIndex]++;
	
} while ($instructionIndex >= 0 && $instructionIndex < count($arr));

echo PHP_EOL;
print_r($arr);
echo $jumpOffsets . PHP_EOL; // 336905
echo $instructionIndex;