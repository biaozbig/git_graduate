<?php

use App\Task;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::post('/net2ftp1', 'IndexController@index');
Route::group(['prefix' => '/modules','middleware' => ['skins']],function(){
    Route::get('/browse/browseindex/{skins}', 'modules\browse\BrowseController@index');
});
/*Route::get('skins/{js}', ['middleware' => ['skins'],function(){}])->where('js','*');*/
//Route::resource('skins', 'SkinsController');
//Route::any('/admin/{other}',  'sqlToolController@test')->where('other', '.*');
$routeNamePrefix = 'admin.';
$adminUrl = config('admin.url').'/';
Route::group(['prefix' => $adminUrl, 'middleware' => [ 'guest']], function () use($adminUrl, $routeNamePrefix) {

    Route::any('login', ['uses' => 'AuthController@login', 'as' => $routeNamePrefix . 'login']);
    Route::any('forgotten-password', ['uses' => 'AccountController@forgottenPassword', 'as' => $routeNamePrefix . 'login.password.forgotten']);
    Route::any('change-password/{code}', ['uses' => 'AccountController@changePassword', 'as' => $routeNamePrefix . 'login.password.change']);

});
Route::get('custom/page/{action?}', ['uses' => 'CustomPageController@getIndex', 'as' => 'Custom.Page']);

Route::group(['prefix' => $adminUrl,  'middleware' => [ 'admin']],function () use($adminUrl, $routeNamePrefix) {
    Route::get('/', ['uses' => 'HomeController@getIndex', 'as' => rtrim($routeNamePrefix, '.')]);
    Route::get('menumanage',['uses'=>'sqlToolController@menuManage','as'=>$routeNamePrefix.'menusm']);
    Route::get('account',['uses'=>'AcountController@getIndex','as'=>$routeNamePrefix.'account']);
    Route::get('account/password', ['uses' => 'AccountController@getIndex', 'as' => $routeNamePrefix . 'account.password']);
    Route::get('logout',['uses'=>'AuthController@logout','as'=>$routeNamePrefix.'logout']);
    Route::get('system',['uses'=>'AdminController@test','as'=>$routeNamePrefix.'system']);
    Route::get('home', ['uses' => 'HomeController@getIndex', 'as' => $routeNamePrefix . 'home']);

    Route::get('pages', ['uses' => 'PageController@getIndex', 'as' => $routeNamePrefix . 'pages']);
    Route::post('pages/add', ['uses' => 'PageController@postaddPage', 'as' => $routeNamePrefix . 'pages.add.post']);
    Route::get('pages/add/{id?}', ['uses' => 'PageController@getaddPage', 'as' => $routeNamePrefix . 'pages.add']);
    Route::get('pages/delete/{id?}', ['uses' => 'PageController@getdelete', 'as' => $routeNamePrefix . 'pages.delete']);

    Route::get('template', ['uses' => 'TemplateController@listtemplates', 'as' => $routeNamePrefix . 'template']);
    Route::post('template/add/{templateId?}', ['uses' => 'TemplateController@postaddApi', 'as' => $routeNamePrefix . 'template.add.post']);
    Route::get('template/add/{templateId?}', ['uses' => 'TemplateController@getaddTemplate', 'as' => $routeNamePrefix . 'template.add.page']);

    Route::get('addsetting', ['uses' => 'SettingController@addSetting', 'as' => $routeNamePrefix . 'addSetting']);
    Route::get('settings', [ 'uses' => 'SettingController@listSettings','as' => $routeNamePrefix . 'listSetting']);
    Route::post('addsetting', ['uses' => 'SettingController@addSetting', 'as' => $routeNamePrefix . 'addSetting.post']);
    Route::post('updatesetting', ['uses' => 'SettingController@updateSettingApi', 'as' => $routeNamePrefix . 'updatesetting.post']);

    Route::get('menus', ['uses' => 'MenusController@menuManage', 'as' => $routeNamePrefix . 'menus']);
    Route::post('menus/add', ['uses' => 'MenusController@postaddPage', 'as' => $routeNamePrefix . 'menus.add.post']);
    Route::get('menus/add/{id?}', ['uses' => 'MenusController@getaddPage', 'as' => $routeNamePrefix . 'menus.add']);
    Route::get('menus/delete/{id?}', ['uses' => 'MenusController@getdelete', 'as' => $routeNamePrefix . 'menus.delete']);


    Route::get('blocks', ['uses' => 'BlocksController@getIndex', 'as' => $routeNamePrefix . 'blocks']);
    Route::get('redirects', ['uses' => 'RedirectsController@getIndex', 'as' => $routeNamePrefix . 'redirects']);
    Route::get('filemanager', ['uses' => 'FilemanagerController@getIndex', 'as' => $routeNamePrefix . 'filemanager']);
    Route::get('users', ['uses' => 'UsersController@getIndex', 'as' => $routeNamePrefix . 'users']);

    Route::get('log', ['uses' => 'LogController@getIndex', 'as' => $routeNamePrefix . 'log']);


    Route::get('roles', ['uses' => 'RolesController@getIndex', 'as' => $routeNamePrefix . 'roles']);
    Route::get('themes', ['uses' => 'ThemesController@getIndex', 'as' => $routeNamePrefix . 'themes']);
    Route::get('themes/beacons', ['uses' => 'ThemesController@getBeacons', 'as' => $routeNamePrefix . 'themes.beacons']);



});

Route::group(['middleware' => ['web']], function () {
    /*Route::get('/', function () {
        return view('welcome');
    })->middleware('guest');*/

    Route::get('*.js', 'TaskController@index');
    /*Route::get('/', 'TaskController@index');*/
    Route::get('/tasks', 'TaskController@index');
    Route::get('/home', 'TaskController@index');
    Route::get('/net2ftp', 'IndexController@index');
    Route::get('/', 'IndexController@index');
    Route::post('/task', 'TaskController@store');
    Route::delete('/task/{task}', 'TaskController@destroy');
    Route::auth();
});


Auth::routes();

Route::get('/home', 'HomeController@index');
