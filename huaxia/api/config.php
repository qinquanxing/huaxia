<?php
// error_reporting();
set_time_limit(0);
date_default_timezone_set('Asia/Chongqing');
define('API_URL', 'http://192.168.1.206/juntuo/huaxia');
define("API_ROOT",str_replace("\\","/",dirname(__FILE__)));
define("SERVER",API_ROOT.'/server');
define("CLASSLIB",API_ROOT.'/classlib');
define('DOC_ROOT', API_ROOT.'/../ovov_sys/localData/');
require(API_ROOT."/../config/database.config.php");
require(API_ROOT."/../include/classlib/mysql.class.php");
$Db = new Db();
header('Content-type:text/html;charset=utf-8');