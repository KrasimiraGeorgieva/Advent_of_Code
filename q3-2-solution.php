<?php

$inputRows = file('q3-input.txt', FILE_IGNORE_NEW_LINES);

$programs = [];
$unbalanced = false;
foreach ($inputRows as $row) {
    $names = explode(' -> ', trim($row));
    $disc = explode(' ', trim($names[0]));
    $programs[$disc[0]]['weight'] = substr($disc[1], 1, -1);
    if (count($names) > 1) {
        $programs[$disc[0]]['nodes'] = explode(', ', trim($names[1]));
    }
}

function calculateWeight(&$programs, &$unbalanced, $programName)
{
    $weight = $programs[$programName]['weight'];

    if (isset($programs[$programName]['nodes'])) {
        $nodeWeights = [];
        foreach ($programs[$programName]['nodes'] as $node) {
            $programs[$node]['calculateWeight'] = calculateWeight($programs, $unbalanced, $node);
            $weight += $programs[$node]['calculateWeight'];
            array_push($nodeWeights, $programs[$node]['calculateWeight']);
        }
        if (count(array_unique($nodeWeights)) > 1 && $unbalanced === false) {
            $unbalanced = true;
            if (count($nodeWeights) !== 2) {
                foreach (array_count_values($nodeWeights) as $weight => $value) {
                    if ($value === 1) {
                        $indexOfWeight = array_search($weight, $nodeWeights);
                        break;
                    }
                }
                $diffWeight = ($indexOfWeight === 0) ? $nodeWeights[1] : $nodeWeights[0];
                $nodeName = $programs[$programName]['nodes'][$indexOfWeight];
                $result = ($programs[$nodeName]['weight'] - ($programs[$nodeName]['calculateWeight'] - $diffWeight));
                echo 'Program weight should be: ' . $result . PHP_EOL;
            }
        }
    }
    return $weight;
}

calculateWeight($programs, $unbalanced, 'uownj');//'uownj'- 596; 'tknk' - 60;