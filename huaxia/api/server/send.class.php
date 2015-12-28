<?php
/***********************************
	 *名称：send.class.php
	 *类列：send处理类
	 *作用：发送短息或邮件
	 *用法：采用任何引用方式直接使用
	 *初始：无
	 *输入：无
	 *作者：Ovov
	 *版权：欧维时代（北京）
	 *时间：2013-11-20
***********************************/
class Send{
/*********************************************************
 * function Send_Sms($sendmobile,$send_content,$Timer) 发送短信函数
 *
 * @param $sendmobile	接收手机号码
 * @param $send_content	发送内容
 * @param $Recipient	接收人姓名
 * @param $Timer 	定时发送时间 (时间格式:2006-01-01 12:00:00)
 * @param $backurl 	成功或失败跳转链接
 *********************************************************/
		function Send_Sms($sendmobile,$send_content,$Recipient,$Timer){
				global $ovovweb,$Base,$Db,$db_prefix;
				$CorpID=$ovovweb['CorpID'];
				$LoginName=$ovovweb['LoginName'];
				$Passwd=$ovovweb['Passwd'];
				$send_content=urlencode(iconv('utf-8','GB2312',$send_content));//内容编码
				if (empty($CorpID) || empty($LoginName) || empty($Passwd)) {
					$Base->ErrorMsg('参数错误！请检查系统设置中的短信设置');
				}
				/*根据参数，生成调用URL*/
				$URL = "http://web.mobset.com/SDK/Sms_Send.asp?CorpID=".$CorpID."&LoginName=".$LoginName."&Passwd=".$Passwd."&send_no=".$sendmobile."&Timer=".$Timer."&msg=".$send_content;
				/*调用MSXML，发送请求*/
				$objHttpRequest=new COM("MSXML2.ServerXMLHTTP");
				if (is_null($objHttpRequest)) {
				echo "create Msxl2.ServerXMLHTTP error";
				exit();
				}
				$objHttpRequest->open("GET",$URL,False); 
				$objHttpRequest->send();
				if ($objHttpRequest->status <> 200) {
				/*返回错误*/
				echo "open Request error";
				exit();
				}
				/*取返回的信息，并分析*/
				$retMsg=$objHttpRequest->responseText;
				$Ret=strtok($retMsg,",");
				$iRet=intval($Ret);
				/*判断是否发送成功*/
				if ($iRet>0) {
				$SendID=substr($retMsg,-(strlen($retMsg)-strlen($Ret)-1));
				$send_content=iconv('GB2312','utf-8',urldecode($send_content));//内容解码
				$Db->ThisQuery("insert into `".$db_prefix."information_record` set  `cid` = 146,`uid` = ".$_SESSION['user_id'].",`addtime` = '".time()."',`Recipient` = '".$Recipient."',`phone_number` = ".$sendmobile.",`Message_content` = '".$send_content."',`Delivery_time` = '".time()."',`Sending_state` = 1,`Sender` = '".$_SESSION['user_list']['user_ture_name']."',`SmsID` = ".$SendID.",`sms_type` = 1");
				return 1;
				}
				else {
				$send_content=iconv('GB2312','utf-8',urldecode($send_content));//内容解码
				$Db->ThisQuery("insert into `".$db_prefix."information_record` set `cid` = 146,`uid` = ".$_SESSION['user_id'].",`addtime` = '".time()."',`Recipient` = '".$Recipient."',`phone_number` = ".$sendmobile.",`Message_content` = '".$send_content."',`Delivery_time` = '".time()."',`Sending_state` = 0,`Sender` = '".$_SESSION['user_list']['user_ture_name']."',`error_codes` = ".$iRet.",`sms_type` = 1 ");
				}
				/*释放对象*/
				$objHttpRequest=NULL;
		}
		/*********************************************************
			 *  function get_lave_sms() 获取本帐号剩余可用的短信量
		*********************************************************/
		function get_lave_sms(){
				 global $ovovweb;
				 $CorpID=$ovovweb['CorpID'];
				 $LoginName=$ovovweb['LoginName'];
				 $Passwd=$ovovweb['Passwd'];
				 if (empty($CorpID) || empty($LoginName)) {
					 $Base->ErrorMsg('参数错误！请检查系统设置中的短信设置');
				 }
				/*根据参数，生成调用URL,*/
				$URL = "http://web.mobset.com/SDK/Sms_KYSms.asp?CorpID=".$CorpID."&LoginName=".$LoginName."&Passwd=".$Passwd;
				/*调用MSXML，发送请求*/
				$objHttpRequest=new COM("MSXML2.ServerXMLHTTP");
				if (is_null($objHttpRequest)) {
				echo "create Msxl2.ServerXMLHTTP error";
				exit();
				}
				$objHttpRequest->open("GET",$URL,False); 
				$objHttpRequest->send();
				if ($objHttpRequest->status <> 200) {
				/*返回错误*/
				echo "open Request error";
				exit();
				}
				/*取返回的信息，并分析*/
				$retMsg=$objHttpRequest->responseText;
				$ilen=strpos($retMsg,",");
				if ($ilen=="") {
					$ilen=strlen($retMsg);
				}
				$Ret=substr($retMsg,0,$ilen);
				$iRet=intval($Ret);
				/*判断是否成功*/
				if ($iRet > 0) {
					return $iRet;
					}
				else {
					$Base->ErrorMsg("剩余条数查询失败,错误代码为:".$iRet);
					}
				/*释放对象*/
				$objHttpRequest=NULL;
		}
/*********************************************************
	 * function get_recv_test() 取接收到的短消息
*********************************************************/
		function get_recv_test(){
				global $ovovweb,$Base,$Db,$db_prefix;
				$CorpID=$ovovweb['CorpID'];
				$LoginName=$ovovweb['LoginName'];
				$Passwd=$ovovweb['Passwd'];
				if (empty($CorpID) || empty($LoginName)) {
					$Base->ErrorMsg('参数错误！请检查系统设置中的短信设置');
				}
				/*根据参数，生成调用URL*/
				$URL = "http://web.mobset.com/SDK/Sms_Recv.asp?CorpID=".$CorpID."&LoginName=". $LoginName."&XML=1&Passwd=".$Passwd;
				
				/*调用MSXML，发送请求*/
				$objHttpRequest=new COM("MSXML2.ServerXMLHTTP");
				if (is_null($objHttpRequest)) {
					echo "create Msxl2.ServerXMLHTTP error";
					exit();	
					}
				$objXmlDoc=new COM("Msxml2.DOMDocument");
				if (is_null($objXmlDoc)) {
					echo "create Msxml2.DOMDocument error";
					exit();
					}
				$objXmlDoc->async = false;
				/*发出请求*/
				$objHttpRequest->open("GET",$URL,False); 
				$objHttpRequest->send();
				if ($objHttpRequest->status <> 200) {
				/*返回错误*/
					echo "open Request error";
					exit();
					}
				/*加载xml流*/
				$bResult=$objXmlDoc->loadXML($objHttpRequest->responsetext);
				if ($bResult==False) {
					/*写错误日志*/
					echo "load response xml error";
					exit();
					}
				/*获取信息*/
				$root=$objXmlDoc->documentElement;
				for($i=1;$i<=($root->childNodes->length);$i++) {
					$node=$root->childNodes->item($i);
					if (!is_null($node)) {
						$node2=$node->childNodes->item(0);
						$SendNum=$node2->nodeTypedValue;
						$node2=$node->childNodes->item(1);
						$RecvNum=$node2->nodeTypedValue;
						$node2=$node->childNodes->item(2);
				    	$RecvTime =$node2->nodeTypedValue;
				    	$node2=$node->childNodes->item(3);
				    	$RecvMsg =$node2->nodeTypedValue;
				    	$RecvMsg=iconv('GB2312','utf-8',urldecode($RecvMsg));//内容解码
				    $Db->ThisQuery("insert into `".$db_prefix."information_record` set `cid` = 147,`uid` = ".$_SESSION['user_id'].",`addtime` = '".time()."',`Send_number` = '".$SendNum."',`phone_number` = ".$RecvNum.",`Message_content` = '".$RecvMsg."',`Receive_time` = '".$RecvTime."',`sms_type` = 2 ");	
					//echo $SendNum ."-" .$RecvNum ."-" . $RecvTime . "-" . $RecvMsg . "<BR>";
					$Base->AlertMsg("接收短信成功",'sendsms.php?action=Receive_SMS');
					}else{
					$Base->ErrorMsg("没有接收到短信",'sendsms.php?action=Receive_SMS');
					}
				}
				/*释放对象*/
				$objXmlDoc=NULL;
				$objHttpRequest=NULL;
		}
/*********************************************************
		 * function get_sms_status($SmsID) 获取短信状态
		 * @param $SmsID	短信ID
*********************************************************/
		function get_sms_status($SmsID){
				if (empty($SmsID)) {
					$Base->ErrorMsg('短信ID为空！请检查！！');
				}
				/*根据参数，生成调用URL*/
				$URL = "http://web.mobset.com/SDK/Sms_Status.asp?SmsID=".$SmsID;
				/*调用MSXML，发送请求*/
				$objHttpRequest=new COM("MSXML2.ServerXMLHTTP");
				if (is_null($objHttpRequest)) {
					echo "create Msxl2.ServerXMLHTTP error";
					exit();	
					}
				$objHttpRequest->open("GET",$URL,False); 
				$objHttpRequest->send();
				if ($objHttpRequest->status <> 200) {
				/*返回错误*/
					echo "open Request error";
					exit();
					}
				/*取返回的信息，并分析*/
				$retMsg=$objHttpRequest->responseText;
				$ilen=strpos($retMsg,",");
				if ($ilen=="") {
					$ilen=strlen($retMsg);
				}
				$Ret=substr($retMsg,0,$ilen);
				$iRet=intval($Ret);
				/*判断是否成功*/
				if ($iRet > 0) {
					switch ($iRet){
						case 0:
						$iRet="提交成功";
						break;
						case 1:
						$iRet="审核中";
						break;
						case 2:
						$iRet="提交失败";
						break;
						case 3:
						$iRet="提交失败";
						break;
						case 4:
						$iRet="提交失败";
						break;
						case 5:
						$iRet="提交失败";
						break;
						case 6:
						$iRet="号码不支持";
						break;
						case 7:
						$iRet="审核失败";
						break;
						case 10:
						$iRet="发送成功";
						break;
						case 11:
						$iRet="发送失败";
						break;
						case 12:
						$iRet="接收成功";
						break;
						case 13:
						$iRet="接收失败";
						break;
						case 15:
						$iRet="未知状态";
						break;
					}
					echo "取短信状态成功,现状态为:". $iRet;
					}
				else{
					echo "取短信状态失败,错误代码为:".$iRet;
					}
				/*释放对象*/
				$objHttpRequest=NULL;
		}
		/*********************************************************
		 * function send_email($to_email, $subject, $content) 发送邮件
		 * @param $to_email	 收件人地址
		 * @param $subject	邮件标题
		 * @param $content	邮件内容
		*********************************************************/
		function send_email($to_email, $subject, $content)
		{
			global $ovovweb;
			date_default_timezone_set('PRC'); 
			include_once("./server/class.phpmailer.php");
			// include_once("./smtp/aa.php");
			$mail = new PHPMailer(); // defaults to using php "mail()"
			$mail->IsSMTP();
			$mail->Host = "".$ovovweb['web_smtpserver']."";			// SMTP 服务器  
			$mail->Port = "".$ovovweb['web_port']."";			// SMTP 端口
			$mail->SMTPAuth = true;            		// 打开SMTP 认证  
			$mail->Username = "".$ovovweb['web_smtpusermail'].""; 	// 用户名
			$mail->Password = "".$ovovweb['web_smtppass']."";     // 密码  
			
			//$body = file_get_contents('application/views/nmra/register.html');
			//$body = preg_replace('/\\\\/','', $body); //Strip backslashes
			//echo $content;
			$mail->AddReplyTo("".$ovovweb['web_email']."","".$ovovweb['web_name']."");
			$mail->SetFrom("".$ovovweb['web_email']."","".$ovovweb['web_name']."");
			$mail->AddAddress($to_email);
			$mail->Subject = "=?UTF-8?B?".base64_encode($subject)."?=";
			// optional, comment out and test
			$mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; 
			$mail->MsgHTML($content);	
			//$mail->AddAttachment("images/phpmailer.gif");      // attachment
			//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment
			
			if(!$mail->Send()) {
				$wrong = "Mailer Error: " . $mail->ErrorInfo;
				error_log($wrong,0);
				return false;
			} 
			else {
				error_log('send mail ok',0);
				return true;
			}
		}	
		//**************邮件发送E**************//		
}
?>