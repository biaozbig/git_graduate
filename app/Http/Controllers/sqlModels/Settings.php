<?php
namespace App\Http\Controllers\sqlModels;

use Auth;
use Carbon\Carbon;
use CoasterCms\Libraries\Builder\FormMessage;
use Hash;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Eloquent;
use Request;
use Validator;

class Settings extends Eloquent
{
    public static function getDataByName($name)
    {
        $data = static::where('name',$name)->get()->all();
        //$sql = static::toSql();
        return $data;
    }

}