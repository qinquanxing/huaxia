<?php
class ovov{
    //单条查询语句  需要查询的字段名称   表名   id字段名   id字段值   对应的栏目的字段的名称  对应的栏目的字段的值
	function dan($ziduan,$biaoming,$id,$tiaojian,$lmzd,$lmval){
		global $Db,$db_prefix;
		$ziduanstr=implode("`,`",$ziduan);
		$ziduanstr="`".$ziduanstr."`";
		$dan=$Db->Fetch($Db->ThisQuery("select ".$ziduanstr." from `".$db_prefix."$biaoming` where `$id`='".$tiaojian."'  and  `$lmzd`='".$lmval."'"));
		if(empty($dan['index_flash'])){
				$dan['index_littleflash']="img/none.jpg";
		 }
		return $dan;
	}
	//多条语句查询了
    function duo($ziduan,$biaoming,$id,$tiaojian){
		global $Db,$db_prefix;
		if(empty($orders)){$orders="";}
		$ziduanstr=implode("`,`",$ziduan);
		$ziduanstr="`".$ziduanstr."`";
		$duo=$Db->FetchAll("select ".$ziduanstr." from `".$db_prefix."$biaoming` where `$id`=".$tiaojian." "); 
		return $duo;
	}
	//多条语句查询了
    function channelduo($ziduan,$biaoming,$id,$tiaojian){
		global $Db,$db_prefix;
		if(empty($orders)){$orders="";}
		$ziduanstr=implode("`,`",$ziduan);
		$ziduanstr="`".$ziduanstr."`";
		//echo "select ".$ziduanstr." from `".$db_prefix."$biaoming` where `u_id`='".$tiaojian."'";die;
		$duo=$Db->FetchAll("select ".$ziduanstr." from `".$db_prefix."channel` where `$id`='".$tiaojian."' order by `channel_order`    asc");
		//print_r($expression);
		return $duo;
	}
   //flash+php图片上传
	function create_password($pw_length = 8)
{
    $randpwd = '';
    for ($i = 0; $i < $pw_length; $i++) 
    {
        $randpwd .= chr(mt_rand(33, 126));
    }
    return $randpwd;
} 
//$ovov->news($ziduan=array(),$sid,$cid,$id,$if_dan)
//字段数组  article_sid   article_cid   article_id   是否是单篇文章0,1
	function news($ziduan=array(),$shijian="Y-m-d",$sid,$num=1000000,$id){
		global $Db,$Base,$db_prefix,$web_wshtml;
		$ziduanstr=implode("`,`",$ziduan);
		$ziduanstr="`".$ziduanstr."`";
		$dannewssql="select  ".$ziduanstr.",`article_addtime`,`article_econtent`,`article_etitle`   from   `".$db_prefix."article`";
		$dannewssql.=" where  `is_locked`=0 ";
		if(!empty($id)){
		    $dannewssql.="         and `article_id`='".$id."' ";
		}else{
		 if(!empty($sid)){
			$dannewssql.="    and   `article_cid`='".$sid."'   and  `article_sid`=0   or  `is_locked`=0  and  `article_sid`='".$sid."'";
		  }
		}
		$dannewssql.=" order by `add_time` desc limit 0,1";
		$dannews=$Db->Fetch($Db->ThisQuery($dannewssql));
		$dannews['article_content']=stripslashes($dannews['article_content']);
		$dannews['article_addtime']=date($shijian,$dannews['article_addtime']);
		$dannews['article_content']=cut($dannews['article_content'],$num);
		//$dannews['article_encontent']=stripslashes($dannews['article_encontent']);
		return $dannews;
	}
//$ovov->liebiao($ziduan,3,0,0,2,$lianjie,$shijian);
//字段数组   article_sid   article_cid   在第几条开始  查询多少条  内容页链接  时间格式,$n=1表示标题截取，其他表示内容截取
	function liebiao($ziduan=array(),$sid,$num=0,$nums=20,$lianjie,$shijian,$connum=20,$n=0,$contnum=100,$m=0){
		global $Db,$Base,$db_prefix,$web_wshtml,$languagexz,$web_url;
		$articlearray=array(); 
		foreach($ziduan as $ziduanvalue){
			$ziduanarray[]="`".$ziduanvalue."`";
		}
		$ziduanstr=implode(",",$ziduanarray);
		if(!empty($ziduanstr)){$ziduanstr.=",";}
		$articlesql="select ".$ziduanstr."`article_id`,`article_sid`,`article_cid`,`jump_url_is_on`,`jump_url`,`article_content` from `".$db_prefix."article` where `is_locked`=0 ";
	    /*$sidsql="select `channel_id` from `".$db_prefix."channel` where `channel_root_id` in (".$sid.")";
		$channel=$Db->ThisQuery($sidsql);
		while($channelone=$Db->Fetch($channel)){
			$sid.=",".$channelone['channel_id'];
		}*/
        if(!empty($sid)){
			$articlesql.=" and  `article_cid` in (".$sid.")   or   `is_locked`=0    and  `article_sid` in (".$sid.") ";
	    }
		if(in_array('start_time',$ziduan)){
			$articlesql.="  order by  `start_time` asc ";
		}else{
			$articlesql.="  order by  `add_time` desc ";
			}
		 $articlesql.=" limit ".$num.",".$nums."";
		 $articleone_source=$Db->ThisQuery($articlesql);
		 while($articleone=$Db->Fetch($articleone_source)){
		     if($articleone['article_sid']==0){
	         $articleone['arcicle_url']=$web_wshtml=="open"?$lianjie."_".$articleone['article_id']."":$lianjie.".php?id=".$articleone['article_id'];}
			 else{ $articleone['arcicle_url']=$web_wshtml=="open"?$lianjie."_".$articleone['article_id']."":$lianjie.".php?id=".$articleone['article_id'];}
			if($articleone['jump_url_is_on']==1){
				$articleone['arcicle_url']=$articleone['jump_url'];
			}
			$articleone['ar_title']=$articleone['article_title'];//全名称
			//$articleone['add_time']=date($shijian,$articleone['add_time']);
			if(!empty($connum)){
				if($n==1){
					$articleone['article_title']=cut($articleone['article_title'],$connum);
				 }
					if(!empty($contnum)){
				     $articleone['article_content']=cut(strip_tags(trim($articleone['article_content'])),$contnum);
					}else{
						if(!empty($m)){
						 $articleone['article_content']=cut(strip_tags(trim($articleone['article_content'])),$contnum);
						} 
				 }
			}
			$articleone['article_content']=cut(strip_tags(trim($articleone['article_content'])),$contnum);
			if(!empty($articleone['start_time'])){
				$articleone['start_time']=date($shijian,$articleone['start_time']);
			}elseif(!empty($articleone['add_time'])){
					$articleone['add_time']=date($shijian,$articleone['add_time']);
			}
			if(empty($articleone['index_flash'])){
				$articleone['index_flash']="common/images/none.jpg";
			}  
			$articlearray[]=$articleone;
		}
		 return $articlearray;
	}
//钱范围列表
//$ovov->liebiao($ziduan,3,0,0,2,$lianjie,$shijian);
//字段数组  article_sid   article_cid   在第几条开始  查询多少条  内容页链接  时间格式,$n=1表示标题截取，其他表示内容截取
	function  biaozhiliebiao($ziduan=array(),$sid,$num,$nums,$lianjie,$shijian,$biaozhi,$connum,$zhou="",$chaxun="",$n,$contnum,$m){
		global $Db,$Base,$db_prefix,$web_wshtml,$languagexz;
		foreach($ziduan as $ziduanvalue){
			$ziduanarray[]="`".$ziduanvalue."`";
		}
		$ziduanstr=implode(",",$ziduanarray);
		if(!empty($ziduanstr)){$ziduanstr.=",";}
		$articlesql="select ".$ziduanstr."`article_id`,`article_sid`,`article_cid`,`jump_url_is_on`,`jump_url`,`article_state`,`article_addtime`  	from `".$db_prefix."article` where `is_locked`=0  and   `article_up`<".time()."";
	    $sidsql="select `channel_id` from `".$db_prefix."channel` where `channel_root_id` in (".$sid.")";
		$channel=$Db->ThisQuery($sidsql);
		while($channelone=$Db->Fetch($channel)){
			$sid.=",".$channelone['channel_id'];
		}
		if($biaozhi==1){
			$articlesql.=" and `tuition`<30000 ";
		}
		if($biaozhi==2){
			$articlesql.=" and `tuition`>30000 and `tuition`<40000 ";
		}
		if($biaozhi==3){
			$articlesql.=" and `tuition`>40000  and `tuition`<50000 ";
		}
		if($biaozhi==4){
			$articlesql.=" and `tuition`>50000   ";
		}
		 if(!empty($chaxun)){
			$articlesql.=" and   `article_title`  like  '%".$chaxun."%' ";
		} 
		if(!empty($zhou)){
			$articlesql.="  and  `article_zhou` =".intval($zhou)." ";
		} 
        if(!empty($sid)){
			$articlesql.=" and `article_sid` in (".$sid.") or `article_cid` in (".$sid.")";
		}
		  $articlesql.=" order by `shunxu` asc,`article_addtime` desc limit ".$num.",".$nums."";
		//echo $articlesql;die;
		$articleone_source=$Db->ThisQuery($articlesql);
		 while($articleone=$Db->Fetch($articleone_source)){
			 if($articleone['article_sid']==0){
	         $articleone['arcicle_url']=$web_wshtml=="open"?$lianjie."_".$articleone['article_id']."_".$articleone['article_cid']."":$lianjie.".php?id=".$articleone['article_id']."&sid=".$articleone['article_cid'];}
			 else{ $articleone['arcicle_url']=$web_wshtml=="open"?$lianjie."_".$articleone['article_id']."_".$articleone['article_sid']."":$lianjie.".php?id=".$articleone['article_id']."&sid=".$articleone['article_sid'];}
			if($articleone['jump_url_is_on']==1){
				$articleone['arcicle_url']=$articleone['jump_url'];
			}
			 $articleone['article_addtime']=date($shijian,$articleone['article_addtime']);
			if(!empty($connum)){
				if($n==1){
					$articleone['article_title']=cut($articleone['article_title'],$connum);
					
					}
					if(!empty($contnum)){
				$articleone['article_content']=cut(strip_tags($articleone['article_content']),$contnum);
					}else{
						if(!empty($m)){
							$articleone['article_content']=cut(strip_tags($articleone['article_content']),$contnum);
							} 
				        }
			}
			if(empty($articleone['index_flash'])){
				$articleone['index_flash']="img/none.jpg";
			}
			$articlearray[]=$articleone;
		}
		return $articlearray;
	}
	
	
	
	
	
	
	
	
	
	//$ovov->liebiao($ziduan,3,0,0,2,$lianjie,$shijian);
//字段数组  article_sid   article_cid   在第几条开始  查询多少条  内容页链接  时间格式,$n=1表示标题截取，其他表示内容截取
	function riqiliebiao($ziduan=array(),$sid,$num,$nums,$lianjie,$shijian,$connum,$n){
		global $Db,$Base,$db_prefix,$web_wshtml,$languagexz;
		foreach($ziduan as $ziduanvalue){
			$ziduanarray[]="`".$ziduanvalue."`";
		}
		$ziduanstr=implode(",",$ziduanarray);
		if(!empty($ziduanstr)){$ziduanstr.=",";}
		$articlesql="select ".$ziduanstr."`article_id`,`article_sid`,`article_cid`,`jump_url_is_on`,`jump_url`,`article_state`,`article_addtime` from `".$db_prefix."article` where `is_locked`=0  and   `article_up`<".time()."";
	    $sidsql="select `channel_id` from `".$db_prefix."channel` where `channel_root_id` in (".$sid.")";
		$channel=$Db->ThisQuery($sidsql);
		while($channelone=$Db->Fetch($channel)){
			$sid.=",".$channelone['channel_id'];
		}
        if(!empty($sid)){
			$articlesql.=" and `article_sid` in (".$sid.") or `article_cid` in (".$sid.")";
		}
		$articlesql.=" order by `article_addtime` desc limit ".$num.",".$nums."";
		//echo $articlesql;die;
		$articleone_source=$Db->ThisQuery($articlesql);
		 while($articleone=$Db->Fetch($articleone_source)){
			 if($articleone['article_sid']==0){
	         $articleone['arcicle_url']=$web_wshtml=="open"?$lianjie."_".$articleone['article_id']."_".$articleone['article_cid'].".htm":$lianjie.".php?id=".$articleone['article_id']."&sid=".$articleone['article_cid'];}
			 else{ $articleone['arcicle_url']=$web_wshtml=="open"?$lianjie."_".$articleone['article_id']."_".$articleone['article_sid'].".htm":$lianjie.".php?id=".$articleone['article_id']."&sid=".$articleone['article_sid'];}
			if($articleone['jump_url_is_on']==1){
				$articleone['arcicle_url']=$articleone['jump_url'];
			}
			if($_COOKIE['ertonglang']=="EN"){
				$articleone['article_title']=$articleone['article_etitle'];
				$articleone['article_content']=$articleone['article_econtent'];
				
				}
			$articleone['article_addtime']=date($shijian,$articleone['article_addtime']);
			$riqi=explode(",",$articleone['article_addtime']);
			$year=$riqi[0];
			$month=$riqi[1];
			switch($month){
				case "01":
				$month="一月";
				break;
				case "02":
			    $month="二月";
				break;
				case "03":
				$month="三月";
				break;
				case "04":
				$month="四月";
				break;
				case "05":
				$month="五月";
				break;
				case "06":
				$month="六月";
				break;
				case "07":
				$month="七月";
				break;
				case "08":
				$month="八月";
				break;
				case "09":
				$month="九月";
				break;
				case "10":
				$month="十月";
				break;
				case "11":
				$month="十一月";
				break;
				case "12":
				$month="十二月";
				break;
				}
			$day=$riqi[2];
			$articleone['article_addtime']=$year.", ".$month.", ".$day;
			if(!empty($connum)){
				if($n==1){
					$articleone['article_title']=cut($articleone['article_title'],$connum);
					
					}
				$articleone['article_content']=cut($articleone['article_content'],$connum);
			}
			if(empty($articleone['index_flash'])){
				$articleone['index_flash']="img/none.jpg";
			}
			$articlearray[]=$articleone;
		}
		return $articlearray;
	}
	//$ovov->liebiao($ziduan,3,0,0,2,$lianjie,$shijian);
//正序列表字段数组  article_sid   article_cid   在第几条开始  查询多少条  内容页链接  时间格式,$n=1表示标题截取，其他表示内容截取
	function zliebiao($ziduan=array(),$sid,$num,$nums,$lianjie,$shijian,$connum){
		global $Db,$Base,$db_prefix,$web_wshtml,$languagexz;
		foreach($ziduan as $ziduanvalue){
			$ziduanarray[]="`".$ziduanvalue."`";
		}
		$ziduanstr=implode(",",$ziduanarray);
		if(!empty($ziduanstr)){$ziduanstr.=",";}
		$articlesql="select ".$ziduanstr."`article_id`,`jump_url_is_on`,`jump_url`,`article_state`,`article_addtime` from `".$db_prefix."article` where `is_locked`=0  and   `article_up`<".time()."";
	    $sidsql="select `channel_id` from `".$db_prefix."channel` where `channel_root_id` in (".$sid.")";
		$channel=$Db->ThisQuery($sidsql);
		while($channelone=$Db->Fetch($channel)){
			$sid.=",".$channelone['channel_id'];
		}

		if(!empty($sid)){
			$articlesql.=" and `article_sid` in (".$sid.") or `article_cid` in (".$sid.")";
		}
		$articlesql.=" order by `article_addtime` desc limit ".$num.",".$nums."";
		//echo $articlesql;die;
		$articleone_source=$Db->ThisQuery($articlesql);
		
		
		
		while($articleone=$Db->Fetch($articleone_source)){
	         $articleone['arcicle_url']=$web_wshtml=="open"?$lianjie."_".$articleone['article_id'].".htm":$lianjie.".php?id=".$articleone['article_id'];
			if($articleone['jump_url_is_on']==1){
				$articleone['arcicle_url']=$articleone['jump_url'];
			}
			$articleone['article_addtime']=date($shijian,$articleone['article_addtime']);
			if(!empty($connum)){
				if($n==1){
					$articleone['article_title']=cut($articleone['article_title'],$connum);
					
					}
				$articleone['article_content']=cut($articleone['article_content'],$connum);
			}
			if(empty($articleone['index_flash'])){
				$articleone['index_flash']="img/none.jpg";
			}
			$articlearray[]=$articleone;
		}
		return $articlearray;
	}
	//留言列表   字段数组  article_sid   article_cid   在第几条开始  查询多少条  内容页链接  时间格式,$n=1表示标题截取，其他表示内容截取
	//字段数组  article_sid   article_cid   在第几条开始  查询多少条  内容页链接  时间格式,$n=1表示标题截取，其他表示内容截取
	function lyliebiao($ziduan=array(),$num,$nums,$lianjie,$shijian,$connum,$n){
		global $Db,$Base,$db_prefix,$web_wshtml,$languagexz;
		foreach($ziduan as $ziduanvalue){
			$ziduanarray[]="`".$ziduanvalue."`";
		}
		$ziduanstr=implode(",",$ziduanarray);
		if(!empty($ziduanstr)){$ziduanstr.=",";}
		$articlesql="select ".$ziduanstr."`content`,`id` from `".$db_prefix."liuyan`  ";
	    $articlesql.="  order by `time` desc limit ".$num.",".$nums."";
		//echo $articlesql;die;
		$articleone_source=$Db->ThisQuery($articlesql);
		while($articleone=$Db->Fetch($articleone_source)){
			$articleone['liuyan_url']=$web_wshtml=="open"?$lianjie."_".$articleone['id'].".htm":$lianjie.".php?id=".$articleone['id'];
		    $articleone['time']=date($shijian,$articleone['time']);
			if(!empty($connum)){
				if($n==1){
					$articleone['name']=cut($articleone['name'],$connum);
					 }
				$articleone['content']=cut(clhtml($articleone['content']),$connum);
			}
			$articlearray[]=$articleone;
		}
		return $articlearray;
	}
	//滚动列表
		function gundongliebiao($ziduan=array(),$sid,$num,$nums,$lianjie,$shijian,$connum,$n){
		global $Db,$Base,$db_prefix,$web_wshtml,$languagexz;
		foreach($ziduan as $ziduanvalue){
			$ziduanarray[]="`".$ziduanvalue."`";
		}
		$ziduanstr=implode(",",$ziduanarray);
		if(!empty($ziduanstr)){$ziduanstr.=",";}
		$articlesql="select ".$ziduanstr."`article_id`,`jump_url_is_on`,`jump_url`,`article_addtime` from `".$db_prefix."article` where `is_locked`=0 and `index_flash`!='' and `is_recommend`=1 ";
		$sidsql="select `channel_id` from `".$db_prefix."channel` where `channel_root_id` in (".$sid.")";
		$channel=$Db->ThisQuery($sidsql);
		while($channelone=$Db->Fetch($channel)){
			$sid.=",".$channelone['channel_id'];
		}
		if(!empty($sid)){
			$articlesql.=" and (`article_sid` in (".$sid.") or `article_cid` in (".$sid."))";
		}
		$articlesql.=" order by `article_addtime`  limit ".$num.",".$nums."";
		
		$articleone_source=$Db->ThisQuery($articlesql);
		while($articleone=$Db->Fetch($articleone_source)){
			$articleone['arcicle_url']=$web_wshtml=="open"?$lianjie."_".$articleone['article_id'].".htm":$lianjie.".php?id=".$articleone['article_id'];
			if($articleone['jump_url_is_on']==1){
				$articleone['arcicle_url']=$articleone['jump_url'];
			}
			$articleone['article_addtime']=date($shijian,$articleone['article_addtime']);
			if(!empty($connum)){
				if($n==1){
					$articleone['article_title']=cut(clhtml($articleone['article_title']),$connum);
					}
				$articleone['article_content']=cut(clhtml($articleone['article_content']),$connum);
			}
			$articlearray[]=$articleone;
		}
		return $articlearray;
	}
//促销活动
	function cxhdliebiao($ziduan=array(),$sid,$num,$nums,$lianjie,$shijian,$connum,$cuxiao,$remen,$shouwei){
		global $Db,$Base,$db_prefix,$web_wshtml,$languagexz;
		foreach($ziduan as $ziduanvalue){
			$ziduanarray[]="`".$ziduanvalue."`";
		}
		$ziduanstr=implode(",",$ziduanarray);
		if(!empty($ziduanstr)){$ziduanstr.=",";}
		$articlesql="select ".$ziduanstr."`article_id`,`jump_url_is_on`,`jump_url`,`article_addtime` from `".$db_prefix."article` where `is_locked`=0";
		$sidsql="select `channel_id` from `".$db_prefix."channel` where `channel_root_id` in (".$sid.")";
		$channel=$Db->ThisQuery($sidsql);
		while($channelone=$Db->Fetch($channel)){
			$sid.=",".$channelone['channel_id'];
		}

		if(!empty($sid)){
			$articlesql.=" and `article_sid` in (".$sid.") or `article_cid` in (".$sid.")";
		}
			$articlesql.=" and `is_headline`=".$cuxiao."";
			$articlesql.=" and `tuijian`=".$remen."";
			$articlesql.=" and `is_rolling`=".$shouwei."";
		$articlesql.=" order by `article_addtime` desc limit ".$num.",".$nums."";
		$articleone_source=$Db->ThisQuery($articlesql);
		while($articleone=$Db->Fetch($articleone_source)){
			$articleone['arcicle_url']=$web_wshtml=="open"?$lianjie."_".$articleone['article_id'].".htm":$lianjie.".php?id=".$articleone['article_id'];
			if($articleone['jump_url_is_on']==1){
				$articleone['arcicle_url']=$articleone['jump_url'];
			}
			$articleone['article_addtime']=date($shijian,$articleone['article_addtime']);
			if(!empty($connum)){
				$articleone['article_content']=cut(clhtml($articleone['article_content']),$connum);
			}
			if(empty($articleone['index_flash'])){
				$articleone['index_flash']="img/none.jpg";
			}
			$articlearray[]=$articleone;
		}
		return $articlearray;
	}
    //sql	
	function articlesql($sid){
		global $Db,$Base,$db_prefix,$web_wshtml,$languagexz;
		$articlesql="select `article_id` from `".$db_prefix."article` where `is_locked`=0";
		$sidsql="select `channel_id` from `".$db_prefix."channel` where `channel_root_id` in (".$sid.")";
		$channel=$Db->ThisQuery($sidsql);
		while($channelone=$Db->Fetch($channel)){
			$sid.=",".$channelone['channel_id'];
		}
        if(!empty($sid)){
			$articlesql.=" and `article_sid` in (".$sid.") or `article_cid` in (".$sid.")";
		}
		$articlesql.=" order by `article_addtime` desc";
		return $articlesql;
	}
//$ovov->madesort($ziduan,$cid);
//字段数组  搜索子栏目的父栏目的id
	function madesort($ziduan,$cid){
		global $Db,$Base,$db_prefix,$web_wshtml,$languagexz;
		$channel=$Db->Fetch($Db->ThisQuery("select `channel_type` from `".$db_prefix."channel` where `channel_id`=".$cid.""));
		if($channel['channel_type']==1){return;}
		$ziduanstr=implode("`,`",$ziduan);
		if(!empty($ziduanstr)){$ziduanstr="`".$ziduanstr."`,";}
		$channel_sortsql="select ".$ziduanstr."`channel_id`,`channel_urlname`,`if_zhuan_url` from `".$db_prefix."channel` where `channel_root_id`=".$cid." order by `channel_order`";
		$channel_sort=$Db->ThisQuery($channel_sortsql);
		while($channel_sortone=$Db->Fetch($channel_sort)){
			if($channel_sortone['if_zhuan_url']==1){
				$channel_sortone['channel_urlname']=$channel_sortone['channel_urlname'];
			}else{
				$channel_urlhtm=str_replace(".php","",$channel_sortone['channel_urlname']);
				$channel_sortone['channel_urlname']=$web_wshtml=="open"?$channel_urlhtm."_".$channel_sortone['channel_id'].".htm":$channel_sortone['channel_urlname']."?sid=".$channel_sortone['channel_id'];
			}
			$channel_sortarray[]=$channel_sortone;
		}
		return $channel_sortarray;
	}
//判断数字传值格式是否正确	
	function numberpd($id){
		global $web_wshtml;
		if(!isset($id)){
			$web_wshtml=="open"?header("location:index.htm"):header("location:index.php");
		}
		//判断是否是数字或数字字符串
		if(!is_numeric($id)){
			$Base->WarnBack('参数错误!');exit();
		}
	}
	
//父栏目
	function channelroot($ziduan,$sid){
		global $Db,$db_prefix;
		$ziduanstr=implode("`,`",$ziduan);
		$ziduanstr="`".$ziduanstr."`";
		$channelroot=$Db->Fetch($Db->ThisQuery("select ".$ziduanstr." from `".$db_prefix."channel` where `channel_id`=(select `channel_root_id` from `".$db_prefix."channel` where `channel_id`=".$sid.")"));
		return $channelroot;
	}
//单个栏目
	function channel($ziduan,$id){
		global $Db,$db_prefix,$web_wshtml;
		$ziduanstr=implode("`,`",$ziduan);
		$ziduanstr="`".$ziduanstr."`";
		$channel=$Db->Fetch($Db->ThisQuery("select ".$ziduanstr.",`channel_id`,`channel_urlname`,`if_zhuan_url` from `".$db_prefix."channel` where `channel_id`=".$id.""));
		if($channel['if_zhuan_url']==0){
			$channel_html_url=str_replace('.php','',$channel['channel_urlname']);
			$channel_html_url=$channel_html_url."_".$channel['channel_id'].".htm";
			$channel['channel_urlname']=$web_wshtml=="open"?$channel_html_url:$channel['channel_urlname']."?sid=".$channel['channel_id'];
		}
		return $channel;
	}
//子栏目id	
	function sortone($cid){
		global $Db,$db_prefix;
		$channel=$Db->Fetch($Db->ThisQuery("select `channel_id` from `".$db_prefix."channel` where `channel_root_id`=".$cid." order by `channel_order`"));
		if(empty($channel)){$channel['channel_id']=0;}
		return $channel['channel_id'];
	}
//子栏目  //左侧导航
	function sortonename($cid){
		global $Db,$db_prefix,$web_wshtml;
		$channelxiaox=$Db->FetchAll("select * from `".$db_prefix."channel` where `channel_root_id`=".$cid." and `channel_root_id`!=0   order by `channel_order`");
		
		foreach($channelxiaox as $keyxiao){
			if($keyxiao['if_zhuan_url']==1){
				
				$xiao_url=$keyxiao['channel_urlname'];
				}else{
			$xiao_urlname=$web_wshtml=="open"?str_replace(".php","",$keyxiao['channel_urlname']):$keyxiao['channel_urlname'];
			$xiao_url=$web_wshtml=="open"?$xiao_urlname."_".$keyxiao['channel_id'].".htm":$xiao_urlname."?sid=".$keyxiao['channel_id'];}
			 
			$channelxiao[]=array("channel_id"=>$keyxiao['channel_id'],"channel_root_id"=>$keyxiao['channel_root_id'],"if_zhuan_url"=>$keyxiao['if_zhuan_url'],"channel_name"=>$keyxiao['channel_name'],"channel_order"=>$keyxiao['channel_order'],"channel_hit"=>$keyxiao['channel_hit'],"channel_urlname"=>$keyxiao['channel_urlname'],'url'=>$xiao_url);
			}
			return $channelxiao;
		}
		
		
//二级导航1		
		function sortname($cid){
		global $Db,$db_prefix,$web_wshtml;
		$channelxiaox=$Db->FetchAll("select * from `".$db_prefix."channel` where `channel_id`=".$cid." and `channel_root_id`=0   order by `channel_order`");
		foreach($channelxiaox as $keyxiao){
			$xiao_urlname=$web_wshtml=="open"?str_replace(".php","",$keyxiao['channel_urlname']):$keyxiao['channel_urlname'];
			$xiao_url=$web_wshtml=="open"?$xiao_urlname."_".$keyxiao['channel_id'].".htm":$xiao_urlname."?sid=".$keyxiao['channel_id'];
			$channelxiao[]=array("channel_id"=>$keyxiao['channel_id'],"channel_root_id"=>$keyxiao['channel_root_id'],"if_zhuan_url"=>$keyxiao['if_zhuan_url'],"channel_name"=>$keyxiao['channel_name'],"channel_order"=>$keyxiao['channel_order'],"channel_hit"=>$keyxiao['channel_hit'],"channel_urlname"=>$keyxiao['channel_urlname'],'url'=>$xiao_url);
			}
			return $channelxiao;
		}
	//获取id的链接地址
	function curl($id){
		global $Db,$db_prefix,$web_wshtml;
		$chanel = $Db->FetchAll("SELECT * FROM `".$db_prefix."channel` WHERE `channel_id` = '".$id."'");
		if(!$chanel){
			return "";
		}
		foreach($chanel as $temp){
			$da_urlname=$web_wshtml=="open"?str_replace(".php","",$temp['channel_urlname']):$temp['channel_urlname'];
			$da_url=$web_wshtml=="open"?$da_urlname."_".$temp['channel_id'].".htm":$da_urlname."?sid=".$temp['channel_id'];
		}
		return $da_url;
	}

//头部产品菜单	
	function headroot($ziduan,$urlstr){
		global $Db,$db_prefix,$web_wshtml;
		$ziduanstr=implode("`,`",$ziduan);
		$ziduanstr="`".$ziduanstr."`";
		$headrootsql="select ".$ziduanstr.",`id` from `".$db_prefix."spfl` where `root_id`=0 and `ifxianshi`=1 order by `order`";
		$headroot=$Db->ThisQuery($headrootsql);
		while($headrootone=$Db->Fetch($headroot)){
			$headrootone['urlstr']=$web_wshtml=="open"?$urlstr."_".$headrootone['id'].".htm":$urlstr.".php?sid=".$headrootone['id']."";
			$headrootarray[]=$headrootone;
		}
		return $headrootarray;
	}
//产品列表	
	function yldcplist($ziduan,$urlstr,$sid,$order,$sx,$pp,$num,$nums){
		global $Db,$db_prefix,$web_wshtml;
		$ziduanstr=implode("`,`",$ziduan);
		$ziduanstr="`".$ziduanstr."`";
		$yldcpsql="select ".$ziduanstr.",`id` from `".$db_prefix."chanpin` where `ifxianshi`=1 and `cpfl`=".$sid."";
		if(!empty($pp)){
			$yldcpsql.=" and cppp=".$pp."";
		}
		if($Db->RowsAll("select `id` from `".$db_prefix."spfl` where `root_id`=".$sid."")!==0){//判断是否有子分类
			$sortid=$Db->ThisQuery("select `id` from `".$db_prefix."spfl` where `root_id`=".$sid."");
			$i=0;
			while($sortone=$Db->Fetch($sortid)){
				$sortidstr.=$i==0?$sortone['id']:",".$sortone['id'];
				$i++;
			}
			$yldcpsql.=" or `cpfl` in (".$sortidstr.")";
		}
		$yldcpsql.=" order by `".$order."`";
		if(!empty($sx)){
			$yldcpsql.=" desc";
		}
		$yldcpsql.=" limit ".$num.",".$nums."";
		$yldcp=$Db->ThisQuery($yldcpsql);
		while($yldcpone=$Db->Fetch($yldcp)){
			$yldcpone['urlstr']=$web_wshtml=="open"?$urlstr."_".$yldcpone['id'].".htm":$urlstr.".php?id=".$yldcpone['id']."";
			if(empty($yldcpone['cpimg'])){$yldcpone['cpimg']="img/none.jpg";}
			$yldcparray[]=$yldcpone;
		}
		return $yldcparray;
	}	
//产品列表页面title
	function cplisttitle($sid){
		global $Db,$db_prefix,$web_wshtml;
		$titlea=$Db->Fetch($Db->ThisQuery("select `root_id`,`name` from `".$db_prefix."spfl` where `id`=".$sid.""));
		$title=$titlea['name']."_";
		if($titlea['root_id']!==0){
			$titleb=$Db->Fetch($Db->ThisQuery("select `name` from `".$db_prefix."spfl` where `id`=".$titlea['root_id'].""));
			$title.=$titleb['name'];
		}
		return $title;
	}
//产品列表页面当前位置
	function cplistdqwz($sid,$urlstr){
		global $Db,$db_prefix,$web_wshtml;
		$titlea=$Db->Fetch($Db->ThisQuery("select `id`,`root_id`,`name` from `".$db_prefix."spfl` where `id`=".$sid.""));
			if($web_wshtml=="open"){//判断伪静态
				$title=" > <a href=\"".$urlstr."_sid=".$titlea['id'].".htm\">".$titlea['name']."</a>";
			}else{
				$title=" > <a href=\"".$urlstr.".php?sid=".$titlea['id']."\">".$titlea['name']."</a>";}
		if(!empty($titlea['root_id'])){
			$titleb=$Db->Fetch($Db->ThisQuery("select `id`,`name` from `".$db_prefix."spfl` where `id`=".$titlea['root_id'].""));
				if($web_wshtml=="open"){//判断伪静态
					$title=" > <a href=\"".$urlstr."_sid=".$titleb['id'].".htm\">".$titleb['name']."</a>".$title;
				}else{
					$title=" > <a href=\"".$urlstr.".php?sid=".$titleb['id']."\">".$titleb['name']."</a>".$title;
				}
		}
		if($web_wshtml=="open"){//判断伪静态
			$title="<a href=\"index.htm\">五星健康商城</a>".$title;
		}else{
			$title="<a href=\"index.php\">五星健康商城</a>".$title;
		}
		return $title;
	}
//左侧产品菜单	
	function leftroot($ziduan,$urlstr){
		global $Db,$db_prefix,$web_wshtml;
		$ziduanstr=implode("`,`",$ziduan);
		$ziduanstr="`".$ziduanstr."`";
		$headrootsql="select ".$ziduanstr.",`id` from `".$db_prefix."spfl` where `root_id`=0 and `ifxianshi`=1 order by `order`";
		$headroot=$Db->ThisQuery($headrootsql);
		while($headrootone=$Db->Fetch($headroot)){
			$headrootone['urlstr']=$web_wshtml=="open"?$urlstr."_".$headrootone['id'].".htm":$urlstr.".php?sid=".$headrootone['id']."";
			//子分类
			$sort=$Db->ThisQuery("select ".$ziduanstr.",`id` from `".$db_prefix."spfl` where `root_id`=".$headrootone['id']." and `ifxianshi`=1 order by `order`");
			while($sortone=$Db->Fetch($sort)){
				$sortone['urlstr']=$web_wshtml=="open"?$urlstr."_".$sortone['id'].".htm":$urlstr.".php?sid=".$sortone['id']."";
				$headrootone['sort'][]=$sortone;
			}
			$headrootarray[]=$headrootone;
		}
		return $headrootarray;
	}
//单个产品查找
	function yldchanpin($ziduan,$id,$nums,$xiaojia){
		global $Db,$db_prefix,$web_wshtml,$Base;
		$ziduanstr=implode("`,`",$ziduan);
		$ziduanstr="`".$ziduanstr."`";
		$chanpinsql="select ".$ziduanstr." from `".$db_prefix."chanpin` where `id`=".$id." and `ifxianshi`=1  ";
		
		$chanpin=$Db->Fetch($Db->ThisQuery($chanpinsql));
		if(!empty($chanpin['cppp'])){
			$cppp=$Db->Fetch($Db->ThisQuery("select `name` from `".$db_prefix."ppfl` where `id`=".$chanpin['cppp'].""));
			$chanpin['cppp']=$cppp['name'];
		}
		if(empty($chanpin['tuanimg'])){
			$chanpin['tuanimg']="img/none.jpg";
		}
		if(!empty($chanpin['tuanriqi'])){
			$chanpin['tuanriqi']=date("m/d/Y H:i:s",$chanpin['tuanriqi']);
		}
		$Db->ThisQuery("update `".$db_prefix."chanpin` set `hit`=hit+1 where `id`=".$id."");
		return $chanpin;
	}	
//商品所在位置
	function cpszwz($id,$cpurlstr,$listurlstr){
		global $Db,$db_prefix,$web_wshtml;
		$chanpin=$Db->Fetch($Db->ThisQuery("select `id`,`name`,`cpfl` from `".$db_prefix."chanpin` where `id`=".$id.""));
		if($web_wshtml=="open"){
			$chanpinszwz=" > <a href=\"".$cpurlstr."_".$chanpin['id'].".htm\">".$chanpin['name']."</a>";
		}else{
			$chanpinszwz=" > <a href=\"".$cpurlstr.".php?id=".$chanpin['id']."\">".$chanpin['name']."</a>";
		}
		$listszwz=$this->cplistdqwz($chanpin['cpfl'],$listurlstr);
		$chanpinszwz=$listszwz.$chanpinszwz;
		return $chanpinszwz;
	}
//商品title
	function cptitle($id){
		global $Db,$db_prefix,$web_wshtml;
		$chanpin=$Db->Fetch($Db->ThisQuery("select `name`,`cpfl` from `".$db_prefix."chanpin` where `id`=".$id.""));
		$chanpinszwz=$chanpin['name']."_";
		$listszwz=$this->cplisttitle($chanpin['cpfl']);
		$chanpinszwz=$chanpinszwz.$listszwz;
		return $chanpinszwz;
	}
//产品相册一个
	function xiangceone($id){
		global $Db,$db_prefix;
		$xiangceone=$Db->Fetch($Db->ThisQuery("select `imgurl` from `".$db_prefix."xiangce` where `cpid`=".$id." order by `id` limit 0,1"));
		return $xiangceone;
	}
//产品相册
	function xiangce($id,$type){
		global $Db,$db_prefix;
		$xiangce=$Db->FetchAll("select `imgurl` from `".$db_prefix."xiangce` where `cpid`=".$id." and `imgtype`=".$type." order by `id`");
		return $xiangce;
	}
	
//关联套餐
	function guanlian($ziduan,$id,$urlstr){
		global $Db,$db_prefix,$web_wshtml;
		$chanpin=$Db->Fetch($Db->ThisQuery("select `guanlian` from `".$db_prefix."chanpin` where `id`=".$id.""));
		if(!empty($chanpin['guanlian'])){
			$ziduanstr=implode("`,`",$ziduan);
			$ziduanstr="`".$ziduanstr."`";
			$yldcpsql="select ".$ziduanstr.",`id` from `".$db_prefix."chanpin` where `ifxianshi`=1 and `id` in (".$chanpin['guanlian'].") order by `addshijian` desc";
			$yldcp=$Db->ThisQuery($yldcpsql);
			while($yldcpone=$Db->Fetch($yldcp)){
				$yldcpone['urlstr']=$web_wshtml=="open"?$urlstr."_".$yldcpone['id'].".htm":$urlstr.".php?id=".$yldcpone['id']."";
				if(empty($yldcpone['cpimg'])){$yldcpone['cpimg']="img/none.jpg";}
				$yldcparray[]=$yldcpone;
			}
			return $yldcparray;
		}
	}
	
//套餐价格
	function taocanjia($id){
		global $Db,$db_prefix;
		$chanpin=$Db->Fetch($Db->ThisQuery("select `huiyuanjia`,`taocanjia`,`guanlian` from `".$db_prefix."chanpin` where `id`=".$id.""));
		$taocanjia['yuan']=$chanpin['huiyuanjia'];
		$taocanjia['tao']=$chanpin['taocanjia'];
		if(!empty($chanpin['guanlian'])){
			$yldcpsql="select `huiyuanjia`,`taocanjia` from `".$db_prefix."chanpin` where `ifxianshi`=1 and `id` in (".$chanpin['guanlian'].")";
			$yldcp=$Db->ThisQuery($yldcpsql);
			while($yldcpone=$Db->Fetch($yldcp)){
				$taocanjia['yuan']=$taocanjia['yuan']+$yldcpone['huiyuanjia'];
				$taocanjia['tao']=$taocanjia['tao']+$yldcpone['taocanjia'];
			}
			return $taocanjia;
		}
	}	
	
//省、市、区、县       表名   指定字段  指定字段
	function ssqx($datestr,$ziduan,$orderstr){
		global $Db,$db_prefix;
		$ziduanstr=implode("`,`",$ziduan);
		$ziduanstr="`".$ziduanstr."`";
		$ssqxsql="select ".$ziduanstr." from `".$db_prefix.$datestr."` order by `".$orderstr."`";
		$ssqx=$Db->FetchAll($ssqxsql);
		return $ssqx;
	}
//支付方式
	function zffs($ziduan){
		global $Db,$db_prefix;
		$ziduanstr=implode("`,`",$ziduan);
		$ziduanstr="`".$ziduanstr."`";
		$zffs=$Db->ThisQuery("select ".$ziduanstr.",`id` from `".$db_prefix."zffs` where `root`=0 order by `order`");
		while($zffsone=$Db->Fetch($zffs)){
			$psfs=$Db->FetchAll("select ".$ziduanstr." from `".$db_prefix."zffs` where `root`=".$zffsone['id']." and `root`!=0 order by `order`");
			$zffsone['psfs']=$psfs;
			$zffsarray[]=$zffsone;
		}
		return $zffsarray;
	}	
//文章列表页title
	function channeltitle($id){
		global $Db,$Base,$db_prefix,$web_wshtml,$languagexz;
		$channelyi=$Db->Fetch($Db->ThisQuery("select `channel_name`,`channel_root_id` from `".$db_prefix."abcdata` where `channel_id`=".$id.""));
		if (!empty($id)) {
			$title=$channelyi['channel_name']."_";
		}		 
		//for($i=1;$i<$nums;$i++){
			$channelyi=$Db->Fetch($Db->ThisQuery("select `channel_name`,`channel_root_id` from `".$db_prefix."abcdata` where `channel_id`=".$channelyi['channel_root_id'].""));
			$title.=$channelyi['channel_name']."_";
		//}
		return $title;
	}
	//查找id的cid
		function channelrootid($id){
		global $Db,$Base,$db_prefix,$web_wshtml,$languagexz;
		$channelyi=$Db->Fetch($Db->ThisQuery("select `channel_id`,`channel_name`,`channel_root_id` from `".$db_prefix."abcdata` where `channel_id`=".$id.""));
		$daid=$channelyi['channel_root_id'];
		if($daid==0){$daid=$channelyi['channel_id'];}
		//for($i=1;$i<$nums;$i++){
			$channelyi=$Db->Fetch($Db->ThisQuery("select `channel_id`,`channel_name`,`channel_root_id` from `".$db_prefix."abcdata` where `channel_id`=".$channelyi['channel_root_id'].""));
			$daid=$channelyi['channel_id'];
		//}
		return $daid;
	}
//查找id的上级id
		function  rootid($id){
		global $Db,$Base,$db_prefix,$web_wshtml,$languagexz;
		$channelyi=$Db->Fetch($Db->ThisQuery("select `channel_id`,`channel_name`,`channel_root_id` from `".$db_prefix."channel` where `channel_id`=".$id.""));
		 $daid=$channelyi['channel_root_id'];
		return $daid;
	}
//文章页title
	function articletitle($id){
		global $Db,$Base,$db_prefix,$web_wshtml,$languagexz;
		$article=$Db->Fetch($Db->ThisQuery("select `article_title`,`article_sid`,`article_cid` from `".$db_prefix."article` where `article_id`=".$id.""));
		if(empty($article['article_sid'])){$article['article_sid']=$article['article_cid'];}
		$title=$this->channeltitle($article['article_sid']);
		$title=$article['article_title']."_".$title;
		return $title;
	}
//文章页所在位置
	//文章页所在位置
	function channelszwz($id){
		global $Db,$Base,$db_prefix,$web_wshtml,$languagexz;
		$channelyi=$Db->Fetch($Db->ThisQuery("select `channel_id`,`channel_name`,`channel_ename`,`channel_root_id`,`channel_urlname` from `".$db_prefix."abcdata` where `channel_id`=".$id.""));
	    $channelyi_html_url=str_replace('.php','',$channelyi['channel_urlname']);
		$channelyi_html_url=$channelyi_html_url."_".$channelyi['channel_id'];
		$channelyi['channel_urlname']=$web_wshtml=="open"?$channelyi_html_url:$channelyi['channel_urlname']."?sid=".$channelyi['channel_id'];
		$title=" > <a href=\"".$channelyi['channel_urlname']."\">".$channelyi['channel_name']."</a>";
		for($i=1;$i<2;$i++){
			$channelyi=$Db->Fetch($Db->ThisQuery("select `channel_id`,`channel_name`,`channel_ename`,`channel_root_id`,`channel_urlname` from `".$db_prefix."abcdata` where `channel_id`=".$channelyi['channel_root_id']."")); 
		    $channelyi_html_url=str_replace('.php','',$channelyi['channel_urlname']);
			$channelyi_html_url=$channelyi_html_url."_".$channelyi['channel_id'];
			$channelyi['channel_urlname']=$web_wshtml=="open"?$channelyi_html_url:$channelyi['channel_urlname']."?sid=".$channelyi['channel_id'];
			$channelyi['channel_name']=isset($channelyi['channel_name'])?$channelyi['channel_name']:'';
		    $title=" > <a href=\"".$channelyi['channel_urlname']."\">".$channelyi['channel_name']."</a>".$title;
		}
		return $title;
    }
//文章内容页所在位置
	function articleszwz($id,$urlstr){
		global $Db,$Base,$db_prefix,$web_wshtml;
		$article=$Db->Fetch($Db->ThisQuery("select `article_id`,`article_title`,`article_sid`,`article_cid` from `".$db_prefix."article` where `article_id`=".$id.""));
		if(empty($article['article_sid'])){$article['article_sid']=$article['article_cid'];}
		$szwz=$this->channelszwz($article['article_sid']);
		if($web_wshtml=="open"){
			$szwz=$szwz." > <a href=\"".$urlstr."_=".$article['article_id'].".htm\">".$article['article_title']."</a>";
		}else{
		$szwz=$szwz." > <a href=\"".$urlstr.".php?id=".$article['article_id']."\">".$article['article_title']."</a>";}
		return $szwz;
	}

	
//随机搜索产品
	function yldsjcplist($ziduan,$urlstr,$num,$nums){
		global $Db,$db_prefix,$web_wshtml;
		$ziduanstr=implode("`,`",$ziduan);
		$ziduanstr="`".$ziduanstr."`";
		$yldcpsql="select ".$ziduanstr.",`id` from `".$db_prefix."chanpin` where `ifxianshi`=1";
//		if(!empty($pp)){
//			$yldcpsql.=" and cppp=".$pp."";
//		}
//		if($Db->RowsAll("select `id` from `".$db_prefix."spfl` where `root_id`=".$sid."")!==0){//判断是否有子分类
//			$sortid=$Db->ThisQuery("select `id` from `".$db_prefix."spfl` where `root_id`=".$sid."");
//			$i=0;
//			while($sortone=$Db->Fetch($sortid)){
//				$sortidstr.=$i==0?$sortone['id']:",".$sortone['id'];
//				$i++;
//			}
//			$yldcpsql.=" or `cpfl` in (".$sortidstr.")";
//		}
		$yldcpsql.=" order by rand()";
		//if(!empty($sx)){
//			$yldcpsql.=" desc";
//		}
		$yldcpsql.=" limit ".$num.",".$nums."";
		$yldcp=$Db->ThisQuery($yldcpsql);
		while($yldcpone=$Db->Fetch($yldcp)){
			$yldcpone['urlstr']=$web_wshtml=="open"?$urlstr."_".$yldcpone['id'].".htm":$urlstr.".php?id=".$yldcpone['id']."";
			if(empty($yldcpone['cpimg'])){$yldcpone['cpimg']="img/none.jpg";}
			$yldcparray[]=$yldcpone;
		}
		return $yldcparray;
	}	
//最受关注
	function yldzsgzcplist($ziduan,$urlstr,$num,$nums){
		global $Db,$db_prefix,$web_wshtml;
		$ziduanstr=implode("`,`",$ziduan);
		$ziduanstr="`".$ziduanstr."`";
		$yldcpsql="select ".$ziduanstr.",`id` from `".$db_prefix."chanpin` where `ifxianshi`=1";
		$yldcpsql.=" order by `hit` desc";
		$yldcpsql.=" limit ".$num.",".$nums."";
		$yldcp=$Db->ThisQuery($yldcpsql);
		while($yldcpone=$Db->Fetch($yldcp)){
			$yldcpone['urlstr']=$web_wshtml=="open"?$urlstr."_".$yldcpone['id'].".htm":$urlstr.".php?id=".$yldcpone['id']."";
			if(empty($yldcpone['cpimg'])){$yldcpone['cpimg']="img/none.jpg";}
			$yldcparray[]=$yldcpone;
		}
		return $yldcparray;
	}	
//销量
	function yldxlcplist($ziduan,$urlstr,$num,$nums){
		global $Db,$db_prefix,$web_wshtml;
		$ziduanstr=implode("`,`",$ziduan);
		$ziduanstr="`".$ziduanstr."`";
		$yldcpsql="select ".$ziduanstr.",`id` from `".$db_prefix."chanpin` where `ifxianshi`=1";
		$yldcpsql.=" order by `xiaoliang` desc";
		$yldcpsql.=" limit ".$num.",".$nums."";
		$yldcp=$Db->ThisQuery($yldcpsql);
		while($yldcpone=$Db->Fetch($yldcp)){
			$yldcpone['urlstr']=$web_wshtml=="open"?$urlstr."_".$yldcpone['id'].".htm":$urlstr.".php?id=".$yldcpone['id']."";
			if(empty($yldcpone['cpimg'])){$yldcpone['cpimg']="img/none.jpg";}
			$yldcparray[]=$yldcpone;
		}
		return $yldcparray;
	}	
//时间
	function yldtimecplist($ziduan,$urlstr,$num,$nums,$connum){
		global $Db,$db_prefix,$web_wshtml;
		$ziduanstr=implode("`,`",$ziduan);
		$ziduanstr="`".$ziduanstr."`";
		$yldcpsql="select ".$ziduanstr.",`id` from `".$db_prefix."chanpin` where `ifxianshi`=1";
		$yldcpsql.=" order by `addshijian` desc";
		$yldcpsql.=" limit ".$num.",".$nums."";
		$yldcp=$Db->ThisQuery($yldcpsql);
		while($yldcpone=$Db->Fetch($yldcp)){
			$yldcpone['urlstr']=$web_wshtml=="open"?$urlstr."_".$yldcpone['id'].".htm":$urlstr.".php?id=".$yldcpone['id']."";
			if(empty($yldcpone['cpimg'])){$yldcpone['cpimg']="img/none.jpg";}
			if(!empty($connum)){
				$yldcpone['cpjj']=cut(clhtml($yldcpone['cpjj']),$connum);
			}
			$yldcparray[]=$yldcpone;
		}
		return $yldcparray;
	}
	//热门品牌
	function yldppfl($ziduan,$urlstr,$num,$nums){
		global $Db,$db_prefix,$web_wshtml;
		$ziduanstr=implode("`,`",$ziduan);
		$ziduanstr="`".$ziduanstr."`";
		$yldcpsql="select ".$ziduanstr.",`id` from `".$db_prefix."ppfl` where `isremen`=1";
		$yldcpsql.=" order by `id` desc";
		$yldcpsql.=" limit ".$num.",".$nums."";
		$yldcp=$Db->ThisQuery($yldcpsql);
		while($yldcpone=$Db->Fetch($yldcp)){
			$yldcpone['urlstr']=$web_wshtml=="open"?$urlstr."_".$yldcpone['id'].".htm":$urlstr.".php?id=".$yldcpone['id']."";
			if(empty($yldcpone['pinpailogo'])){$yldcpone['pinpailogo']="img/none.jpg";}
			
			$yldcparray[]=$yldcpone;
		}
		return $yldcparray;
	}
	//热卖推荐
	function yldrmtjlist($ziduan,$urlstr,$num,$nums){
		global $Db,$db_prefix,$web_wshtml;
		$ziduanstr=implode("`,`",$ziduan);
		$ziduanstr="`".$ziduanstr."`";
		$yldcpsql="select ".$ziduanstr.",`id` from `".$db_prefix."chanpin` where `ifxianshi`=1 and `ifhottoday`=1";
		$yldcpsql.=" order by `id` desc";
		$yldcpsql.=" limit ".$num.",".$nums."";
		$yldcp=$Db->ThisQuery($yldcpsql);
		while($yldcpone=$Db->Fetch($yldcp)){
			$yldcpone['urlstr']=$web_wshtml=="open"?$urlstr."_".$yldcpone['id'].".htm":$urlstr.".php?id=".$yldcpone['id']."";
			if(empty($yldcpone['cpimg'])){$yldcpone['cpimg']="img/none.jpg";}
			$yldcparray[]=$yldcpone;
		}
		return $yldcparray;
	}	
	//品牌精选
	function yldppjxlist($ziduan,$urlstr,$num,$nums){
		global $Db,$db_prefix,$web_wshtml;
		$ziduanstr=implode("`,`",$ziduan);
		$ziduanstr="`".$ziduanstr."`";
		$yldcpsql="select ".$ziduanstr.",`id` from `".$db_prefix."chanpin` where `ifxianshi`=1 and `ifppjx`=1";
		$yldcpsql.=" order by `id` desc";
		$yldcpsql.=" limit ".$num.",".$nums."";
		$yldcp=$Db->ThisQuery($yldcpsql);
		while($yldcpone=$Db->Fetch($yldcp)){
			$yldcpone['urlstr']=$web_wshtml=="open"?$urlstr."_".$yldcpone['id'].".htm":$urlstr.".php?id=".$yldcpone['id']."";
			if(empty($yldcpone['cpimg'])){$yldcpone['cpimg']="img/none.jpg";}
			$yldcparray[]=$yldcpone;
		}
		return $yldcparray;
	}	
	//今日热卖榜
	function yldrmbanglist($ziduan,$urlstr,$num,$nums){
		global $Db,$db_prefix,$web_wshtml;
		$ziduanstr=implode("`,`",$ziduan);
		$ziduanstr="`".$ziduanstr."`";
		$yldcpsql="select ".$ziduanstr.",`id` from `".$db_prefix."chanpin` where `ifxianshi`=1 and `ifhottoday`=1";
		$yldcpsql.=" order by `id` desc";
		$yldcpsql.=" limit ".$num.",".$nums."";
		$yldcp=$Db->ThisQuery($yldcpsql);
		while($yldcpone=$Db->Fetch($yldcp)){
			$yldcpone['urlstr']=$web_wshtml=="open"?$urlstr."_".$yldcpone['id'].".htm":$urlstr.".php?id=".$yldcpone['id']."";
			if(empty($yldcpone['cpimg'])){$yldcpone['cpimg']="img/none.jpg";}
			$yldcparray[]=$yldcpone;
		}
		return $yldcparray;
	}	
	//品牌保健品排行榜
	function yldppbjlist($ziduan,$urlstr,$num,$nums){
		global $Db,$db_prefix,$web_wshtml;
		$ziduanstr=implode("`,`",$ziduan);
		$ziduanstr="`".$ziduanstr."`";
		$yldcpsql="select ".$ziduanstr.",`id` from `".$db_prefix."chanpin` where `ifxianshi`=1 and `ifpplist`=1";
		$yldcpsql.=" order by `id` desc";
		$yldcpsql.=" limit ".$num.",".$nums."";
		$yldcp=$Db->ThisQuery($yldcpsql);
		while($yldcpone=$Db->Fetch($yldcp)){
			$yldcpone['urlstr']=$web_wshtml=="open"?$urlstr."_".$yldcpone['id'].".htm":$urlstr.".php?id=".$yldcpone['id']."";
			if(empty($yldcpone['cpimg'])){$yldcpone['cpimg']="img/none.jpg";}
			$yldcparray[]=$yldcpone;
		}
		return $yldcparray;
	}	

	
	
//团购产品
	function yldtuanlist($ziduan,$urlstr,$rmtuan){
		global $Db,$db_prefix,$web_wshtml;
		$ziduanstr=implode("`,`",$ziduan);
		$ziduanstr="`".$ziduanstr."`";
		$yldcpsql="select ".$ziduanstr.",`id` from `".$db_prefix."chanpin` where `ifxianshi`=1 and `istuangou`=1 ";
		if(!empty($rmtuan)){
			$yldcpsql.=" and `rmtuan`=1";
		}
		$yldcpsql.=" order by `tuanjianshu` desc";
		
		$yldcp=$Db->ThisQuery($yldcpsql);
		while($yldcpone=$Db->Fetch($yldcp)){
			$yldcpone['urlstr']=$web_wshtml=="open"?$urlstr."_".$yldcpone['id'].".htm":$urlstr.".php?id=".$yldcpone['id']."";
			if(empty($yldcpone['tuanimg'])){$yldcpone['tuanimg']="img/none.jpg";}
			$yldcpone['tuangoujia']=$yldcpone['shichangjia']*$yldcpone['tuangouzhe'];
			$yldcpone['tuanriqi']=date("m/d/Y H:i:s",$yldcpone['tuanriqi']);
			$yldcparray[]=$yldcpone;
		}
		return $yldcparray;
	}
	//字段数组  article_sid   article_cid   article_id   是否是单篇文章0,1,cunum表示截取内容的长度
//截取内容的单篇文章

	function cutnews($ziduan=array(),$sid,$shijian,$cunum){
		global $Db,$Base,$db_prefix,$web_wshtml;
		$ziduanstr=implode("`,`",$ziduan);
		$ziduanstr="`".$ziduanstr."`";
		$dannewssql="select ".$ziduanstr." from `".$db_prefix."article`";
		$dannewssql.=" where `is_locked`=0 and `index_flash`!=''";
		if(!empty($sid)){
			$dannewssql.=" and `article_sid` in (".$sid.") or `article_cid` in (".$sid.") or `article_id` in (".$sid.") order by `add_time` desc limit 0,1";
		}
		//echo $dannewssql;die;
		$dannews=$Db->Fetch($Db->ThisQuery($dannewssql));
		if($dannews){
		$dannews['article_addtime']=date($shijian,$dannews['article_addtime']);
		$dannews['article_content']=cut(stripslashes($dannews['article_content']),$cunum);
		return $dannews;}
		
	}
//判断单页，列表页
	function ctype($sid){
	global $Db,$Base,$db_prefix,$web_wshtml;
	$dan_sql=$Db->Fetch($Db->ThisQuery("select `channel_id`,`channel_type`,`channel_name` from `".$db_prefix."channel` where channel_id=".$sid.""));
	if(!$dan_sql){
			return "";
		}
	$dan=$dan_sql['channel_type'];
	return $dan;
	}
	
	//判断是否开启转向链接
	function iszhuan($sid){
	global $Db,$Base,$db_prefix,$web_wshtml;
	$zhuan_sql=$Db->Fetch($Db->ThisQuery("select `article_id`,`jump_url` from `".$db_prefix."article` where `article_sid`=".$sid.""));
	if(!$zhuan_sql){
			return "";
		}
	$zhuan=$zhuan_sql['jump_url'];
	return $zhuan;
	}

	//判断是否有子栏目
	function iszilm($sid){
	global $Db,$Base,$db_prefix,$web_wshtml;
	$lm_sql=$Db->Fetch($Db->ThisQuery("select `channel_id`,`channel_type`,`channel_name` from `".$db_prefix."channel` where channel_root_id=".$sid.""));
	if(!$lm_sql){
		return "";
		}
	$lm=$lm_sql['channel_id'];
	return $lm;
	}
	
	function pagelists($ziduan){
		global $Db,$Base,$db_prefix,$web_wshtml;
		$page_sql="select * from `".$db_prefix."doc` where `if_del`=0";
		if(!empty($ziduan)){
			$page_sql.=" and `".$ziduan."`=1";
			}
		$page=$_GET['page'];
		if(empty($page)){$page=1;}
		$total=$Db->RowsAll($page_sql);
		$pageno=intval($_REQUEST['page']);
		if($pageno==0||$pageno<0)$pageno=1;
		$per=10;//每页记录数
		$page_num=ceil($total/$per);
		$pagelist=Pagination($total, $per, $page);
		$page_sql.=" order by `id` LIMIT ".($page-1)*$per.",".$per."";
		$presult=$Db->FetchAll($page_sql);
		return $presult;
		}
//root_id的小类		
	function xiaolei($ziduan,$root_id,$num,$nums){
		global $Db,$Base,$db_prefix,$web_wshtml;
		foreach($ziduan as $ziduanvalue){
			$ziduanarray[]="`".$ziduanvalue."`";
		}
		$ziduanstr=implode(",",$ziduanarray);
		if(!empty($ziduanstr)){$ziduanstr.=",";}
		$xlsql=$Db->FetchAll("select ".$ziduanstr."`channel_urlname`,`channel_name`,`channel_root_id` from `".$db_prefix."channel` where `channel_root_id`=".$root_id." order by `channel_order` limit ".$num.",".$nums."");
		foreach($xlsql as $keyname){
			$xl_urlname=$web_wshtml=="open"?str_replace(".php","",$keyname['channel_urlname']):$keyname['channel_urlname'];
			$xl_url=$web_wshtml=="open"?$xl_urlname."_".$keyname['channel_id'].".htm":$xl_urlname."?sid=".$keyname['channel_id'];
			$xiaoleis[]=array("channel_root_id"=>$keyname['channel_root_id'],'channel_name'=>$keyname['channel_name'],'url'=>$xl_url);
			}
			
		return $xiaoleis;
		}
		//是否设为头条
	function toutiao($ziduan=array(),$sid,$urlstr,$cunum){
		global $Db,$Base,$db_prefix,$web_wshtml;
		$ziduanstr=implode("`,`",$ziduan);
		$ziduanstr="`".$ziduanstr."`";
		$dannewssql="select ".$ziduanstr." from `".$db_prefix."article`";
		$dannewssql.=" where `is_locked`=0 and `index_flash`!='' and `is_headline`=1";
		if(!empty($sid)){
			$dannewssql.=" and `article_sid` in (".$sid.") or `article_cid` in (".$sid.") or `article_id` in (".$sid.") order by `add_time` desc limit 0,1";
		}
		$dannews=$Db->Fetch($Db->ThisQuery($dannewssql));
		//print_r($dannews);
		if($dannews){
		$dannews['urlstr']=$web_wshtml=="open"?$urlstr."_".$dannews['article_id'].".htm":$urlstr.".php?id=".$dannews['article_id']."";
		$dannews['article_addtime']=date($shijian,$dannews['article_addtime']);
		$dannews['article_content']=cut(stripslashes($dannews['article_content']),$cunum);
		return $dannews;}
	}
	//根据点击率排序
	function hitliebiao($ziduan=array(),$sid,$num,$nums,$lianjie,$shijian,$connum,$n){
		global $Db,$Base,$db_prefix,$web_wshtml,$languagexz;
		foreach($ziduan as $ziduanvalue){
			$ziduanarray[]="`".$ziduanvalue."`";
		}
		$ziduanstr=implode(",",$ziduanarray);
		if(!empty($ziduanstr)){$ziduanstr.=",";}
		$articlesql="select ".$ziduanstr."`article_id`,`jump_url_is_on`,`jump_url`,`article_addtime` from `".$db_prefix."article` where `is_locked`=0";
		
		
		$sidsql="select `channel_id` from `".$db_prefix."channel` where `channel_root_id` in (".$sid.")";
		$channel=$Db->ThisQuery($sidsql);
		while($channelone=$Db->Fetch($channel)){
			$sid.=",".$channelone['channel_id'];
		}

		if(!empty($sid)){
			$articlesql.=" and `article_sid` in (".$sid.") or `article_cid` in (".$sid.")";
		}
		$articlesql.=" order by `article_hit` desc limit ".$num.",".$nums."";
		$articleone_source=$Db->ThisQuery($articlesql);
		while($articleone=$Db->Fetch($articleone_source)){
			$articleone['arcicle_url']=$web_wshtml=="open"?$lianjie."_".$articleone['article_id'].".htm":$lianjie.".php?id=".$articleone['article_id'];
			if($articleone['jump_url_is_on']==1){
				$articleone['arcicle_url']=$articleone['jump_url'];
			}
			$articleone['article_addtime']=date($shijian,$articleone['article_addtime']);
			if(!empty($connum)){
				if($n==1){
					$articleone['article_title']=cut(clhtml($articleone['article_title']),$connum);
					}
				$articleone['article_content']=cut(clhtml($articleone['article_content']),$connum);
			}
			if(empty($articleone['index_flash'])){
				$articleone['index_flash']="img/none.jpg";
			}
			$articlearray[]=$articleone;
		}
		return $articlearray;
	}
	//查询父栏目
	function yijichannel($ziduan,$id,$num=0,$nums=6){
		global $Db,$db_prefix,$web_wshtml;
		$ziduanstr=implode("`,`",$ziduan);
		$ziduanstr="`".$ziduanstr."`";
		$channelsql="select ".$ziduanstr.",`channel_id`,`channel_root_id`,`channel_urlname`,`channel_ename` from `".$db_prefix."abcdata` where `channel_root_id`=0 and `channel_kid`= 0  and `channel_ifdel`=0 order by `channel_order`  ";
		if(!empty($nums)){
			$channelsql.=" limit ".$num.",".$nums."";
		}
		$channelfetch=$Db->ThisQuery($channelsql);
		while($channelone=$Db->Fetch($channelfetch)){
			 
		    $channel_html_url=str_replace('.php','',$channelone['channel_urlname']);
			$channel_html_url=$channel_html_url."_".$channelone['channel_id'].""; 
		    $channelone['channel_urlname']=$web_wshtml=="open"?$channel_html_url:$channelone['channel_urlname']."?sid=".$channelone['channel_id'];
		    $channelarray[]=$channelone;
		}
		return $channelarray;
	}
		//查询子栏目
		//$num 从第几条查  $nums   查几条
	function erjichannel($ziduan,$num,$nums,$sid){
		global $Db,$db_prefix,$web_wshtml;
		$ziduanstr=implode("`,`",$ziduan);
		$ziduanstr="`".$ziduanstr."`";
		$channelsql="select ".$ziduanstr.",`channel_id`,`channel_urlname`,`if_zhuan_url` from `".$db_prefix."channel` where `channel_jibie`=2 and `channel_root_id`=".$sid." order by `channel_order`";
		if(!empty($nums)){
			$channelsql.=" limit ".$num.",".$nums."";
		}
		$channelfetch=$Db->ThisQuery($channelsql);
		while($channelone=$Db->Fetch($channelfetch)){
			if($channelone['if_zhuan_url']==0){
				$channelone['urlname']=$web_wshtml=="open"?$channel_html_url:$channelone['channel_urlname']."?sid=".$channelone['channel_id'];
			}else{
				$channelone['urlname']=$channelone['channel_urlname'];
			}
			$channelarray[]=$channelone;
		}
		return $channelarray;
	}
	
	//查询子栏目
		//$num 从第几条查  $nums   查几条
	function sanjichannel($ziduan,$num,$nums,$sid){
		global $Db,$db_prefix,$web_wshtml;
		$ziduanstr=implode("`,`",$ziduan);
		$ziduanstr="`".$ziduanstr."`";
		$channelsql="select ".$ziduanstr.",`channel_id`,`channel_urlname`,`if_zhuan_url` from `".$db_prefix."channel` where `channel_jibie`=3 and `channel_root_id`=".$sid." order by `channel_order`";
		if(!empty($nums)){
			$channelsql.=" limit ".$num.",".$nums."";
		}
		$channelfetch=$Db->ThisQuery($channelsql);
		while($channelone=$Db->Fetch($channelfetch)){
			if($channelone['if_zhuan_url']==0){
				$channelone['urlname']=$web_wshtml=="open"?$channel_html_url:$channelone['channel_urlname']."?sid=".$channelone['channel_id'];
			}else{
				$channelone['urlname']=$channelone['channel_urlname'];
			}
			$channelarraysan[]=$channelone;
		}
		return $channelarraysan;
	}
//推荐列表
//字段数组  article_sid   article_cid   在第几条开始  查询多少条  内容页链接  时间格式,$n=1表示标题截取，其他表示内容截取
	 //字段数组   article_sid   article_cid   在第几条开始  查询多少条  内容页链接  时间格式,$n=1表示标题截取，其他表示内容截取
	 function tuijianliebiao($ziduan=array(),$sid,$id,$num=0,$nums=20,$lianjie,$shijian,$connum=20,$n=0,$contnum=100,$m=0){
		global $Db,$Base,$db_prefix,$web_wshtml,$languagexz,$web_url;
		$articlearray=array(); 
		foreach($ziduan as $ziduanvalue){
			$ziduanarray[]="`".$ziduanvalue."`";
		}
		$ziduanstr=implode(",",$ziduanarray);
		if(!empty($ziduanstr)){$ziduanstr.=",";}
		$articlesql="select ".$ziduanstr."`article_id`,`article_sid`,`article_cid`,`jump_url_is_on`,`jump_url`,`article_content` from `".$db_prefix."article` where `is_locked`=0 "; 
        if(!empty($sid)){
			$articlesql.=" and  `article_cid` in (".$sid.") and `is_recommend`=1 and `article_id`!=$id or  `is_locked`=0  and  `article_sid` in (".$sid.")  and `is_recommend`=1 and `article_id`!=$id";
	    }
		 $articlesql.="  limit ".$num.",".$nums."";
		 $articleone_source=$Db->ThisQuery($articlesql);
		 while($articleone=$Db->Fetch($articleone_source)){
		     if($articleone['article_sid']==0){
	         $articleone['arcicle_url']=$web_wshtml=="open"?$lianjie."_".$articleone['article_id']."":$lianjie.".php?id=".$articleone['article_id'];}
			 else{ $articleone['arcicle_url']=$web_wshtml=="open"?$lianjie."_".$articleone['article_id']."":$lianjie.".php?id=".$articleone['article_id'];}
			if($articleone['jump_url_is_on']==1){
				$articleone['arcicle_url']=$articleone['jump_url'];
			}
			//$articleone['add_time']=date($shijian,$articleone['add_time']);
			if(!empty($connum)){
				if($n==1){
					$articleone['article_title']=cut($articleone['article_title'],$connum);
					}
					if(!empty($contnum)){
				     $articleone['article_content']=cut(strip_tags($articleone['article_content']),$contnum);
					}else{
						if(!empty($m)){
						 $articleone['article_content']=cut(strip_tags($articleone['article_content']),$contnum);
							} 
				    }
			}
			if(!empty($articleone['add_time'])){
				$articleone['add_time']=date($shijian,$articleone['add_time']);
				}
			if(empty($articleone['index_flash'])){
				$articleone['index_flash']="common/images/none.jpg";
			}  
			$articlearray[]=$articleone;
		}
		 return $articlearray;
	}
	function liuyan($ziduan=array(),$num,$nums,$lianjie,$shijian,$connum,$n,$t){
		global $Db,$Base,$db_prefix,$web_wshtml,$languagexz;
		foreach($ziduan as $ziduanvalue){
			$ziduanarray[]="`".$ziduanvalue."`";
		}
		$ziduanstr=implode(",",$ziduanarray);
		if(!empty($ziduanstr)){$ziduanstr.=",";}
		$articlesql="select ".$ziduanstr."`id`,`title`,`content`,`time` from `".$db_prefix."liuyan` where `isok`=1";
		$articlesql.=" order by `".$t."` desc limit ".$num.",".$nums."";
		//echo $articlesql;die;
		$articleone_source=$Db->ThisQuery($articlesql);
		while($articleone=$Db->Fetch($articleone_source)){
			$articleone['liuyan_url']=$web_wshtml=="open"?$lianjie."_".$articleone['id'].".htm":$lianjie.".php?id=".$articleone['id'];
			$articleone['time']=date($shijian,$articleone['time']);
			if(!empty($connum)){
				if($n==1){
					$articleone['title']=cut($articleone['title'],$connum);
					
					}
				$articleone['content']=cut(clhtml($articleone['content']),$connum);
			}
			if(empty($articleone['xq'])){
				$articleone['xq']="img/none.jpg";
			}
			$articlearray[]=$articleone;
		}
		return $articlearray;
	}
	//一级列表
//字段数组  article_sid   article_cid   在第几条开始  查询多少条  内容页链接  时间格式,$n=1表示标题截取，其他表示内容截取
	function yijiliebiao($ziduan=array(),$sid,$num,$nums,$lianjie,$shijian,$connum,$n,$tui){
		global $Db,$Base,$db_prefix,$web_wshtml,$languagexz;
		foreach($ziduan as $ziduanvalue){
			$ziduanarray[]="`".$ziduanvalue."`";
		}
		$ziduanstr=implode(",",$ziduanarray);
		if(!empty($ziduanstr)){$ziduanstr.=",";}
		$articlesql="select ".$ziduanstr."`article_id`,`jump_url_is_on`,`jump_url`,`article_addtime` from `".$db_prefix."article` where `is_locked`=0 ";
		if ($tui==1) {
			$articlesql.="   and  `article_cid` ='".$sid."' and `article_sid`=0 and `is_recommend`=".$tui."";
		}
		$articlesql.="   and  `article_cid` ='".$sid."' and `article_sid`=0 ";
		$articlesql.=" order by `article_addtime` desc limit ".$num.",".$nums."";

		//echo $articlesql;die;
		$articleone_source=$Db->ThisQuery($articlesql);
		while($articleone=$Db->Fetch($articleone_source)){
			$articleone['arcicle_url']=$web_wshtml=="open"?$lianjie."_".$articleone['article_id'].".htm":$lianjie.".php?id=".$articleone['article_id'];
			if($articleone['jump_url_is_on']==1){
				$articleone['arcicle_url']=$articleone['jump_url'];
			}
			$articleone['article_addtime']=date($shijian,$articleone['article_addtime']);
			if(!empty($connum)){
				if($n==1){
					$articleone['article_title']=cut($articleone['article_title'],$connum);
					
					}
				$articleone['article_content']=cut(clhtml($articleone['article_content']),$connum);
			}
			if(empty($articleone['index_flash'])){
				$articleone['index_flash']="img/none.jpg";
			}
			$articlearray[]=$articleone;
		}
		return $articlearray;
	}
//广告
//字段数组  article_sid   article_cid   在第几条开始  查询多少条  内容页链接  时间格式,$n=1表示标题截取，其他表示内容截取
	function topguanggao($ziduan=array(),$num,$nums,$rootid){
		global $Db,$Base,$db_prefix,$web_wshtml,$languagexz;
		foreach($ziduan as $ziduanvalue){
			$ziduanarray[]="`".$ziduanvalue."`";
		}
		$ziduanstr=implode(",",$ziduanarray);
		if(!empty($ziduanstr)){$ziduanstr.=",";}
		$articlesql="select ".$ziduanstr."`id`,`add_time` from `".$db_prefix."guanggao` where  `root_id`='".$rootid."' and  `if_hidden`=0  order by `add_time` desc limit ".$num.",".$nums."";
	 

		//echo $articlesql;die;
		$articleone_source=$Db->ThisQuery($articlesql);
		while($articleone=$Db->Fetch($articleone_source)){
			
			if(empty($articleone['img'])){
				$articleone['img']="img/none.jpg";
			}
			$articlearray[]=$articleone;
		}
		return $articlearray;
	}
	
//广告
//字段数组  article_sid   article_cid   在第几条开始  查询多少条  内容页链接  时间格式,$n=1表示标题截取，其他表示内容截取
	function guanggao($ziduan=array(),$num,$nums,$connum,$n){
		global $Db,$Base,$db_prefix,$web_wshtml,$languagexz;
		foreach($ziduan as $ziduanvalue){
			$ziduanarray[]="`".$ziduanvalue."`";
		}
		$ziduanstr=implode(",",$ziduanarray);
		if(!empty($ziduanstr)){$ziduanstr.=",";}
		$articlesql="select ".$ziduanstr."`id`,`add_time` from `".$db_prefix."guanggao`";
		$articlesql.=" order by `add_time` desc limit ".$num.",".$nums."";

		//echo $articlesql;die;
		$articleone_source=$Db->ThisQuery($articlesql);
		while($articleone=$Db->Fetch($articleone_source)){
			if(!empty($connum)){
				if($n==1){
					$articleone['title']=cut($articleone['title'],$connum);
					
					}
				$articleone['content']=cut(clhtml($articleone['content']),$connum);
			}
			if(empty($articleone['img'])){
				$articleone['img']="img/none.jpg";
			}
			$articlearray[]=$articleone;
		}
		return $articlearray;
	}
	
	
	
	 //产品列表	
	function hpgspcplist($ziduan,$urlstr,$sid,$order,$sx,$num,$nums){
		global $Db,$db_prefix,$web_wshtml;
		$ziduanstr=implode("`,`",$ziduan);
		$ziduanstr="`".$ziduanstr."`";
		$yldcpsql="select ".$ziduanstr.",`id` from `".$db_prefix."chanpin` where `ifxianshi`=1 and `cpfl`=".$sid."";
		//if($Db->RowsAll("select `channel_id` from `".$db_prefix."channel` where `channel_root_id`=".$sid."")!==0){//判断是否有子分类
//			$sortid=$Db->ThisQuery("select `channel_id` from `".$db_prefix."channel` where `channel_root_id`=".$sid."");
//			$i=0;
//			while($sortone=$Db->Fetch($sortid)){
//				$sortidstr.=$i==0?$sortone['channel_id']:",".$sortone['channel_id'];
//				$i++;
//			}
//			$yldcpsql.=" or `channel_root_id` in (".$sortidstr.")";
//		}
		$yldcpsql.=" order by `".$order."`";
		if(!empty($sx)){
			$yldcpsql.=" desc";
		}
		$yldcpsql.=" limit ".$num.",".$nums."";
		//echo $yldcpsql;
		$yldcp=$Db->ThisQuery($yldcpsql);
		while($yldcpone=$Db->Fetch($yldcp)){
			$yldcpone['urlstr']=$web_wshtml=="open"?$urlstr."_".$yldcpone['id'].".htm":$urlstr.".php?id=".$yldcpone['id']."";
			if(empty($yldcpone['cpimg'])){$yldcpone['cpimg']="img/none.jpg";}
			$yldcparray[]=$yldcpone;
		}
		return $yldcparray;
	}
	//精品推荐
	function hpgjptjlist($ziduan,$urlstr,$sid,$num,$nums){
		global $Db,$db_prefix,$web_wshtml;
		$ziduanstr=implode("`,`",$ziduan);
		$ziduanstr="`".$ziduanstr."`";
		$yldcpsql="select ".$ziduanstr.",`id` from `".$db_prefix."chanpin` where `ifxianshi`=1 and `ifppjx`=1 and `channel_root_id`=".$sid."";
		$yldcpsql.=" order by `id` desc";
		$yldcpsql.=" limit ".$num.",".$nums."";
		$yldcp=$Db->ThisQuery($yldcpsql);
		while($yldcpone=$Db->Fetch($yldcp)){
			$yldcpone['urlstr']=$web_wshtml=="open"?$urlstr."_".$yldcpone['id'].".htm":$urlstr.".php?id=".$yldcpone['id']."";
			if(empty($yldcpone['cpimg'])){$yldcpone['cpimg']="img/none.jpg";}
			$yldcparray[]=$yldcpone;
		}
		return $yldcparray;
	}
	//热销排行
	function hpgrmtjlist($ziduan,$urlstr,$sid,$num,$nums){
		global $Db,$db_prefix,$web_wshtml;
		$ziduanstr=implode("`,`",$ziduan);
		$ziduanstr="`".$ziduanstr."`";
		$yldcpsql="select ".$ziduanstr.",`id` from `".$db_prefix."chanpin` where `ifxianshi`=1 and `ifrmtj`=1 and `channel_root_id`=".$sid."";
		$yldcpsql.=" order by `id` desc";
		$yldcpsql.=" limit ".$num.",".$nums."";
		$yldcp=$Db->ThisQuery($yldcpsql);
		while($yldcpone=$Db->Fetch($yldcp)){
			$yldcpone['urlstr']=$web_wshtml=="open"?$urlstr."_".$yldcpone['id'].".htm":$urlstr.".php?id=".$yldcpone['id']."";
			if(empty($yldcpone['cpimg'])){$yldcpone['cpimg']="img/none.jpg";}
			$yldcparray[]=$yldcpone;
		}
		return $yldcparray;
	}
	//相关产品
		function hgpxgcp($ziduan,$urlstr,$name,$num,$nums,$connum){
		global $Db,$db_prefix,$web_wshtml;
		$ziduanstr=implode("`,`",$ziduan);
		$ziduanstr="`".$ziduanstr."`";
		$yldcpsql="select ".$ziduanstr.",`id` from `".$db_prefix."chanpin` where `ifxianshi`=1 and `gongyings`='".$name."'";
		$yldcpsql.=" order by `id` desc";
		$yldcpsql.=" limit ".$num.",".$nums."";
		$yldcp=$Db->ThisQuery($yldcpsql);
		while($yldcpone=$Db->Fetch($yldcp)){
			$yldcpone['urlstr']=$web_wshtml=="open"?$urlstr."_".$yldcpone['id'].".htm":$urlstr.".php?id=".$yldcpone['id']."";
			if(!empty($connum)){
				$yldcpone['name']=cut(clhtml($yldcpone['name']),$connum);
			}
			if(empty($yldcpone['cpimg'])){$yldcpone['cpimg']="img/none.jpg";}
			$yldcparray[]=$yldcpone;
		}
		return $yldcparray;
	}

//单个产品查找
	function hpgchanpin($ziduan,$id){
		global $Db,$db_prefix,$web_wshtml,$Base;
		$ziduanstr=implode("`,`",$ziduan);
		$ziduanstr="`".$ziduanstr."`";
		$chanpinsql="select ".$ziduanstr." from `".$db_prefix."chanpin` where 

`id`=".$id." and `ifxianshi`=1";
		$chanpin=$Db->Fetch($Db->ThisQuery($chanpinsql));
		/*if(!empty($chanpin['cppp'])){
			$cppp=$Db->Fetch($Db->ThisQuery("select `name` from 

`".$db_prefix."ppfl` where `id`=".$chanpin['cppp'].""));
			$chanpin['cppp']=$cppp['name'];
		}
		/*if(empty($chanpin['tuanimg'])){
			$chanpin['tuanimg']="img/none.jpg";
		}
		if(!empty($chanpin['tuanriqi'])){
			$chanpin['tuanriqi']=date("m/d/Y H:i:s",$chanpin['tuanriqi']);
		}
		if(empty($chanpin)){
			$Base->ErrorMsg('产品不存在或已经删除');exit();
		}*/
		$Db->ThisQuery("update `".$db_prefix."chanpin` set `hit`=hit+1 where 

`id`=".$id."");
		return $chanpin;
	}	

//                字段名  数据表名   列名  pei_id或者是lie_style的值 
function peilie($ziduan,$db,$lie,$id){
		global $Db,$db_prefix,$web_wshtml;
		$ziduanstr=implode("`,`",$ziduan);
		$ziduanstr="`".$ziduanstr."`";
		$yldcpsql="select ".$ziduanstr."  from `".$db_prefix."$db` where  `$lie`='".$id."'";
		if($lie=='pei_id'){
		$peizhi=$Db->Fetch($Db->ThisQuery($yldcpsql));
		}else{
		$peizhi=$Db->FetchAll($yldcpsql);
			
			}
		return $peizhi;
}

//产品列表  $ovov->chanpinliebiao($ziduan,3,0,0,2,$lianjie,$shijian);
//字段数组  article_sid   article_cid   在第几条开始  查询多少条  内容页链接  时间格式,$n=1表示标题截取，其他表示内容截取
	function chanpinliebiao($ziduan=array(),$num,$nums,$lianjie,$n){
		global $Db,$Base,$db_prefix,$web_wshtml,$languagexz;
		foreach($ziduan as $ziduanvalue){
			$ziduanarray[]="`".$ziduanvalue."`";
		}
		$ziduanstr=implode(",",$ziduanarray);
		
		if(!empty($ziduanstr)){$ziduanstr.=",";}
		 $articlesql="select ".$ziduanstr."`ArticleID`,`BigClassName`   from `".$db_prefix."product`   order by `addtime` desc limit ".$num.",".$nums." ";
        
		 $articleone_source=$Db->ThisQuery($articlesql);
		 while($articleone=$Db->Fetch($articleone_source)){
			 if(!empty($lianjie)){
			  $articleone['chanpin_url']=$web_wshtml=="open"?$lianjie."_".$articleone['ArticleID']."_".$articleone['BigClassName']."":$lianjie.".php?id=".$articleone['ArticleID']."&sid=".$articleone['BigClassName'];
			 }
	        if(empty($articleone['pic'])){
				$articleone['pic']="img/none.jpg";
			}
			if(!empty($n)){
				  $articleone['Title']=cut($articleone['Title'],$n);
			 }
			$articlearray[]=$articleone;
		}
		return $articlearray;
	}
	
	
	//所有文章栏目
	function channelall($ziduan,$arrid){
		global $Db,$db_prefix,$web_wshtml;
		$ziduanstr=implode("`,`",$ziduan);
		$idstr=implode(",",$arrid);
		$ziduanstr="`".$ziduanstr."`";
		$headrootsql="select ".$ziduanstr.",`channel_id`,`channel_urlname`,`if_zhuan_url` from `".$db_prefix."channel` where `channel_id` in (".$idstr.")";
		
		$headroot=$Db->ThisQuery($headrootsql);
		while($headrootone=$Db->Fetch($headroot)){
			if($headrootone['if_zhuan_url']==0){
			$headrootone_html_url=str_replace('.php','',$headrootone['channel_urlname']);
			$headrootone_html_url=$headrootone_html_url."_".$headrootone['channel_id'].".htm";
			$headrootone['channel_urlname']=$web_wshtml=="open"?$headrootone_html_url:$headrootone['channel_urlname']."?sid=".$headrootone['channel_id'];
			}
			//子分类
			$sort=$Db->ThisQuery("select ".$ziduanstr.",`channel_id`,`channel_urlname` from `".$db_prefix."channel` where `channel_root_id`=".$headrootone['channel_id']."");
			while($sortone=$Db->Fetch($sort)){
				if($sortone['if_zhuan_url']==0){
				$sortone_html_url=str_replace('.php','',$sortone['channel_urlname']);
				$sortone_html_url=$sortone_html_url."_".$sortone['channel_id'].".htm";
				$sortone['channel_urlname']=$web_wshtml=="open"?$headrootone_html_url:$sortone['channel_urlname']."?sid=".$sortone['channel_id'];
				}
				//三级分类
				$san=$Db->ThisQuery("select ".$ziduanstr.",`channel_id`,`channel_urlname` from `".$db_prefix."channel` where `channel_root_id`=".$sortone['channel_id']."");
			while($sanone=$Db->Fetch($san)){		
				$sanone_html_url=str_replace('.php','',$sanone['channel_urlname']);
				$sanone_html_url=$sanone_html_url."_".$sanone['channel_id'].".htm";
				$sanone['channel_urlname']=$web_wshtml=="open"?$sanone_html_url:$sanone['channel_urlname']."?sid=".$sanone['channel_id'];
				$sortone['san'][]=$sanone;
			}
				$headrootone['sort'][]=$sortone;
			}
			$headrootarray[]=$headrootone;
		}
		
		return $headrootarray;
	}
	/*********************************************************
		 * function tzliebiao($date1,$date2,$unit) 推荐和置顶函数
		 *
		 * @param $date1	比较日期
		 * @param $date2	比较日期
		 * @param $unit 	s为秒，i为分钟，h为小时，d为天，默认为天
		 * @return 			返回两个日期相差几秒、几分钟、几小时或几天
		 *********************************************************/
//字段数组   article_sid   article_cid   在第几条开始  查询多少条  内容页链接  时间格式,$n=1表示标题截取，其他表示内容截取
	function tzliebiao($ziduan=array(),$sid,$num=0,$nums=20,$lianjie,$shijian,$connum=20,$n=0,$condition='is_recommend',$vals=1,$contnum=100,$m=0){
		global $Db,$Base,$db_prefix,$web_wshtml,$languagexz,$web_url;
		$articlearray=array(); 
		foreach($ziduan as $ziduanvalue){
			$ziduanarray[]="`".$ziduanvalue."`";
		}
		$ziduanstr=implode(",",$ziduanarray);
		if(!empty($ziduanstr)){$ziduanstr.=",";}
		$articlesql="select ".$ziduanstr."`article_id`,`article_sid`,`article_cid`,`jump_url_is_on`,`jump_url`,`article_content` from `".$db_prefix."article` where `is_locked`=0 ";
	    /*$sidsql="select `channel_id` from `".$db_prefix."channel` where `channel_root_id` in (".$sid.")";
		$channel=$Db->ThisQuery($sidsql);
		while($channelone=$Db->Fetch($channel)){
			$sid.=",".$channelone['channel_id'];
		}*/
        if(!empty($sid)){
			$articlesql.=" and  `article_cid` in (".$sid.")   or   `is_locked`=0    and  `article_sid` in (".$sid.") ";
	    }
		 $articlesql.="  and `is_recommend`=1 ";
		if(in_array('add_time',$ziduan)){
			$articlesql.="  order by  `add_time` desc ";
		}else{
			$articlesql.="  order by  `add_time` desc ";
			}
		 $articlesql.=" limit ".$num.",".$nums."";
		 $articleone_source=$Db->ThisQuery($articlesql);
		 while($articleone=$Db->Fetch($articleone_source)){
		     if($articleone['article_sid']==0){
	         $articleone['arcicle_url']=$web_wshtml=="open"?$lianjie."_".$articleone['article_id']."":$lianjie.".php?id=".$articleone['article_id'];}
			 else{ $articleone['arcicle_url']=$web_wshtml=="open"?$lianjie."_".$articleone['article_id']."":$lianjie.".php?id=".$articleone['article_id'];}
			if($articleone['jump_url_is_on']==1){
				$articleone['arcicle_url']=$articleone['jump_url'];
			}
			$articleone['ar_title']=$articleone['article_title'];//全名称
			//$articleone['add_time']=date($shijian,$articleone['add_time']);
			if(!empty($connum)){
				if($n==1){
					$articleone['article_title']=cut($articleone['article_title'],$connum);
				 }
					if(!empty($contnum)){
				     $articleone['article_content']=cut(strip_tags(trim($articleone['article_content'])),$contnum);
					}else{
						if(!empty($m)){
						 $articleone['article_content']=cut(strip_tags(trim($articleone['article_content'])),$contnum);
						} 
				 }
			}
			$articleone['article_content']=cut(strip_tags(trim($articleone['article_content'])),$contnum);
			if(!empty($articleone['start_time'])){
				$articleone['start_time']=date($shijian,$articleone['start_time']);
			}elseif(!empty($articleone['add_time'])){
					$articleone['add_time']=date($shijian,$articleone['add_time']);
			}
			if(empty($articleone['index_flash'])){
				$articleone['index_flash']="common/images/none.jpg";
			}  
			$articlearray[]=$articleone;
		}
		 return $articlearray;
	}
	
	
/*********************************************************
		 * function tuiliebiao($ziduan,$sid,$num,$nums=20,$lianjie,$shijian,$connum=20,$n=0,$contnum=100,$m=0) 推荐和普通的图片同时显示出来
		 * @param $ziduan	显示的字段
		 * @param $sid	    二级栏目的id
		 * @param $num  	从第几个开始
		 * @param $nums  	到第几个结束
		 * @param $lianjie 	跳转的链接
		 * @param $shijian 	时间显示的样式
		 * @return 			返回两个日期相差几秒、几分钟、几小时或几天
		 *********************************************************/	
//$ovov->liebiao($ziduan,3,0,0,2,$lianjie,$shijian);
//字段数组   article_sid   article_cid   在第几条开始  查询多少条  内容页链接  时间格式,$n=1表示标题截取，其他表示内容截取
	function tuiliebiao($ziduan=array(),$sid,$num=0,$nums=20,$lianjie,$shijian,$connum=20,$n=0,$contnum=100,$m=0){
		global $Db,$Base,$db_prefix,$web_wshtml,$languagexz,$web_url;
		$articlearray=array(); 
		foreach($ziduan as $ziduanvalue){
			$ziduanarray[]="`".$ziduanvalue."`";
		}
		$ziduanstr=implode(",",$ziduanarray);
		if(!empty($ziduanstr)){$ziduanstr.=",";}
		$articlesql="select ".$ziduanstr."`article_id`,`article_sid`,`article_cid`,`jump_url_is_on`,`jump_url`,`article_content`from `".$db_prefix."article` where `is_locked`=0 ";
	    /*$sidsql="select `channel_id` from `".$db_prefix."channel` where `channel_root_id` in (".$sid.")";
		$channel=$Db->ThisQuery($sidsql);
		while($channelone=$Db->Fetch($channel)){
			$sid.=",".$channelone['channel_id'];
		}*/
        if(!empty($sid)){
			$articlesql.=" and  `article_cid` in (".$sid.")   or   `is_locked`=0    and  `article_sid` in (".$sid.") ";
	    }
		if(in_array('start_time',$ziduan)){
			$articlesql.=" order by   `is_recommend` desc,`is_sequence` desc,`start_time` desc ";
		}else{
			$articlesql.="  order by  `is_recommend` desc,`is_sequence` desc,`add_time` desc ";
			}
		 $articlesql.=" limit ".$num.",".$nums."";
		 $articleone_source=$Db->ThisQuery($articlesql);
		 while($articleone=$Db->Fetch($articleone_source)){
		     if($articleone['article_sid']==0){
	         $articleone['arcicle_url']=$web_wshtml=="open"?$lianjie."_".$articleone['article_id']."":$lianjie.".php?id=".$articleone['article_id'];}
			 else{ $articleone['arcicle_url']=$web_wshtml=="open"?$lianjie."_".$articleone['article_id']."":$lianjie.".php?id=".$articleone['article_id'];}
			if($articleone['jump_url_is_on']==1){
				$articleone['arcicle_url']=$articleone['jump_url'];
			}
			$articleone['ar_title']=$articleone['article_title'];//全名称
			//$articleone['add_time']=date($shijian,$articleone['add_time']);
			if(!empty($connum)){
				if($n==1){
					$articleone['article_title']=cut($articleone['article_title'],$connum);
				 }
					if(!empty($contnum)){
				     $articleone['article_content']=cut(strip_tags(trim($articleone['article_content'])),$contnum);
					}else{
						if(!empty($m)){
						 $articleone['article_content']=cut(strip_tags(trim($articleone['article_content'])),$contnum);
						} 
				 }
			}
			$articleone['article_content']=cut(strip_tags(trim($articleone['article_content'])),$contnum);
			if(!empty($articleone['start_time'])){
				$articleone['start_time']=date($shijian,$articleone['start_time']);
			}elseif(!empty($articleone['add_time'])){
					$articleone['add_time']=date($shijian,$articleone['add_time']);
			}
			if(empty($articleone['index_flash'])){
				$articleone['index_flash']="common/images/none.jpg";
			}  
			$articlearray[]=$articleone;
		}
		 return $articlearray;
	}	
	
/*********************************************************
		 * function gdliebiao($ziduan,$sid,$num,$nums=20,$lianjie,$shijian,$connum=20,$n=0,$contnum=100,$m=0) 权威健康课堂列表
		 * @param $ziduan	显示的字段
		 * @param $sid	    二级栏目的id
		 * @param $num  	从第几个开始
		 * @param $nums  	到第几个结束
		 * @param $lianjie 	跳转的链接
		 * @param $shijian 	时间显示的样式
		 * @return 			返回两个日期相差几秒、几分钟、几小时或几天
		 *********************************************************/	
//字段数组   article_sid   article_cid   在第几条开始  查询多少条  内容页链接  时间格式,$n=1表示标题截取，其他表示内容截取
	function gdliebiao($ziduan=array(),$sid,$num=0,$nums=50,$lianjie,$shijian,$connum=20,$n=0,$contnum=100,$m=0){
		global $Db,$Base,$db_prefix,$web_wshtml,$languagexz,$web_url;
		$time=intval(strtotime(date('Y-m-d')));
		$articlearray=array(); 
		foreach($ziduan as $ziduanvalue){
			$ziduanarray[]="`".$ziduanvalue."`";
		}
		$ziduanstr=implode(",",$ziduanarray);
		if(!empty($ziduanstr)){$ziduanstr.=",";}
		$articlesql="select ".$ziduanstr."`article_id`,`article_sid`,`article_cid`,`jump_url_is_on`,`jump_url`,`article_content` from `".$db_prefix."article` where `is_locked`=0 ";
	    /*$sidsql="select `channel_id` from `".$db_prefix."channel` where `channel_root_id` in (".$sid.")";
		$channel=$Db->ThisQuery($sidsql);
		while($channelone=$Db->Fetch($channel)){
			$sid.=",".$channelone['channel_id'];
		}*/
		 if(!empty($sid)){
			$articlesql.=" and  `article_cid` in (".$sid.")   or   `is_locked`=0    and  `article_sid` in (".$sid.") ";
	     }
         $articlesql.="  order by `start_time` asc limit $num,$nums";
		 $articleone_source=$Db->ThisQuery($articlesql);
		 while($articleone=$Db->Fetch($articleone_source)){
		     if($articleone['article_sid']==0){
	         $articleone['arcicle_url']=$web_wshtml=="open"?$lianjie."_".$articleone['article_id']."":$lianjie.".php?id=".$articleone['article_id'];}
			 else{ $articleone['arcicle_url']=$web_wshtml=="open"?$lianjie."_".$articleone['article_id']."":$lianjie.".php?id=".$articleone['article_id'];}
			if($articleone['jump_url_is_on']==1){
				$articleone['arcicle_url']=$articleone['jump_url'];
			}
			$articleone['ar_title']=$articleone['article_title'];//全名称
			//$articleone['add_time']=date($shijian,$articleone['add_time']);
			if(!empty($connum)){
				if($n==1){
					$articleone['article_title']=cut($articleone['article_title'],$connum);
				 }
					if(!empty($contnum)){
				     $articleone['article_content']=cut(strip_tags(trim($articleone['article_content'])),$contnum);
					}else{
						if(!empty($m)){
						 $articleone['article_content']=cut(strip_tags(trim($articleone['article_content'])),$contnum);
						} 
				 }
			}
			$articleone['article_content']=cut(strip_tags(trim($articleone['article_content'])),$contnum);
			if(!empty($articleone['start_time'])){
				$articleone['start_time']=date($shijian,$articleone['start_time']);
			}elseif(!empty($articleone['add_time'])){
					$articleone['add_time']=date($shijian,$articleone['add_time']);
			}
			if(empty($articleone['index_flash'])){
				$articleone['index_flash']="common/images/none.jpg";
			}  
			$articlearray[]=$articleone;
		}
		 return $articlearray;
	}	
}
?>