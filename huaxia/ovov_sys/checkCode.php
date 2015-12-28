<?php   
    session_start();  
	require_once("common.inc.php");    @$postcode = trim($_POST['code']);  
	@$action=trim($_GET['action']);
	if(empty($action)){
	$action="yzm";
	}
switch($action){
	case 'yzm':
			if(strtolower($postcode)==strtolower($_SESSION[$ovov_sesionname.'randcode'])) { 
			echo '{"verifycode":"Y"}'; } 
			else {echo '{"verifycode":"N"}';}
	break;
	
	case 'ucname':
	if($Db->RowsAll("SELECT `user_id` FROM `".$db_prefix."users` WHERE `user_name` ='".$postcode."'") == 0){
			echo '{"verifycode":"N"}';
		}else{
			echo '{"verifycode":"Y"}';  
		}
	break;
	
	case 'pwd':
		$user=$Db->Fetch($Db->ThisQuery("select `user_id`,`user_password`,`ovrnd` from `".$db_prefix."users` where `user_id`='".$_SESSION['user_id']."'"));
		if(md5(md5($postcode).$user['ovrnd'])!==$user['user_password']){
			echo '{"verifycode":"N"}';
		}
		else{
			echo '{"verifycode":"Y"}';  
		}
	break;
	}
?>  