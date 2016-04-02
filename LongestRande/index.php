<?php
/**
 * Created by PhpStorm.
 * User: matej
 * Date: 4/3/15
 * Time: 23:08
 */
include dirname(__FILE__) . '/LongestRange.php';

$niz = array(12,0,13,5,2,4,7,3);
$com = new \Calculator\Range\CalcRange($niz);
echo '<pre>';
echo 'Vhodni niz je: ';
print_R($niz);
echo 'Najdaljsi niz zaporednih stevil je: ' . $com->longestRange();
