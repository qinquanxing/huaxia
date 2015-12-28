<?php
	/******获取屏幕分辨率******/
	function GetScreen() {
	   $screenX = "<script>document.write(screen.width);</script>";
	   $screenY = "<script>document.write(screen.height);</script>";
	   $screen=$screenX." x ".$screenY;
	   Return $screen;
	  }
	/******检测是调用页面是否同一域名******/
	function Ovoa_check_access(){
		if(isset($_SERVER['HTTP_REFERER'])){
			$url_array = explode('://', $_SERVER['HTTP_REFERER']);
			$url = explode('/', $url_array[1]);
			if ($_SERVER['SERVER_NAME'] != $url[0]) {
				return false;
			}else{return true;}
		}else{return false;}
	}
	/******批量创建目录函数******/
	 function mkdirs($dir)  
		{  
		if(!is_dir($dir))  
		{  
		if(!mkdirs(dirname($dir))){  
		return false;  
		}  
		if(!mkdir($dir,0777)){  
		return false;  
		}  
		}  
		return true;  
    }  
	/******批量删除目录函数******/
    function rmdirs($dir)  
		{  
		$d = dir($dir);  
		while (false !== ($child = $d->read())){  
		if($child != '.' && $child != '..'){  
		if(is_dir($dir.'/'.$child))  
		rmdirs($dir.'/'.$child);  
		else unlink($dir.'/'.$child);  
		}  
		}  
		$d->close();  
		rmdir($dir);  
    }

	//网站所需函数检查函数
	function CheckSwitch(){
		global $Base,$close_reason,$web_switch,$shour,$ssecond,$ehour,$esecond,$vermd5,$ver,$web_self;
		if(!function_exists("curl_init")){
		$errinfo= "&#x672A;&#x5F00;&#x542F;&#x5BF9;curl_init&#x51FD;&#x6570;&#x7684;&#x652F;&#x6301;.<br>&#x89E3;&#x51B3;&#x65B9;&#x6CD5;&#xFF1A;<br>1.&#x6253;&#x5F00;php.ini&#xFF0C;&#x627E;&#x5230;extension=php_curl.dll&#x5E76;&#x53BB;&#x6389;&#x524D;&#x9762;&#x7684;&#xFF1B;&#x91CD;&#x542F;apache&#xFF0C;&#x5237;&#x65B0;&#x5982;&#x8FD8;&#x662F;&#x51FA;&#x73B0;&#x6B64;&#x9519;&#x8BEF;&#x6267;&#x884C;&#x7B2C;2&#x6B65;&#x3002;<br>2.&#x68C0;&#x67E5;php.ini&#x7684;extension_dir&#x503C;&#x662F;&#x54EA;&#x4E2A;&#x76EE;&#x5F55;&#xFF0C;&#x68C0;&#x67E5;&#x6709;&#x65E0;php_curl.dll&#xFF0C;&#x6CA1;&#x6709;&#x7684;&#x8BF7;&#x4E0B;&#x8F7D;php_curl.dll&#xFF0C;&#x518D;&#x628A;php&#x76EE;&#x5F55;&#x4E2D;&#x7684;libeay32.dll,ssleay32.dll&#x62F7;&#x5230;c:\windows\system32&#x4E2D;&#x5373;&#x53EF;&#x3002;";
		errinfo(100,$errinfo);
		exit();
		}
		
		if($web_switch == 'close'){
			$Base->AlertMsg($close_reason,'');exit();
		}
		$jsfile = "../common/js/artDialog.js";//系统运行的JS
		$skinfile="../common/skins/default.css";//系统JS的CSS样式
		if ((!file_exists($jsfile))  ){			
			echo "&#x7CFB;&#x7EDF;&#x7F3A;&#x5C11;&#x76F8;&#x5E94;&#x7684;JS&#x6587;&#x4EF6;&#xFF01;";
			exit();
		}
		if ((!file_exists($skinfile))  ){
			echo "&#x7CFB;&#x7EDF;&#x7F3A;&#x5C11;&#x76F8;&#x5E94;&#x7684;CSS&#x6587;&#x4EF6;&#xFF01;";
			exit();
		}
		$now_wkid=date("w");
		$stime=strtotime($shour.$ssecond);
		$etime=strtotime($ehour.$esecond);
		$now_time=strtotime(date("H:i",time()));
		$now_wkid=date("w");
		if($web_self==1){
			if(($now_wkid>$sweekid)||($now_wkid>$eweekid)||($now_time<$stime)||($now_time>$etime)){$Base->AlertMsg($close_reason,'');exit();}
		
		}
		md5(md5($ver+99))<>$vermd5?errinfo(100,'&#x60A8;&#x4F7F;&#x7528;&#x7684;&#x7CFB;&#x7EDF;&#x7248;&#x672C;&#x4E0D;&#x6B63;&#x786E;&#xFF01;&#x8BF7;&#x8054;&#x7CFB;&#x7BA1;&#x7406;&#x5458;&#xFF01;'):'';
	}
	//检测是否安装程序
		function CheckInstall(){
			global $Base;
			$config_path = OVOVCMS_ROOT."/config/database.config.php";
			if(!@file_exists($config_path)){
				$Base->ErrorMsg('你尚未安装本程序，正在跳转到安装页面……','../install.php');exit;
			}
		}

	function addslash($var)
	{   
	    $result = '';
		if(is_array($var))
		{
			foreach($var as $k => $v)
			{
				$result[$k] = addslash($v);
			}
		}
		if(is_string($var))
		{
			$result = addslashes($var);
		}
		
		return ($result ? $result : $var);
	}

	function stripslash($var)
				{
					if(is_array($var))
					{
						foreach($var as $k => $v)
						{
							$result[$k] = stripslash($v);
						}
					}
					if(is_string($var))
					{
						$result = stripslashes($var);
					}
					return ($result ? $result : $var);
		}
//清除hmtl格式 函数
	function clhtml($Str) {
			global $clnew; 
			$clold=$Str;
			$clnew=strip_tags($clold);
			$clnew=str_replace(" ","",$clnew);
			$clnew=str_replace("　","",$clnew);
			$clnew=str_replace("&nbsp;","",$clnew);
			$clnew=str_replace("\n","",$clnew);
			$clnew=str_replace("\r","",$clnew);
			return $clnew;
	}
	function cut($Str, $Length) {//$Str为截取字符串，$Length为需要截取的长度 
			global $s; 
			$i = 0; 
			$l = 0; 
			$ll = strlen($Str); 
			$s = $Str; 
			$f = true; 
			while ($i <= $ll) { 
				if (ord($Str{$i}) < 0x80) { 
					$l++; $i++; 
				} else if (ord($Str{$i}) < 0xe0) { 
					$l++; $i += 2; 
				} else if (ord($Str{$i}) < 0xf0) { 
					$l += 2; $i += 3; 
				} else if (ord($Str{$i}) < 0xf8) {
					$l += 1; $i += 4; 
				} else if (ord($Str{$i}) < 0xfc) { 
					$l += 1; $i += 5; 
				} else if (ord($Str{$i}) < 0xfe) { 
					$l += 1; $i += 6; 
				} 
				if (($l >= $Length - 1) && $f) { 
					$s = substr($Str, 0, $i); 
					$f = false; 
				} 
			
				if (($l > $Length) && ($i < $ll)) { 
					$s = $s . '...'; break; //如果进行了截取，字符串末尾加省略符号“...”
				} 
			} 
			return $s;
		}
//分页函数
		function fenpage(&$sql,$page_size)
		{
				global $pre,$next,$page,$sums,$totalpages; //$sums总记录数
				$totalpages = ceil($sums/$page_size);//计算可分页总数，ceil()为上舍函数 
				if(!isset($_GET['page']) || !intval($_GET['page']) || $_GET['page'] > $totalpages) $page = 1; //对3种出错进行默认处理 
				//在url参数page不存在时，page不为10进制数时，page大于可分页数时，默认为1 
				else $page = $_GET['page']; 
				$startnum = ($page - 1)*$page_size; //从数据集第$startnum条开始取，注意数据集是从0开始的 
				$sql .=" limit $startnum,$page_size";
				}
				//显示分页
				function showpage()
				{
				global $maxpages,$sums,$page,$prepage,$nextpage,$queryString,$totalpages; //param from genpage function
				echo "共计<font color=\"#ff0000\">$sums</font>条记录"; 
				echo "<font color=\"#ff0000\">".$page."</font>"."/".$totalpages."页 "; 
				//实现 << < 1 2 3 4 5> >> 分页链接 
				$pre = $page - 1;//上一页 
				$next = $page + 1;//下一页 
				$maxpages = 4;//处理分页时 << < 1 2 3 4 > >>显示4页 
				$pagepre = 1;//如果当前页面是4，还要显示前$pagepre页，如<< < 3 /4/ 5 6 > >> 把第3页显示出来 
				if($page != 1) { echo "<a href=\"".$_SERVER['PHP_SELF']."?$queryString\" class=\"hei14\" ><<</a> \n"; 
				echo "<a href=\"".$_SERVER['PHP_SELF']."?$queryString&page=$pre\" class=\"hei14\" ><</a> \n";} 
				if($maxpages>=$totalpages) //如果总记录不足以显示4页 
				{$pgstart = 1;$pgend = $totalpages;}//就不所以的页面打印处理 
				elseif(($page-$pagepre-1+$maxpages)>$totalpages)//就好像总页数是6，当前是5，则要把之前的3 4 显示出来，而不仅仅是4 
				{$pgstart = $totalpages - $maxpages + 1;$pgend = $totalpages;} 
				else{ 
				$pgstart=(($page<=$pagepre)?1:($page-$pagepre));//当前页面是1时，只会是1 2 3 4 > >>而不会是 0 1 2 3 > >> 
				$pgend=(($pgstart==1)?$maxpages:($pgstart+$maxpages-1)); 
				} 
				for($pg=$pgstart;$pg<=$pgend;$pg++){ //跳转菜单 
				if($pg == $page) echo "<a href=\"".$_SERVER['PHP_SELF']."?$queryString&page=$pg\" class=\"hei14\" ><font color=\"#ff0000\">$pg</font></a>\n "; 
				else echo "<a href=\"".$_SERVER['PHP_SELF']."?$queryString&page=$pg\" class=\"hei14\">$pg</a>\n "; 
				} 
				if($page != $totalpages) 
				{echo "<a href=\"".$_SERVER['PHP_SELF']."?$queryString&page=$next\" class=\"hei14\" >></a> \n"; 
				echo "<a href=\"".$_SERVER['PHP_SELF']."?$queryString&page=$totalpages\" class=\"hei14\" >>></a> \n";
				} 
				echo "<select name=\"menu1\" onChange=\"MM_jumpMenu('self',this,0)\" class=\"hei14\" > \n";
				echo "<option value=\"\">选择</option>\n ";
				for($pg1=1;$pg1<=$totalpages;$pg1++) { 
				echo "<option value=\"".$_SERVER['PHP_SELF']."?$queryString&page=$pg1\">".$pg1."</option>\n"; 
						}
				echo "</select>\n";
				//跳转JS函数开始 
				echo "<script language=\"JavaScript\" type=\"text/JavaScript\">\n ";
				echo "<!-- \n";
				echo "function MM_jumpMenu(targ,selObj,restore){ //v3.0\n"; 
				echo "eval(targ+\".location='\"+selObj.options[selObj.selectedIndex].value+\"\'\")\n"; 
				echo "if (restore) selObj.selectedIndex=0; \n";
				echo "} \n";
				echo "//--> \n";
				echo "</script>\n ";
				//跳转JS函数结束 
		}

	function Pagination($total, $per, $page,$sid)
    	 {
		global $languagexz;
             //if($page=="" || $page<1) $page=1;
             $apage=$total/$per;//计算页数（包含小数点的）
             $allpage=ceil($apage);//取整返回
             $next=$page+1;         //下一頁
             $pre=$page-1;           //上一頁
             $startcount0=$page-3;   //前面3页输出起始序号
             $endcount0=$page-1;     //前面3页输出终止序号
             $startcount=$page+1;   //后面3页输出起始序号
             $endcount=$page+3;     //后面3页输出终止序号
             if($startcount0<1) $startcount0=1; //为了避免输出的时候产生负数，设置如果小于1就从序号1开始
             if($allpage<$endcount) $endcount=$allpage;   //页码+3的可能性就会产生最终输出序号大于总页码，那么就要将其控制在页码数之内
             $url=basename($_SERVER['PHP_SELF']);   //取得当前的文件名
             //$query_array=explode("&",$_SERVER['argv'][0]);   //取得传递的参数，并且拆分到数组打散
			 $query_string=$_SERVER["REQUEST_URI"];
			 list($mystr1,$mystr2)=split("\?",$query_string,2);
			 $query_string=$mystr2;
             $query_array=explode("&",$query_string); 
             foreach ($query_array as $key => $value)     if (strstr($value,"page="))   unset($query_array[$key]);   //处理一下，将page=xxx的参数干掉
             $query_string=implode("&amp;",$query_array);
             if(isset($sid)){
             	$query_string.="_".$sid;
             }
             if($page==1 && $allpage==1)
             { 
					$menu.= "";  
					return $menu;
             }
             else
             {
                         if($page==1)
                         {
                           /*如果为第一页，直接从第二页链接开始输出*/
							 if($query_string){
								$menu.= "<a><B>$page</B></a>&nbsp;";
                               for ($page=2;$page<=$endcount;$page++)   $menu.= "<a href=\"{$url}?{$query_string}&amp;page={$page}\" ><B>$page</B></a>   ";
                               $menu.= "&nbsp;<a href=\"{$url}?{$query_string}&amp;page=".$next."\" ><B>下一页</B></a>&nbsp;&nbsp;<a href=\"{$url}?{$query_string}&amp;page=".$allpage."\" ><B>末页</B></a>";  
return $menu;
							   }
							   else{
								   $menu.= "<a ><B>$page</B></a>&nbsp;";
                               for ($page=2;$page<=$endcount;$page++)   $menu.= "<a href=\"{$url}?page={$page}\" ><B>$page</B></a>   ";
                               $menu.= "&nbsp;<a href=\"{$url}?page=".$next."\" ><B>下一页</B></a>&nbsp;&nbsp;<a href=\"{$url}?page=".$allpage."\" ><B>末页</B></a>";  
return $menu;
							   }
							   

                         }
                         elseif($page==$allpage)
                         {		if($query_string){
                               $menu.=" <a href=\"{$url}?{$query_string}&amp;page=1\"><B>首页</B></a>
                                       <a href=\"{$url}?{$query_string}&amp;page=".$pre."\"><B>上一页</B></a>&nbsp;&nbsp;";
                               for ($page=$startcount0;$page<=$endcount0;$page++)   $menu.="<a href=\"{$url}?{$query_string}&amp;page={$page}\" ><U><B>$page</B></U></a>   "; //后面3页
								}
								else{
								 $menu.=" <a href=\"{$url}?page=1\" ><B>首页</B></a>
                                       <a href=\"{$url}?page=".$pre."\" ><B>上一页</B></a>&nbsp;&nbsp;";
                               for ($page=$startcount0;$page<=$endcount0;$page++)   $menu.="<a href=\"{$url}?page={$page}\" ><U><B>$page</B></U></a>   "; 
								}
                               $menu.="<A ><B>$allpage</B></a>";  
return $menu;

                         }
                         else
                         {			if($query_string){
                                     $menu.="   <a href=\"{$url}?{$query_string}&amp;page=1\" ><B>首页</B></a>&nbsp;&nbsp;<a href=\"{$url}?{$query_string}&amp;page=".$pre."\" ><B>上一页</B></a>&nbsp;&nbsp;"; 

                                   for ($page=$startcount0;$page<=$endcount0;$page++)  
   $menu.="<a href=\"{$url}?{$query_string}&amp;page={$page}\" ><B>$page</B></a>&nbsp;";     //前面3页输出
                                   $menu.="<A ><B>$page</B></a>&nbsp;";

                                   for ($page=$startcount;$page<=$endcount;$page++)  
   $menu.="<a href=\"{$url}?{$query_string}&amp;page={$page}\" ><U><B>$page</B></U></a>&nbsp;"; //后面3页
                                   $menu.="&nbsp;<a href=\"{$url}?{$query_string}&amp;page=".$next."\" ><B>下一页</B></a>&nbsp;&nbsp;<a href=\"{$url}?{$query_string}&amp;page=".$allpage."\" ><B>末页</B></a>";
									}
									else{
								   $menu.="   <a href=\"{$url}?page=1\" ><B>首页</B></a>&nbsp;&nbsp;<a href=\"{$url}?page=".$pre."\" ><B>上一页</B></a>&nbsp;&nbsp;"; 
                                   for ($page=$startcount0;$page<=$endcount0;$page++)  
   $menu.="<a href=\"{$url}?page={$page}\" ><B>$page</B></a>&nbsp;";     //前面3页输出
                                   $menu.="<A ><B>$page</B></a>&nbsp;";
                                   for ($page=$startcount;$page<=$endcount;$page++)  
   $menu.="<a href=\"{$url}?page={$page}\" ><U><B>$page</B></U></a>&nbsp;"; //后面3页
                                   $menu.="&nbsp;<a href=\"{$url}?page=".$next."\" ><B>下一页</B></a>&nbsp;&nbsp;<a href=\"{$url}?page=".$allpage."\" ><B>末页</B></a>";
									}
return $menu;
                         }
             }
     }
   function arPagination($content,$page)
   {
     if($page=="" || $page==0) $page=1;
     $pagenum=$page-1;
     $contentarr = explode ("[Next_Page]", $content);     //按照[arpage]对文章内容进行分割
     $arrnum=count($contentarr);                       //返回数组的总数
     $aaa=Pagination($arrnum, "1", $page) ; 
//$menu.="<span style=\"float:right\">$aaa</span>";               //输出分页
     $menu.="$contentarr[$pagenum]";                       //输出当前页
$menu.="<br/><br/><center>$aaa</center>";               //输出分页

return $menu;

   }
  
//IP转数字函数
	function ip2int($ip){ 
					   list($ip1,$ip2,$ip3,$ip4)=explode(".",$ip); 
					   return $ip1*pow(256,3)+$ip2*pow(256,2)+$ip3*256+$ip4; 
	} 

//截取中文字符串
function mysubstr($str, $start, $len) {
    $tmpstr = "";
    $strlen = $start + $len;
    for($i = 0; $i < $strlen; $i++) {
        if(ord(substr($str, $i, 1)) > 0xa0) {
            $tmpstr .= substr($str, $i, 2);
            $i++;
        } else
            $tmpstr .= substr($str, $i, 1);
    }
    return $tmpstr;
}

//随机数函数
	function random($length, $numeric = 0) {
				PHP_VERSION < '4.2.0' && mt_srand((double)microtime() * 1000000);
				if($numeric) {
					$hash = sprintf('%0'.$length.'d', mt_rand(0, pow(10, $length) - 1));
				} else {
					$hash = '';
					$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
					$max = strlen($chars) - 1;
					for($i = 0; $i < $length; $i++) {
						$hash .= $chars[mt_rand(0, $max)];
					}
				}
				return $hash;
	}

//返回来源URL
	function url_from()
		{
		$parse_url=parse_url($_SERVER[HTTP_REFERER]);
		$url_from=$parse_url[path]?$parse_url[scheme]."://".$parse_url[host].$parse_url[path]."?".$parse_url[query]:$web_url; 
		//if($parse_url[query]){}
		return $url_from;
		}
	
	//数组转字符串b
		function arr2str($arr)
			{
				foreach($arr as $key)
				{
				$astr.=$key.",";
				}
				return $astr=rtrim($astr,",");
			}
	//数组转字符串e
		
	//年份函数(年or月,名称,现在年份,开始年份，结束年份)
		function yselect($yorm,$name,$selecting,$byear,$eyear)
			{
			$yselect.="<select id=".$name." name=".$name." >";
			if($yorm==1){$selecting=empty($selecting)?date('Y'):$selecting;	}else
			{$selecting=empty($selecting)?date('m'):$selecting;}
			for($y=$byear;$y<=$eyear;$y++){ 
			if($y==$selecting){$yselect.="<option value=".$y." selected>".$y."</option>"; }
			else{$yselect.="<option value=".$y.">".$y."</option>"; }
			}
			$yselect.="</select>";
			return $yselect;
			}
	//年份函数e
	//时间函数b
			function timelect($name,$selecting,$byear,$eyear)
			{
			$yselect.="<select id=".$name." name=".$name." >";
			for($y=$byear;$y<=$eyear;$y++){ 
			if($y==$selecting){$yselect.="<option value=".$y." selected>".$y."</option>"; }
			else{$yselect.="<option value=".$y.">".$y."</option>"; }
			}
			$yselect.="</select>";
			return $yselect;
			}
	//时间函数e
	//星期函数
			function weekslect($name,$selecting,$byear,$eyear)
			{
			$day=array("星期天","星期一","星期二","星期三","星期四","星期五","星期六");
			$yselect.="<select id=".$name." name=".$name." >";
			for($y=$byear;$y<=$eyear;$y++){ 
			if($y==$selecting){$yselect.="<option value=".$y." selected>".$day[$y]."</option>"; }
			else{$yselect.="<option value=".$y.">".$day[$y]."</option>"; }
			}
			$yselect.="</select>";
			return $yselect;
			}
	//星期函数e
		//**************错误提示框B**************//
		function errinfo($second,$txt)//几秒后关闭对话框，文本内容
		{	
			echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">'.chr(13);
			echo '<html xmlns="http://www.w3.org/1999/xhtml">'.chr(13);
			echo '<head>'.chr(13);
			echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />'.chr(13);
			echo '<title>'.$txt.'</title>'.chr(13);
			echo "<link id=\"artDialog-skin\" href=\"../common/skins/black.css\" rel=\"stylesheet\" />".chr(13);
			echo "<script type=\"text/javascript\" src=\"../common/js/artDialog.js\"></script>".chr(13);
			echo "<script language=\"JavaScript\" type=\"text/JavaScript\">".chr(13);
			echo "function errinfo() {".chr(13);
			echo "		 			art.dialog({".chr(13);
			echo "					time: ".$second.",".chr(13);
			echo "					lock: true,".chr(13);
			echo "					icon: 'error',".chr(13);
			echo "					content: '".$txt."'".chr(13);
			echo "					});".chr(13);
			echo "			}".chr(13);
			echo "window.onload=errinfo;".chr(13);
			echo "</script>".chr(13);
			echo '</head>'.chr(13);
			echo '<body></body>'.chr(13);
			echo '</html>'.chr(13);
			die;
		}
	//**************错误提示框E**************//
?>