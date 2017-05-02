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


/*Route::get('/', function () {
    return view('welcome');
});*/


/**
 * Display All Tasks
 */
/*Route::get('/', function () {
    //
    $tasks = Task::orderBy('created_at', 'asc')->get();

    return view('tasks', [
        'tasks' => $tasks
    ]);
});*/

/**
 * Add A New Task
 */
/*Route::post('/task', function (Request $request) {
    //
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    $task = new Task;
    $task->name = $request->name;
    $task->save();

    return redirect('/');
    // Create The Task...

});*/

/**
 * Delete An Existing Task
 */
/*Route::delete('/task/{id}', function ($id) {
    //
    Task::findOrFail($id)->delete();
    return redirect('/');
});*/
/*Route::get('/skins/{id}', function () {
    return view('welcome');
})->where('id','*')->middleware('skins');
Route::group(['prefix' => '/skins','middleware' => ['skins']],function(){}
    );*/
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
Route::group(['prefix' => $adminUrl,  'middleware' => [ 'admin'],],function () use($adminUrl, $routeNamePrefix) {
    Route::get('/', ['uses' => 'HomeController@getIndex', 'as' => rtrim($routeNamePrefix, '.')]);
    Route::get('menumanage',['uses'=>'sqlToolController@menuManage','as'=>$routeNamePrefix.'menusm']);
    Route::get('account',['uses'=>'sqlToolController@test','as'=>$routeNamePrefix.'account']);
    Route::get('logout',['uses'=>'AdminController@test','as'=>$routeNamePrefix.'logout']);
    Route::get('system',['uses'=>'AdminController@test','as'=>$routeNamePrefix.'system']);
    Route::get('home', ['uses' => 'AdminController@mainAction', 'as' => $routeNamePrefix . 'home']);

    Route::get('pages', ['uses' => 'PageController@getIndex', 'as' => $routeNamePrefix . 'pages']);
    Route::post('pages/add', ['uses' => 'PageController@postaddPage', 'as' => $routeNamePrefix . 'pages.add.post']);
    Route::get('pages/add/{action?}/{id?}', ['uses' => 'PageController@getaddPage', 'as' => $routeNamePrefix . 'pages.add']);

    Route::get('template', ['uses' => 'TemplateController@listtemplates', 'as' => $routeNamePrefix . 'template']);
    Route::post('template/add/{templateId?}', ['uses' => 'TemplateController@postaddTemplate', 'as' => $routeNamePrefix . 'template.add']);
    Route::get('template/add/{templateId?}', ['uses' => 'TemplateController@getaddTemplate', 'as' => $routeNamePrefix . 'template.add.post']);

    Route::get('addsetting', ['uses' => 'SettingController@addSetting', 'as' => $routeNamePrefix . 'addSetting']);
    Route::get('settings', [ 'uses' => 'SettingController@listSettings','as' => $routeNamePrefix . 'listSetting']);
    Route::post('addsetting', ['uses' => 'SettingController@addSetting', 'as' => $routeNamePrefix . 'addSetting.post']);

    Route::get('menus', ['uses' => 'MenusController@menuManage', 'as' => $routeNamePrefix . 'menus']);
    Route::get('blocks', ['uses' => 'BlocksController@getIndex', 'as' => $routeNamePrefix . 'blocks']);
    Route::get('redirects', ['uses' => 'RedirectsController@getIndex', 'as' => $routeNamePrefix . 'redirects']);
    Route::get('filemanager', ['uses' => 'FilemanagerController@getIndex', 'as' => $routeNamePrefix . 'filemanager']);
    Route::get('users', ['uses' => 'UsersController@getIndex', 'as' => $routeNamePrefix . 'users']);
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

