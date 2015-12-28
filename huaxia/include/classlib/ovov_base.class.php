<?php
 class OVOV_Base {
/*
*关于浏览器的重新定向和提示类
*/

function checklogin(){
		//echo "asdf";
		//global $Db,$Base,$db_prefix;
		session_start();
		if(empty($_SESSION['mylogin_name'])){
			header('Location:login.php');
			//$this->AddLog('未登陆进入后台目录！');
			exit();
		}
}

	function WindowClose(){
	#关闭窗口函数
		echo "<script type=\"text/Javascript\">\n";
		echo "	window.opener=null;\n";
		echo "	window.close();\n";
		echo "</script>\n";
	}
	
	function WindowOpen($url="/",$title="欧维时代OA办公系统",$width=400,$height=400){
	#打开一个窗口
		if($url == ""){$this->ErrorMsg("ovov_base.class.php中WindwoOpen函数的\$url参数不能为空！");exit();}
		echo "<script type=\"text/Javascript\">\n";
		echo "	window.open(\"".$url."\",\"".$title."\",\"width=".$width.",height=".$height."\");\n";
		echo "</script>\n";
	}
	
	function WarnClose($msg="窗口即将关闭！"){
	#提示信息后关闭窗口
		echo "<script type=\"text/Javascript\">\n";
		echo "	alert(\"".$msg."\");\n";
		echo "	window.opener=null;\n";
		echo "	window.close();\n";
		echo "</script>\n";
	}
	
	function WarnBack($msg){
	#提示后跳回上一页
		echo "<script type=\"text/Javascript\">\n";
		echo "	alert(\"".$msg."\");\n";
		echo "	history.go(-1);\n";
		echo "</script>\n";
		exit();
	}
		
	function WarnUrl($msg="",$url=""){
	#提示后打开指定某网页
		if($url == "" or $msg == ""){$this->ErrorMsg("ovov_base.class.php中WarnUrl函数的\$url或\$msg参数不能为空！");exit();}
		echo "<script type=\"text/Javascript\">\n";
		echo "	alert(\"".$msg."\");\n";
		echo "	location.href=\"".$url."\";\n";
		echo "</script>\n";
	}
	
	function ConfirmUrl($msg="",$url=""){
	#提示信息，确认后打开指定网页
		if($url == "" or $msg == ""){$this->ErrorMsg("ovov_base.class.php中ConfirmUrl函数的\$url或\$msg参数不能为空！");exit();}
		echo "<script type=\"text/Javascript\">\n";
		echo "	if(confirm(\"".$msg."\")){\n";
		echo "		location.href=\"".$url."\";\n";
		echo "	}else{\n";
		echo "		window.opener=null;\n";
		echo "		window.close();\n";
		echo "	}\n";
		echo "</script>\n";
	}
	
	function Warn($msg){
		if($msg == ""){$this->ErrorMsg("ovov_base.class.php中Warn函数的\$msg参数不能为空！");exit();}
		echo "<script type=\"text/Javascript\">\n";
		echo "	alert(\"".$msg."\");\n";
		echo "	return false;\n";
		echo "</script>\n";
	}
	
	function Url($url){
		if($url == ""){$this->ErrorMsg("ovov_base.class.php中Url函数的\$url参数不能为空！");exit();}
		echo "<script type=\"text/Javascript\">\n";
		echo "	location.href=\"".$url."\";\n";
		echo "</script>\n";
	}
	
	function ErrorMsg($msg,$url="javascript:history.go(-1)",$time='2',$ico='error',$skin='blue'){
	 		global $opaurl;
	  		$url?$url=$url:$url=$opaurl;
			echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">'.chr(13);
			echo '<html xmlns="http://www.w3.org/1999/xhtml">'.chr(13);
			echo '<head>'.chr(13);
			echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />'.chr(13);
			echo '<title>'.$msg.'</title>'.chr(13);
			echo "<script type=\"text/javascript\" src=\"./common/js/artDialog.js?skin=".$skin."\"></script>".chr(13);
			echo "<script language=\"JavaScript\" type=\"text/JavaScript\">".chr(13);
			echo "function ErrorMsg() {".chr(13);
			echo "		 			art.dialog({".chr(13);
			echo "					time: ".$time.",".chr(13);
			echo "					lock: true,".chr(13);
			echo "					icon: '".$ico."',".chr(13);
			echo "					content: '".$msg."',".chr(13);
			echo "					close: function(){location.href='".$url."'}".chr(13);
			echo "					});".chr(13);
			echo "			}".chr(13);
			echo "window.onload=ErrorMsg;".chr(13);
			echo "</script>".chr(13);
			echo '</head>'.chr(13);
			echo '<body></body>'.chr(13);
			echo '</html>'.chr(13);
			die;	
			}
	
	function AlertMsg($msg,$url="javascript:history.go(-1)",$time='2',$ico='succeed',$skin='blue'){
	 		global $opaurl;
	  		$url?$url=$url:$url=$opaurl;
			echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">'.chr(13);
			echo '<html xmlns="http://www.w3.org/1999/xhtml">'.chr(13);
			echo '<head>'.chr(13);
			echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />'.chr(13);
			echo '<title>'.$msg.'</title>'.chr(13);
			echo "<script type=\"text/javascript\" src=\"./common/js/artDialog.js?skin=".$skin."\"></script>".chr(13);
			echo "<script language=\"JavaScript\" type=\"text/JavaScript\">".chr(13);
			echo "function AlertMsg() {".chr(13);
			echo "		 			art.dialog({".chr(13);
			echo "					time: ".$time.",".chr(13);
			echo "					lock: true,".chr(13);
			echo "					icon: '".$ico."',".chr(13);
			echo "					content: '".$msg."',".chr(13);
			echo "					close: function(){location.href='".$url."'}".chr(13);
			echo "					});".chr(13);
			echo "			}".chr(13);
			echo "window.onload=AlertMsg;".chr(13);
			echo "</script>".chr(13);
			echo '</head>'.chr(13);
			echo '<body></body>'.chr(13);
			echo '</html>'.chr(13);
			die;	
	}
  function AlertiframeMsg($msg,$url="javascript:history.go(-1)",$time='2',$ico="succeed",$skin='blue'){
	 		global $opaurl;
	  		$url?$url=$url:$url=$opaurl;
			echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">'.chr(13);
			echo '<html xmlns="http://www.w3.org/1999/xhtml">'.chr(13);
			echo '<head>'.chr(13);
			echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />'.chr(13);
			echo '<title>'.$msg.'</title>'.chr(13);
			echo "<script type=\"text/javascript\" src=\"./common/js/artDialog.js?skin=".$skin."\"></script>".chr(13);
			echo "<script type=\"text/javascript\" src=\"common/js/iframeTools.js\"></script>".chr(13);
			echo "<script language=\"JavaScript\" type=\"text/JavaScript\">".chr(13);
			echo "function AlertiframeMsg() {".chr(13);
			echo "showtip2('".$msg."');".chr(13);
			echo "			}".chr(13);
			echo "function showtip2(msg) {".chr(13);
			//echo "	art.dialog.tips(msg,1.5);".chr(13);
			echo "		 			art.dialog({".chr(13);
			echo "					time: ".$time.",".chr(13);
			echo "					lock: true,".chr(13);
			echo "					icon: '".$ico."',".chr(13);
			echo "					content: '".$msg."'".chr(13);
			echo "					});".chr(13);
			echo "	setTimeout('originreload()',1000);".chr(13);
			echo "}".chr(13);
			echo "function originreload()".chr(13);
			echo "{".chr(13);
			echo "	var win = art.dialog.open.origin;".chr(13);
			echo "	win.location.reload();".chr(13);
			echo "art.dialog.close();".chr(13);
			echo "}".chr(13);
			echo "window.onload=AlertiframeMsg;".chr(13);
			echo "</script>".chr(13);
			echo '</head>'.chr(13);
			echo '<body></body>'.chr(13);
			echo '</html>'.chr(13);
			die;	  
	}
	
	function AlertMsg1($msg,$url="javascript:history.go(-1)",$time='2',$ico="succeed",$skin='blue'){
	 		global $opaurl;
	  		$url?$url=$url:$url=$opaurl;
			echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">'.chr(13);
			echo '<html xmlns="http://www.w3.org/1999/xhtml">'.chr(13);
			echo '<head>'.chr(13);
			echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />'.chr(13);
			echo '<title>'.$msg.'</title>'.chr(13);
			echo "<script type=\"text/javascript\" src=\"./common/js/artDialog.js?skin=".$skin."\"></script>".chr(13);
			echo "<script language=\"JavaScript\" type=\"text/JavaScript\">".chr(13);
			echo "function AlertMsg() {".chr(13);
			echo "		 			art.dialog({".chr(13);
			echo "					time: ".$time.",".chr(13);
			echo "					lock: true,".chr(13);
			echo "					icon: '".$ico."',".chr(13);
			echo "					content: '".$msg."',".chr(13);
			echo "					close: function(){location.href='".$url."'}".chr(13);
			echo "					});".chr(13);
			echo "			}".chr(13);
			echo "window.onload=AlertMsg;".chr(13);
			echo "</script>".chr(13);
			echo '</head>'.chr(13);
			echo '<body></body>'.chr(13);
			echo '</html>'.chr(13);
			die;	  
	}
	 /*****************************************************************
	  * function Errinfo($second,$txt,$url) 错误提示框函数
	  * @param $second	几秒自动关闭
	  * @param $txt	错误提示文本 
	  * @param $url	跳转链接
	  * @param $ico	自定义图标 
	  * @return 			
	  *****************************************************************/
	  function Errinfo($second=2,$txt,$url,$ico="succeed",$skin='blue'){
	 		global $opaurl;
	  		$url?$url=$url:$url=$opaurl;
			echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">'.chr(13);
			echo '<html xmlns="http://www.w3.org/1999/xhtml">'.chr(13);
			echo '<head>'.chr(13);
			echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />'.chr(13);
			echo '<title>'.$txt.'</title>'.chr(13);
			echo "<script type=\"text/javascript\" src=\"./common/js/artDialog.js?skin=".$skin."\"></script>".chr(13);
			echo "<script language=\"JavaScript\" type=\"text/JavaScript\">".chr(13);
			echo "function Errinfo() {".chr(13);
			echo "		 			art.dialog({".chr(13);
			echo "					time: ".$second.",".chr(13);
			echo "					lock: true,".chr(13);
			echo "					icon: '".$ico."',".chr(13);
			echo "					content: '".$txt."',".chr(13);
			echo "					close: function(){location.href='".$url."'}".chr(13);
			echo "					});".chr(13);
			echo "			}".chr(13);
			echo "window.onload=Errinfo;".chr(13);
			echo "</script>".chr(13);
			echo '</head>'.chr(13);
			echo '<body></body>'.chr(13);
			echo '</html>'.chr(13);
			die;
		}
	  /*****************************************************************
	  * function Errinfo($second,$txt,$url) 错误提示框函数
	  * @param $width	宽度
	  * @param $second	几秒自动关闭
	  * @param $txt	错误提示文本 
	  * @param $url	跳转链接 
	  * @param $ico	自定义图标 
	  * @return 			
	  *****************************************************************/
	  function OVOA_Notice($width="220",$second=10,$title,$content,$ico="face-smile"){
			$notice_str.="<script language=\"JavaScript\" type=\"text/JavaScript\">".chr(13);
			$notice_str.="function OVOA_Notice() {".chr(13);
			$notice_str.="			art.dialog.notice({ ".chr(13);  
			$notice_str.="			title: '".$title."',  ".chr(13); 
			$notice_str.="			width: ".$width.",".chr(13);  
			$notice_str.="			content: '".$content."',".chr(13);   
			$notice_str.="			icon: '".$ico."', ".chr(13);  
			$notice_str.="			time: ".$second."  ".chr(13);
			$notice_str.="			}); ".chr(13);
			$notice_str.="			}".chr(13);
			$notice_str.="window.onload=OVOA_Notice;".chr(13);
			$notice_str.="</script>".chr(13);
			return $notice_str;
		}
		/**字符处理类，用于处理各类字符*/
	function PreSql($sql=""){
	#防Sql注入函数
		$pre_sql = "select|update|into|delete|mid|set|master|insert|\"";
		#用|隔开，可以自动添加
		
		$array = explode("|",$pre_sql);
		foreach ($array as $temp){
			if($temp[0] == htmlentities($temp[0])){
				$sql = str_replace($temp,"<font color='red'>(SQL Word)</font>".$temp,$sql);
			}else{
				$sql = str_replace($temp,htmlentities($temp),$sql);
			}
		}
		return $sql;
	}
	
	function HtmlEncode($str=""){
	#返回被Html编码后字符
		return htmlspecialchars($str);
	}
	
	function CheckUsr($usr){
	#检查是否是有效用户名
		$illeage_str = "$|\"|'|@|&|%|#|(|)|~|/|\|;|{|}|<|>|!|,";
		#禁用在用户名内的字符，用|隔开
		$array = explode("|",$illeage_str);
		#print_r($array);exit();
		foreach ($array as $temp){
			if(strstr($usr,$temp[0])){
				$this->ErrorMsg("用户名含有不合法的字符&nbsp;<font color=black>".$temp[0]."</font>");
				exit();
			}
		}
		return $usr;
	}
	
	function CheckMail($mail){
	#检查是否是有效邮件
		if(!eregi("^[_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3}$",$mail)){
  			$this->ErrorMsg("你的E-Mail不合法！");
			exit();
		}
		return $mail;
	}
	
	function CheckQq($str){
	#检查是否是数字
		if(!((int)$str && strlen($str) == strlen((int)$str)) && strlen($str) < 5){
			$this->ErrorMsg("你输入的不是QQ号码！");
			exit();
		}
		return (int)$str;
	}
	
	function CheckFile($fname){
	#检查文件的类型，返回文件的扩展名
		if(!strstr($fname,".")){$this->ErrorMsg("无扩展名文件！");exit();}
		if($array = explode(".",$fname)){
			$i = 0;
			foreach ($array as $temp){
				$i++;
			}
			return $array[$i-1];
		}
	}
	
	function CheckArray($array){
	#返回数组的长度
		if(!is_array($array)){$this->ErrorMsg("不是数组，无法返回数组的长度！");exit();}
		$i = 0;
		foreach ($array as $temp){
			$i++;
		}
		return $i;
	}
	
	function UbbEncode($str){
	#处理Ubb代码，返回Html代码
		$str = str_replace("│","|",$str);
		$str = preg_replace("/\[b\](.+?)\[\/b\]/is","<b>\\1</b>",$str);
		$str = preg_replace("/\[i\](.+?)\[\/i\]/is","<i>\\1</i>",$str);
		$str = preg_replace("/\[u\](.+?)\[\/u\]/is","<u>\\1</u>",$str);
		$str = preg_replace("/\[center\](.+?)\[\/center\]/is","<center>\\1</center>",$str);
		$str = preg_replace("/\[url\](http:\/\/.+?)\[\/url\]/is","<a href=\\1 target=blank>\\1</a>",$str);
		$str = preg_replace("/\[email\](.+?)\[\/email\]/is","<a href=mailto:\\1>\\1</a>",$str);
		$str = preg_replace("/\[img\](.+?)\[\/img\]/is","<a href=\\1 target=blank><img src=\\1 border=0 title=点击放大观看></a>",$str);
		$str = preg_replace("/\[code\](.+?)\[\/code\]/is","<table cellspacing='0' cellpadding='0' border='0' width='100%' bgcolor='#f8f8f8' align='center'><tr><td><table border='0' cellspacing='1' cellpadding='4' width='100%'><tr><td class='tbnei' align='left'><font color='#666666'>代码:</font><br>\\1</td></tr></table></td></tr></table>",$str);
		$str = preg_replace("/\[color=(.+?)\](.+?)\[\/color\]/is","<font color=\\1>\\2</font>",$str);
		return $str;
	}
	
	/*
	*获得数据类
	*/
//获取IP函数
	function GetIp() {
		if (isset($_SERVER)) {
			if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
				$realip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			} elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
				$realip = $_SERVER['HTTP_CLIENT_IP'];
			} else {
				$realip = $_SERVER['REMOTE_ADDR'];
			}
		} else {
			if (getenv("HTTP_X_FORWARDED_FOR")) {
				$realip = getenv( "HTTP_X_FORWARDED_FOR");
			} elseif (getenv("HTTP_CLIENT_IP")) {
				$realip = getenv("HTTP_CLIENT_IP");
			} else {
				$realip = getenv("REMOTE_ADDR");
			}
		}
		return $realip;
	}
//把IP转数字函数
function ip2int($ip){ 
   list($ip1,$ip2,$ip3,$ip4)=explode(".",$ip); 
   $ip2int=$ip1*pow(256,3)+$ip2*pow(256,2)+$ip3*256+$ip4; 
   return $ip2int;
} 
//时间比较函数，返回两个日期相差几秒、几分钟、几小时或几天 
function DateDiff($date1,$date2,$unit="") { 
			switch ($unit) { 
			case 's': 
			 $dividend = 1; 
			break; 
			case 'i': 
			 $dividend = 60; 
			break; 
			case 'h': 
			 $dividend = 3600; 
			break; 
			case 'd': 
			 $dividend = 86400; 
			break; 
			default: 
			 $dividend = 86400; 
			} 
			 $time1=strtotime( $date1); 
			 $time2=strtotime( $date2); 
			if ($time1&&$time2) 
			return intval((integer)($time1-$time2)/$dividend); 
			return false; 
		}


}
?>