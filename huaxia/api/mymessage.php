<?php
/**
 * [华夏君拓1.0登录接口]
 * 创建时间 2015-12-14 18.23
 */
require 'config.php';

//获取用户ID
$id=isset($_REQUEST['id'])?$_REQUEST['id']:'';
if($id){
	$res=@$Db->FetchAll("select * from jt_mymessage where uid='{$id}'");
	exit(json_encode(array('state'=>1,'return_data'=>$res)));
}else{
	exit(json_encode(array('state'=>0,'return_data'=>'非法用户ID')));
}