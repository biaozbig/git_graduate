<?php
/**
 * Created by PhpStorm.
 * User: Biao
 * Date: 2017/2/9
 * Time: 12:00
 */

namespace App\Http\Controllers;

use DB;

class SqlHelpController extends Controller
{
    public function test(){
        DB::transaction();
    }

}