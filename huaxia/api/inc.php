<?php
session_start();
// error_reporting(0);
set_time_limit(0);
date_default_timezone_set('Asia/Chongqing');
define("OVOVCMS","OVOVCMS");
define("OVOVCMS_ROOT",str_replace("\\","/",dirname(__FILE__)));
define("CONFIG_PATH",OVOVCMS_ROOT."/config");
define("COMMON_PATH",OVOVCMS_ROOT."/common");
define("TPL_PATH",OVOVCMS_ROOT."/templates/html");
define("INCLUDE_FUNCPATH",OVOVCMS_ROOT."/include/function");
define("INCLUDE_CLASSPATH",OVOVCMS_ROOT."/include/classlib");
header("Content-type:text/html; Charset=utf-8");
require_once(INCLUDE_FUNCPATH."/function.common.php");
require_once(CONFIG_PATH."/web.config.php");
require_once(CONFIG_PATH."/database.config.php");  
//set_magic_quotes_runtime(0);
// 检测魔术引号有无开启,如果没开启,把GET,POST,COOKIE手动转义.
if(!get_magic_quotes_gpc()) {  
   $_GET = addslash($_GET);  
   $_POST = addslash($_POST);  
   $_COOKIE = addslash($_COOKIE);  
}
CheckInstall();	//检查是否安装
CheckSwitch();	//检查网站开关

require_once(INCLUDE_CLASSPATH."/mysql.class.php");
$Db = new Db();
include_once(OVOVCMS_ROOT."/include/inc/unsql.php");
require_once(OVOVCMS_ROOT."/smarty/libs/Smarty.class.php");
$smarty = new Smarty;
require_once(INCLUDE_FUNCPATH."/myLib.php");
$smarty->template_dir = OVOVCMS_ROOT.'/templates/ovov_web';	//这个放置模版文件
$smarty->compile_dir = OVOVCMS_ROOT.'/smarty/templates_web/';	//以下三个文件内容为空
$smarty->config_dir = OVOVCMS_ROOT.'/smarty/configs/';
$smarty->cache_dir = OVOVCMS_ROOT.'/smarty/cache/';//缓存存放路径
$smarty->caching = false;//是否开启缓存，true为开启，false为关闭；
$smarty->assign("ovovweb",$ovovweb);
?>