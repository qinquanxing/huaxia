<?php
/**
 * [华夏君拓1.0登录接口]
 * 创建时间 2015-12-14 18.23
 */
require 'config.php';

//获取参数
$id=isset($_REQUEST['id'])?$_REQUEST['id']:'';

if(!$id){
	exit(json_encode(array('state'=>0,'return_data'=>'您是非法用户ID')));
}

$res=@$Db->FetchAll("select * from jt_mypost where uid='{$id}'");
if($res){
	exit(json_encode(array('state'=>1,'return_data'=>$res)));
}else{
	exit(json_encode(array('state'=>0,'return_data'=>'暂无数据')));
}