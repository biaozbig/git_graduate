<?php

namespace App\Http\Controllers\sqlModels;

use Eloquent;

class AdminLogs extends Eloquent
{
    //
    protected $table = 'admin_logs';

    public static function allData()
    {
        return static::get();
    }

    public static function limitData($num)
    {
        $data = static::limit($num)->get()->all();
        //$sql = static::toSql();
        return $data;
    }
}
