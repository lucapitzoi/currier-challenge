<?php

namespace App\Helpers;

class DhlHelper
{
    /**
     * Get DHL Api Key (consumer key) from env
     *
     * @return string
     */
    public static function getApiKey() : string
    {
        return env('DHL_API_KEY');
    }


    /**
     * Get DHL Api secret from env
     *
     * @return string
     */
    public static function getApiSecret() : string
    {
        return env('DHL_API_SECRET');
    }
}
