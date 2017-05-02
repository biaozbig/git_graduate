<?php
/**
 * Created by PhpStorm.
 * User: Biao
 * Date: 2017/4/15
 * Time: 18:52
 */
namespace App\Http\Controllers\sqlModels;

use Eloquent;

class FrontendMenu extends Eloquent
{
    protected $table = 'frontend_menu';

    public static function allData()
    {
        return static::get();
    }

}