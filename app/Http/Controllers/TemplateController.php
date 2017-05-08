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
use App\Http\Controllers\sqlModels\Templates;
use Illuminate\Http\Request;

class TemplateController extends Controller
{

    /*
     * 添加模板
     * */
    public function getaddTemplate($action = 'admin.template.add.post',$id =0 ){
        $action = route('admin.template.add.post');
        $method = 'POST';
        $is_multipart = false;
        $inputdatas = array();
        $totalkey = array(
            'label' => '标签',
            'template' => '模板地址',

        );
        if($id){
            $data = Pages::find($id);
            if($data){
                foreach ($data as $key=>$value){
                    if(in_array($key,array_keys($totalkey))){
                        $inputdatas[] = array(
                            'type' => 'text',
                            'label' => $totalkey[$key],
                            'name' => $key,
                            'id' => $key,
                            'value' => $value,
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
        $content = '';
        $this->layoutData['title'] = 'Page';
        $this->layoutData['content'] = View::make('admin.template.form', array('action'=>$action,'method'=>$method,'is_multipart'=>$is_multipart,'inputdatas'=>(object)$inputdatas,'content'=>$content));
    }

    /*
     * 列出所有模板
     * */
    public function listtemplates(){
        $templates_data = Templates::allData();
        $templates_datas =  $templates_data->all();
        $pages_view = View::make('admin.pages.pane.templates', array('menus'=>$templates_datas));
        $data['pages_view'] = $pages_view;
        $this->layoutData['content'] = View::make('admin.pages.listtemplates', array('data'=>$data));

    }

    /*
        * 添加接口
        * */
    public function postaddApi(Request $request){
        $data = $request->all();
        unset($data['_token']);
        $data['created_at'] = date('Y-m-d h:i:s');
        $result = Templates::insert($data);

        if($result){
            return redirect()->route('admin.template');

        }

    }




}