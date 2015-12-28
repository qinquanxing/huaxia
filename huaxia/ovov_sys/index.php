<?php
require_once("common.inc.php");
$User->CheckLogin();
include_once("unsql.php");
$ovoa_action=trim($_GET['ovoa']);
$ovoa_action?$ovoa_action=$ovoa_action:$ovoa_action=trim($_POST['ovoa']);
$ovoa_action?$ovoa_action=$ovoa_action:$ovoa_action="ovoa_index";
switch($ovoa_action){
	case "ovoa_index"://OA系统首页
		$rurl=trim($_GET['rurl']);
		$rurl?$rurl=$rurl:$rurl="index.php?ovoa=ovoa_right";
		$smarty->assign('righturl',$rurl);
		$smarty->display("ovov_sys/index.html");
	break;
	case "ovoa_top"://OA系统顶部
		$smarty->assign("user_name",$_SESSION['user_name']);
		$qx_id=$View->Print_user(intval($_SESSION['user_id']),'user_quanxian');//查询权限ID
		$quanxian=$Db->Fetch($Db->ThisQuery("select `qx_name` from `".$db_prefix."quanxian` where `qx_id`=".$qx_id['user_quanxian'].""));
		$smarty->assign("qx",$quanxian['qx_name']);
		$smarty->assign("qx_id",$qx_id);
		$smarty->display("ovov_sys/header.html");
	break;
	case "ovoa_index_mid"://OA系统中间
		$smarty->display("ovov_sys/index_mid.html");
	break;
	case "ovoa_left"://OA系统左侧
		//用户权限控制显示左侧栏目
		if(!empty($_SESSION['user_id'])){
		$user_cview=explode(",",$View->Print_user($_SESSION['user_id'],'user_cview'));
		$user_view=explode(",",$View->Print_user($_SESSION['user_id'],'user_view'));
		$smarty->assign("user_view",$user_view);
		$smarty->assign("user_cview",$user_cview);
		}
		//一级菜单
		$menua=$Db->FetchAll("SELECT `channel_id`,`channel_name`,`channel_ename`,`channel_urlok`,`channel_urlname` FROM `".$db_prefix."channel` WHERE `jibie` = 1 and `channel_kid`=0 and `channel_ifdel`=0 order by `channel_order`");
		//二级菜单
		$menub=$Db->FetchAll("SELECT `channel_id`,`channel_name`,`channel_ename`,`channel_urlok`,`channel_urlname`,`channel_root_id`  FROM `".$db_prefix."channel` WHERE `jibie` = 2 and `channel_kid`=0 and `channel_ifdel`=0 order by `channel_order`");
		$smarty->assign("menua",$menua);
		$smarty->assign("menub",$menub);
		$smarty->display("ovov_sys/left.html");
	break;
	case "ovoa_right"://OA系统右侧
		$kid=99;
		if(!empty($_SESSION['user_id'])){
		$user_view=explode(",",$View->Print_user($_SESSION['user_id'],'user_view'));
		$user_cview=explode(",",$View->Print_user($_SESSION['user_id'],'user_cview'));
		$smarty->assign("user_view",$user_view);
		$smarty->assign("user_cview",$user_cview);
		}
		$mydesk=$Db->FetchAll("select `channel_id`,`channel_urlname`,`channel_name`,`channel_ename`,`tjchar`,`channel_urlok`,`channel_ico` from `".$db_prefix."channel` where `isdesk`=1 and `channel_ifdel`=0  order by `channel_order` ");
			foreach($mydesk as $temp){
			$temp['tjchar'];
			$temp['tjchar']?$temp['mynums']=$View->Print_desknums($temp['tjchar']):$temp['mynums']='';
			$mydesk_arr[]=$temp;
			}
		$smarty->assign("mydesk",$mydesk_arr);
		$smarty->display("ovov_sys/right.html");
	break;
	case "ovoa_foot"://OA系统底部
		$smarty->display("ovov_sys/footer.html");
	break;
	case "AboutSys"://关于OA系统
		$smarty->display("ovov_sys/ovoa_aboutsys.html");
	break;
}
?>
