<?php
// 2017 Day 5: A Maze of Twisty Trampolines, All Alike

$arr = file("q2-input.txt", FILE_IGNORE_NEW_LINES);
$instructionIndex = 0;

while ($instructionIndex >= 0 && $instructionIndex < count($arr)){
    static $jumpOffsets = 0;
    $jumpOffsets += 1;
    $currentIndex = $arr[$instructionIndex];
    $arr[$instructionIndex] += 1;
    $instructionIndex += $currentIndex;
}

echo $jumpOffsets . PHP_EOL; // 336905