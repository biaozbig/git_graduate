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


class MenusController extends Controller
{

    /*
     * 菜单管理
     * */
    public function menuManage(){

       /* $menuItems = \App\Http\Controllers\sqlModels\AdminMenu::orderBy('order', 'asc')
            ->join('admin_actions','admin_menu.action_id','=','admin_actions.id')
            ->join('admin_controllers','admin_actions.controller_id','=','admin_controllers.id')
            ->get();*/
        $menuItems = AdminMenu::hasACandAADatas();
        $items =  $menuItems->all();
        $FrontendMenu = FrontendMenu::allData();
        $FrontendMenus =  $FrontendMenu->all();

        $menus_view = View::make('admin.pages.pane.admin_menu', array('menus'=>$items));
        $frontend_view = View::make('admin.pages.pane.frontend', array('fmenus'=>$FrontendMenus));
        $data['menus_view'] = $menus_view;
        $data['frontend_view'] = $frontend_view;

        $this->layoutData['title'] = 'Menus';
        $this->layoutData['content'] = View::make('admin.pages.listmenus', array('data'=>$data));

    }


}