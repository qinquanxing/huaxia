<?php
//404页面显示
function error_404(){
    header('Refresh: 2; url=/');
	echo '<center><span style="font-size:50px;">:(</span> 没有任何发现！';exit();
}
function ifreturn($res,$showname='',$ifreturn=''){
	global $smarty;
	if($ifreturn)
		return $res;
	else
		$smarty->assign($showname,$res);
}

//频道信息输出
function channelName($channel_id,$showname='',$ifreturn=''){
	global $Db,$db_prefix,$web_wshtml,$smarty;
	$res=$Db->Fetch($Db->ThisQuery('SELECT `channel_id`,`channel_name`,`channel_urlname` FROM `'.$db_prefix.'abcdata` WHERE `channel_id`='.$channel_id));
	$sort=str_replace('.php','',$res['channel_urlname']);
	$res['channel_urlname']=$web_wshtml=='open'?$sort.'_'.$res['channel_id']:$sort.'.php?sid'.$res['channel_id'];
	return ifreturn($res,$showname,$ifreturn);
}

//自定义输出列表
function show_list($channel_id,$limit='',$type='',$level,$showname='',$ifreturn=''){
	global $Db,$db_prefix,$web_wshtml,$smarty;
	$sql='SELECT `article_id`,`article_title`,`index_flash` FROM `'.$db_prefix.'article` WHERE ';
	switch ($level){
		case 1:	$sql.=' `article_cid`='.$channel_id;
			break;
		case 2:	$sql.=' `article_sid`='.$channel_id;
			break;
	}
	switch ($type){
		case 1:	$sql.=' ORDER BY `article_hit` DESC';//点击量
			break;
		case 2: $sql.=' ORDER BY `is_top` DESC';//置顶
			break;
		case 3: $sql.=' ORDER BY `is_recommend` DESC';//推荐
			break;
		default: $sql.=' ORDER BY `article_id` DESC';//最新
			break;
	}
	if($limit){$sql.=' LIMIT '.$limit;}
	$res=$Db->FetchAll($sql);
	foreach ($res as $key => $val){
		$res[$key]['url']=$web_wshtml=='open'?'show_'.$res[$key]['article_id']:'show.php?id='.$res[$key]['article_id'];
		$res[$key]['url2']=$web_wshtml=='open'?'detail_'.$res[$key]['article_id']:'detail.php?id='.$res[$key]['article_id'];
	}
	return ifreturn($res,$showname,$ifreturn);
}

//一级导航
function nav($level,$showname='',$ifreturn=''){
	global $Db,$web_wshtml,$db_prefix,$smarty;
	$res=$Db->FetchAll('SELECT `channel_name`,`channel_alias`,`channel_urlname`,`channel_urlok`,`channel_ename`,`channel_id`,`channel_root_id` FROM `'.$db_prefix.'abcdata` WHERE `jibie`='.$level.' AND `isshow`=0 AND `channel_ifdel`=0 ORDER BY `channel_order` ASC');
	foreach ($res as $key=>$val){
		$arr=str_replace('.php','',$val['channel_urlname']);
		if(empty($res[$key]['channel_urlok']))
			$res[$key]['channel_urlname']=$web_wshtml=='open'?$arr:$res[$key]['channel_urlname'];
		if($Db->RowsAll('SELECT `channel_id` FROM `'.$db_prefix.'abcdata` WHERE `isshow`=0  AND `channel_root_id`='.$res[$key]['channel_id'])>0){
			$res[$key]['ifhref']=1;
		}
	}
	return ifreturn($res,$showname,$ifreturn);
}

//子菜单
function menu($channel_id){
    
	global $Db,$web_wshtml,$db_prefix,$smarty;
	
	$res=$Db->FetchAll('SELECT `channel_name`,`channel_alias`,`channel_urlname`,`channel_urlok`,`channel_ename`,`channel_id`,`channel_root_id` FROM `'.$db_prefix.'abcdata` WHERE `channel_root_id`='.$channel_id.' AND `isshow`=0  AND `channel_ifdel`=0 ORDER BY `channel_order` ASC');
	
	foreach ($res as $key=>$val){
	    
       $res[$key]['channel_urlname']=$web_wshtml=='open'?'p'.$res[$key]['channel_id']:$res[$key]['channel_urlname'].'?cid='.$res[$key]['channel_id'];
	   
	   if($res[$key]['channel_id'] == 1){
	       $res[$key]['channel_urlname'] = './';
	   }
	}

    return $res;
}

//输出默认单页内容
function printSingleContent($sid,$showname='',$ifreturn=''){
	global $Db,$db_prefix,$smarty;
	$res=$Db->Fetch($Db->ThisQuery('SELECT `article_title`,`article_content`,`article_author`,`article_source`,`add_time`,`article_keyword`,`article_content` FROM `'.$db_prefix.'article` WHERE `is_locked`=0 and `article_sid`='.$sid.' ORDER BY `article_id` DESC,`is_top` DESC '));
	if($res)$res['add_time']=date('Y-m-d H:i:s',$res['add_time']);
	return ifreturn($res,$showname,$ifreturn);
}

//输出单篇页内容
function GetOne($sql){
	global $Db,$db_prefix,$smarty;
	
	$res=$Db->Fetch($Db->ThisQuery($sql));
	
	return $res;
}

//输出列表
function printArticleList($sql, $per){
	global $Db,$web_wshtml,$db_prefix,$smarty;
// 	$sql='SELECT `article_id`,`article_title`,`add_time`,`article_keyword`,`digest`,`jump_url_is_on`,`jump_url`,`index_flash` FROM `'.$db_prefix.'article` WHERE `is_locked`=0 and `article_sid`='.$sid.' ORDER BY `article_id` DESC,`is_sequence` DESC';
	
	$total = $Db->RowsAll ( $sql );
	$page = $_GET['page']?intval($_GET['page']):1;
	$pageno = intval ( $page );
	if ($pageno == 0 || $pageno < 0)$pageno = 1;
	$page_num = ceil ( $total / $per );
	$smarty->assign ( 'page_num', $page_num );
	
	if($total>$per){
    	if($web_wshtml=='open')
    		$pagelist = Pagination_html ( $total, $per, $page);
    	else
    		$pagelist = Pagination ( $total, $per, $page ,$sid);
    	
    	$smarty->assign ( 'pagelist', $pagelist );
    	$smarty->assign ( "total", $total );
    	$smarty->assign ( "page_now", $page );
	}
    	$sql = $sql . " LIMIT " . ($page - 1) * $per . "," . $per . "";
    	
	
	 $res=$Db->FetchAll($sql);
	
	if($res){
		foreach($res as $key=>$val){
// 			$res[$key]['url']=$web_wshtml=='open'?'show_'.$res[$key]['article_id']:'show.php?id='.$res[$key]['article_id'];
			$res[$key]['add_time']=date('Y-m-d',$res[$key]['add_time']);
// 			if($res[$key]['jump_url_is_on']){
// 				$res[$key]['url']=$res[$key]['jump_url'];
// 			}
		}
	}
	return $res;
}

function channel_info($channel_id){
	global $Db,$db_prefix,$smarty;
	$res=$Db->Fetch($Db->ThisQuery('SELECT * FROM `'.$db_prefix.'abcdata` WHERE `channel_id`='.$channel_id));
	$smarty->assign('channel_type',$res['channel_type']);
	return $res;
}

//频道子菜单特效
function ahover($channel_id){
	global $Db,$db_prefix,$web_wshtml;
	$res=$Db->Fetch($Db->ThisQuery('SELECT `channel_id` FROM `'.$db_prefix.'abcdata` WHERE `channel_root_id`='.$channel_id.' ORDER BY `channel_order` LIMIT 1'));
 	if($Db->RowsAll('SELECT `channel_id` FROM `'.$db_prefix.'abcdata` WHERE `isshow`=0  AND `channel_root_id`='.$res['channel_id'])>0){
 		$rt=$Db->Fetch($Db->ThisQuery('SELECT `channel_id` FROM `'.$db_prefix.'abcdata` WHERE `isshow`=0 AND `channel_root_id`='.$res['channel_id'].' LIMIT 1'));
 		$res['channel_id']=$rt['channel_id'];
 	}
 	return $res['channel_id'];
}

//友情链接
function fsite($showname='',$ifreturn=''){
	global $Db,$db_prefix,$smarty;
	$res=$Db->FetchAll('select * from `'.$db_prefix.'fsite` ');
	return ifreturn($res,$showname,$ifreturn);
}

//广告显示
function adv($aid,$lmt,$showname='',$ifreturn=''){
	global $Db,$db_prefix,$smarty;
	$res=$Db->FetchAll('select * from `'.$db_prefix.'adv_order` WHERE `is_del`=0 and `adv_id`='.$aid.' LIMIT '.$lmt);
	return ifreturn($res,$showname,$ifreturn);
}

//recommend
function recommend($showname='',$ifreturn=''){
	global $Db,$db_prefix,$web_wshtml,$smarty;
	$res=$Db->FetchAll('SELECT * FROM `'.$db_prefix.'abcdata` ORDER BY `is_recommend` DESC LIMIT 3');
	$ar=array();$i=1;$j=1;
	$aid=5;
	foreach ($res as $key => $val){
		$res[$key]['group']=$j;
		$art=$Db->FetchAll('select * from `'.$db_prefix.'adv_order` WHERE `adv_id`='.$aid.' LIMIT 3');
		if($art){
			foreach($art as $key=>$val){
				$art[$key]['group']=$i;
			}
			$i++;
		}
		$ar=array_merge($ar,$art);
		unset($art);
		$j++;$aid--;
	}
	$smarty->assign('top',$ar);
	return ifreturn($res,$showname,$ifreturn);
}
//simple recommend
function simpleRec($channel_id,$lmt,$showname='',$ifreturn=''){
	global $Db,$db_prefix,$web_wshtml,$smarty;
	$sql='SELECT `article_id`,`article_sid`,`article_cid`,`article_title`,`jump_url_is_on`,`jump_url`,`index_flash` FROM `'.$db_prefix.'article` WHERE `article_sid`='.$channel_id.' OR `article_cid`='.$channel_id;
	if($lmt) $sql.=' LIMIT '.$lmt;
	$res=$Db->FetchAll($sql);
	if($res){
		foreach($res as $key=>$val){
			$res[$key]['url']=$web_wshtml=='open'?'show_'.$res[$key]['article_id']:'show.php?id='.$res[$key]['article_id'];
			if($res[$key]['jump_url_is_on'])
				$res[$key]['url']=$res[$key]['jump_url'];
		}
	}
	return ifreturn($res,$showname,$ifreturn);
}
?>