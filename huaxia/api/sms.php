<?php 
/**
 * [华夏君拓短讯服务接口]
 * 创建时间 2015-12-21 15.16
 */
require 'config.php';
require CLASSLIB.'/auth.class.php';
require SERVER.'/sms.class.php';
$sms = new Code();

//参数接收
$phone=isset($_REQUEST['phone'])?trim($_REQUEST['phone']):'';       //手机号

$return_data=array('state'=>'0');
//判断是否输入手机号
if(!$phone){
    $return_data['return_data']='请输入注册手机';
    exit(json_encode($return_data));
}
//判断手机号格式
if(!auth::mobile($phone)){
    $return_data['return_data']='手机格式输入不正确';
    exit(json_encode($return_data));
}
//判断发送类型
$type = isset($_REQUEST['type'])?intval($_REQUEST['type']):0; 
if($type==1){
    //找回密码
    // echo $phone;exit;
    if(!$Db->Fetch($Db->ThisQuery("SELECT 1 FROM `".$db_prefix."member` WHERE account={$phone}"))){
        exit(json_encode(array('state'=>"0", 'return_data'=>'该手机用户不存在')));
    }
    
    //找回密码
    $randCode = substr(mt_rand(), 0, 6);
    $content = '验证码：'.$randCode.'（此验证码用于会员找回密码使用，若非本人操作，请不予理会，此信息免费）【华夏君拓】';
     $sms->save($phone, $randCode,1);

     exit(json_encode(array('state'=>"1", 'return_data'=>'发送成功'.$content)));
    
    if($sms->send_code($phone,$content)){
        $sms->save($phone, $randCode,1);
        exit(json_encode(array('state'=>"1", 'return_data'=>'发送成功')));
    }else{
        exit(json_encode(array('state'=>"0", 'return_data'=>'发送失败')));
    }
}else{
    //注册验证码
    if($Db->Fetch($Db->ThisQuery("SELECT 1 FROM `".$db_prefix."member` WHERE account={$phone}"))){
        exit(json_encode(array('state'=>"0", 'return_data'=>'该手机已被注册，请使用其他手机')));
    }
    
    $randCode = substr(mt_rand(), 0, 6);
    $content = '验证码：'.$randCode.'（此验证码用于用户注册会员使用，若非本人操作，请不予理会，此信息免费）【华夏君拓】';
    
     $sms->save($phone, $randCode,0);
     exit(json_encode(array('state'=>"1", 'return_data'=>'发送成功'.$content)));
    
    if($sms->send_code($phone,$content)){
        $sms->save($phone, $randCode,0);
        exit(json_encode(array('state'=>"1", 'return_data'=>'发送成功')));
    }else{
        exit(json_encode(array('state'=>"0", 'return_data'=>'发送失败')));
    }
}
?>