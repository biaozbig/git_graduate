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
use Illuminate\Http\Request;


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
    /*
        * 添加页面
        * */
    public function getaddPage($id =0 ){
        $action = route('admin.menus.add.post');
        $method = 'POST';
        $is_multipart = false;
        $inputdatas = array();
        $totalkey = array(
            'order' => '顺序',
            'item_name' => '名字',
            'icon' => '图标样式1',
            'action_id' => '动作id',
        );
        if($id){
            $data = AdminMenu::find($id);
            if($data){
                foreach ($totalkey as $key=>$value){
                    if(in_array($key,array_keys($totalkey))){
                        $inputdatas[] = array(
                            'type' => 'text',
                            'label' => $totalkey[$key],
                            'name' => $key,
                            'id' => $key,
                            'value' => $data->$key,
                        );
                    }

                }
            }

        }else{
            foreach ($totalkey as $key=>$value){
                if(in_array($key,array_keys($totalkey))){
                    $inputdatas[] = array(
                        'type' => 'text',
                        'label' => $totalkey[$key],
                        'name' => $key,
                        'id' => $key,
                        'value' => '',
                    );
                }
            }
        }
        $this->layoutData['title'] = 'Page';
        $this->layoutData['content'] = View::make('admin.template.form', array('content'=>'','action'=>$action,'method'=>$method,'is_multipart'=>$is_multipart,'inputdatas'=>(object)$inputdatas,'id'=>$id?$id:''));

    }

    /*
     * 添加页面
     * */
    public function postaddPage(Request $request){
        $data = $request->all();
        unset($data['_token']);
        if($data['id']){
            $data['updated_at'] = date('Y-m-d h:i:s');
            $id = $data['id'];
            unset($data['id']);
            $result = AdminMenu::where('id', $id)->update($data);
            if($result){
                return redirect()->route('admin.menus');
            }
        }
        $data['created_at'] = date('Y-m-d h:i:s');
        $data['updated_at'] = date('Y-m-d h:i:s');
        unset($data['id']);
        $result = AdminMenu::insert($data);

        if($result){
            return redirect()->route('admin.menus');
        }

    }

    /*
   * 删除接口
   * */
    public function getdelete($id =0 ){
        if ($menu_item = AdminMenu::find($id)) {
            $menu_item->delete();
            return redirect()->route('admin.menus');

        }}

}