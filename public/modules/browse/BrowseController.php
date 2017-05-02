<?php

/**
 * Created by PhpStorm.
 * User: Biao
 * Date: 2017/2/8
 * Time: 10:18
 */
namespace App\Http\Controllers\modules\browse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Routing\Route;

class BrowseController extends Controller
{
    public function index(Request $request,$skins){


        return  redirect("modules/browse/browse_main.js.php?skin=\"". $skins . "\"");


    }
}