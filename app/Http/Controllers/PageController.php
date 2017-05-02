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
use App\Http\Controllers\sqlModels\Pages;
use Illuminate\Http\Request;

class PageController extends Controller
{

    /*
     * 添加页面
     * */
    public function getaddPage($action = 'admin.pages.add.post',$id =0 ){
        $action = route('admin.pages.add.post');
        $method = 'POST';
        $is_multipart = false;
        $inputdatas = array();
        $totalkey = array(
            'title' => '标题',
            'author' => '作者',
            'source' => '来源',
            'category' => '分类',
            'relaive_url' => '相对地址',
            'template' => '模板',
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

        $content = View::make('admin.template.ueditor');

        $this->layoutData['title'] = 'Page';
        $this->layoutData['content'] = View::make('admin.template.form', array('action'=>$action,'method'=>$method,'is_multipart'=>$is_multipart,'inputdatas'=>(object)$inputdatas,'content'=>$content));

    }

    /*
     * 添加页面
     * */
    public function postaddPage(Request $request){
        $data = $request->all();
        unset($data['_token']);
        $data['created_at'] = date('Y-m-d h:i:s');
        $data['updated_at'] = date('Y-m-d h:i:s');
        $result = pages::insert($data);

        if($result){
            return redirect()->route('admin.pages');

        }

    }

    /*
     * 展示页面
     * */
    public function getIndex(){


        $pages_data = pages::allData();
        $pages_datas =  $pages_data->all();
        $pages_view = View::make('admin.pages.pane.pages', array('menus'=>$pages_datas));
        $data['pages_view'] = $pages_view;
        $this->layoutData['content'] = View::make('admin.pages.listpages', array('data'=>$data));


    }


}