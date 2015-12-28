<?php
/**
 * [华夏君拓1.0登录接口]
 * 创建时间 2015-12-14 18.23
 */
require 'config.php';

//接受参数
$id=isset($_REQUEST['id'])?$_REQUEST['id']:'';

if($id){
	$data=@$Db->FetchAll("select pic,name from jt_goodfriends where uid='{$id}'");	
	exit(json_encode(array('state'=>1,'return_data'=>$data)));
}else{
	exit(json_encode(array('state'=>0,'return_data'=>'非法ID用户')));
}