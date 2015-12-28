<?php
session_start();
require_once("common.inc.php");//
include_once("include/inc/unsql.php");
$action=$_GET['action'];
if(empty($action)){
	$action=$_POST['action'];
}
if(empty($action)){
	$action="login";
}
switch($action){
	case 'login':
		$smarty->assign("OVOATITLE",$web_name);
		$smarty->display("ovov_sys/login.html");
	break;
	case 'dologin':
		session_start();
		$url_from=url_from();
		$randcode=$_SESSION[$ovov_sesionname.'randcode'];
		$user_name=htmlspecialchars(trim($_POST['user_name']));
		$user_password=md5(htmlspecialchars(trim($_POST['user_password'])));
		$user_verify=trim($_POST['user_verify']);
		if(empty($user_name) || empty($user_password) || empty($user_verify)){
			$Base->ErrorMsg('填写信息不完整！',$url_from);exit();
		}
		if($user_verify!==$randcode){
			$Base->ErrorMsg('验证码填写错误！',$url_from);exit();
		}
		$user=$Db->Fetch($Db->ThisQuery("select `user_id`,`user_name`,`user_password`,`ovrnd`,`user_right`,`user_cview`,`user_view`,`user_lastsj`,`isok` from `".$db_prefix."users` where `user_name`='".$user_name."' and `user_ifdel`=0 "));
		if($user['user_password']==md5($user_password.$user['ovrnd'])){
			if($user['isok']){
				$User->AddLog('用户名:'.$user_name.',被管理员锁定，请联系管理员解锁！',9,intval($user['user_id']));
				$_SESSION['user_name'] = "";
				$_SESSION['user_password']="";
				$_SESSION['user_list']="";
				$_SESSION['user_lastsj']="";
				$Base->AlertMsg('用户名:'.$user_name.',被管理员锁定，请联系管理员解锁','login.php');exit();
			}
			$iipp=$Base->GetIp();
			$sdipnums=$Db->RowsAll("select `bid` from `".$db_prefix."blackip` where `uid`=".intval($user['user_id'])." and `ip`='".$iipp."' and `isok`=1 ");
			if($sdipnums){
				$User->AddLog('您的IP:'.$iipp.',被加入黑名单，请联系管理员解锁！',9,intval($user['user_id']));
				$_SESSION['user_name'] = "";
				$_SESSION['user_password']="";
				$_SESSION['user_list']="";
				$_SESSION['user_lastsj']="";
				$Base->AlertMsg('您的IP:'.$iipp.',被加入黑名单，请联系管理员解锁！','login.php');exit();
			}
			$_SESSION['user_name']=$user_name;
			$_SESSION['user_id']=$user['user_id'];
			$_SESSION['user_list']=$user;
			$user_lastsj=time();
			$_SESSION['login_time']=$user_lastsj;
			//print_r($_SESSION['user_list']);
			$Db->ThisQuery("update `".$db_prefix."users` set `user_lastip`='".$iipp."',`login_time`=".$user_lastsj.",`user_lastsj`=".$user_lastsj.",`user_hits`=user_hits+1 WHERE `user_id`  = ".intval($_SESSION['user_list']['user_id'])."");
			$User->AddLog('用户验证成功！',1,intval($user['user_id']));
			$Base->AlertMsg('用户验证成功！正在进入系统首页...','index.php');die;
			exit();
		}else{	//echo intval($user['user_id']);die;
			$User->AddLog('用户名密码错误！',2,intval($user['user_id']));
			$Base->ErrorMsg('用户名密码错误！',$url_from);exit();
		}
	break;
	case 'logout':
		session_start();
		$lastsj=intval(time());
		$Db->ThisQuery("update `".$db_prefix."users` set `user_lastsj`=".$lastsj." WHERE `user_name`  = '".$_SESSION['user_name']."'");
		$_SESSION['user_name'] = "";
		$_SESSION['user_password']="";
		$_SESSION['user_list']="";
		$_SESSION['user_lastsj']="";
		$Base->ErrorMsg('成功退出，正在跳转到用户登录窗口……',"login.php");
	break;
}

?>