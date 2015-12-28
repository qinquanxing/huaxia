<?php
	/*
	 * 功能： utf8 转  gbk(需iconv支持)
	 */
	function u2g($str){
		return iconv("UTF-8","GBK",$str);
	}
	/*
	 * 功能：gbk 转 utf8
	 */
	function g2u($str){
		return iconv("GBK","UTF-8",$str);
	}
	
	function nr($str){
		$str = str_replace(array("<nr/>","<rr/>"),array("\n","\r"),$str);
		return trim($str);
	}
	/*
	 * 功能：规则替换
	 */
	function getrole($str,$utf8){
		//$utf8=="gb2312" ? $str=g2u($str): $str;
		//$str = (0 == $utf8) ? g2u($str) : $str;
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
	function gifc( &$content)
	{
		//获取内容中图片
		//取得第一个匹配的图片路径
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

		function getbaseurl($baseurl,$url){
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
	function uh($str){
			$farr = array(                                                                                           //过滤多余的空白
				"/<(\/?)(script|i?frame|style|html|font|img|body|title|link|meta|a|pre|span|object|\?|\%)([^>]*?)>/isU", //过滤 <scrīpt 等可能引入恶意内容或恶意改变显示布局的代码,如果不需要插入flash等,还可以加入<object的过滤
				"/(<[^>]*)on[a-zA-Z]+\s*=([^>]*>)/isU",                                      //过滤javascrīpt的on事件
	
			);
			$tarr = array();
			$str = preg_replace( $farr,$tarr,$str);
			return $str;
		}
		function clsao($str){
			$farr = array("/<(\/?)(script|a|object|\?|\%)([^>]*?)>/isU", 
				"/(<[^>]*)on[a-zA-Z]+\s*=([^>]*>)/isU",                                      
	
			);
			$tarr = array();
			$str = preg_replace( $farr,$tarr,$str);
			return $str;
		}
	function ovovgetfile($purl){
		$hosturl=str_replace("http://","",$purl);
		$uuhost=explode("/",$hosturl);
		$chost=$uuhost[0];
		//设置header信息
	    $header[] = "Host:".$chost;
	    $header[] = "X-Requested-With: XMLHttpRequest";
	    $header[] = "Referer:".$purl;
		$header[]= 'Accept: image/gif, image/x-xbitmap, image/jpeg, image/pjpeg, application/x-shockwave-flash, text/html, * '. '/* ';  
		$header[]= 'Accept-Language: zh-cn ';  
		$header[]= 'User-Agent: Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727) ';  
		$header[]= 'Connection: Keep-Alive ';  
	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL,$purl);
	    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	    curl_setopt($ch, CURLOPT_GET, 1);
	   // curl_setopt($ch, CURLOPT_POSTFIELDS,$postData);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_REFERER, $referer); 
	  	$content= curl_exec($ch);
		if(FALSE == $content){$content=getfile($purl);}
		return $content;	
	}
	function getfile($url){
		$content = file_get_contents($url);
		if(FALSE == $content){
		//echo "ok";die;
			if (function_exists('curl_init')) {
				$curl = curl_init();
				curl_setopt($curl, CURLOPT_URL, $url);
				curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; U; Linux i686; zh-CN; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
				curl_setopt($curl, CURLOPT_HEADER, 0);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
				$tmpInfo = curl_exec($curl);
				curl_close($curl);
				if(FALSE !== stristr($tmpInfo,"HTTP/1.1 200 OK")){ //正确返回数据
					return $tmpInfo;
				}else{
					return FALSE;
				}
			}else{
				// Non-CURL based version...
				 /*
				  $context =
					array('http' =>
						  array('method' => 'GET',
								'header' => 'Content-type: application/x-www-form-urlencoded'."\r\n".
											'User-Agent: Mozilla/5.0 (X11; U; Linux i686; zh-CN; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5'."\r\n".
											'Content-length: 0'),
								'content' => ""));
				  $contextid=stream_context_create($context);
				  $sock=fopen($url, 'r', false, $contextid);
				  if ($sock) {
					$tmpInfo='';
					while (!feof($sock))
					  $tmpInfo.=fgets($sock, 4096);

					fclose($sock);
					return $tmpInfo;
				  }else{
					return FALSE;
				  }*/
				  return false;
			}
		}else{
			return $content;
		}
	}

	function postPage($url)
		{
		$response = "";
		$rd=rand(1,4);
		$proxy='http://221.214.27.253:808';
		if($rd==2) $proxy='http://222.77.14.56:8088';
		if($rd==3) $proxy='http://202.98.123.126:8080';
		if($rd==4) $proxy='http://60.14.97.38:8080';
		
		if($url != "") {
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		//curl_setopt($ch, CURLOPT_PROXY, $proxy);
		$response = curl_exec($ch);
		if(curl_errno($ch)) $response = "";
		curl_close($ch);
		}
		return $response;
		}
		
	function ovcolect_content($ruler,$charset,$bodys)//规则，字符，采集内容
		{
		$uu=explode("[OVOVSPR]",$ruler);
		$rulnums=count($uu);
		if($rulnums==1){
		$ruler=getrole($ruler,$charset);//字符编码
		preg_match("/".$ruler."/iU",$bodys,$bdtt);
		$bodys=$bdtt[1];
		}else{
			for($i=0;$i<$rulnums;$i++)
			{
				$ruler=getrole($uu[$i],$article['charset']);//字符编码
				$ruler?preg_match("/".$ruler."/iU",$bodys,$bdtt):"";
				$bodys=$bdtt[1];
			}
		}
		return ($bodys);
		}

	 function ovcolect_content_all($ruler,$charset,$bodys)//规则，字符，采集内容
		{
		$uu=explode("[OVOVSPR]",$ruler);
		$rulnums=count($uu);
		if($rulnums==1){
		$ruler=getrole($ruler,$charset);//字符编码
		preg_match_all("/".$ruler."/iU",$bodys,$bdtt);
		$bodys=$bdtt[1];
		}else{
			for($i=0;$i<$rulnums;$i++)
			{
				$ruler=getrole($uu[$i],$article['charset']);//字符编码
				$ruler?preg_match_all("/".$ruler."/iU",$bodys,$bdtt):"";
				$newbodys=getbaseurl($bdtt[1]);
				$bodys="";
				foreach($newbodys as $temp){
				$bodys.=$temp."{oovv}";
				}
			}
			$bodys=explode("{oovv}",rtrim($bodys,"{oovv}"));
		}
		return ($bodys);
		}
?>