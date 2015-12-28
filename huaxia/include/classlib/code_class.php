<?php
class Code
{
	/*
	//短信端口信息
	$sms_account='xd000258';
	$sms_pwd="bjdulei52890311";

	//每日短信验证码发送次数限制
	$max_code_num=10;
	*/
    public $sms_account='xd000258';
    
    public $sms_pwd="bjdulei52890311";
    
	function send_code($phone,$content)
	{
		global $sms_account,$sms_pwd,$Rd;
		$content=urlencode($content);
		$sendurl="http://dx.ipyy.net/sms.aspx?action=send&userid=&account=".$this->sms_account."&password=".$this->sms_pwd."&mobile=".$phone."&content=".$content."&sendTime=&extno=";
		if (function_exists('curl_init')) {
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, $sendurl);
			curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; U; Linux i686; zh-CN; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
			curl_setopt($curl, CURLOPT_HEADER, 0);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			$tmpInfo = simplexml_load_string(curl_exec($curl));
			curl_close($curl);
			if($tmpInfo->returnstatus=="Success"){
				return 1;
			}else{
				return 0;
			}
		}else{
			$Rd->return_json("0","未开启curl");
		}
	}
	function gain_code($phone,$type,$maxnum=0){
		global $db_prefix,$Db,$Rd;
		$memid=0;
		switch ($type){
			case "0":
				if($Db->RowsAll("SELECT 1 FROM `".$db_prefix."member` WHERE `phone`='".$phone."' or `name` = '".$phone."'")>0){
					$Rd->return_json("0","该手机号已注册");
				}
				$send_type=0;
			break;
			case "1":
				$fph=$Db->Fetch($Db->ThisQuery("select id from `".$db_prefix."member` WHERE `phone`='".$phone."'"));
				if($fph){
					$send_type=1;
					$memid=$fph["id"];
				}else{
					$Rd->return_json("0","手机号码有误");
				}
			break;
			default:
				$Rd->return_json("0","操作有误");
		}
		if($maxnum>0){
			if($memid>0){
				$where=" and member_id='".$memid."'";
			}else{
				$where=" and send_receive_account='".$phone."'";
			}
			if($Db->RowsAll("SELECT 1 FROM `".$db_prefix."send_sms_log` WHERE `send_time`>= '".strtotime(date("Y-m-d 00:00:00"))."' ".$where)>$maxnum){
				$Rd->return_json("0","验证码获取过于频繁，请稍后重试");
			}
		}
		$code=rand(100000,999999);
		$content=$code.'（短信校验码，请勿泄露），需要你进行身份校验。退订回N';
		$sendok=$this->send_code($phone,$content);
		if($sendok==1){
			$info="验证码已发送";
		}else{
			$info="验证码发送失败";
		}
		$mdata=array(
			'member_id'=>$memid,
			'send_type'=>$send_type,
			'send_sms_code'=>$code,
			'send_result'=>$sendok,
			'send_receive_account'=>$phone,
			'send_is_disabled'=>0,
			'send_time'=>time()
		);
		$istrue=$Db->insert($db_prefix."send_sms_log",$mdata);
		$Rd->return_json($sendok,$info);
	}
	
	function verify_code($phone,$code,$type,$isdisable=1,$isre=0){
		global $db_prefix,$Db,$Rd;
		$query=$Db->ThisQuery("select send_sms_code,send_id,member_id from `".$db_prefix."send_sms_log` where send_id=(select max(send_id) from `".$db_prefix."send_sms_log` where send_receive_account='".$phone."' and send_type='".$type."' and send_is_disabled=0 and send_time>=".(time()-1800).")");
		$dfetch = $Db->Fetch($query);
		if($dfetch){
			if($code==$dfetch[0]){
				if($isdisable==1){
					$sdata=array('send_is_disabled'=>1);
					$istrues=$Db->update($db_prefix."send_sms_log",$sdata,' send_id='.$dfetch[1]);
				}
				if($isre==1){
					$Rd->return_json("1","验证码正确");
				}else{
					return ($type==1)?$dfetch["member_id"]:true;
				}
			}else{
				$Rd->return_json("0","验证码输入不正确");
			}
		}else{
			$Rd->return_json("0","验证码已失效");
		}
	}
}
?>