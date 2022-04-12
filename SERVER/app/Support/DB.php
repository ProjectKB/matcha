<?php

namespace App\Support;

class DB
{
    public static $db;

    public static function connect()
    {
        self::$db = new \mysqli(...config('database.mysql'));

        return self::$db;
    }
}
