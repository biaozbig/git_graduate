<?php namespace App\Http\Controllers\sqlModels;

use App\Http\Controllers\sqlModels\DataPreLoad;
use Eloquent;

class AdminController extends Eloquent
{
    use DataPreLoad;

    /**
     * @var string
     */
    protected $table = 'admin_controllers';

    public function action()
    {
        return $this->hasManyThrough('App\Http\Controllers\sqlModels\AdminMenu' ,'App\Http\Controllers\sqlModels\AdminAction');
    }

}