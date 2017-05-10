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
use App\Http\Controllers\sqlModels\User;
use App\Http\Controllers\sqlModels\AdminLogs;
use App\Http\Controllers\sqlModels\Settings;


class HomeController extends Controller
{

    /*
     * 首页管理
     * */
    public function getIndex(){

        $num = 1;
        $adminlog = AdminLogs::limitData($num);
        $adminlog_data = $adminlog;
        //$adminlog_data = $adminlog->get()->all();
        $adminlog_view = View::make('admin.pages.pane.adminlogs', array('fmenus'=>$adminlog_data));


        $admin_user_data = User::limitData($num);
        $admin_user_view = view::make('admin.pages.pane.admin_user',array('value'=>$admin_user_data));

        $name1 = 'site.name';
        $site_name = Settings::getDataByName($name1);
        $site_name = $site_name[0]->value;
        $name2 = 'site.email';
        $site_email = Settings::getDataByName($name2);
        $site_email = $site_email[0]->value;
        $this->layoutData['title'] = 'Admin biao home';
        $this->layoutData['content'] = View::make('admin.pages.dashboard', array('site_name'=>$site_name, 'site_email'=>$site_email,'logs'=> $adminlog_view, 'admin_user'=> $admin_user_view));

    }


}