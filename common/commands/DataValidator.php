<?php
namespace common\commands;

class DataValidator
{

    /**
     * Static function for validating a date in euro format (dd.mm.yyyy)
     *
     * @access public
     * @param float $date
     *            to be validated
     * @return bool true on success, false on error
     */
    public static function isDateEUROSyntaxValid($date)
    {
        $isValid = false;
        
        // Check the format validity
        $pattern = "/^[0-9]{2}[.][0-9]{2}[.][0-9]{4}$/";
        if (preg_match($pattern, $date)) {
            // Check the date validity
            $day = substr($date, 0, 2);
            $month = substr($date, 3, 2);
            $year = substr($date, 6, 4);
            
            if (checkdate($month, $day, $year) === true) {
                $isValid = true;
            }
        }
        
        return $isValid;
    }

    /**
     * Static function for validating a date in ISO format (yyyy-mm-dd)
     *
     * @access public
     * @param float $date
     *            to be validated
     * @return bool true on success, false on error
     */
    public static function isDateISOSyntaxValid($date)
    {
        $isValid = false;
        
        // Check the format validity
        $pattern = "/^[0-9]{4}[-][0-9]{2}[-][0-9]{2}$/";
        if (preg_match($pattern, $date)) {
            // Check the date validity
            $year = substr($date, 0, 4);
            $month = substr($date, 5, 2);
            $day = substr($date, 8, 2);
            
            if (checkdate($month, $day, $year) === true)
                $isValid = true;
            else
                $isValid = false;
        }
        
        return $isValid;
    }

    /**
     * Static function to validate ISO-formatted time (hh:ii:ss)
     * 
     * @param string $time
     *            to be validated
     * @return bool $isValid	Returns true on success, false on error
     */
    public static function isTimeISOSyntaxValid($time)
    {
        $isValid = false;
        // Check format validity
        $pattern = "/^[0-9]{2}[:][0-9]{2}[:][0-9]{2}$/";
        
        // Check the time validity
        if (preg_match($pattern, $time)) {
            $hours = substr($time, 0, 2);
            $minutes = substr($time, 3, 2);
            $seconds = substr($time, 6, 2);
            
            // Check hours, minutes and seconds (yes, the int-validation is a little redundant)
            if (self::isPositiveIntValid($hours) && $hours >= 0 && $hours <= 23)
                $hoursValid = true;
            else
                $hoursValid = false;
            
            if (self::isPositiveIntValid($minutes) && $minutes >= 0 && $minutes <= 60)
                $minutesValid = true;
            else
                $minutesValid = false;
            
            if (self::isPositiveIntValid($seconds) && $seconds >= 0 && $seconds <= 60)
                $secondsValid = true;
            else
                $secondsValid = false;
            
            if ($hoursValid === true && $minutesValid === true && $secondsValid === true)
                $isValid = true;
            else
                $isValid = false;
        } else
            $isValid = false;
        
        return $isValid;
    }

    /**
     * Static function for validating a datetime in ISO format (yyyy-mm-dd hh:ii:ss)
     * 
     * @param string $datetime
     *            to be validated
     * @return bool $isValid	Returns true on success, false on error
     */
    public static function isDateTimeISOSyntaxValid($datetime)
    {
        $isValid = false;
        
        $date = substr($datetime, 0, 11);
        $time = substr($datetime, 11);
        
        if (self::isDateISOSyntaxValid($date) || self::isTimeISOSyntaxValid($time))
            $isValid = true;
        else
            $isValid = false;
        
        return $isValid;
    }

    /**
     * Static function for checking that a date isn't in the future
     * Accepts ISO-formattd and EURO-formatted dates
     *
     * @access public
     * @param string $date
     *            to be checked
     * @return bool true on success, false on error
     */
    public static function isDateNotInFuture($date)
    {
        $isValid = false;
        
        // Check date format
        if (self::isDateISOSyntaxValid($date) || self::isDateEUROSyntaxValid($date)) {
            // Check that date is not in future
            $datestamp = strtotime($date);
            $timestamp = strtotime(date('Y-m-d'));
            
            if ($datestamp > $timestamp) {
                $isValid = false;
            } else
                $isValid = true;
        }
        
        return $isValid;
    }

    /**
     * Static function for checking that a date isn't in the past
     * Accepts ISO-formattd and EURO-formatted dates
     *
     * @access public
     * @param string $date
     *            to be checked
     * @return bool true on success, false on error
     */
    public static function isDateNotInPast($date)
    {
        $isValid = false;
        
        // Check date format
        if (self::isDateISOSyntaxValid($date) || self::isDateEUROSyntaxValid($date)) {
            // Check that date is not in future
            $datestamp = strtotime($date);
            $timestamp = strtotime(date('Y-m-d'));
            
            if ($datestamp < $timestamp) {
                $isValid = false;
            } else
                $isValid = true;
        }
        
        return $isValid;
    }

    /**
     * Static function for checking that start date is before end date
     * Accepts ISO-formattd and EURO-formatted dates
     *
     * @access public
     * @param string $startDate
     *            date
     * @param string $startDate
     *            date
     * @return bool true on success, false on error
     */
    public static function isStartDateBeforeEndDate($startDate, $endDate)
    {
        $isValid = false;
        
        // Check date formats
        if ((self::isDateISOSyntaxValid($startDate) || self::isDateEUROSyntaxValid($startDate)) || (self::isDateISOSyntaxValid($endDate) || self::isDateEUROSyntaxValid($endDate))) {
            $startStamp = strtotime($startDate);
            $endStamp = strtotime($endDate);
            
            if ($startStamp > $endStamp) {
                $isValid = false;
            } else
                $isValid = true;
        }
        
        return $isValid;
    }
}