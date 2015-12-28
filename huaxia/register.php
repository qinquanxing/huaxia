<?php
require 'config.php';
header('Content-type:text/html;charset=utf-8');
//require './inc.php';
//注册方式 1手机，2邮箱
$reg_type=isset($_REQUEST['reg_type'])?intval($_REQUEST['reg_type']):0;
//接受注册参数
if($reg_type==1){
 	$pwd=isset($_REQUEST['password'])?$_REQUEST['phone']:'';
 	$rpwd=isset($_REQUEST['rpwd'])?$_REQUEST['phone']:'';
 	$phone=isset($_REQUEST['phone'])?$_REQUEST['phone']:'';
	$_REQUEST['addtime']=date("Y-m-d H:i:s",$strtotime());

 	//邀请码
 	$code="9999";
 	//检查必要字段是否填写
 	if(!$phone){
 		exit(json_encode(array('state'=>0,'return_data'=>'请输入手机号码')));
 	}
 	if(!preg_match('/^1(3|5|7|8)\d{9}/', $phone)){
 		exit(json_encode(array('state'=>0,'return_data'=>'手机号码格式不正确')));
 	}
 	//判断该手机是否注册过
  	if($Db->RowsAll("SELECT * FROM `jt_member` WHERE `phone` = '".$phone."'")){
  		exit(json_encode(array('state'=>0,'return_data'=>'手机号码已注册')));
  	}
 	//判断邀请码是否正确
 	if($code!=$salt){
 		exit(json_decode(array('state'=>0,'return_data'=>'验证码不正确')));
 	}
 	//插入数据库，并返回注册结果
 	$Db->ThisQuery("INSERT INTO `".$db_prefix."article` (`".type."`,`".pwd."`,`".phone."`,`".state."`,`".addtime."`, `".salt."`) VALUES ('".$reg_type."','".$pwd."','".$phone."','".$state."','".$addtime."','".$salt."')");
 	$data=$Db->query('select * from jt_member');
 	var_dump($data);exit;

}elseif($reg_type==2){
	$pwd=isset($_REQUEST['password'])?$_REQUEST['phone']:'';
 	$rpwd=isset($_REQUEST['rpwd'])?$_REQUEST['phone']:'';
 	$email=isset($_REQUEST['email'])?$_REQUEST['email']:'';

 	//检查必要字段是否填写
 	if(!$email){
 		exit(json_decode(array('state'=>0,'return_data'=>'请输入电子邮箱')));
 	}
 	if(!preg_match('/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/', $email)){
 		exit(json_decode(array('state'=>0,'return_data'=>'请输入正确的邮箱格式')));
 	}
 	//判断该邮箱是否注册过
 	if($Db->RowsAll("SELECT * FROM `jt_member` WHERE `email` = '".$email."'")){
 		exit(json_decode(array('state'=>0,'return_data'=>'该邮箱已经注册')));
 	}
 	//判断邀请码是否正确
 	if($code!=$salt){
 		exit(json_decode(array('state'=>0,'return_data'=>'验证码不正确')));
 	}
 	//插入数据库，并返回注册结果
 	$Db->ThisQuery("INSERT INTO `".$db_prefix."article` (`".type."`,`".pwd."`,`".email."`,`".state."`,`".addtime."`, `".salt."`) VALUES ('".$reg_type."','".$pwd."','".$email."','".$state."','".$addtime."','".$salt."')");
	
}else{
	exit('参数错误');
}
?>