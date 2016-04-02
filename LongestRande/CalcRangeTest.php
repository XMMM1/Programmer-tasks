<?php
/**
 * Created by PhpStorm.
 * User: matej
 * Date: 4/3/15
 * Time: 00:08
 */

namespace Calculator\Range;


class CalcRangeTest extends \PHPUnit_Framework_TestCase
{

    public function testRange()
    {
        include dirname(__FILE__) . '/LongestRange.php';
        $niz = array(101, 4, 320, 1, 3, 2, 45, 46);
        $range = new CalcRange($niz);
        $this->assertEquals(4, $range->longestRange());
    }

    public function testRange1()
    {
        $niz = array(101);
        $range = new CalcRange($niz);
        $this->assertEquals(1, $range->longestRange());
    }

    public function testRange3()
    {
        $niz = array();
        $range = new CalcRange($niz);
        $this->assertEquals(0, $range->longestRange());
    }
}
 