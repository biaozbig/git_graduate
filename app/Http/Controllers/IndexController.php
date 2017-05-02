<?php
/**
 * Created by PhpStorm.
 * User: Biao
 * Date: 2017/1/30
 * Time: 11:18
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\incHelper\MainInclude;

class IndexController extends Controller
{

    /**
     * Display a list of all of the user's task.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request){
        //$tasks = Task::where('user_id', $request->user()->id)->get();

        /*  Hi,

    Thanks for downloading net2ftp!

    This page shows how to integrate net2ftp in a generic PHP page.
    It is quite easy:
    1. Define the constants NET2FTP_APPLICATION_ROOTDIR and NET2FTP_APPLICATION_ROOTDIR_URL
    2. Include the file main.inc.php
    3. Execute 5 net2ftp() calls to send the HTTP headers, print the Javascript
       code, print the HTML body, etc...
    4. Check if an error occured to print out an error message.

    Look in /integration for more elaborate examples.

    Enjoy,

    David
*/

// ------------------------------------------------------------------------
// 1. Define the constants NET2FTP_APPLICATION_ROOTDIR and NET2FTP_APPLICATION_ROOTDIR_URL
// ------------------------------------------------------------------------
        $http_scheme = "http://";
        if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == 'on') { $http_scheme = "https://"; }
        $http_host = "";
        if (isset($_SERVER["HTTP_HOST"]) == true) { $http_host = $_SERVER["HTTP_HOST"]; }
        $script_name = "/index.php/net2ftp";
        if (isset($_SERVER["SCRIPT_NAME"]) == true)  { $script_name = dirname($_SERVER["SCRIPT_NAME"]); }
        elseif (isset($_SERVER["PHP_SELF"]) == true) { $script_name = dirname($_SERVER["PHP_SELF"]); }
        if($script_name == '\\'){$script_name = "";}
        define("NET2FTP_APPLICATION_ROOTDIR", dirname(__FILE__));
        define("NET2FTP_APPLICATION_ROOTDIR_URL", $http_scheme . $http_host . $script_name);

// ------------------------------------------------------------------------
// 2. Include the file /path/to/net2ftp/includes/main.inc.php
// ------------------------------------------------------------------------
        //require_once("./includes/main.inc.php");

// ------------------------------------------------------------------------
// 3. Execute net2ftp($action). Note that net2ftp("sendHttpHeaders") MUST
//    be called once before the other net2ftp() calls!
// ------------------------------------------------------------------------
        require_once(NET2FTP_APPLICATION_ROOTDIR ."/../incHelper/MainIncludenoclass.php");
        net2ftp("sendHttpHeaders");
        global $net2ftp_result,$net2ftp_globals;
        $result = $net2ftp_result["success"] ==false ?false : true;
        //$test=$net2ftp_globals;

        return view('net2ftp/index',['result'=>$result,
         'net2ftp_globals'=>$net2ftp_globals
        ]);
       /* if ($net2ftp_result["success"] == false) {
            require_once("./skins/blue/error_wrapped.template.php");
            exit();
        }*/



    }

}