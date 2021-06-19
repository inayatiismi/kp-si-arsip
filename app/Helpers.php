<?php

use App\Constants;

if ( ! function_exists('getConstants'))
{
    function getConstants()
    {
        return new Constants;
    }
}
