<?php

namespace App\Helpers;
use Illuminate\Support\Str;

class DataHelper
{

    /**
     * Formats a datetime string to a common format for displaying.
     *
     * @return string
     */
    public static function getUuid()
    {
        return Str::uuid()->toString();
    }
}
