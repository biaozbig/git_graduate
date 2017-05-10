<?php
/**
 * Created by PhpStorm.
 * User: Biao
 * Date: 2017/5/10
 * Time: 22:25
 */
namespace App\Http\Controllers;
use App\Http\Controllers\AdminController as Controller;
use View;
use App\Http\Controllers\sqlModels\AdminLogs;

class LogController extends Controller
{

    /*
     * 首页管理
     * */
    public function getIndex(){

        $adminlog = AdminLogs::allData();
        $adminlog_data = $adminlog->all();
        $adminlog_view = View::make('admin.pages.pane.adminlogs', array('fmenus'=>$adminlog_data));
        $data['adminlog_view'] = $adminlog_view;
        $this->layoutData['title'] = 'Admin biao home';
        $this->layoutData['content'] = View::make('admin.pages.log', array('data'=>$data));

    }
}