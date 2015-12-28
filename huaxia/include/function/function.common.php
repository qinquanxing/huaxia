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
		global $Base,$web_self,$close_reason,$web_switch,$shour,$ssecond,$ehour,$esecond,$vermd5,$ver;
		if(!function_exists("curl_init")){
		$errinfo= "&#x672A;&#x5F00;&#x542F;&#x5BF9;curl_init&#x51FD;&#x6570;&#x7684;&#x652F;&#x6301;.<br>&#x89E3;&#x51B3;&#x65B9;&#x6CD5;&#xFF1A;<br>1.&#x6253;&#x5F00;php.ini&#xFF0C;&#x627E;&#x5230;extension=php_curl.dll&#x5E76;&#x53BB;&#x6389;&#x524D;&#x9762;&#x7684;&#xFF1B;&#x91CD;&#x542F;apache&#xFF0C;&#x5237;&#x65B0;&#x5982;&#x8FD8;&#x662F;&#x51FA;&#x73B0;&#x6B64;&#x9519;&#x8BEF;&#x6267;&#x884C;&#x7B2C;2&#x6B65;&#x3002;<br>2.&#x68C0;&#x67E5;php.ini&#x7684;extension_dir&#x503C;&#x662F;&#x54EA;&#x4E2A;&#x76EE;&#x5F55;&#xFF0C;&#x68C0;&#x67E5;&#x6709;&#x65E0;php_curl.dll&#xFF0C;&#x6CA1;&#x6709;&#x7684;&#x8BF7;&#x4E0B;&#x8F7D;php_curl.dll&#xFF0C;&#x518D;&#x628A;php&#x76EE;&#x5F55;&#x4E2D;&#x7684;libeay32.dll,ssleay32.dll&#x62F7;&#x5230;c:\windows\system32&#x4E2D;&#x5373;&#x53EF;&#x3002;";
		errinfo(100,$errinfo);
		exit();
		}
		
		if($web_switch == 'close'){
			$Base->AlertMsg($close_reason,'');exit();
		}
		$jsfile = COMMON_PATH."/js/artDialog.js";//系统运行的JS
		$skinfile=COMMON_PATH."/js/skins/default.css";//系统JS的CSS样式
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
				$Base->ErrorMsg('你尚未安装本程序，正在跳转到安装页面……','install.php');exit;
			}
		}

	function addslash($var)
	{ 	
		$result=""; 
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
		$result ? $result : $result=$var;
		return $result;
	}

	function stripslash($var)
				{
					$result=""; 
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
	function cut($str, $len = 12, $dot = true ) 
	{
        $i = 0;
        $l = 0;
        $c = 0;
        $a = array();
        while ($l < $len) {
            $t = substr($str, $i, 1);
            if (ord($t) >= 224) {
                $c = 3;
                $t = substr($str, $i, $c);
                $l += 2;
            } elseif (ord($t) >= 192) {
                $c = 2;
                $t = substr($str, $i, $c);
                $l += 2;
            } else {
                $c = 1;
                $l++;
            }
            // $t = substr($str, $i, $c);
            $i += $c;
            if ($l > $len) break;
            $a[] = $t;
        }
        $re = implode('', $a);
        if (substr($str, $i, 1) !== false) {
            array_pop($a);
            ($c == 1) and array_pop($a);
            $re = implode('', $a);
            $dot and $re .= '...';
        }
        return $re;
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
     {		 $menu='';
             if($page=="" || $page<1) $page=1;
             $apage=$total/$per;//计算页数（包含小数点的）
             $allpage=ceil($apage);//取整返回
             $next=$page+1;         //下一页
             $pre=$page-1;           //上一页
             $startcount0=$page-2;   //前面3页输出起始序号
             $endcount0=$page-1;     //前面3页输出终止序号
             $startcount=$page+1;   //后面3页输出起始序号
             $endcount=$page+5;     //后面3页输出终止序号
             if($startcount0<1) $startcount0=1; //为了避免输出的时候产生负数，设置如果小于1就从序号1开始
             if($allpage<$endcount) $endcount=$allpage;   //页码+3的可能性就会产生最终输出序号大于总页码，那么就要将其控制在页码数之内
             $url=basename($_SERVER['PHP_SELF']);   //取得当前的文件名
             //$query_array=explode("&",$_SERVER['argv'][0]);   //取得传递的参数，并且拆分到数组打散
             $query_string=$_SERVER["REQUEST_URI"];
			 @list($mystr1,$mystr2)=split('\?',$query_string,2);
			 $query_string=$mystr2;
             $query_array=explode("&",$query_string); 
             foreach ($query_array as $key => $value)     if (strstr($value,"page="))   unset($query_array[$key]);   //处理一下，将page=xxx的参数干掉
             $query_string=implode("&amp;",$query_array);
//              if(isset($sid)){
//              	$query_string.="_".$sid;
//              }
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
                               $menu.= "<a class='n1 selected' ><B>$page</B></a>&nbsp;";
                               for ($page=2;$page<=$endcount;$page++)   $menu.= "<a href=\"{$url}?{$query_string}&amp;page={$page}\" class=n1><B> $page </B></a>   ";
                               $menu.= "&nbsp;<a href=\"{$url}?{$query_string}&amp;page=".$next."\" class='page-next'><B>下一页</B></a>&nbsp;&nbsp;<a href=\"{$url}?{$query_string}&amp;page=".$allpage."\" class=n2 over><B>末页</B></a>";  
return $menu;
                         }
                         elseif($page==$allpage)
                         {
                               $menu.="   <a href=\"{$url}?{$query_string}&amp;page=1\" class=n2 over><B>首页</B></a>
                                       <a href=\"{$url}?{$query_string}&amp;page=".$pre."\" class='page-prev'><B>上一页</B></a>&nbsp;&nbsp;";
                               for ($page=$startcount0;$page<=$endcount0;$page++)   $menu.="<a href=\"{$url}?{$query_string}&amp;page={$page}\" class=n1><B> $page </B></a>   "; //后面3页
                               $menu.="<a class='n1 selected' ><B>$page</B></a>";  
return $menu;
                         }
                         else
                         {
                                   $menu.="   <a href=\"{$url}?{$query_string}&amp;page=1\" class=n2 over><B>首页</B></a>&nbsp;&nbsp;<a href=\"{$url}?{$query_string}&amp;page=".$pre."\" class=n2 over><B>上一页</B></a>&nbsp;&nbsp;"; 

                                   for ($page=$startcount0;$page<=$endcount0;$page++)  
   $menu.="<a href=\"{$url}?{$query_string}&amp;page={$page}\" class=n1><B> $page </B></a>&nbsp;";     //前面3页输出
                                   $menu.="<a class='n1 selected' ><B>$page</B></a>&nbsp;";
                                   for ($page=$startcount;$page<=$endcount;$page++)  
   $menu.="<a href=\"{$url}?{$query_string}&amp;page={$page}\" class=n1><B> $page </B></a>&nbsp;"; //后面3页
                                   $menu.="&nbsp;<a href=\"{$url}?{$query_string}&amp;page=".$next."\" class=n2 over><B>下一页</B></a>&nbsp;&nbsp;<a href=\"{$url}?{$query_string}&amp;page=".$allpage."\" class=n2 over><B>末页</B></a>
                                       ";  
return $menu;
              }
        }
  }

  function Pagination_html($total, $per, $page)
  {
      global $languagexz;
      $menu = '';
      if($page=="" || $page<1) $page=1;
      $apage=$total/$per;//计算页数（包含小数点的）
      $allpage=ceil($apage);//取整返回
      $next=$page+1;          //下一
      $pre=$page-1;           //上一
      $startcount0=$page-3;   //前面3页输出起始序号
      $endcount0=$page-1;     //前面3页输出终止序号
      $startcount=$page+1;    //后面3页输出起始序号
      $endcount=$page+3;      //后面3页输出终止序号
      if($startcount0<1) $startcount0=1; //为了避免输出的时候产生负数，设置如果小于1就从序号1开始
      if($allpage<$endcount) $endcount=$allpage;   //页码+3的可能性就会产生最终输出序号大于总页码，那么就要将其控制在页码数之内
      $url=basename($_SERVER['PHP_SELF']);   //取得当前的文件名
      $url=str_replace(".php","",$url);
      $url=str_replace(".htm","",$url);
  
      $query_string = 'p';
       
      if(isset($_GET['cid'])){
          $query_string.=$_GET['cid'];
      }
  
      if($page==1 && $allpage==1)
      {
          $menu.= "";
          return $menu;
      }else{
          if($page==1)
          {
              //如果为第一页，直接从第二页链接开始输出
              $menu.=" <a  class='page-prev'>上一页<</a>&nbsp;";
              $menu.= "<a class='n1 selected' >0$page</a>";
              	
              for ($page=2;$page<=$endcount;$page++){
                  $page_show = strlen($page)==1?'0'.$page:$page;
                  $menu.= "<a href=\"$query_string-{$page}.html\" class=n1>$page_show</a> ";
              }
              
              $menu.= "&nbsp;<a href=\"$query_string-".$next.".html\" class='page-next'>下一页</a>";
              	
              return $menu;
          }
          elseif($page==$allpage)
              {
              $menu.="<a href=\"$query_string-".$pre.".html\" class='page-prev'>上一页</a>";
              	
              for ($page=$startcount0;$page<=$endcount0;$page++){
                  $page_show = strlen($page)==1?'0'.$page:$page;
                  $menu.="<a href=\"$query_string-{$page}.html\" class=n1>$page_show</a>"; //后面3页
              }
            
            $page_show2 = strlen($page)==1?'0'.$page:$page;
            $menu.="<a class='n1 selected' >$page_show2</a>";
			$menu.= "&nbsp;<a  class='page-next'>下一页</a>";
  			return $menu;
              }
        else
          {
              $menu.="<a href=\"$query_string-".$pre.".html\" class='page-prev'>上一页</a>";
              	
              for ($page=$startcount0;$page<=$endcount0;$page++){
                  $page_show = strlen($page)==1?'0'.$page:$page;
                  $menu.="<a href=\"$query_string-{$page}.html\" class=n1 >$page_show</a>";//前面3页输出
              }
                  $menu.="<a class='n1 selected' >$page</a>";
                      	
              for ($page=$startcount;$page<=$endcount;$page++){
                  $page_show = strlen($page)==1?'0'.$page:$page;
                  $menu.="<a href=\"$query_string-{$page}\" class=n1>$page_show</a>"; //后面3页
              }
  		
              $menu.= "&nbsp;<a href=\"$query_string-".$next.".html\" class='page-next'>下一页</a>";
  		
  			return $menu;
          }
      }
  }
  
/*  
//分页伪静态
function Pagination_html($total, $per, $page)
     {
		global $languagexz;
		     $menu = '';
             if($page=="" || $page<1) $page=1;
             $apage=$total/$per;//计算页数（包含小数点的）
             $allpage=ceil($apage);//取整返回
             $next=$page+1;          //下一  
             $pre=$page-1;           //上一  
             $startcount0=$page-3;   //前面3页输出起始序号
             $endcount0=$page-1;     //前面3页输出终止序号
             $startcount=$page+1;    //后面3页输出起始序号
             $endcount=$page+3;      //后面3页输出终止序号
             if($startcount0<1) $startcount0=1; //为了避免输出的时候产生负数，设置如果小于1就从序号1开始
             if($allpage<$endcount) $endcount=$allpage;   //页码+3的可能性就会产生最终输出序号大于总页码，那么就要将其控制在页码数之内
             $url=basename($_SERVER['PHP_SELF']);   //取得当前的文件名
			 $url=str_replace(".php","",$url);
			 $url=str_replace(".htm","",$url);
             //$query_array=explode("&",$_SERVER['argv'][0]);   //取得传递的参数，并且拆分到数组打散
			 //$query_string="_";
			$query_string = 'p';
 		    
			if(isset($_GET['cid'])){
				$query_string.=$_GET['cid']; 
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
                           //如果为第一页，直接从第二页链接开始输出
						    $menu.=" <a href=\"{$query_string}-1.html\" class=n2>首页</a>&nbsp;";
                               $menu.= "<a class='n1 selected' >$page</a>";
                               for ($page=2;$page<=$endcount;$page++)   $menu.= "<a href=\"$query_string-{$page}.html\" class=n1>$page</a> ";
                               $menu.= "&nbsp;<a href=\"$query_string-".$next.".html\" class=n2>下一页</a><a href=\"$query_string-".$allpage.".html\" class=n2>尾页</a>"; 
return $menu;
                         }
                         elseif($page==$allpage)
                         {
                         $menu.=" <a href=\"$query_string-1.html\" class=n2>首页</a>
                                 <a href=\"$query_string-".$pre.".html\" class=n2>上一页</a>&nbsp;";
                               for ($page=$startcount0;$page<=$endcount0;$page++)   $menu.="<a href=\"$query_string-{$page}.html\" class=n1>$page</a>   "; //后面3页
                               $menu.="<a class='n1 selected' >$page</a>";  
return $menu;
                         }
                         else
                         {
                               $menu.="   <a href=\"$query_string-1.html\" class=n2>首页</a><a href=\"$query_string-".$pre."\" class=hei14>上一页</a>";
                               for ($page=$startcount0;$page<=$endcount0;$page++)  
$menu.="<a href=\"$query_string-{$page}\" class=n1 >$page</a>";     //前面3页输出
                               $menu.="<a class='n1 selected' >$page</a>";
                               for ($page=$startcount;$page<=$endcount;$page++)  
$menu.="<a href=\"$query_string-{$page}\" class=n1>$page</a>"; //后面3页
                               $menu.="&nbsp;<a href=\"{$query_string}-".$next.".html\" class=n2>下一页</a>&nbsp;<a href=\"$query_string-".$allpage."\" class=n2>尾页</a>"; 
return $menu;
                        }
             }
     }
     
*/
	 
	 
 //内容分页伪静态
function Pagination_nhtml($total, $per, $page)
     {
		global $languagexz,$query_string,$menu;
             if($page=="" || $page<1) $page=1;
             $apage=$total/$per;//计算页数（包含小数点的）
             $allpage=ceil($apage);//取整返回
             $next=$page+1;         //下一  
             $pre=$page-1;           //上一  
             $startcount0=$page-3;   //前面3页输出起始序号
             $endcount0=$page-1;     //前面3页输出终止序号
             $startcount=$page+1;   //后面3页输出起始序号
             $endcount=$page+3;     //后面3页输出终止序号
             if($startcount0<1) $startcount0=1; //为了避免输出的时候产生负数，设置如果小于1就从序号1开始
             if($allpage<$endcount) $endcount=$allpage;   //页码+3的可能性就会产生最终输出序号大于总页码，那么就要将其控制在页码数之内


             $url=basename($_SERVER['PHP_SELF']);   //取得当前的文件名
			 $url=str_replace(".php","",$url);
			 $url=str_replace(".htm","",$url);

             //$query_array=explode("&",$_SERVER['argv'][0]);   //取得传递的参数，并且拆分到数组打散
			 //$query_string="_";
			 if(isset($_GET['languagexz'])){
				$query_string="_".$_GET['languagexz']; 
			}
			 if(isset($_GET['sid'])){
				$query_string.="_".$_GET['sid']; 
			}
			 if(isset($_GET['id'])){
				$query_string.="_".$_GET['id']; 
			}
//			 if(isset($_GET['sousuo'])){
//				$query_string.="-".$_GET['sousuo']; 
//			}
//			 $query_string=$_SERVER["REQUEST_URI"];
//			 list($mystr1,$mystr2)=split("\?",$query_string,2);
//			 $query_string=$mystr2;
//             $query_array=explode("&",$query_string); 
//             foreach ($query_array as $key => $value)     if (strstr($value,"page="))   unset($query_array[$key]);   //处理一下，将page=xxx的参数干掉
//             $query_string=implode("=",$query_array);
//			 $query_array=explode("=",$query_string);
//			 foreach ($query_array as $key => $value)     if (!is_numeric($value))   unset($query_array[$key]);
//			 $query_string=implode("_",$query_array);
//			 $query_string=$query_string!==""?"_".$query_string:"";
             if($page==1 && $allpage==1)
             { 
$menu.= "";  
return $menu;
             }
             else
             {
                          if($page==1)
                         {
                               //$menu.=" <a href=\"{$url}{$query_string}-1\" class=n2><B>首页</B></a>&nbsp;";
                               $menu.= "<a class='n1 selected' ><B>$page</B></a>";
                               for ($page=2;$page<=$endcount;$page++)   $menu.= "<a href=\"{$url}{$query_string}-{$page}\" class=n1><B>$page</B></a> ";
                               //$menu.= "&nbsp;<a href=\"{$url}{$query_string}-".$next."\" class=n2><B>下一页</B></a><a href=\"{$url}{$query_string}-".$allpage."\" class=n2><B>尾页</B></a>"; 
return $menu;
 						 }
                         elseif($page==$allpage)
                         {
                               //$menu.=" <a href=\"{$url}{$query_string}-1\" class=n2><B>首页</B></a>
                                        //<a href=\"{$url}{$query_string}-".$pre."\" class=n2><B>上一页</B></a>&nbsp;";
                               for ($page=$startcount0;$page<=$endcount0;$page++)   $menu.="<a href=\"{$url}{$query_string}-{$page}\" class=n1><B>$page</B></a>   "; //后面3页
                               $menu.="<a class='n1 selected' ><B>$page</B></a>";  
return $menu;
                         }
                         else
                         { 
                                   //$menu.="   <a href=\"{$url}{$query_string}-1\" class=n2><B>首页</B></a><a href=\"{$url}{$query_string}-".$pre."\" class=n2><B>上一页</B></a>";
                                   for ($page=$startcount0;$page<=$endcount0;$page++)  
   $menu.="<a href=\"{$url}{$query_string}-{$page}\" class=n1><B>$page</B></a>";     //前面3页输出
                                   $menu.="<a class='n1 selected' ><B>$page</B></a>";
                                   for ($page=$startcount;$page<=$endcount;$page++)  
   $menu.="<a href=\"{$url}{$query_string}-{$page}\" class=<B>$page</B></a>"; //后面3页
                                   //$menu.="&nbsp;<a href=\"{$url}{$query_string}-".$next."\" class=n2><B>下一页</B></a>&nbsp;<a href=\"{$url}{$query_string}-".$allpage."\" class=n2><B>尾页</B></a>"; 
return $menu;
                      }
             }
     }
function arPagination($content,$page){
	 global $web_wshtml;
     if($page=="" || $page==0) $page=1;
     $pagenum=$page-1;
     $contentarr = explode ("[Next_Page]", $content);     //按照[arpage]对文章内容进行分割 
     $arrnum=count($contentarr);                       //返回数组的总数
	 $aaa=$web_wshtml=='open'?Pagination_nhtml($arrnum, '1', $page):Pagination($arrnum, '1', $page); 
     //$menu.="<span style=\"float:right\">$aaa</span>";               //输出分页
     $menus.="$contentarr[$pagenum]";                       //输出当前页
     $menus.="<br/><br/><center><div class='page'>$aaa</div></center>";               //输出分页
     return $menus;
 }
/*********************************************************
		 * function Cuts_Add($content,$per) 文字后面添加指定的字符串函数
		 *
		 * @param  $content	    传过来的内容
		 * @param  $per	    多少字
		 *********************************************************/
/***************在指定的长度的文字后面添加指定的字符串以便分页使用****************/
function  cuts_add($content,$per=3000){
   $lens=iconv_strlen($content,'utf-8');
   if($lens<$per){
          $per=$lens;
	      $apage=1;
       }else{
          $apage=$lens/$per;
	   }
   $allpage=ceil($apage);//每多少字后面加特定的标签
   for($i=0;$i<=$allpage;$i++){
	           $piece[$i]=substr($content,$i*$per,$per);
	        $start=zh_substr($piece[$i],$sign='>');
	         $end=zh_substr($piece[$i],$sign='<');
		/**********************第一种情况开始：$start开始变量为空，$end变量不为空******************/
		     if(empty($start)){
			    $end_s=substr($end,0,1);//闭合符号'<'这个符号的后面的第一个符号
				if($end_s!='/'){//当'<'这个符号的后面的第一个符号不为'/'这个符号时需要将从'<'这个符号开始的后面的全部截掉，然后后面接上自定义分割的符号，然后后面再接被截掉的内容
				   $qwe=-(strlen($end)+1);//将整个标签过滤掉
				   $label=substr($piece[$i],$qwe);//截取掉的标签
				   $piece[$i]=substr($piece[$i],0,$qwe);//截取掉开始标签后的内容
				   $str.=$piece[$i]."[Next_Page]".$label;
				   //echo    $piece[$i];
				 }else{//当'<'这个符号的后面的第一个符号为'/'这个符号时，直接将自定义分割的符号加在这个后面就可以了
				   $str.=$piece[$i]."[Next_Page]";
			    }
			 }
		/**********************第一种情况结束********************/
		/**********************第二种情况开始：$end开始变量为空，$start变量不为空******************/
		    if(empty($end)){
			     //if(trim($start)=='<'){
					  $piece[$i]=substr($piece[$i],0,-1);//截取掉开始标签后的内容
					  $str.=$piece[$i]."[Next_Page]<";
				// }else{
				//	  echo 654;	 
				// }
			 }
		/**********************第二种情况结束********************/
		/**********************第三种情况开始：$end和$start变量都不为空******************/
		if(!empty($end)&&!empty($start)){
		    if(strstr($end,$start)){//(1)$end包含$start
			      if(strstr($end,'/')){
					  $str.=$piece[$i]."<".$end."[Next_Page]";
				  }else{
					  $e_len= -(strlen($end)+1);//开始标签包含的标签的长度
					  $piece[$i]=substr($piece[$i],0,$e_len);//截取掉开始标签后的内容
					  $str.=$piece[$i]."[Next_Page]<".$end;
				   }
			 }
			 if(strstr($start,$end)){//(2)$start包含$end
			    if(strstr($end,'/')){
					    $es_len = -(strlen($start));//开始标签包含的标签的长度
					    $piece[$i] = substr($piece[$i],0,$es_len);//截取掉开始标签后的内容
					    $sstart=zh_substr($piece[$i],$sign='<');
					    $ss_len = -(strlen($sstart)+1);//开始标签包含的标签的长度
					    $piece[$i] = substr($piece[$i],0,$ss_len);//截取掉开始标签后的内容
					     $str.=$piece[$i]."[Next_Page]<".$sstart;
				}else{
					 $s_len = -(strlen($start));//开始标签包含的标签的长度
					 $piece[$i]=substr($piece[$i],0,$s_len);//截取掉开始标签后的内容
					 $str.=$piece[$i]."[Next_Page]".$start;
				}
			 }
		}
		/**********************第三种情况结束********************/
		 
		//$str.=$piece[$i]."[Next_Page]";
    }
    return   $str; 
}


function zh_substr($str,$sign=','){   
		$site  = strrpos($str,$sign);   // 找出字符串中字符最后出现的位置
		$site  = $site + 1;    $substr = substr($str,$site);   // 截取   
		return $substr;
}
/*********************************************************
		 * function phpos_chsubstr_ahtml($str,$num,$more) 文字后面添加指定的字符串函数
		 * @param 要截取的HTML $str
		 * @param 截取的数量 $num
		 * @param 是否需要加上更多 $more
		 * @return 截取串
/***************在指定的长度的文字后面添加指定的字符串以便分页使用****************/
function   phpos_chsubstr_ahtml($str,$num,$more=false){
$leng=strlen($str);
if($num>=$leng) return $str;
$word=0;
$i=0; /** 字符串指针 **/
$stag=array(array()); /** 存放开始HTML的标志 **/
$etag=array(array()); /** 存放结束HTML的标志 **/
$sp = 0;
$ep = 0;
while($word!=$num)
{

if(ord($str[$i])>128)
{
//$re.=substr($str,$i,3);
$i+=3;
$word++;
}
else if ($str[$i]=='<')
{
if ($str[$i+1] == '!')
{
$i++;
continue;
}

if ($str[$i+1]=='/') 
{
$ptag=&$etag ;
$k=&$ep;
$i+=2;
}
else 
{
$ptag=&$stag;
$i+=1;
$k=&$sp;
}

for(;$i<$leng;$i++) 
{
if ($str[$i] == ' ')
{
$ptag[$k] = implode('',$ptag[$k]);
$k++;
break;
}
if ($str[$i] != '>')
{
$ptag[$k][]=$str[$i];
continue;
}
else 
{
$ptag[$k] = implode('',$ptag[$k]);
$k++;
break;
}
}
$i++;
continue;
}
else
{
//$re.=substr($str,$i,1);
$word++;
$i++;
}
}
foreach ($etag as $val)
{
$key1=array_search($val,$stag);
if ($key1 !== false) unset($stag[$key]);
}
foreach ($stag as $key => $val)
{
if (in_array($val,array('br','img'))) unset($stag[$key1]);
}
array_reverse($stag);
$ends = '';
$re = substr($str,0,$i).$ends;
if($more) $re.='...';
return $re;
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
		function errinfo($second,$txt,$ico='error',$skin='blue')//几秒后关闭对话框，文本内容
		{	
			echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">'.chr(13);
			echo '<html xmlns="http://www.w3.org/1999/xhtml">'.chr(13);
			echo '<head>'.chr(13);
			echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />'.chr(13);
			echo '<title>'.$txt.'</title>'.chr(13);
			echo "<script type=\"text/javascript\" src=\"./common/js/artDialog.js?skin=".$skin."\"></script>".chr(13);
			echo "<script language=\"JavaScript\" type=\"text/JavaScript\">".chr(13);
			echo "function errinfo() {".chr(13);
			echo "		 			art.dialog({".chr(13);
			echo "					time: ".$second.",".chr(13);
			echo "					lock: true,".chr(13);
			echo "					icon: '".$ico."',".chr(13);
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
	//**************检测url是否一致B**************//
	function ovov_check_access(){
		if(isset($_SERVER['HTTP_REFERER'])){
			$url_array = explode('://', $_SERVER['HTTP_REFERER']);
			$url = explode('/', $url_array[1]);
			//echo $_SERVER['SERVER_NAME']."<br>".$url[0];die;
			if ($_SERVER['SERVER_NAME'] != $url[0]) {
				return false;
			}else{return true;}
		}else{return false;}
	 }
	//**************检测url是否一致E**************//
	
	 
	 //判断是否为手机访问
	 function is_mobile_request()
	 {
	     $_SERVER['ALL_HTTP'] = isset($_SERVER['ALL_HTTP']) ? $_SERVER['ALL_HTTP'] : '';
	     $mobile_browser = '0';
	     if(preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|iphone|ipad|ipod|android|xoom)/i', strtolower($_SERVER['HTTP_USER_AGENT'])))
	         $mobile_browser++;
	     if((isset($_SERVER['HTTP_ACCEPT'])) and (strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') !== false))
	         $mobile_browser++;
	     if(isset($_SERVER['HTTP_X_WAP_PROFILE']))
	         $mobile_browser++;
	     if(isset($_SERVER['HTTP_PROFILE']))
	         $mobile_browser++;
	     $mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'],0,4));
	     $mobile_agents = array(
	         'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
	         'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
	         'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
	         'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
	         'newt','noki','oper','palm','pana','pant','phil','play','port','prox',
	         'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
	         'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
	         'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
	         'wapr','webc','winw','winw','xda','xda-'
	     );
	     if(in_array($mobile_ua, $mobile_agents))
	         $mobile_browser++;
	     if(strpos(strtolower($_SERVER['ALL_HTTP']), 'operamini') !== false)
	         $mobile_browser++;
	     // Pre-final check to reset everything if the user is on Windows
	     if(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'windows') !== false)
	         $mobile_browser=0;
	     // But WP7 is also Windows, with a slightly different characteristic
	     if(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'windows phone') !== false)
	         $mobile_browser++;
	     if($mobile_browser>0)
	         return true;
	     else
	         return false;
	 }
?>