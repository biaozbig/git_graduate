<?php

namespace App\Http\Controllers\sqlModels;

use Eloquent;

class Templates extends Eloquent
{
    //
    protected $table = 'templates';

    public static function allData()
    {
        return static::get();
    }

    public static function findInfoById($id)
    {
        return static::find($id);
    }

}
