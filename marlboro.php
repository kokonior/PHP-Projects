<?php
@include_once "locale.inc.php";

$CONFIG['LOG_DIR'] = "../logs/";
$GLOBAL_PATH = "../";
$APP_PATH = "../com/";
$ENGINE_PATH = "../engines/";
$WEBROOT = "../public_html/";

//error_reporting(E_ALL & ~E_DEPRECATED);
error_reporting(0);
//ini_set('display_errors',1);
// ini_set('display_startup_errors',1);
//set aplikasi yang digunakan
define('APPLICATION','application');
define('COORPORATE_APPS','coorporate_apps');
define('MOBILE_APPS','mobile');
define('WAP_APPS','wap_apps');
define('DASHBOARD_APPS','dashboard');
