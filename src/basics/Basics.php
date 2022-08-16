<?php

namespace basics;

use basics\BasicsValidatoruse;
use \InvalidArgumentException;

class Basics implements BasicsInterface
{
    private $basicValidator;

    public function __construct(BasicsValidatorInterface $basicValidator = null)
    {
        $this->basicValidator = $basicValidator ?? new BasicsValidator();
    }

    /**
     * The $minute variable contains a number from 0 to 59 (i.e. 10 or 25 or 60 etc).
     * Determine in which quarter of an hour the number falls.
     * Return one of the values: "first", "second", "third" and "fourth".
     * Throw InvalidArgumentException if $minute is negative of greater then 60.
     * (Implement this functionality in isMinutesException method from BasicsValidator Class and use it here)
     * @see https://www.php.net/manual/en/class.invalidargumentexception.php
     *
     * Make sure the next PHPDoc instructions will be added or use typehint:
     * @param int $minute
     * @return string
     * @throws \InvalidArgumentException
     */
    public function getMinuteQuarter(int $minute): string
    {
        $this->basicValidator->isMinutesException($minute);

        $parts = 4;
        $wholeNumber = 60;
        $partWidth = $wholeNumber / $parts;

        if ($parts = 2) {
            $result = $this->getBySimpleSearch($minute, $partWidth, $wholeNumber);
        }

        $divisions = [];
        $currentPart = 1;
        while ($currentPart !== $parts) {
            $divisions[] = $partWidth * $currentPart;
            $currentPart++;
        }


        if ($minute > 0 && $minute <= $partWidth) {
            return 'first';
        } elseif ($minute === 0 || $minute <= $wholeNumber ) {
            return 'fourth';
        }

        elseif ($minute === 0 || $minute <= $partWidth * $parts) {
            return 'fourth';
        } elseif ($minute === 0 || $minute <= $partWidth * $parts) {
            return 'fourth';
        }
    }

    public function binarySearch(Array $arr, $x)
    {
        // check for empty array
        if (count($arr) === 0) return false;
        $low = 0;
        $high = count($arr) - 1;

        while ($low <= $high) {

            // compute middle index
            $mid = floor(($low + $high) / 2);

            // element found at mid
            if($arr[$mid] == $x) {
                return true;
            }

            if ($x < $arr[$mid]) {
                // search the left side of the array
                $high = $mid -1;
            }
            else {
                // search the right side of the array
                $low = $mid + 1;
            }
        }

        // If we reach here element x doesnt exist
        return false;
    }

    /**
     * @todo connect API for getting names of countable numbers
     *
     * @return void
     */
    public function getPartName()
    {

    }

    private function getBySimpleSearch($minute, $partWidth, $wholeNumber)
    {
        if ($minute > 0 && $minute <= $partWidth) {
            return 'first';
        } elseif ($minute === 0 || $minute <= $wholeNumber) {
            return 'fourth';
        }
    }

    /**
     * The $year variable contains a year (i.e. 1995 or 2020 etc).
     * Return true if the year is Leap or false otherwise.
     * Throw InvalidArgumentException if $year is lower then 1900.
     * (Implement this functionality in isYearException method from BasicsValidator Class and use it here)
     * @see https://en.wikipedia.org/wiki/Leap_year
     * @see https://www.php.net/manual/en/class.invalidargumentexception.php
     *
     * Make sure the next PHPDoc instructions will be added:
     * @param int $year
     * @return boolean
     * @throws \InvalidArgumentException
     */
    public function isLeapYear(int $year): bool;

    /**
     * The $input variable contains a string of six digits (like '123456' or '385934').
     * Return true if the sum of the first three digits is equal with the sum of last three ones
     * (i.e. in first case 1+2+3 not equal with 4+5+6 - need to return false).
     * Throw InvalidArgumentException if $input contains more then 6 digits.
     * (Implement this functionality in isValidStringException method from BasicsValidator Class and use it here)
     * @see https://www.php.net/manual/en/class.invalidargumentexception.php
     *
     * Make sure the next PHPDoc instructions will be added:
     * @param string $input
     * @return boolean
     * @throws \InvalidArgumentException
     */
    public function isSumEqual(string $input): bool;
}