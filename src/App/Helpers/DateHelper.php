<?php

namespace Helpers;

class DateHelper
{
    public static function formatTimestamp($timestamp, $format = 'd/M/y H:i')
    {
        $dateTime = new \DateTime($timestamp);
        return $dateTime->format($format);
    }
}
