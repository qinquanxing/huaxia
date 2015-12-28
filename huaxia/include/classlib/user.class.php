<?php
class User{
	function CheckLogin(){
		global $Db,$Base,$db_prefix,$web_url;
		session_start();
		//echo $_SESSION['user_name'];
		if(empty($_SESSION['user_list']['user_name'])){
			header('Location:login.php');
			$this->AddLog('未登陆进入后台目录！',0,0);
			exit();
		}
		if($Db->RowsAll("SELECT `user_id` FROM `".$db_prefix."users` WHERE `user_id` = ".intval($_SESSION['user_list']['user_id'])."") == 0){
			$_SESSION['user_name']="";
			$_SESSION['user_list']="";
			header('Location:login.php');
			$this->AddLog('非法登陆后台！',3,intval($_SESSION['user_list']['user_id']));
			exit();
		}else{ 	
			$mdenglu=$Db->Fetch($Db->ThisQuery("select `login_time` from `".$db_prefix."users` where `user_id` = ".intval($_SESSION['user_list']['user_id'])." and `user_password`='".$_SESSION['user_list']['user_password']."'"));
			$dang=time();
			//echo $_SESSION['login_time']."-".$mdenglu['login_time'];
			if($_SESSION['login_time']!=$mdenglu['login_time']){
				$this->AddLog('您的帐户:'.$_SESSION['user_list']['user_name'].'，在别处登录，您被迫下线……',4,intval($_SESSION['user_list']['user_id']));
				$Base->ErrorMsg('您的帐户:'.$_SESSION['user_list']['user_name'].'，在别处登录，您被迫下线……','login.php',2,"face-sad");
				$_SESSION['user_list']="";
				$_SESSION['user_name']="";
				$_SESSION['user_id']="";
				exit();
			}	

		}
		
	}

	function AddLog($msg,$kid,$uid){
		global $Db,$Base,$db_prefix;
		session_start();
		$iipp=$Base->GetIp();
		$nowsj=time();
		empty($_SESSION['user_name'])?$_SESSION['user_name'] = '非法管理员':'';
		$Db->ThisQuery("INSERT INTO `".$db_prefix."log` (`uid`,`log_kid`,`log_admin_name`,`log_msg`,`log_ip`,`log_time`) VALUES (".intval($uid).",".intval($kid).",'".$_SESSION['user_name']."','".$msg."','".$iipp."',".$nowsj.")");
	}
//	
//	function GetRight(){
//		global $Db,$Base,$db_prefix;
//		session_start();
//		$this->CheckLogin();
//		$admin = $Db->Fetch($Db->ThisQuery("SELECT * FROM `".$db_prefix."admin` WHERE `admin_name`  = '".$_SESSION['mylogin']."'"));
//		return $admin;

//		$view=$Db->Fetch($Db->ThisQuery("select `user_right`,`user_view`,`user_if_view` from `".$db_prefix."users` where `user_id`=".$_SESSION['user_list']['user_id'].""));
//		if($view['user_if_view']==0){
//			
//		}else{
//			$user_view_array=explode(",",$view['user_view']);
//		}
//	}
}
?>