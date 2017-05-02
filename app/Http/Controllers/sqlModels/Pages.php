<?php

namespace App\Http\Controllers\sqlModels;

use Eloquent;

class Pages extends Eloquent
{
    //
    protected $table = 'pages';

    public static function allData()
    {
        return static::get();
    }

}
