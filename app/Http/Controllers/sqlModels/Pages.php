<?php

namespace App\Http\Controllers\sqlModels;

use Eloquent;

class Pages extends Eloquent
{
    //
    protected $table = 'pages';

    public  static function allData()
    {
        return static::get();
    }



    public static function getInfoByRelativeUrl($action)
    {
        return static::where('relaive_url','=',$action)->firstOrFail();
    }


}
