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
use Illuminate\Http\Request;
use App\Http\Controllers\sqlModels\Settings;


class SettingController extends Controller
{

    /*
     * 添加模板
     * */
    public function addSetting(){

        $action = route('admin.addSetting.post');
        $method = 'POST';
        $is_multipart = false;
        $inputdatas = array();
        $totalkey = array(
            'value' => '设置的值',
            'name' => '设置的调用名',
            'label' => '标签',
        );
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
        $this->layoutData['title'] = 'Setting';
        $this->layoutData['content'] = View::make('admin.template.form', array('action'=>$action,'method'=>$method,'is_multipart'=>$is_multipart,'inputdatas'=>(object)$inputdatas,'content'=>''));

    }

    public function addSettingApi(Request $request){
        $data = $request->all();


    }

    /*
     * 列出所有模板
     * */
    public function listSettings(){


       $pages_datas = settings::all();
        $action = route('admin.addSetting.post');
        $method = 'POST';
        $this->layoutData['title'] = 'Setting';
        $this->layoutData['content'] = View::make('admin.setting.setting_list',array('site_details'=>$pages_datas,'action'=>$action,'method'=>$method));


    }






}