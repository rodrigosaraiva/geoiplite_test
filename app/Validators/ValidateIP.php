<?php

namespace App\Validators;

class ValidateIP
{
    /**
     * @param $ip
     * @return bool
     */
    public static function validate($ip)
    {
        if (filter_var($ip, FILTER_VALIDATE_IP)) {
            return true;
        }

        return false;
    }
}