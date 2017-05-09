<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/13
 * Time: 15:25
 */
namespace App\Http\Controllers;
use App\Http\Controllers\AdminController as Controller;
use View;
use App\Http\Controllers\sqlModels\AdminMenu;
use App\Http\Controllers\sqlModels\FrontendMenu;


class HomeController extends Controller
{

    /*
     * 首页管理
     * */
    public function getIndex(){
        $this->layoutData['title'] = 'Admin biao home';
        $this->layoutData['content'] = View::make('admin.pages.dashboard');

    }


}