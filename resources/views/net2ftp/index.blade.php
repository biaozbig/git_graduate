<!DOCTYPE html PUBLIC "XHTML 1.0 Transitional" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="<?php
echo __("en"); ?>" dir="<?php
echo __("ltr"); ?>">
<head>
<meta http-equiv="Content-type" content="text/html;charset=<?php echo __("iso-8859-1"); ?>" />
<meta name="keywords" content="net2ftp, web, ftp, based, web-based, xftp, client, PHP, SSL, SSH, SSH2, password, server, free, gnu, gpl, gnu/gpl, net, net to ftp, netftp, connect, user, gui, interface, web2ftp, edit, editor, online, code, php, upload, download, copy, move, delete, zip, tar, unzip, untar, recursive, rename, chmod, syntax, highlighting, host, hosting, ISP, webserver, plan, bandwidth" />
<meta name="description" content="net2ftp is a web based FTP client. It is mainly aimed at managing websites using a browser. Edit code, upload/download files, copy/move/delete directories recursively, rename files and directories -- without installing any software." />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<link rel="shortcut icon" href="favicon.ico" />
<link rel="apple-touch-icon" href="favicon.png"/>
<title>net2ftp - a web based FTP client</title>
<?php net2ftp("printJavascript"); ?>
<?php net2ftp("printCss"); ?>
</head>
<body onload="<?php net2ftp("printBodyOnload"); ?>">

<?php net2ftp("printBody");
global  $net2ftp_result;
$result = $net2ftp_result["success"] ==false ?false : true;
?>

@if ($result == false) {
<?php
// ------------------------------------------------------------------------
// 4. Check the result and print out an error message. This can be done using
//    a template, or by accessing the $net2ftp_result variable directly.
// ----
require_once($net2ftp_globals["application_rootdir"] . "/../../skins/" ."shinra" . "/error.template.php");


/*if ($net2ftp_result["success"] == false) {
    require_once($net2ftp_globals["application_rootdir"] . "/../../skins/" ."shinra" . "/error.template.php");
}*/
/*if ($net2ftp_result["success"] == false) {
    require_once($net2ftp_globals["application_rootdir"] . "/skins/" . $net2ftp_globals["skin"] . "/error.template.php");
}*/
?>
}
@endif


</body>
</html>
