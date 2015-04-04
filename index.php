<?php
/**
 * Created by PhpStorm.
 * User: matej
 * Date: 4/3/15
 * Time: 23:08
 */
include dirname(__FILE__) . '/LongestRange.php';

$niz = array(101, 4, 320, 1, 3, 2, 5, 45, 46);
$com = new \Calculator\Range\CalcRange($niz);
echo '<pre>';
echo 'Vhodni niz je: ';
print_R($niz);
echo 'Najdaljsi niz zaporednih stevil je: ' . $com->longestRange();
