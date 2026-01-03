<?php

class Helpers
{
    public static function randomPassword($length = 10)
    {
        $chars = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz23456789@#$';
        return substr(str_shuffle($chars), 0, $length);
    }
}

