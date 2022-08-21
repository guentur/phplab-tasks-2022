<?php

namespace basics;

use basics\BasicsValidator;
use \InvalidArgumentException;
use basics\Mappers\MinuteQuarterMapper;
use basics\Model\GetArrayPart;
use phpDocumentor\Reflection\Types\ArrayKey;

class Basics implements BasicsInterface
{
    private $mapper;

    private $getArrayPart;

    private $basicValidator;

    public function __construct(
        BasicsValidatorInterface $basicValidator = null,
        GetArrayPart $getArrayPart = null,
        MinuteQuarterMapper $mapper = null
    ) {
        $this->basicValidator = $basicValidator ?? new BasicsValidator();
        $this->getArrayPart = $getArrayPart ?? new GetArrayPart();
        $this->mapper = $mapper ?? new MinuteQuarterMapper();
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

        if ($minute === 0) {
            return 'fourth';
        }

        $pattern = array(1, 15, 16, 30, 31, 45, 46, 59);
        return $this->getArrayPart->execute($minute, $pattern, $this->mapper);
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
    public function isLeapYear(int $year): bool
    {
        $this->basicValidator->isYearException($year);

        if ((0 === $year % 4) && (0 !== $year % 100) || (0 === $year % 400)) {
            return true;
        } else {
            return false;
        }
    }

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
    public function isSumEqual(string $input): bool
    {
        $this->basicValidator->isValidStringException($input);

        $firstLine = substr($input, 0, 3);
        $secondLine = substr($input, -3);

        $firstLineSum = $this->getNumSum($firstLine);
        $secondLineSum = $this->getNumSum($secondLine);

        if ($firstLineSum == $secondLineSum) {
            return true;
        }

        return false;
    }

    /**
     * @param string $num
     * @return int
     */
    public function getNumSum(string $num): int
    {
        $sum = 0;
        for ($i = 0; $i < strlen($num); $i++) {
            $sum += (int) $num[$i];
        }
        return $sum;
    }
}