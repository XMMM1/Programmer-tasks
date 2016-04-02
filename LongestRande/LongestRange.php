<?php
/**
 * Created by PhpStorm.
 * User: matej
 * We have array
 * $niz = array(101, 4, 320, 1, 3, 2, 45, 46);
 *
 * THe longest range in array is [1,2,3,4]
 * Length of array is 4.
 * Time complexity is prefered O(n); otherwise determine your algorithm complexity
 */

namespace Calculator\Range;

/**
 * Class CalcRange
 */
class CalcRange
{
    public $niz;

    /**
     * constructor
     */
    public function __construct($range = array())
    {
        $this->niz = $range;
    }

    /**
     * find and return longest range in array in O(n) time
     * @param array $niz
     * @return int
     */
    public function longestRange()
    {
        $checked = array();
        $max_length = 0;
//        $arr = array();
//        $tmpArray = array();

        foreach ($this->niz as $index => $number) {
            $tmpLen = 0;
//            $tmpArray = array();

            if (isset($checked[$index])) {
                continue;
            }

            $checked[$index] = $number;
//            $tmpArray[$index] = $number;
            for ($i = 1; ; $i++) {
                $greater = $number + $i;
                if (in_array($greater, $this->niz)) {
                    $checked[$index] = $greater;
                    $tmpLen++;
//                    $tmpArray[$index] = $greater;
                } else {
                    break;
                }
            }

            for ($i = 1; ; $i++) {
                $smaller = $number - $i;
                if (in_array($smaller, $this->niz)) {
                    $checked[$index] = $smaller;
                    $tmpLen++;
//                    $tmpArray[$index] = $smaller;
                } else {
                    break;
                }
            }

            if ($max_length <= $tmpLen) {
                $max_length = $tmpLen + 1;
//                $arr = $tmpArray;

            }
        }
        return $max_length;
    }
}


