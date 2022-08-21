<?php

namespace basics;

use \InvalidArgumentException;

class BasicsValidator implements BasicsValidatorInterface
{
    /**
     * Implement the check functionality described in the method getMinuteQuarter (BasicsInterface Class) which throws Exception.
     *
     * Make sure the next PHPDoc instructions will be added:
     * @param int $minute
     * @throws \InvalidArgumentException
     */
    public function isMinutesException(int $minute): void
    {
        if ($minute < 0 || $minute > 59) {
            throw new InvalidArgumentException('Argument $minute must be beth 0 and 59 including these integers');
        }
    }

    /**
     * Implement the check functionality described in the method getMinuteQuarter (BasicsInterface Class) which throws Exception.
     *
     * Make sure the next PHPDoc instructions will be added:
     * @param int $year
     * @throws \InvalidArgumentException
     */
    public function isYearException(int $year): void
    {
        if ($year < 1900) {
            throw new InvalidArgumentException('Argument $year must be higher than 1900 year');
        }
    }

    /**
     * Implement the check functionality described in the method getMinuteQuarter (BasicsInterface Class) which throws Exception.
     *
     * Make sure the next PHPDoc instructions will be added:
     * @param string $input
     * @throws \InvalidArgumentException
     */
    public function isValidStringException(string $input): void
    {
        if (strlen($input) <> 6) {
            throw new InvalidArgumentException('Argument $input must contain 6 digits');
        }
    }
}