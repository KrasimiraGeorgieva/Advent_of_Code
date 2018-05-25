<?php
// 2015 Day 4: The Ideal Stocking Stuffer Part 1

//$secretKey = 'abcdef';
//$secretKey = 'pqrstuv';
$secretKey = 'yzbqklnj'; //282749

for($i = 1; $i < 9999999; $i++){
    $md5Hash = md5($secretKey . $i);
    $output = substr( $md5Hash, 0, 5 );
    if($output === '00000') {
        echo $md5Hash . PHP_EOL;
        echo $secretKey . $i;
        return;
    }
}