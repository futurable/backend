<?php
namespace common\commands;

use yii\validators\DateValidator;
class DateFormatter
{

    /**
     * Static function for formatting date in EURO format to ISO format.
     * dd.mm.yyyy => yyyy-mm-dd
     *
     * @access public
     * @param string $dateInEUROFormat
     *            (dd.mm.yyyy)
     * @return string $dateInISOFormat (yyyy-dd-mm), default return NULL
     */
    public static function formatEURODateToISOFormat($dateInEUROFormat)
    {
        $dateInISOFormat = NULL;
        
        if (DataValidator::isDateEUROSyntaxValid($dateInEUROFormat) === true) {
            $dateInISOFormat = \DateTime::createFromFormat('d.m.Y', $dateInEUROFormat);
            $dateInISOFormat = $dateInISOFormat->format('Y-m-d');
        }
        return $dateInISOFormat;
    }

    /**
     * Static function for formatting date in ISO format to EURO format.
     * yyyy-mm-dd => dd.mm.yyyy
     *
     * @access public
     * @param string $dateInISOFormat
     *            (yyyy-mm-dd)
     * @return string $dateInEUROFormat (dd.mm.yyyy), default return NULL
     */
    public static function formatISODateToEUROFormat($dateInISOFormat)
    {
        $dateInISOFormat = substr($dateInISOFormat, 0 , 10);
        $dateInEUROFormat = NULL;

        if (DataValidator::isDateISOSyntaxValid($dateInISOFormat)) {
            $dateInEUROFormat = new \DateTime($dateInISOFormat);
            $dateInEUROFormat = $dateInEUROFormat->format('d.m.Y');
        }
        
        return $dateInEUROFormat;
    }
}
?>