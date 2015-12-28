<?php
/**
 * [华夏君拓1.0登录接口]
 * 创建时间 2015-12-14 18.23
 */
require 'config.php';

//接收参数
$type=isset($_REQUEST['type'])?$_REQUEST['type']:0;

//我的钱包  1：账户余额    2：账户充值

//验证参数
if($type==1){
	$id=isset($_REQUEST['id'])?$_REQUEST['id']:'';

	if(!$id){
		exit(json_encode(array('state'=>0,'return_data'=>'非法用户ID')));
	}
	//查询数据，并返回结果
	$res=@$Db->ThisQuery("select money,pic,title,`desc` from jt_moneybag where uid='{$id}'");
	$data=mysql_fetch_assoc($res);
	exit(json_encode(array('state'=>1,'return_data'=>array($data))));
}else if($type==2){
	$id=isset($_REQUEST['id'])?$_REQUEST['id']:'';
	$money_add=isset($_REQUEST['money_add'])?$_REQUEST['money_add']:'';
	$pay_type=isset($_REQUEST['pay_type'])?$_REQUEST['pay_type']:'';

	if(!$id){
		exit(json_encode(array('state'=>0,'return_data'=>'非法用户ID')));
	}

	if(!$money_add){
		exit(json_encode(array('state'=>0,'return_data'=>'请输入充值金额')));
	}

	if(!$pay_type){
		exit(json_encode(array('state'=>0,'return_data'=>'请输入支付方式')));
	}
	
	//查询金额，并返回结果
	$res=@$Db->ThisQuery("select money from jt_moneybag where uid='{$id}'");
	$data=mysql_fetch_assoc($res);
	$money=intval($money_add)+intval($data['money']);
	@$Db->ThisQuery("update jt_moneybag set money='{$money}',pay_type='{$pay_type}' where uid='{$id}'");
}else{
	exit('参数错误！');
}
?>