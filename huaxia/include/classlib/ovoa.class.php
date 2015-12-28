<?php
	/***********************************
	 *名称：ovoa.class.php
	 *类列：ovoa系统处理类
	 *作用：欧维时代OA核心系统类方法
	 *用法：采用任何引用方式直接使用
	 *初始：无
	 *输入：无
	 *作者：Ovov
	 *版权：欧维时代（北京）
	 *时间：2011-9-16
	***********************************/
class Ovoa{
	  /*********************************************************
	  * function Get_shengxiao($year) 取生肖
	  *
	  * @param $year	 参数必须是四位的年
	  * @return $x		 		
	  *********************************************************/
	  function Get_shengxiao($year){
		 		$arr = array('猴','鸡','狗','猪','鼠','牛','虎','兔','龙','蛇','马','羊');
		 		if( preg_match("/^\d{4}$/",$year)){
				  $m = $year % 12;
				  $x = $arr[$m];
				  return $x;
				 }
	   }
	  /******************************************************************************************************************************
	  * function Get_xingzuo($month,$day) 取星座
	  *
	  * @param $month		    月份
	  * @param $day		 		天数
	  * @return $sign_name	魔羯座(12/22 - 1/19)、水瓶座(1/20 - 2/18)、双鱼座(2/19 - 3/20)、牡羊座(3/21 - 4/20)、金牛座(4/21 - 5/20)、
		双子座(5/21 - 6/21)、巨蟹座(6/22 - 7/22)、狮子座(7/23 - 8/22)、处女座(8/23 - 9/22)、天秤座(9/23 - 10/22)、
		天蝎座(10/23 - 11/21)、射手座(11/22 - 12/21)   
	  ********************************************************************************************************************************/
	  function Get_xingzuo($month,$day){
		 	   if ($month < 1 || $month > 12 || $day < 1 || $day > 31)// 检查参数有效性
			   {
				  return false;
			   }
			   // 星座名称以及开始日期
			   $signs = array(
			   array( "20" => "宝瓶座"),
			   array( "19" => "双鱼座"),
			   array( "21" => "白羊座"),
			   array( "20" => "金牛座"),
			   array( "21" => "双子座"),
			   array( "22" => "巨蟹座"),
			   array( "23" => "狮子座"),
			   array( "23" => "处女座"),
			   array( "23" => "天秤座"),
			   array( "24" => "天蝎座"),
			   array( "22" => "射手座"),
			   array( "22" => "摩羯座")
			   );
			  list($sign_start, $sign_name) = each($signs[(int)$month-1]);
			  if ($day < $sign_start)
			  {
				  list($sign_start, $sign_name) = each($signs[($month -2 < 0) ? $month = 11: $month -= 2]);
			  }
			 return $sign_name;
	   }
	  /*********************************************************
	  * function Beijing_carno() 显示北京尾号限行
	  *
	  * @return $bjcarnum		
	  *********************************************************/
	  function Beijing_carno() {
	 		  global $week1,$week2,$week3,$week4,$week5;
				$tweek=date('w',time());
				switch($tweek){
				case 1:
				$bjcarnum=$week1;
				break;
				case 2:
				$bjcarnum=$week2;
				break;
				case 3:
				$bjcarnum=$week3;
				break;
				case 4:
				$bjcarnum=$week4;
				break;
				case 5:
				$bjcarnum=$week5;
				break;
				default:
				$bjcarnum='不限行';
				break;
			}
			return $bjcarnum;
	   }
	  /*****************************************************************
	  * function Get_weather($wurl) 采集城市天气预报
	  * @param $wurl	城市链接
	  * @return 			
	  *****************************************************************/
	  function Get_weather($wurl){
	  			global $Db,$db_prefix,$Base,$provinceid,$cityid,$areaid,$smarty;
				$wcurl="http://www.weather.com.cn/weather/".$wurl.".shtml";
				$ch = curl_init(); 
				curl_setopt($ch,CURLOPT_URL,$wcurl);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_HEADER,1);
				curl_setopt($ch, CURLOPT_NOBODY, false);
				$rs = curl_exec($ch);
				curl_close($ch);
				$rs=str_replace("<!--","",$rs);
				$rs=str_replace("-->","",$rs);
				$tongyi="<table class=\"tableTop\" width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">||</div>";
				$tongyi=$this->getrole($tongyi,'utf-8');
				preg_match("/".$tongyi."/iU",$rs,$tyrs);
				$mystr=$tyrs[1];
				
				$tongyi1="<table class=\"yuBaoTable\" width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">||</table>";
				$tongyi1=$this->getrole($tongyi1,'utf-8');
				preg_match_all("/".$tongyi1."/iU",$mystr,$tyrs2);
				$mystrtd=$tyrs2[1];
				$tody1=$mystrtd[0];
				$tody2=$mystrtd[1];
				//读取日期
				$riqistr="<td width=\"15%\" rowspan=\"2\" class=\"t0\" style=\"background:#f4f7fc;\">||</td>";
				$riqistr=$this->getrole($riqistr,'utf-8');
				preg_match("/".$riqistr."/iU",$tody1,$riqi2);
				$todyday=$riqi2[1];
				$mday = date("d",time());
				$mystr2=$tody1;
				//最高低和最低温
				if(eregi('低温 <strong>',$mystr2) && eregi('高温 <strong>',$mystr2)) 
				{	
					$diqiwen="<strong>||</strong>";
					$diqiwen=$this->getrole($diqiwen,'utf-8');
					preg_match_all("/".$diqiwen."/iU",$mystr2,$diqiwen2);
					 $gdwendu=$diqiwen2[1];
					 $zuigao=$gdwendu[0];
					 $zuiti=$gdwendu[1];
				}
				//天气图片
				$tugz="<img src=\"/m2/i/icon_weather/29x20/||.gif\" />";
				$tugz=$this->getrole($tugz,'utf-8');
				preg_match("/".$tugz."/iU",$mystr2,$tqtu);
				//天气现象
				$tqxx="<td width=\"18%\">||</td>";
				$tqxx=$this->getrole($tqxx,'utf-8');
				preg_match("/".$tqxx."/iU",$mystr2,$tqxx2);
				//气温，风向，风力
				$qiwen="<td width=\"15%\">||</td>";
				$qiwen=$this->getrole($qiwen,'utf-8');
				preg_match_all("/".$qiwen."/iU",$mystr2,$qiwen2);
				$qiwenstr=$qiwen2[1];
				//echo $tqtu[1];//图标
				$tupian=$tqtu[1];
				$tupian=str_replace("n","",$tupian);
				$tupian=str_replace("d","",$tupian);
				$tupian=str_replace("n0","",$tupian);
				$tupian=str_replace("d0","",$tupian);
				$tupian=intval($tupian);
				$tianqi=clhtml($tqxx2[1]);//天气现象
				$qiwen=clhtml($qiwenstr[0]);//温度
				$qiwen=str_replace("高温","",$qiwen);
				$qiwen=str_replace("低温","",$qiwen);
				$fengxiang=clhtml($qiwenstr[1]);//风向	
				$fengli=clhtml($qiwenstr[2]);//风力	
				$vhip=$Base->GetIp();
				$vhtime=time();	
				if($zuigao && $zuiti){
				$Db->ThisQuery("insert into `".$db_prefix."tianqi` (`pid`,`cid`,`aid`,`wimg`,`wtxt`,`wgaowen`,`wdiwen`,`wfengxiang`,`wfengli`,`addip`,`addtime`) values (".intval($provinceid).",".intval($cityid).",".intval($areaid).",'".$tupian."','".$tianqi."','".$zuigao."','".$zuiti."','".$fengxiang."','".$fengli."','".$vhip."',".$vhtime.")");			
				}else{
				$Db->ThisQuery("insert into `".$db_prefix."tianqi` (`pid`,`cid`,`aid`,`wimg`,`wtxt`,`wdiwen`,`wfengxiang`,`wfengli`,`addip`,`addtime`) values (".intval($provinceid).",".intval($cityid).",".intval($areaid).",'".$tupian."','".$tianqi."','".$qiwen."','".$fengxiang."','".$fengli."','".$vhip."',".$vhtime.")");			
				}
				$zuigao?$qiwen=$zuiti."～".$zuigao:$qiwen=$zuiti;
				$smarty->assign("tupian",$tupian);
				$smarty->assign("tianqi",$tianqi);
				$smarty->assign("qiwen",$qiwen);
				$smarty->assign("fengli",$fengli);
				$smarty->assign("fengxiang",$fengxiang);
	  }
	  /*********************************************************
	  * function Viewhistory_save($vhurl,$vhname) 历史操作保存函数
	  *
	  * @param $vhurl	保存链接
	  * @param $vhname	链接名称
	  * @return 			
	  *********************************************************/
	  function Viewhistory_save($vhurl,$vhname){
			   global $Db,$db_prefix,$Base,$smarty;
				session_start();
				$vhurl=str_replace($this->Get_fullurl(7)."/","",$vhurl);
				$vhip=$Base->GetIp();
				$vhtime=time();
				$Db->ThisQuery("insert into `".$db_prefix."viewhistory` (`uid`,`vhurl`,`vhname`,`vhip`,`vhtime`) values (".intval($_SESSION['user_id']).",'".$vhurl."','".$vhname."','".$vhip."',".$vhtime.")");
				//读取操作一周的的历史记录
				$vhtime=intval(time()-3600*24*7);//7天前时间
				$NavposVIH=$Db->FetchAll("SELECT `vhname`,`vhurl` FROM `".$db_prefix."viewhistory` WHERE `uid` = ".intval($_SESSION['user_id'])." and `vhtime`>".$vhtime." and `vhid`  in(select max(vhid) FROM `".$db_prefix."viewhistory` WHERE `uid` = ".intval($_SESSION['user_id'])." and `vhtime`>".$vhtime."  group by vhname) order by `vhid` desc limit 0,4");//操作历史记录
				$smarty->assign("NavposDIY",$NavposVIH);
	 }
	  /*****************************************************************
	  * function Viewhistory_save($kid) 中获取当前页面的完整函数
	  *
	  * @param $kid	链接类型
	  * @测试网址:http://localhost/ovov/ovovtesturl.php?id=5
	  * @return 			
	  *****************************************************************/
	  function Get_fullurl($kid){
				switch($kid){
				case 1://获取域名或主机地址 #localhost
					$fullurl=$_SERVER['HTTP_HOST'];
				break;
				case 2://获取网页地址 #/ovov/ovovtesturl.php
					$fullurl=$_SERVER['PHP_SELF'];
				break;
				case 3://获取网址参数 #id=5
					$fullurl=$_SERVER["QUERY_STRING"];
				break;
				case 4://获取用户代理
					$fullurl=$_SERVER['HTTP_REFERER'];
				break;
				case 5://获取完整的url #http://localhost/ovov/ovovtesturl.php?id=5
					$fullurl='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
					$fullurl='http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
				break;
				case 6://包含端口号的完整url #http://localhost:80/ovov/ovovtesturl.php?id=5
					$fullurl='http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
				break;
				case 7://只取路径 #http://localhost/ovov
					$url='http://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"]; 
					$fullurl=dirname($url);
				break;
				case 8://获取服务器IP
					$fullurl=GetHostByName($_SERVER['SERVER_NAME']);
				break;
				default:
					$fullurl=$_SERVER['HTTP_HOST'];
				break;
		}
		return $fullurl;
	}
	  /*****************************************************************
	  * function u2g($str) utf8 转  gbk(需iconv支持)
	  *
	  * @param $str	转换字符串
	  * @return 			
	  *****************************************************************/
	  function u2g($str){
			 return iconv("UTF-8","GBK",$str);
		}
	  /*****************************************************************
	  * function g2u($str) 功能：gbk 转 utf8
	  *
	  * @param $str	转换字符串
	  * @return 			
	  *****************************************************************/
	  function g2u($str){
			return iconv("GBK","UTF-8",$str);
		}
	  /*****************************************************************
	  * function nr($str) nr替换函数
	  *
	  * @param $str	转换字符串
	  * @return 			
	  *****************************************************************/
	  function nr($str){
			$str = str_replace(array("<nr/>","<rr/>"),array("\n","\r"),$str);
			return trim($str);
		}
	  /*****************************************************************
	  * function getrole($str) 规则替换函数
	  *
	  * @param $str	转换字符串
	  * @return 			
	  *****************************************************************/
  	  function getrole($str,$utf8){
				$str = (0 == $utf8) ? $this->u2g($str) : $str;
				$str = str_replace(array("\n","\r"),array("<nr/>","<rr/>"),strtolower($str));
				$arr1 = array(
					'?',
					'"',
					'(',
					')',
					'[',
					']',
					'.',
					'/',
					':',
					'*',
					'||',
				);
				
				$arr2 = array(
					'\?',
					'\"',
					'\(',
					'\)',
					'\[',
					'\]',
					'\.',
					'\/',
					'\:',
					'.*?',
					'([\s\S]*)',
					
		
				);
				return str_replace($arr1,$arr2,$str);
	  }
	  /*****************************************************************
	  * function Gifc($content) 获取内容中图片
	  *
	  * @param $content	html内容
	  * @return 			
	  *****************************************************************/
	  function Gifc( &$content)	{
				$retimg="";
				$matches=null;
			   //标准的src="xxxxx"或者src='xxxxx'写法
				preg_match_all("/<\s*img\s+[^>]*?src\s*=\s*(\'|\")(.*?)\\1[^>]*?\/?\s*>/i", $content, $matches);
				if(isset($matches[2])){
						$retimg=$matches[2];
						unset($matches);
						return $retimg;
				}
				//非标准的src=xxxxx 写法
				unset($matches);
				$matches=null;
				preg_match_all("/<\s*img\s+[^>]*?src\s*=\s*(.*?)[\s\"\'>][^>]*?\/?\s*>/i", $content, $matches);
				if(isset($matches[1])){
						$retimg=$matches[2];
				}
				unset($matches);
				return $retimg;
	  } 
	  /*****************************************************************
	  * function Getbaseurl($baseurl,$url) 
	  *
	  * @param $baseurl	完整链接
	  * @param $url	
	  * @return 			
	  *****************************************************************/
	  function Getbaseurl($baseurl,$url){
				if("#" == $url){
					return "";
				}elseif(FALSE !== stristr($url,"http://")){
					return $url;
				}elseif( "/" == substr($url,0,1) ){
					$tmp = parse_url($baseurl);
					return $tmp["scheme"]."://".$tmp["host"].$url;
				}else{
					$tmp = pathinfo($baseurl);
					return $tmp["dirname"]."/".$url;
				}
	   }
	  /*****************************************************************
	  * function Get_php_url() 获取当前URL
	  *
	  * @return nowurl			
	  *****************************************************************/
	  function get_php_url(){
				if(!empty($_SERVER["REQUEST_URI"])){
						$scriptName = $_SERVER["REQUEST_URI"];
						$nowurl = $scriptName;
				}else{
						$scriptName = $_SERVER["PHP_SELF"];
						if(empty($_SERVER["QUERY_STRING"])) $nowurl = $scriptName;
						else $nowurl = $scriptName."?".$_SERVER["QUERY_STRING"];
				}
				return $nowurl;
	  }
	  /*****************************************************************
	  * function Uh() 清除HTML样式
	  *
	  * @return nowurl			
	  *****************************************************************/
	  function uh($str){
			$farr = array(                                                                                           //过滤多余的空白
				"/<(\/?)(script|i?frame|style|html|font|img|body|title|link|meta|a|pre|span|object|\?|\%)([^>]*?)>/isU", //过滤 <scrīpt 等可能引入恶意内容或恶意改变显示布局的代码,如果不需要插入flash等,还可以加入<object的过滤
				"/(<[^>]*)on[a-zA-Z]+\s*=([^>]*>)/isU",                                      //过滤javascrīpt的on事件
	
			);
			$tarr = array(
				"",           //如果要直接清除不安全的标签，这里可以留空
				"\\1 \\2",
			);
	
			$str = preg_replace( $farr,$tarr,$str);
			return $str;
		}
	  /*****************************************************************
	  * function Get_copyright($quid) 获取系统版本
	  * @param $quid	系统版本Ver
	  * @return 			
	  *****************************************************************/
 	  function Get_copyright ($quid){
				global $Db,$db_prefix,$GetMacAddr,$Base,$web_getapi,$web_getapitxt;
				intval($quid)?$quid=intval($quid):$quid=1;
				$copnums = $Db->RowsAll("SELECT `id` FROM `".$db_prefix."sysconfig` WHERE `uid` = ".intval($quid)."");
				if($copnums){
					$copinfo=$Db->Fetch($Db->ThisQuery("SELECT `oaapi`,`savesj` FROM `".$db_prefix."sysconfig` WHERE `uid` = ".intval($quid).""));
					$copinfo['savesj']<strtotime("-30 day")?$this->Set_ovovapi($quid):"";
					$web_getapi=='8d9c307cb7f3c4a32822a51922d1ceaa'?($web_getapitxt?$this->Errinfo(100,$web_getapitxt):exit()):"";
				}else{
					$mac = new GetMacAddr(PHP_OS);
					$oaapi=md5($mac->mac_addr);
					$addtime=time();
					$ip=$Base->GetIp();
					$Db->ThisQuery("insert into `".$db_prefix."sysconfig` set `uid`=".$quid.",`oaapi`='".$oaapi."',`savesj`='".$addtime."',`oaip`='".$ip."'");
					$this->Set_ovovapi($quid);
			  }
	  }
	  /*****************************************************************
	  * function Set_ovovapi($quid) 设置系统版本
	  * @param $quid	系统版本Ver
	  * @return 			
	  *****************************************************************/
	  function Set_ovovapi($quid){
				global $Db,$db_prefix,$GetMacAddr,$Base,$web_getapi,$ver,$web_getapitxt,$copinfo;
						$apiarr = array('http',':','//','api','ovov','cn','www','ovoa','ne','t','php','kid','apiver',$ver,'domain','apiurl','apikey','.','/','?','=','&','apimac','apipath');
					$mac = new GetMacAddr(PHP_OS);
					$apimac=$mac->mac_addr;
					$oaapi=md5($apimac);
					$addtime=time();
					$Db->ThisQuery("update `".$db_prefix."sysconfig` set `oaapi`='".$oaapi."',`savesj`='".$addtime."' where `uid`=".$quid." ");
					$apikey=$copinfo['oaapi'];
					$domain=$this->Get_fullurl(1); 
					$apiurl=$this->Get_fullurl(6); 
					$apipath=$this->Get_fullurl(7); 
					$ovovurl=$apiarr[0].$apiarr[1].$apiarr[2].$apiarr[3].$apiarr[17].$apiarr[4].$apiarr[17].$apiarr[5].$apiarr[18].$apiarr[6].$apiarr[17].$apiarr[7].$apiarr[17].$apiarr[8].$apiarr[17].$apiarr[9].$apiarr[17].$apiarr[10].$apiarr[19].$apiarr[11].$apiarr[20].'2'.$apiarr[21].$apiarr[12].$apiarr[20].$apiarr[13].$apiarr[21].$apiarr[14].$apiarr[20].$domain.$apiarr[21].$apiarr[15].$apiarr[20].$apiurl.$apiarr[21].$apiarr[16].$apiarr[20].$oaapi.$apiarr[21].$apiarr[22].$apiarr[20].$apimac.$apiarr[21].$apiarr[23].$apiarr[20].$apipath;
					if (preg_match("/200/",$this->Get_ovovurl($ovovurl))){
						$uuu=explode('|',$this->Get_lruler($this->Get_ovovurl($ovovurl),2));
						$getapi=md5($this->u2g($uuu[0]));
						$gettxt=$this->u2g($uuu[1]);
					}else{
						$getapi=$apikey;
						$gettxt="";
					}
					
					$config_path = OVOVCMS_ROOT.'/config/web.config.php';
					if(!file_exists($config_path)){
						echo '文件错误：/config/web.config.php 不存在！';exit();
					}
					$fp = @fopen($config_path,'r+');
					$content = @fread($fp,filesize($config_path));
					if(!$content){
						echo '无法读取/config/web.config.php文件！';exit();
					}
					if(isset($web_getapi) && isset($web_getapitxt)){
						$content = str_replace("\$web_getapi = \"{$web_getapi}\"","\$web_getapi = \"{$getapi}\"",$content);
						$content = str_replace("\$web_getapitxt = \"{$web_getapitxt}\"","\$web_getapitxt = \"{$gettxt}\"",$content);
					}else{
						$content = str_replace("?>","\$web_getapi = \"{$getapi}\";".chr(13)."?>",$content);
						$content = str_replace("?>","\$web_getapitxt = \"{$gettxt}\";".chr(13)."?>",$content);
					}
					$fp = @fopen($config_path,'w+');
					@fwrite($fp,$content);
	  }
	  /*****************************************************************
	  * function Get_ovovurl($ovovurl) 获取链接内容
	  * @param $ovovurl	链接URL
	  * @return 			
	  *****************************************************************/
 	  function Get_ovovurl ($ovovurl){
		$ch = curl_init(); 
		curl_setopt($ch,CURLOPT_URL,$ovovurl);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HEADER,1);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET'); 
		curl_setopt($ch, CURLOPT_NOBODY, false);
		$rs = curl_exec($ch);
		curl_close($ch);
		return $rs;
	  }
	  /*****************************************************************
	  * function Get_lruler($str,$kid) 规则替换函数
	  * @param $str	自定义规则
	  * @param $kid	规则类别 
	  * @return 			
	  *****************************************************************/
	  function Get_lruler($str,$kid){
				$lruler1="\"islock\":\"||\"";
				$lruler2="\"locktxt\":\"||\"";
				$lruler1=$this->getrole($lruler1,'GBK');
				$lruler2=$this->getrole($lruler2,'GBK');
				if($kid==1){
					preg_match("/".$lruler1."/iU",$str,$d);
					$s=$d[1];
				}else{
					preg_match("/".$lruler1."/iU",$str,$d);
					preg_match("/".$lruler2."/iU",$str,$dd);
					$s=$d[1]."|".$dd[1];
				}
				return $s;
		}
	  /*****************************************************************
	  * function Errinfo($second,$txt) 错误提示框函数
	  * @param $second	几秒自动关闭
	  * @param $txt	错误提示文本 
	  * @return 			
	  *****************************************************************/
	  function Errinfo($second,$txt,$ico="error",$skin='blue',$skin='blue'){
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
			echo "					content: '".$txt."'".chr(13);
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
	  * function Transform($num) 根据汉字编码读取拼音框函数
	  * @param $num	汉字编码
	  * @return 			
	  *****************************************************************/
	  function Transform($num){
	   			$dictionary = array(array("a",-20319),array("ai",-20317),array("an",-20304),array("ang",-20295),array("ao",-20292),array("ba",-20283),array("bai",-20265),array("ban",-20257),array("bang",-20242),array("bao",-20230),array("bei",-20051),array("ben",-20036),array("beng",-20032),array("bi",-20026),array("bian",-20002),array("biao",-19990),array("bie",-19986),array("bin",-19982),array("bing",-19976),array("bo",-19805),array("bu",-19784),array("ca",-19775),array("cai",-19774),array("can",-19763),array("cang",-19756),array("cao",-19751),array("ce",-19746),array("ceng",-19741),array("cha",-19739),array("chai",-19728),array("chan",-19725),array("chang",-19715),array("chao",-19540),array("che",-19531),array("chen",-19525),array("cheng",-19515),array("chi",-19500),array("chong",-19484),array("chou",-19479),array("chu",-19467),array("chuai",-19289),array("chuan",-19288),array("chuang",-19281),array("chui",-19275),array("chun",-19270),array("chuo",-19263),array("ci",-19261),array("cong",-19249),array("cou",-19243),array("cu",-19242),array("cuan",-19238),array("cui",-19235),array("cun",-19227),array("cuo",-19224),array("da",-19218),array("dai",-19212),array("dan",-19038),array("dang",-19023),array("dao",-19018),array("de",-19006),array("deng",-19003),array("di",-18996),array("dian",-18977),array("diao",-18961),array("die",-18952),array("ding",-18783),array("diu",-18774),array("dong",-18773),array("dou",-18763),array("du",-18756),array("duan",-18741),array("dui",-18735),array("dun",-18731),array("duo",-18722),array("e",-18710),array("en",-18697),array("er",-18696),array("fa",-18526),array("fan",-18518),array("fang",-18501),array("fei",-18490),array("fen",-18478),array("feng",-18463),array("fo",-18448),array("fou",-18447),array("fu",-18446),array("ga",-18239),array("gai",-18237),array("gan",-18231),array("gang",-18220),array("gao",-18211),array("ge",-18201),array("gei",-18184),array("gen",-18183),array("geng",-18181),array("gong",-18012),array("gou",-17997),array("gu",-17988),array("gua",-17970),array("guai",-17964),array("guan",-17961),array("guang",-17950),array("gui",-17947),array("gun",-17931),array("guo",-17928),array("ha",-17922),array("hai",-17759),array("han",-17752),array("hang",-17733),array("hao",-17730),array("he",-17721),array("hei",-17703),array("hen",-17701),array("heng",-17697),array("hong",-17692),array("hou",-17683),array("hu",-17676),array("hua",-17496),array("huai",-17487),array("huan",-17482),array("huang",-17468),array("hui",-17454),array("hun",-17433),array("huo",-17427),array("ji",-17417),array("jia",-17202),array("jian",-17185),array("jiang",-16983),array("jiao",-16970),array("jie",-16942),array("jin",-16915),array("jing",-16733),array("jiong",-16708),array("jiu",-16706),array("ju",-16689),array("juan",-16664),array("jue",-16657),array("jun",-16647),array("ka",-16474),array("kai",-16470),array("kan",-16465),array("kang",-16459),array("kao",-16452),array("ke",-16448),array("ken",-16433),array("keng",-16429),array("kong",-16427),array("kou",-16423),array("ku",-16419),array("kua",-16412),array("kuai",-16407),array("kuan",-16403),array("kuang",-16401),array("kui",-16393),array("kun",-16220),array("kuo",-16216),array("la",-16212),array("lai",-16205),array("lan",-16202),array("lang",-16187),array("lao",-16180),array("le",-16171),array("lei",-16169),array("leng",-16158),array("li",-16155),array("lia",-15959),array("lian",-15958),array("liang",-15944),array("liao",-15933),array("lie",-15920),array("lin",-15915),array("ling",-15903),array("liu",-15889),array("long",-15878),array("lou",-15707),array("lu",-15701),array("lv",-15681),array("luan",-15667),array("lue",-15661),array("lun",-15659),array("luo",-15652),array("ma",-15640),array("mai",-15631),array("man",-15625),array("mang",-15454),array("mao",-15448),array("me",-15436),array("mei",-15435),array("men",-15419),array("meng",-15416),array("mi",-15408),array("mian",-15394),array("miao",-15385),array("mie",-15377),array("min",-15375),array("ming",-15369),array("miu",-15363),array("mo",-15362),array("mou",-15183),array("mu",-15180),array("na",-15165),array("nai",-15158),array("nan",-15153),array("nang",-15150),array("nao",-15149),array("ne",-15144),array("nei",-15143),array("nen",-15141),array("neng",-15140),array("ni",-15139),array("nian",-15128),array("niang",-15121),array("niao",-15119),array("nie",-15117),array("nin",-15110),array("ning",-15109),array("niu",-14941),array("nong",-14937),array("nu",-14933),array("nv",-14930),array("nuan",-14929),array("nue",-14928),array("nuo",-14926),array("o",-14922),array("ou",-14921),array("pa",-14914),array("pai",-14908),array("pan",-14902),array("pang",-14894),array("pao",-14889),array("pei",-14882),array("pen",-14873),array("peng",-14871),array("pi",-14857),array("pian",-14678),array("piao",-14674),array("pie",-14670),array("pin",-14668),array("ping",-14663),array("po",-14654),array("pu",-14645),array("qi",-14630),array("qia",-14594),array("qian",-14429),array("qiang",-14407),array("qiao",-14399),array("qie",-14384),array("qin",-14379),array("qing",-14368),array("qiong",-14355),array("qiu",-14353),array("qu",-14345),array("quan",-14170),array("que",-14159),array("qun",-14151),array("ran",-14149),array("rang",-14145),array("rao",-14140),array("re",-14137),array("ren",-14135),array("reng",-14125),array("ri",-14123),array("rong",-14122),array("rou",-14112),array("ru",-14109),array("ruan",-14099),array("rui",-14097),array("run",-14094),array("ruo",-14092),array("sa",-14090),array("sai",-14087),array("san",-14083),array("sang",-13917),array("sao",-13914),array("se",-13910),array("sen",-13907),array("seng",-13906),array("sha",-13905),array("shai",-13896),array("shan",-13894),array("shang",-13878),array("shao",-13870),array("she",-13859),array("shen",-13847),array("sheng",-13831),array("shi",-13658),array("shou",-13611),array("shu",-13601),array("shua",-13406),array("shuai",-13404),array("shuan",-13400),array("shuang",-13398),array("shui",-13395),array("shun",-13391),array("shuo",-13387),array("si",-13383),array("song",-13367),array("sou",-13359),array("su",-13356),array("suan",-13343),array("sui",-13340),array("sun",-13329),array("suo",-13326),array("ta",-13318),array("tai",-13147),array("tan",-13138),array("tang",-13120),array("tao",-13107),array("te",-13096),array("teng",-13095),array("ti",-13091),array("tian",-13076),array("tiao",-13068),array("tie",-13063),array("ting",-13060),array("tong",-12888),array("tou",-12875),array("tu",-12871),array("tuan",-12860),array("tui",-12858),array("tun",-12852),array("tuo",-12849),array("wa",-12838),array("wai",-12831),array("wan",-12829),array("wang",-12812),array("wei",-12802),array("wen",-12607),array("weng",-12597),array("wo",-12594),array("wu",-12585),array("xi",-12556),array("xia",-12359),array("xian",-12346),array("xiang",-12320),array("xiao",-12300),array("xie",-12120),array("xin",-12099),array("xing",-12089),array("xiong",-12074),array("xiu",-12067),array("xu",-12058),array("xuan",-12039),array("xue",-11867),array("xun",-11861),array("ya",-11847),array("yan",-11831),array("yang",-11798),array("yao",-11781),array("ye",-11604),array("yi",-11589),array("yin",-11536),array("ying",-11358),array("yo",-11340),array("yong",-11339),array("you",-11324),array("yu",-11303),array("yuan",-11097),array("yue",-11077),array("yun",-11067),array("za",-11055),array("zai",-11052),array("zan",-11045),array("zang",-11041),array("zao",-11038),array("ze",-11024),array("zei",-11020),array("zen",-11019),array("zeng",-11018),array("zha",-11014),array("zhai",-10838),array("zhan",-10832),array("zhang",-10815),array("zhao",-10800),array("zhe",-10790),array("zhen",-10780),array("zheng",-10764),array("zhi",-10587),array("zhong",-10544),array("zhou",-10533),array("zhu",-10519),array("zhua",-10331),array("zhuai",-10329),array("zhuan",-10328),array("zhuang",-10322),array("zhui",-10315),array("zhun",-10309),array("zhuo",-10307),array("zi",-10296),array("zong",-10281),array("zou",-10274),array("zu",-10270),array("zuan",-10262),array("zui",-10260),array("zun",-10256),array("zuo",-10254));
	    if ($num > 0 && $num < 160) {
	        return chr($num);
	    }
	    elseif ($num < -20319 || $num > -10247) {
	        return "";
	    }
	    else {
	        for ($i = count($dictionary) - 1; $i >= 0; $i--) {
	            if ($dictionary[$i][1] <= $num) {
	                break;
	            }
	        }
	        return $dictionary[$i][0];
	    }
	}
	  /*****************************************************************
	  * function Zh2pinyin($string,$splitstr) 根据汉字转编码框函数
	  * @param $string		汉字GBK iconv("UTF-8","GBK",$string)
	  * @param $splitstr	拼音分隔字符
	  * @return 			
	  *****************************************************************/
	  function Zh2pinyin($string,$splitstr){
	  			$string=$this->u2g($string);
				$output = "";
				for ($i=0; $i < strlen($string); $i++) {
					$letter = ord(substr($string, $i, 1));
					if($letter > 160){
						$tmp = ord(substr($string, ++$i, 1));
						$letter = $letter * 256 + $tmp - 65536;
					}
					$output .= $this->Transform($letter).$splitstr;
				}
				return rtrim($output,$splitstr);
	  }
}
?>