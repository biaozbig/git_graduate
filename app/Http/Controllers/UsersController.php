<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/12
 * Time: 11:01
 */
namespace App\Http\Controllers;
use App\Http\Controllers\AdminController as Controller;
use App\Http\Controllers\sqlModels\User;
use View;
use App\Http\Controllers\sqlModels\Net2ftp_users;

class UsersController extends Controller
{
    public function getIndex()
    {
        /*
         * 全部用户的数据和页面
         * */
        $net2ftp_user = Net2ftp_users::all();
        $admin_user = User::all();
        $data = array();
        $net2ftp_user_data = $this->getUserdata($net2ftp_user);
        $admin_user_data = $this->getUserdata($admin_user);
        $net2ftp_user_view = view::make('admin.pages.pane.ftp_user',array('value'=>$net2ftp_user_data));
        $admin_user_view = view::make('admin.pages.pane.admin_user',array('value'=>$admin_user_data));
        $data['net2ftp_user'] = $net2ftp_user_view;
        $data['Admin_user'] =$admin_user_view;
        $this->layoutData['title'] = 'users';
        $this->layoutData['content'] = view::make('admin.pages.User' , array('data' => $data));
    }

    public function getUserdata($net2ftp_user){
        $key_num = $net2ftp_user->count();
        $net2ftp_user_data = array();
        for ($i=0;$i<$key_num;$i++){
            $net2ftp_user_data[$i] = $net2ftp_user->get($i);
        }
        return $net2ftp_user_data;
    }

}