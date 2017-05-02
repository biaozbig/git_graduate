<?php namespace App\Http\Controllers\sqlModels;

use Eloquent;

class AdminMenu extends Eloquent
{

    protected $table = 'admin_menu';

    public function action()
    {
        return $this->belongsTo('App\Http\Controllers\sqlModels\AdminAction');
   }

   public static function hasACandAADatas()
    {
        return static::orderBy('order', 'asc')
            ->join('admin_actions','admin_menu.action_id','=','admin_actions.id')
            ->join('admin_controllers','admin_actions.controller_id','=','admin_controllers.id')
            ->get();
   }




}