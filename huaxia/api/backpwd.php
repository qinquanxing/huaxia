<?php
require 'config.php';
require CLASSLIB.'/auth.class.php';
require SERVER.'/member.class.php';
$member=new member($Db);

//参数接收
$phone=isset($_REQUEST['phone'])?trim($_REQUEST['phone']):'';
$captcha=isset($_REQUEST['scode'])?trim($_REQUEST['scode']):'';
$rpwd=isset($_REQUEST['pwd'])?trim($_REQUEST['pwd']):'';

//判断是否输入手机号
if(!$phone){
     exit(json_encode(array('state'=>0,'return_data'=>'请输入手机号')));
}

//判断手机号格式
if(!auth::mobile($phone)){
     exit(json_encode(array('state'=>0,'return_data'=>'手机格式不正确')));
}

//判断是否注册过
if(!$member->isHas($phone)){
     exit(json_encode(array('state'=>0,'return_data'=>'该手机账号不存在')));
}

//判断是否输入验证码
if(!$captcha){
     exit(json_encode(array('state'=>0,'return_data'=>'请输入验证码')));
}

//判断验证码是否正确
if(!$getCaptcha=$member->getCaptcha($phone,1)){
     exit(json_encode(array('state'=>0,'return_data'=>'验证码输入不正确')));
}

//判断输入密码是否存在
if(!$rpwd){
     exit(json_encode(array('state'=>0,'return_data'=>'请输入设置密码')));
}

//判断密码长度
if(intval(strlen(trim($rpwd))<6)){
     exit(json_encode(array('state'=>0,'return_data'=>'设置密码不得小于6位')));
}

//开始重置
if($member->forget($phone,$rpwd,$captcha)){
     exit(json_encode(array('state'=>1,'return_data'=>'密码重置成功')));
}else{
     exit(json_encode(array('state'=>0,'return_data'=>'密码重置失败,请稍后重试')));
}

?>