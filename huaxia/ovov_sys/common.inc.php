<?php
//session_start();
error_reporting(0);
set_time_limit(0);
date_default_timezone_set('Asia/Chongqing');
define("OVOVCMS","OVOVCMS");
define("OVOVCMS_ADMIN_PATH",str_replace("\\","/",dirname(__FILE__)));
define("OVOVCMS_ROOT",str_replace("\\","/",dirname(OVOVCMS_ADMIN_PATH)));
define("CONFIG_PATH",OVOVCMS_ROOT."/config");
define("COMMON_PATH",OVOVCMS_ROOT."/common");
define("INCLUDE_CLASSPATH",OVOVCMS_ROOT."/include/classlib");
define("INCLUDE_FUNCPATH",OVOVCMS_ADMIN_PATH."/include/function");
define("TPL_PATH",OVOVCMS_ROOT."/templates/ovovsys");
header("Content-type:text/html; Charset=utf-8");
require_once(INCLUDE_FUNCPATH."/function.common.php");
require_once(CONFIG_PATH."/web.config.php");
//set_magic_quotes_runtime(0);
// 检测魔术引号有无开启,如果没开启,把GET,POST,COOKIE手动转义.  
if(!get_magic_quotes_gpc()) {  
   $_GET = addslash($_GET);  
   $_POST = addslash($_POST);  
   $_COOKIE = addslash($_COOKIE);  
}  
require_once(INCLUDE_CLASSPATH."/ovov_base.class.php");
$Base = new OVOV_Base();
CheckInstall();	//检查是否安装
require_once(CONFIG_PATH."/database.config.php");  
require_once(INCLUDE_CLASSPATH."/mysql.class.php");
$Db = new Db();
require_once(INCLUDE_CLASSPATH."/view.class.php");
$View = new View();
require_once(OVOVCMS_ROOT."/smarty/libs/Smarty.class.php"); 
CheckSwitch();	//检查OA开关
require_once(INCLUDE_CLASSPATH."/user.class.php");
$User=new User();
require_once(INCLUDE_CLASSPATH."/getmac.class.php");
require_once(INCLUDE_CLASSPATH."/ovoa.class.php");
$ovoa=new ovoa();
$ovoa->Get_copyright($ver);
$smarty = new Smarty;

$smarty->assign("web_url",$web_url);
define("SITEHOST",$web_url); //程序地址
$smarty->template_dir = OVOVCMS_ROOT.'/templates/ovov_admin';	//这个放置模版文件
$smarty->compile_dir = OVOVCMS_ROOT.'/smarty/templates_admin/';	//以下三个文件内容为空
$smarty->config_dir = OVOVCMS_ROOT.'/smarty/configs/';
$smarty->cache_dir = OVOVCMS_ROOT.'/smarty/cache/';
$smarty->assign("OVOATITLE",$web_name);
$smarty->assign("ovovweb",$ovovweb);
$smarty->assign("skinnum",$skinnum);
//权限控制
$quid=intval($_SESSION['user_id']);
if($quid){
	//顶部导航
	$user_tview=explode(",",$View->Print_user($quid,'user_cview'));
	$smarty->assign("user_tview",$user_tview);
	$user_view=explode(",",$View->Print_user($quid,'user_view'));
	$smarty->assign("user_view",$user_view);
	$mytopmenu=$Db->FetchAll("select `channel_id`,`channel_urlname`,`channel_name`,`channel_ename`,`tjchar`,`channel_urlok`,`channel_ico` from `".$db_prefix."channel` where `channel_istop`=1 and `channel_ifdel`=0 order by `channel_order` limit 0,7");
	$smarty->assign("mytopmenu",$mytopmenu);
	$qxid=$quid?$View->Print_user($quid,'user_quanxian'):1;//查询权限ID
	$smarty->assign("qxid",$qxid);
		//菜单权限控制
		$user_cview=explode(",",$View->Print_user($quid,'user_cview'));
		$user_view=explode(",",$View->Print_user($quid,'user_view'));
		$smarty->assign("user_view",$user_view);
		$smarty->assign("user_cview",$user_cview);
		$menuroot=$Db->FetchAll("SELECT `channel_id`,`channel_name`,`channel_ename`,`channel_urlok`,`channel_urlname`,`channel_ico` FROM `".$db_prefix."channel` WHERE `jibie` = 1 and `channel_kid`=0 and `channel_ifdel`=0 order by `channel_order`");//所有系统
		$menua=$Db->FetchAll("SELECT `channel_id`,`channel_name`,`channel_ename`,`channel_urlok`,`channel_urlname`,`channel_ico` FROM `".$db_prefix."channel` WHERE `jibie` = 2 and `channel_root_id`=1 and `channel_ifdel`=0 order by `channel_order`");//OA一级菜单
		$menub=$Db->FetchAll("SELECT `channel_id`,`channel_name`,`channel_ename`,`channel_urlok`,`channel_urlname`,`channel_root_id`  FROM `".$db_prefix."channel` WHERE `jibie` = 3 and `channel_kid`=0 and `channel_ifdel`=0 order by `channel_order`");//OA二级菜单
		$smarty->assign("menuroot",$menuroot);
		$smarty->assign("menua",$menua);
		$smarty->assign("menub",$menub);
		//访问时间
		$user_lastsj=intval(time());
		$Db->ThisQuery("update `".$db_prefix."users` set `user_lastsj`=".$user_lastsj." WHERE `user_id`  = ".$quid."");
	}
	
	//访问人数控制
	$lastsj=intval(time()-1*60);//1分钟访问为在线人数
	$onlinenums=$Db->RowsAll("select `user_id`  from `".$db_prefix."users` where `user_ifdel`=0 and `user_lastsj`>=".$lastsj."");
	$smarty->assign("onlinenums",$onlinenums);

?>