<?php
require 'config.php';
require CLASSLIB.'/auth.class.php';
require SERVER.'/member.class.php';
$member=new member($Db);

//注册方式 1手机，2邮箱
$type=isset($_REQUEST['type'])?intval($_REQUEST['type']):0;
//接受注册参数
if($type==1){
      $type=isset($_REQUEST['type'])?intval($_REQUEST['type']):0;
      $phone=isset($_REQUEST['phone'])?$_REQUEST['phone']:'';
      $sms_code=isset($_REQUEST['scode'])?$_REQUEST['scode']:'';
      $pwd=isset($_REQUEST['pwd'])?$_REQUEST['pwd']:'';     
      $invest_code=isset($_REQUEST['icode'])?$_REQUEST['icode']:'';
      $reg_type=isset($_REQUEST['reg_type'])?$_REQUEST['reg_type']:'';

      //邀请码
      $i_code=888888;
         
      //检查必要字段是否填写
 	if(!$phone){
 		exit(json_encode(array('state'=>0,'return_data'=>'请输入手机号码')));
 	}
 	if(!preg_match('/^1(3|5|7|8)\d{9}/', $phone)){
 		exit(json_encode(array('state'=>0,'return_data'=>'手机号码格式不正确')));
 	}
 	//判断该手机是否注册过
  	if($member->isHas($phone)){
  		exit(json_encode(array('state'=>0,'return_data'=>'手机号码已注册')));
  	}   

      //验证验证码
      if(!$sms_code){
          exit(json_encode(array('state'=>0,'return_data'=>'请输入验证码')));
      }

      //判断短息验证码
      if($sms_code!=$member->getCaptcha($phone,0)){
           exit(json_encode(array('state'=>0,'return_data'=>'验证码输入不正确')));
       }

      //判断密码
      if(!$pwd){
          exit(json_encode(array('state'=>0,'return_data'=>'请输入密码')));
      }

      //密码不的小于6位
      if(intval(strlen(trim($pwd)))<6){
          exit(json_encode(array('state'=>0,'return_data'=>'您输入的密码不得小于6位')));
      }

      //判断邀请码是否填写
      if(!$invest_code){
	exit(json_encode(array('state'=>0,'return_data'=>'请输入邀请码')));
      }

      //判断邀请码是否正确
      if($invest_code!=$i_code){
	exit(json_encode(array('state'=>0,'return_data'=>'邀请码不正确')));
      }

     //判断注册类型
      if(!$reg_type){
              exit(json_encode(array('state'=>0,'return_data'=>'请选择注册类型')));
      }
 	//插入数据库，并返回注册结果
      $insert_arr=array('account'=>$phone,'pwd'=>$pwd,'reg_type'=>$reg_type,'type'=>$type); 
      if($member->create($insert_arr)){
              exit(json_encode(array('state'=>1,'return_data'=>'注册成功')));
      }else{
              exit(json_encode(array('state'=>0,'return_data'=>'注册失败')));
      }

}elseif($type==2){	
      $type=isset($_REQUEST['type'])?intval($_REQUEST['type']):0;
      $email=isset($_REQUEST['email'])?$_REQUEST['email']:'';
      $sms_code=isset($_REQUEST['scode'])?$_REQUEST['scode']:'';
      $pwd=isset($_REQUEST['pwd'])?$_REQUEST['pwd']:'';     
      $invest_code=isset($_REQUEST['icode'])?$_REQUEST['icode']:'';
      $reg_type=isset($_REQUEST['reg_type'])?$_REQUEST['reg_type']:'';

 	//检查必要字段是否填写
 	if(!$email){
 		exit(json_encode(array('state'=>0,'return_data'=>'请输入电子邮箱')));
 	}
 	if(!preg_match('/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/', $email)){
 		exit(json_encode(array('state'=>0,'return_data'=>'请输入正确的邮箱格式')));
 	}
 	//判断该邮箱是否注册过
 	// if($Db->RowsAll("SELECT * FROM `jt_member1` WHERE `email` = '".$email."'")){
 	// 	exit(json_encode(array('state'=>0,'return_data'=>'该邮箱已经注册')));
 	// }
 	//判断验证码是否正确
 	if(!$sms_code){
 		exit(json_encode(array('state'=>0,'return_data'=>'请输入验证码')));
 	}
      //判断密码
      if(!$pwd){
          exit(json_encode(array('state'=>0,'return_data'=>'请输入密码')));
      }
      //判断邀请码是否正确
     if(!$invest_code){
               exit(json_encode(array('state'=>0,'return_data'=>'请输入邀请码')));
     }
     if(!$reg_type){
               exit(json_encode(array('state'=>0,'return_data'=>"请选择注册类型")));
     }
 	//插入数据库，并返回注册结果
       $insert_arr=array('account'=>$email,'pwd'=>$pwd,'reg_type'=>$reg_type,'type'=>$type);  
      if($member->create($insert_arr)){
              exit(json_encode(array('state'=>1,'return_data'=>'注册成功')));
      }else{
              exit(json_encode(array('state'=>0,'return_data'=>'注册失败')));
      }
	
}else{
	exit('参数错误');
}
?>