<?php
/**
  * [华夏君拓1.0会员接口]
  * 创建时间 2015-12-23 15:08
  */
require 'config.php';
require 'cklogin.php';
require CLASSLIB.'/auth.class.php';
require SERVER.'/member.class.php';
require 'function/function.common.php';

$member=new member($Db);
$action = isset($_REQUEST['action'])?trim($_REQUEST['action']):'';

switch($action){
	case 'edit':
		//参数接收
		$opt=isset($_REQUEST['opt'])?trim($_REQUEST['opt']):'';  //设置选项
		$val=isset($_REQUEST['val'])?trim($_REQUEST['val']):'';   //设置值
		$province=isset($_REQUEST['province'])?trim($_REQUEST['province']):'';  //获取省
		$city=isset($_REQUEST['city'])?trim($_REQUEST['city']):'';  //获取市
		$area=isset($_REQUEST['area'])?trim($_REQUEST['area']):'';  //获取县
		switch($opt){
			case 'avatar':		
			   if($_FILES){
			   	exit(json_encode(array('state'=>1,'return_data'=>$_FILES)));
			   }		   		  
			   if(!$_FILES||!is_uploaded_file($_FILES['val']['tmp_name'])){
			   	exit(json_encode($return_data['return_data']='请选择上传文件'));
			   }			   
			   $file_name=date("YmdHi")."_".rand(1000,9999).$ext_name;
			   if(!is_dir($pathname)){
			   	mkdirs($pathname);
			   }
			   @move_uploaded_file($_FILES['val']['tmp_name'],$pathname.'/'.$file_name);
			   $fileName=$path.'/'.$file_name;
			   $update_arr=array('avatar'=>$fileName);
			   $where="`id`=$mid";
			   $member->update($update_arr,$where);
			   //删掉之前使用的头像
			   unlink('../'.$member_rs['avatar']);
			   $return_data['return_data']=API_URL.$fileName;
			   break;

			   case 'nickname':
			   if(!$val){
			   	exit(json_encode($return_data['return_data']='请输入您的昵称'));
			   }
			      $val=substr($val,0,25);
			      $update_arr=array('nickname'=>$val);
			      $where="`id`=$mid";
			      $member->update($update_arr,$where);
			      $return_data['return_data']=$val;
			   break;

			   case 'name':			 
			      $val=substr($val,0,25);
			      $update_arr=array('name'=>$val);
			      $where="`id`=$mid";
			      $member->update($update_arr,$where);
			      $return_data['return_data']=$val;
			      break;
			   case 'birthday':
			      if(!$val){
			      	exit(json_encode($return_data['return_data']='请输入您的生日'));
			      }
			      $update_arr=array('birthday'=>$val);
			      $where="`id`=$mid";
			      $member->update($update_arr,$where);
			      $return_data['return_data']=$val;
			      break;
			   case 'gender':
			      if(!$val){
			      	exit(json_encode($return_data['return_data']='请选择您的性别'));
			      }
			      if(!in_array($val,array('男','女','保密'))){
			      	exit(json_encode($return_data['return_data']='参数有误 -2'));
			      }
			      $update_arr=array('gender'=>$val);
			      $where="`id`=$mid";
			      $member->update($update_arr,$where);
			      $return_data['return_data']=$val;
			      break;

			   case 'native_place':
			      //获取所有省份
			      $provinces=$member->selectProvince();
			      if(!$provinces){
			      	exit(json_encode($return_data['return_data']='服务器暂时无数据'));
			      }else{			      	
			      	exit(json_encode($return_data['return_data']=$provinces));
			      }
			      //获取省
			      if($province){
			      	$linkage['province']=$province;	
			      }else{
			      	exit(json_encode($return_data['return_data']='请选择省'));
			      }
			      //获取市
			      if($city){
			           $linkage['city']=$city;	
			      }else{
			      	exit(json_encode($return_data['return_data']='请选择市'));
			      }
			      // if($area){
			      // 	$linkage['area']=$area;	
			      // }else{
			      // 	exit(json_encode($return_data['return_data']='请选择县'));
			      // }
			      if(!$linkage){
			      	$linkage=$member->splitdata($linkage);
			      }

			      $update_arr=array('native_place'=>$linkage);
			      $where="`id`=$mid";
			      $member->update($update_arr,$where);

			      //查询省的名字
			      if($province){
			      	$province=$member->selectCode($province);
			      	$return_data['return_data']=$province;
			      }
			      //查询市的名字
			       if($city){
			      	$city=$member->selectProvinceCode($city);
			      	$return_data['return_data']=$province;
			      }
			      // //查询县的名字
			      // if($area){
			      // 	$area=$member->selectCitycode($area);
			      // 	$return_data['return_data']=$area;
			      // }
			      break;

			   case 'hobby':
			      if(!$val){
			      	exit(json_encode($return_data['return_data']='请输入您的爱好'));
			      }
			      $update_arr=array('hobby'=>$val);
			      $where="`id`=$mid";
			      $member->update($update_arr,$where);
			      $return_data['return_data']=$val;
			      break;
			   case 'occupation':
			      if(!$val){
			      	exit(json_encode($return_data['return_data']='请输入您的职业'));
			      }
			      $update_arr=array('occupation'=>$val);
			      $where="`id`=$mid";
			      $member->update($update_arr,$where);
			      $return_data['return_data']=$val;
			      break;
			   case 'school':
			      if(!$val){
			      	exit(json_encode($return_data['return_data']='请输入您的学校'));
			      }
			      $update_arr=array('school'=>$val);
			      $where="`id`=$mid";
			      $member->update($update_arr,$where);
			      $return_data['return_data']=$val;
			      break;
			   case 'school_type':
			      if(!$val){
			      	exit(json_encode($return_data['return_data']='请输入目前在读'));
			      }
			      $update_arr=array('school_type'=>$val);
			      $where="`id`=$mid";
			      $member->update($update_arr,$where);
			      $return_data['return_data']=$val;
			      break;
			   case 'phone':
			      if(!$val){
			      	exit(json_encode($return_data['return_data']='请输入您的手机号'));
			      }
			      $update_arr=array('phone'=>$val);
			      $where="`id`=$mid";
			      $member->update($update_arr,$where);
			      $return_data['return_data']=$val;
			      break;
			   case 'qq':
			      if($val){
			      	$update_arr=array('qq'=>$val);
			      	$where="`id`=$mid";
			      	$member->update($update_arr,$where);
			      	$return_data['return_data']=$val;      	
			      }
			      break;
			   case 'wechat':
			      if(!$val){
			      	$update_arr=array('wechat'=>$val);
			      	$where="`id`=$mid";
			      	$member->update($update_arr,$where);
			      	$return_data['return_data']=$val;
			      }
			      break;
			   case 'email':
			      if(!$val){
			      	$update_arr=array('email'=>$val);
			      	$where="`id`=$mid";
			      	$member->update($update_arr,$where);
			      	$return_data['return_data']=$val;
			      }
			      break;

			   case 'address_now':
			      //获取所有省份
			      $provinces=$member->selectProvince();
			      if(!$provinces){
			      	exit(json_encode($return_data['return_data']='服务器暂时无数据'));
			      }else{			      	
			      	exit(json_encode($return_data['return_data']=$provinces));
			      }
			      //获取省
			      if($province){
			      	$linkage['province']=$province;	
			      }else{
			      	exit(json_encode($return_data['return_data']='请选择省'));
			      }
			      //获取市
			      if($city){
			           $linkage['city']=$city;	
			      }else{
			      	exit(json_encode($return_data['return_data']='请选择市'));
			      }
			      if($area){
			      	$linkage['area']=$area;	
			      }else{
			      	exit(json_encode($return_data['return_data']='请选择县'));
			      }
			      if(!$linkage){
			      	$linkage=$member->splitdata($linkage);
			      }

			      $update_arr=array('address_now'=>$linkage);
			      $where="`id`=$mid";
			      $member->update($update_arr,$where);

			      //查询省的名字
			      if($province){
			      	$province=$member->selectCode($province);
			      	$return_data['return_data']=$province;
			      }
			      //查询市的名字
			       if($city){
			      	$city=$member->selectProvinceCode($city);
			      	$return_data['return_data']=$province;
			      }
			      //查询县的名字
			      if($area){
			      	$area=$member->selectCitycode($area);
			      	$return_data['return_data']=$area;
			      }
			      break;

		}
}

?>