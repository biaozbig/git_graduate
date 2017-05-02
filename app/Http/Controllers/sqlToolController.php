<?php
/**
 * Created by PhpStorm.
 * User: biao
 * Date: 17/2/9
 * Time: 下午4:06
 */

namespace App\Http\Controllers;




use Illuminate\Routing\Controller;
use App\Http\Controllers\Helpers\view\AdminMenu;
use DB;
use View;
use Response;
use Auth;
use Request;
use App\Http\Controllers\Helpers\Routes;
use App\Events\LoadResponse;



class sqlToolController extends Controller
{
    /**
     * @var string
     */
    protected $layout;

    /**
     * @var array
     */
    protected $layoutData;

    /**
     * @var int
     */
    protected $responseCode;

    public function __construct()
    {
        View::make('admin.asset_builder.main')->render();
        $this->responseCode = 200;
        $this->layout = 'admin.template.main';
        $this->layoutData = [
            'site_name' => config('admin.name'),
            'title' => ucwords(Request::segment(2)),
            'modals' => '',
            'content' => '',
            'alerts' => []
        ];
    }

    public  function test(Request $request){

        $method = 'getIndex';
        $parameters = array();
        //$altResponseContent = parent::callAction($method, $parameters);
        $altResponseContent = null;
        if (is_null($altResponseContent)) {
            $this->layoutData = array_merge([
                'system_menu' => AdminMenu::getSystemMenu(),
               'sections_menu' => AdminMenu::getSectionsMenu(),
                //'sections_menu' => '',//10 submenu
                //'coaster_routes' => Routes::jsonRoutes()
                'coaster_routes' => ''
            ], $this->layoutData);
        }

        $this->layoutData['content'] = $this->menuManage();
        event(new LoadResponse($this->layout, $this->layoutData, $altResponseContent, $this->responseCode));

        if (is_a($altResponseContent, \Symfony\Component\HttpFoundation\Response::class)) {
            return $altResponseContent;
        } else {
            $responseContent = is_null($altResponseContent) ? View::make($this->layout, $this->layoutData) : $altResponseContent;
        }

        return Response::make($responseContent, $this->responseCode);


    }

    public function menuManage(){

        $menuItems = \App\Http\Controllers\sqlModels\AdminMenu::orderBy('order', 'asc')->get();

        $items =  $menuItems->all();
        return View::make('admin.pages.listmenus', array('menus'=>$items));

    }

}