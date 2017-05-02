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


class AcountController extends Controller
{
    public function getIndex()
    {
        $account = View::make('admin.account.info', array('user' => Auth::user()));
        $this->layoutData['content'] = View::make('coaster::pages.account', array('account' => $account, 'auto_blog_login' => (!empty(config('coaster::blog.url') && Auth::action('account.blog'))), 'setAlias' => Auth::action('account.name'), 'change_password' => Auth::action('account.password')));
    }

}