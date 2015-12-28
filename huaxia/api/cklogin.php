<?php
/**
 * [华夏君拓1.0检测登录]
 * 创建时间 2015-12-23 15.14
 */

//参数接收
$mid=isset($_REQUEST['mid'])?trim($_REQUEST['mid']):'';                   //会员id
$session_key=isset($_REQUEST['session_key'])?trim($_REQUEST['session_key']):''; //会话密钥

//判断是否登陆
if(!$mid||!$session_key){
	exit(json_encode(array('state'=>2,'return_data'=>'请先登陆')));
}

if(!$member_rs=$Db->Fetch($Db->ThisQuery("SELECT `session_key`,`is_lock`,`avatar` FROM `".$db_prefix."member` WHERE `id`=$mid"))){		
	exit(json_encode(array('state'=>2,'return_data'=>'请先登陆')));
}

//异地登陆
if($member_rs['session_key']!=$session_key){
	exit(json_encode(array('state'=>3,'return_data'=>'您的账号在其他设备登陆,您被迫下线')));
}

//账号被锁定
if($member_rs['is_lock']==1){
	exit(json_encode(array('state'=>4,'return_data'=>'该账号已被锁定')));
}
