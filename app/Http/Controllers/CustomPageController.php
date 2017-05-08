<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/13
 * Time: 15:25
 */
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use View;
use Auth;
use App\Http\Controllers\sqlModels\Pages;
use App\Http\Controllers\sqlModels\Templates;

class CustomPageController extends Controller
{
    public function getIndex($action)
    {
        $page_date = Pages::getInfoByRelativeUrl($action);
        $Templates_data = Templates::findInfoById($page_date->template);
        return View::make($Templates_data->template, array('author'=>$page_date->author,'title'=>$page_date->title,'source'=>$page_date->source,'create_at'=>$page_date->create_at,'content'=>$page_date->content));


    }

}