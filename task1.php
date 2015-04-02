<?php
/**
 * Created by PhpStorm.
 * User: matej
 * Date: 3/31/15
 * Time: 21:30
 */

$niz = array(101, 4, 320, 1, 3, 2, 45, 46);
$checked = array();

$max_length = 0;
$tmpLen = 0;
$arr = array();
$tmpArray = array();
foreach ($niz as $number) {
    $tmpLen = 0;
    $tmpArray = array();
    if (in_array($number, $checked)) {
        continue;
    }
    array_push($checked, $number);
    array_push($tmpArray, $number);

    for ($i = 1; ; $i++) {
        $greater = $number + $i;
        if (in_array($greater, $niz)) {
            array_push($checked, $greater);
            $tmpLen++;
            array_push($tmpArray, $greater);
        } else {
            break;
        }
    }

    for ($i = 1; ; $i++) {
        $smaller = $number - $i;
        if (in_array($smaller, $niz)) {
            array_push($checked, $smaller);
            $tmpLen++;
            array_push($tmpArray, $smaller);
        } else {
            break;
        }
    }

    if ($max_length <= $tmpLen) {
        $max_length = $tmpLen + 1;
        $arr = $tmpArray;

    }
}
echo '<pre>';
print_R($arr);
echo 'Max length: '.$max_length;


//print_R(array_values($niz));
