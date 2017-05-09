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
use Illuminate\Http\Response;

class PageController extends Controller
{

    /*
     * 添加页面
     * */
    public function getaddPage($id =0 ){
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
        $content = View::make('admin.template.ueditor');
        if($id){
            $data = Pages::find($id);
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
                $content = $data->content;
                $content = View::make('admin.template.ueditor',array('content'=>$content));
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
            $content = View::make('admin.template.ueditor');
        }
        $this->layoutData['title'] = 'Page';
        $this->layoutData['content'] = View::make('admin.template.form', array('action'=>$action,'method'=>$method,'is_multipart'=>$is_multipart,'inputdatas'=>(object)$inputdatas,'content'=>$content, 'id'=>$id?$id:''));

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
            $result = pages::where('id', $id)->update($data);
            if($result){
                return redirect()->route('admin.pages');
            }
        }
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

    /*
     * 删除接口
     * */
    public function getdelete($id =0 ){
        if ($menu_item = pages::find($id)) {
            $menu_item->delete();
            return redirect()->route('admin.pages');

        }
        //return Response::make('Menu item with ID '.$id.' not found', 500);
    }


}