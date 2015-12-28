<?php
set_time_limit(0);
require_once("common.inc.php");
include_once("include/function/collect_funcion.php");
$User->CheckLogin();
//include_once("unsql.php");
$ovoa_action=trim($_GET['action']);
$ovoa_action?$ovoa_action=$ovoa_action:$ovoa_action=trim($_POST['action']);
$ovoa_action?$ovoa_action=$ovoa_action:$ovoa_action="view";
if(!in_array($ovoa_action,array('add','setadd','cs_collect','viewbody','viewbody2','cs_collect2','cs_collect3','cs_collect4','do_add','do_setadd2','do_setadd3','do_setadd4','edit','do_edit','del','view','chaxun','config','config0','config1','config2','config3','do_config','start','do_start','delrenwu','delrenwu1','del_lieurl','del_recollect'))){
	$Base->ErrorMsg('参数错误，正在跳转到上一页……');exit();
	}
	$dispayb="<!--";
	$dispaye="-->";
	$claid=trim(intval($_GET['claid']));
	$ccid=trim(intval($_GET['ccid']));
	$smarty->assign("ccid",$ccid); 
	$claid?$claid=$claid:$claid=1;
	$smarty->assign("dispayb",$dispayb); 
	$smarty->assign("dispaye",$dispaye); 
	$smarty->assign("claid",$claid); 
switch($ovoa_action){
	case 'start':
		$rewusql = "SELECT * FROM `".$db_prefix."collect`  ORDER BY `id` DESC";	
		$Db->ThisQuery("UPDATE `".$db_prefix."collect_history` SET `is_collecting` =`is_collect`");
		//echo $rewusql;	
		$rewu_source = $Db->ThisQuery($rewusql);
		while($rewu_list = $Db->Fetch($rewu_source)){
		$sort = $Db->Fetch($Db->ThisQuery("SELECT * FROM `".$db_prefix."abcdata` WHERE `channel_id` = '".$rewu_list['csid']."'"));
		$channel = $Db->Fetch($Db->ThisQuery("SELECT * FROM `".$db_prefix."abcdata` WHERE `channel_id` = '".$rewu_list['ccid']."'"));
		//echo $rewu_list['id'];die;
		$ycno=$Db->Rows($Db->ThisQuery("SELECT `id`  FROM `".$db_prefix."collect_history` WHERE `col_id`=".$rewu_list['id']." and `is_collect`=1"));
		$ycno=$ycno==0?"0":$ycno;
		$ncno=$Db->Rows($Db->ThisQuery("SELECT `id`  FROM `".$db_prefix."collect_history` WHERE `col_id`=".$rewu_list['id']." and `is_collect`=0"));
		$ncno=$ncno==0?"0":$ncno;
		$renwulist[] = array('id'=>$rewu_list['id'],'cname'=>$rewu_list['cname'],'cosj'=>$rewu_list['cosj'],'cid'=>$rewu_list['ccid'],'ccname'=>$channel['channel_name'],'sid'=>$rewu_list['csid'],'csname'=>$sort['channel_name'],'ycno'=>$ycno,'ncno'=>$ncno);
		}
		//print_r($renwu);die;
		if(!empty($_GET['channel_id'])){
			if($Db->RowsAll("SELECT * FROM `".$db_prefix."abcdata` WHERE `channel_id` = '".$_GET['channel_id']."'") == 0){
				$Base->ErrorMsg('不存在此频道或此频道已经删除，正在跳转至上一页……');exit();
			}
			$sql = "SELECT * FROM `".$db_prefix."collect_history` WHERE `cid` = '".$_GET['channel_id']."' ORDER BY `id` DESC";
		}
		 if(!empty($_GET['sort_id'])){
			if($Db->RowsAll("SELECT * FROM `".$db_prefix."abcdata` WHERE `channel_id` = '".$_GET['sort_id']."'") == 0){
				$Base->ErrorMsg('该分类不存在 或 已经删除，正在跳转回上一页面……');exit();
			}
			$sql = "SELECT * FROM `".$db_prefix."collect_history` WHERE `sid` = '".$_GET['sort_id']."' ORDER BY `id` DESC";
			}
			if(empty($_GET['channel_id']))
			{
			$sql = "SELECT * FROM `".$db_prefix."collect_history`  ORDER BY `id` DESC";
			}
		//echo $sql;die;
		$_SESSION['session_sql'] = $sql;
		$pageno=intval($_REQUEST['page']);
		if($pageno==0||$pageno<0)$pageno=1;
		$recordcount=$Db->RowsAll($sql);
		$pagerecord=50;//每页记录数
		$page_num=intval($recordcount/$pagerecord);
		if(($recordcount != 0 and($recordcount%$pagerecord)>0) or $recordcount == 0) $page_num++;
		if ($page_num<$pageno) $pageno=$page_num;
		$recordstart=($pageno-1)*$pagerecord;
		$recordend=$recordstart+$pagerecord;
		if($recordend>=$recordcount) $recordend=$recordcount;
		$pagesql=$sql." LIMIT $recordstart,$pagerecord";
		$article_source = $Db->ThisQuery($pagesql);
		if($Db->Rows($article_source) == 0){
			$Base->ErrorMsg('暂无任务列表 ，正在跳转至任务列表添加页面……','collect.php?action=add');exit();
		}
		while($article_list = $Db->Fetch($article_source)){
		    if (!$article_list['cid']){
		    $sort = $Db->Fetch($Db->ThisQuery("SELECT * FROM `".$db_prefix."abcdata` WHERE `channel_id` = '".$article_list['sid']."'"));
			$channel = $Db->Fetch($Db->ThisQuery("SELECT * FROM `".$db_prefix."abcdata` WHERE `channel_id` = '".$article_list['cid']."'"));
		    }
		    else{
			$sort = $Db->Fetch($Db->ThisQuery("SELECT * FROM `".$db_prefix."abcdata` WHERE `channel_id` = '".$article_list['cid']."'"));
			$channel = $Db->Fetch($Db->ThisQuery("SELECT * FROM `".$db_prefix."abcdata` WHERE `channel_id` = '".$sort['channel_root_id']."'"));
			 }
			$renwu= $Db->Fetch($Db->ThisQuery("SELECT * FROM `".$db_prefix."collect` WHERE `id` = '".$article_list['col_id']."'"));
			
			$iscollect=$article_list['is_collect']==1?"<font color=green>已采集</font>":"<font color=red>未采集</font>";
			$article[] = array('id'=>$article_list['id'],'col_id'=>$article_list['col_id'],'cname'=>$renwu['cname'],'cid'=>$article_list['cid'],'fullurl'=>$article_list['fullurl'],'iscollect'=>$iscollect);
			unset($iscollect);
		}
		//print_r($article);die;
		if(!empty($_GET['channel_id'])){
			$this_url = "collect.php?action=".$ovoa_action."&channel_id=".$_GET['channel_id'];
		}else if(!empty($_GET['sort_id'])){
			$this_url = "collect.php?action=".$ovoa_action."&sort_id=".$_GET['sort_id'];
		}else{
			$this_url = "collect.php?action=".$ovoa_action;
		}
		$clist = $Db->FetchAll("SELECT * FROM `".$db_prefix."abcdata` ORDER BY `channel_order`");
		if($clist){
		foreach($clist as $temp){
			 if(empty($temp['channel_root_id'])) {
		$chnanellist.="<a href=\"collect.php?action=start&channel_id=".$temp['channel_id']."\">".$temp['channel_name']."</a>&nbsp;";
			 }
		}
		}else
		{
		$chnanellist.="暂没有添加一级类!";
		}
		$cl_id=$_GET['channel_id'];
		$cl_id2=$_GET['cl_id'];
		if((empty($cl_id))and(empty($cl_id2))){
		$cl_id=11;
		}
		elseif(!empty($cl_id2)){
		$cl_id=$cl_id2;
		}
		$slist = $Db->FetchAll("SELECT * FROM `".$db_prefix."abcdata` where `channel_root_id`=".$cl_id." ORDER BY `channel_order`");
		if($slist){
		foreach($slist as $temp){
		$sortlist.="<a href=\"collect.php?action=view&sort_id=".$temp['channel_id']."&channel_id=".$temp['channel_root_id']." \">".$temp['channel_name']."</a>&nbsp;";
		}
		}
		else
		{
		$sortlist="暂时没有添加二级类";
		}
		$smarty->assign("channel_list",$chnanellist); 
		$smarty->assign("sort_list",$sortlist); 
		$smarty->assign("this_url",$this_url);  
		$smarty->assign("list_num",$recordcount);  
		$smarty->assign("page_now",$pageno);
		$smarty->assign("page_frist",$this_url."&page=1");		
		$smarty->assign("page_pre",$this_url."&page=".($pageno-1));
		$smarty->assign("page_last",$this_url."&page=".($pageno+1));
		$smarty->assign("page_final",$this_url."&page=".$page_num);
		$smarty->assign("page_num",$page_num);	
		$smarty->assign("article",$article);  
		$smarty->assign("renwulist",$renwulist);  
		$smarty->display('collect/collect_urllist.html');
	break;
	case 'do_start':
		$cid=intval(trim($_GET['cid']));
		$sqltj="SELECT `id` FROM `".$db_prefix."collect_history` where col_id=".$cid." and `is_collect`=0 ";
		$c_source = $Db->ThisQuery($sqltj);
		$m=1;
		while($clist = $Db->Fetch($c_source)){
		$ccid=$clist['id'];
		echo "正在采集第".$m."条信息：<iframe src=\"collect.php?action=config2&cid=".$cid."&ccid=".$ccid."\" width=100% height=40 scrolling=no frameborder=0></iframe>";
		$m++;
		}
	//$Base->AlertMsg('暂时无法开始采集，正在跳转至采集列表……','collect.php?action=view');exit();
	break;
	case 'config':
		$article_id=intval(trim($_GET['article_id']));
		$cosj=intval(trim($_GET['cosj']));//采集时间间隔
		$conre= $Db->Fetch($Db->ThisQuery("SELECT * FROM `".$db_prefix."collect` where id=".$article_id." "));
		$purln=$conre['idurl'];
		$cid=$conre['ccid'];
		$sid=$conre['csid'];
		$bid=$conre['cc_bid'];
		$eid=$conre['cc_eid'];
		$buno=intval($conre['cc_buno']);
		$isid=$conre['isid']; 
		$charset=$conre['charset'];
		$liebiao_ruler=$conre['liebiao_ruler'];
		$liebiao_nrruler=$conre['liebiao_nrruler'];
		if(intval($bid)){
		echo "正在配置采集链接链接......<br>";
		for($m=$bid;$m<=$eid;$m=$m+$buno){ 
			$purl=str_replace("[ID]",$m,$purln);
			echo $purl."<br>";
			$conums=$Db->RowsAll("SELECT `id` FROM `".$db_prefix."collect_liebiao` WHERE `coid` =".$article_id." and `ccid`=".$cid." and `csid`=".$sid." and `lieurl`='".$purl."' ");
		if($conums==0)
		{
		$Db->ThisQuery("INSERT INTO `".$db_prefix."collect_liebiao` (`coid`,`ccid`,`csid`,`lieurl`) VALUES (".$article_id.",".$cid.",".$sid.",'".$purl."')");
		//echo "正在采集第".$m."条列表链接：<iframe src=\"collect.php?action=config1&m=".$m."&article_id=".$article_id."\" width=100% height=35 scrolling=no frameborder=0></iframe>";
		}
		else
		{
		$conlist= $Db->Fetch($Db->ThisQuery("SELECT `id`,`lieurlno` FROM `".$db_prefix."collect_liebiao` WHERE `coid` =".$article_id." and `ccid`=".$cid." and `csid`=".$sid." and `lieurl`='".$purl."'"));
		echo "<font color=green><b>".$purl."</b></font>已经配置过...请不要重复采集，如需重新采集，请先<a href=\"collect.php?action=del_lieurl&lid=".$article_id."\" target=\"right\"><font color=red>点击此处清除本条链接信息</font></a>，然后重新采集链接。。</font><br>";
		//exit();
		}
		}
		}else{
			echo "不是规则ID无需配置采集链接";
		}
		$zhurl2="collect.php?action=config0&article_id=".$article_id."&cosj=".$cosj;
		//echo $zhurl2;die;
		$Base->AlertMsg("配置成功条列表链接，正在跳转至采集列表……",$zhurl2);exit();
	break;
	case 'config0'://批量采集配置列表链接
		$article_id=intval(trim($_GET['article_id']));
		$cosj=intval(trim($_GET['cosj']));//采集时间间隔
		$type=trim($_GET['type']);
		$p=trim($_GET['page']);
		$d=trim($_GET['D']);
		$ts=trim($_GET['ts']);
		$newshu=trim($_GET['newshu']);
		$sql="select `ID`,`coid`,`isco` from `".$db_prefix."collect_liebiao` where `coid`=".$article_id." ";//and `isco`=0 
	    if(!empty($p)){
			$p=intval($p); 
			$d=$d; }
			else{
			 $p=1;
			 $d=$Ds;
		}
  		$i=0;
  		$Sshu=0;
  		$Tshu=0;
		$pageno=intval($_REQUEST['page']);
		if($pageno==0||$pageno<0)$pageno=1;
		$recordcount=$Db->RowsAll($sql);
		$pagerecord=1;//每页记录数
		$page_num=intval($recordcount/$pagerecord)+1;
		if($pageno>$page_num){
		$dds=time();
		$usetime=$dds-$d;
		echo "收集成功:共收集页面".$recordcount."个,总费时".$usetime."秒,完成时间:".date("Y-m-d:h:i:s");
		exit();
		}
		if(($recordcount != 0 and($recordcount%$pagerecord)>0) or $recordcount == 0) $page_num++;
		if ($page_num<$pageno) $pageno=$page_num;
		$recordstart=($pageno-1)*$pagerecord;
		$recordend=$recordstart+$pagerecord;
		if($recordend>=$recordcount) $recordend=$recordcount;
		$pagesql=$sql." LIMIT $recordstart,$pagerecord";
		$article_source = $Db->ThisQuery($pagesql);
		if($Db->Rows($article_source) == 0){
			echo '对不起!!此链接都已经采集完毕，无须在次采集，如果需要重新采集，请重新清空采集列表……';
		}
		if(!empty($sql)){
		echo "<b><font color=\"#FF0000\">正在收集所需的资料,请等待......</font></b>";
		}
		$cjnums=$pagerecord*$pageno-$pagerecord+1;
		while($article_list = $Db->Fetch($article_source)){
		$i++;	
		if($article_list['isco']==0){
		echo "正在采集第".$cjnums."条信息：<iframe src=\"collect.php?action=config1&m=".$m."&article_id=".$article_id."&lid=".$article_list['ID']."\" width=100% height=220 scrolling=no frameborder=0></iframe>";
		}else{
		echo "<font color=green><b>".$purl."</b></font>已经配置过...请不要重复采集，如需重新采集，请先<a href=\"collect.php?action=del_lieurl&lid=".$article_id."\" target=\"right\"><font color=red>点击此处清除本条链接信息</font></a>，然后重新采集链接。。</font><br>";
		}
		}
		$shu=$recordcount;
		$Sshu=$pagerecord*$pageno-$pagerecord+1;//起始数
		$Tshu=$Sshu+$i-1;//结束数
		if($recordcount<$Sshu)
		{
		  $pp=$pageno+1;
		  $nurl="collect.php?action=config0&cosj=".$cosj."&article_id=".$article_id."&type=".$type."&ts=".$ts."&newshu=".$shu."&shu=".$Tshu."&D=".$d."&page=".$pp."";
		  $Base->AlertMsg('正在采集下一页……',$nurl);
		}else{
		$pp=$pageno+1;
		echo "<meta http-equiv=\"refresh\" content=\"".$cosj.";url='collect.php?action=config0&cosj=".$cosj."&article_id=".$article_id."&type=".$type."&ts=".$ts."&newshu=".$shu."&shu=".$Tshu."&D=".$d."&page=".$pp."'\">";
		echo "<br>正在收集:第(".$Sshu."-".$Tshu.")个 共".$recordcount."个";
		}
	
	break;
	//批量采集列表分页内容链接
	case 'config1':
		$article_id=intval(trim($_GET['article_id']));
		$lid=intval(trim($_GET['lid']));
		$conre= $Db->Fetch($Db->ThisQuery("SELECT * FROM `".$db_prefix."collect` where id=".$article_id." "));
		$conlre= $Db->Fetch($Db->ThisQuery("SELECT `lieurl` FROM `".$db_prefix."collect_liebiao` where id=".$lid." "));
		 
		$cid=$conre['ccid'];
		$sid=$conre['csid'];
		$charset=$conre['charset']; 
		echo $liebiao_ruler=$conre['liebiao_ruler'];
		echo $liebiao_nrruler=$conre['liebiao_nrruler']; 
		$m=intval(trim($_GET['m']));
		$purl=$conlre['lieurl'];
		echo $purl."<br>";
		$bodys = $charset=="gb2312" ? g2u(ovovgetfile($purl)):ovovgetfile($purl);
		
		$bodyinfo=ovcolect_content($liebiao_nrruler,$charset,$bodys);
		$bodyinfo=ovcolect_content_all($liebiao_ruler,$charset,$bodyinfo);
		print_r($bodyinfo);
		$i=0;
		//获取真实的内容源链接
		//$url = getbaseurl($source,$s);
		print_r($bodyinfo);
		foreach($bodyinfo as $key)
		{
		$fullurl=getbaseurl($purl,$key);
		if($Db->RowsAll("SELECT `id` FROM `".$db_prefix."collect_history` WHERE `col_id` =".$article_id." and `cid`=".$cid." and `sid`=".$sid." and `fullurl`='".$fullurl."' ") == 0)
		{
			$Db->ThisQuery("INSERT INTO `".$db_prefix."collect_history` (`col_id`,`cid`,`sid`,`fullurl`) VALUES (".$article_id.",".$cid.",".$sid.",'".$fullurl."')");
		}
			$i++;
		}
		echo $fullurl."<br>";
		$Db->ThisQuery("update `".$db_prefix."collect_liebiao` set `lieurlno`=".$i.",`isco`=1 where ID=".$lid."");
		echo "<font color=red>采集完毕!共采集".$i."条链接.完成时间:".date("Y-m-d H:i:s")."</font>";
		exit();
	break;
	//批量集体内容页
	case 'config2':
		$coid=intval(trim($_GET['cid']));
		$ccid=intval(trim($_GET['ccid']));
		$conre= $Db->Fetch($Db->ThisQuery("SELECT * FROM `".$db_prefix."collect` where id=".$coid." "));
		$cid=$conre['ccid'];
		$sid=$conre['csid'];
		$charset=$conre['charset'];
		$ctitle_ruler=$conre['ctitle_ruler'];//标题采集规则
		$ccontent_ruler=$conre['ccontent_ruler'];//内容采集规则
		$time_ruler=$conre['time_ruler'];//时间采集规则
		$ccomfrom_ruler=$conre['ccomfrom_ruler'];
		$cauthor_ruler=$conre['cauthor_ruler'];
		if(!empty($ccid)){
		$ccre= $Db->Fetch($Db->ThisQuery("SELECT * FROM `".$db_prefix."collect_history` where id=".$ccid." "));
		$purl=$ccre['fullurl'];
		}
		$s = $charset=="gb2312" ? g2u(ovovgetfile($purl)):ovovgetfile($purl);
		$title=htmlspecialchars(ovcolect_content($ctitle_ruler,$charset,$s));//标题
		$content=htmlspecialchars(clsao(ovcolect_content($ccontent_ruler,$charset,$s)));//内容
		$csj=clsao(ovcolect_content($time_ruler,$charset,$s));//时间
		$ccomfrom=clsao(ovcolect_content($ccomfrom_ruler,$charset,$s));//来源
		$ccomfrom=htmlspecialchars(str_replace("&nbsp;","",trim($ccomfrom)));
		$cauthor=clsao(ovcolect_content($cauthor_ruler,$charset,$s));//作者
		$cauthor=htmlspecialchars(str_replace("&nbsp;","",trim($cauthor)));
		echo $cauthor;die;
		$csj=str_replace("/","-",trim($csj));
		$csj=str_replace("&nbsp;","",trim($csj));
		$sj=empty($csj)?time():intval(strtotime($csj)); 
		$addtime=time();
		$Db->ThisQuery("update `".$db_prefix."collect_history` set `collect_sj`=now(),`is_collect`=1 WHERE `id`=".$ccid." ");
		if($Db->RowsAll("SELECT `article_id` FROM `".$db_prefix."article` WHERE `coid` =".$ccid." ") == 0)
		{
		$Db->ThisQuery("INSERT INTO `".$db_prefix."article` (`uid`,`coid`,`article_title`,`article_source`,`article_author`,`article_content`,`article_cid`,`article_sid`,`add_time`,`addtime`,`article_add_user`,`article_is_locked`) VALUES (".intval($_SESSION['user_id']).",".$ccid.",'".$title."','".$ccomfrom."','".$cauthor."','".$content."',".$cid.",".$sid.",".$sj.",".$addtime.",'ovov_collect',1)");
		}else
		{
		$Db->ThisQuery("update `".$db_prefix."article` set `article_title`='".$title."',`article_source`='".$ccomfrom."',`article_author`='".$cauthor."',`article_content`='".$content."',`article_cid`=".$cid.",`article_sid`=".$sid.",`add_time`=".$sj.",`addtime`=".$addtime.",`article_add_user`='ovov_collect',`article_is_locked`=1 WHERE `coid` =".$ccid." ");
		}
		echo "【标题】：".$title."<br>【作者】：".$cauthor."<br>【来源】：".$ccomfrom."<br><font color=red>[OK!Finish time:".date("Y-m-d H:i:s")."]</font><br>";
		exit();
	break;
	//批量集体内容页
	case 'config3':
		$type=trim($_GET['type']);
		$cosj=intval(trim($_GET['cosj']));
		$coid=intval(trim($_GET['coid']));
		$p=trim($_GET['page']);
		$d=trim($_GET['D']);
		$ts=trim($_GET['ts']);
		$newshu=trim($_GET['newshu']);
		$sql="select `id`,`col_id` from `".$db_prefix."collect_history` where `col_id`=".$coid." and `is_collecting`=0 ";
	    if(!empty($p)){
			$p=intval($p); 
			$d=$d; }
			else{
			 $p=1;
			 $d=$Ds;
		}
  		$i=0;
  		$Sshu=0;
  		$Tshu=0;
		$pageno=intval($_REQUEST['page']);
		if($pageno==0||$pageno<0)$pageno=1;
		$recordcount=$Db->RowsAll($sql);
		$pagerecord=1;//每页记录数
		$page_num=intval($recordcount/$pagerecord)+1;
		if($pageno>$page_num){
		$dds=time();
		$usetime=$dds-$d;
		echo "收集成功:共收集页面".$recordcount."个,总费时".$usetime."秒,完成时间:".date("Y-m-d:h:i:s");
		exit();
		}
		if(($recordcount != 0 and($recordcount%$pagerecord)>0) or $recordcount == 0) $page_num++;
		if ($page_num<$pageno) $pageno=$page_num;
		$recordstart=($pageno-1)*$pagerecord;
		$recordend=$recordstart+$pagerecord;
		if($recordend>=$recordcount) $recordend=$recordcount;
		$pagesql=$sql." LIMIT $recordstart,$pagerecord";
		$article_source = $Db->ThisQuery($pagesql);
		if($Db->Rows($article_source) == 0){
			echo '对不起!!都已经采集完毕，无须在次采集，如果需要重新采集，请重新清空采集列表……';exit();
		}
		if(!empty($sql)){
		echo "<b><font color=\"#FF0000\">正在收集所需的资料,请等待......</font></b>";
		}
		$cjnums=$pagerecord*$pageno-$pagerecord+1;
		while($article_list = $Db->Fetch($article_source)){
		$i++;	
		echo "正在采集第".$cjnums."条信息：<iframe src=\"collect.php?action=config2&cid=".$article_list['col_id']."&ccid=".$article_list['id']."\" width=100% height=120 scrolling=no frameborder=0></iframe>";
		}
		$shu=$recordcount;
		$Sshu=$pagerecord*$pageno-$pagerecord+1;//起始数
		$Tshu=$Sshu+$i-1;//结束数
		if($recordcount<$Sshu)
		{
		  $pp=$pageno+1;
		  $nurl="collect.php?action=config3&type=".$type."&shu=".$shu."&D=".$d."&page=".$pp;
		   $Base->AlertMsg('正在采集下一页……',$nurl);
		}else{
		$pp=$pageno+1;
		echo "<meta http-equiv=\"refresh\" content=\"".$cosj.";url='collect.php?action=config3&type=".$type."&ts=".$ts."&newshu=".$shu."&shu=".$Tshu."&D=".$d."&page=".$pp."&cosj=".$cosj."&coid=".$coid."'\">";
		echo "<br>正在收集:第(".$Sshu."-".$Tshu.")个 共".$recordcount."个";
		}
	break;
	case 'do_config':
	$Base->AlertMsg('暂时无法配置采集规则，正在跳转至采集列表……','collect.php?action=view');exit();
	break;

	case 'add':
		//$smarty->debugging = true;
		$channel = $Db->FetchAll("SELECT * FROM `".$db_prefix."abcdata` where  `channel_root_id` = 0 ORDER BY `channel_order`");
		$channel_list = "\n<select id=\"article_channel\" name=\"article_channel\" onChange=\"getSortList(this.form);\">\n";
		$channel_list = $channel_list."<option value=\"\" >请选择</option>\n";
		if($channel){
			foreach($channel as $temp){
				$channel_list = $channel_list."<option value=\"".$temp['channel_id']."\">".$temp['channel_name']."</option>\n";
			}
		}else{
			$channel_list = "<font color=red>暂无频道！<a href=\"channel.php?action=add\">添加频道</a></font>";
		}
		$channel_list = $channel_list."</select>\n";
		$smarty->assign("channel_list",$channel_list);
		$smarty->display("collect/collect_add.html");
	break;
	case 'setadd':
		if(empty($ccid)){
			$Base->ErrorMsg('参数不正确，正在返回上一页……','collect.php?action=add');exit();
		}
		$article = $Db->Fetch($Db->ThisQuery("SELECT * FROM `".$db_prefix."collect` WHERE `id` = ".intval($ccid).""));
		$article['ctitle_ruler']=stripslashes($article['ctitle_ruler']);
		$article['ccontent_ruler']=stripslashes($article['ccontent_ruler']);
		$article['time_ruler']=stripslashes($article['time_ruler']);
		$article['liebiao_ruler']=stripslashes($article['liebiao_ruler']);
		$article['liebiao_nrruler']=stripslashes($article['liebiao_nrruler']);
		$channel = $Db->FetchAll("SELECT * FROM `".$db_prefix."abcdata` where  `channel_root_id` = 0 and `channel_id`!=154 ORDER BY `channel_order`");
		$channel_list = "\n<select id=\"article_channel\" name=\"article_channel\" onChange=\"getSortList(this.form);\">\n";
		$channel_list = $channel_list."<option value=\"\" >请选择</option>\n";
		if($channel){
			foreach($channel as $temp){
				$channel_list = $channel_list."<option value=\"".$temp['channel_id']."\">".$temp['channel_name']."</option>\n";
			}
		}else{
			$channel_list = "<font color=red>暂无频道！<a href=\"channel.php?action=add\">添加频道</a></font>";
		}
		$set_sort = $Db->thisQuery("SELECT * FROM `".$db_prefix."abcdata` WHERE `channel_root_id` = '".$article['ccid']."'");
		while($rowset = $Db->Fetch($set_sort)){
		   $setsort[] = $rowset;
		}
		
		$channel_list = $channel_list."</select>\n";
		$smarty->assign("setarticle",$article);
		$smarty->assign("setsort",$setsort);
		$smarty->assign("channel_list",$channel_list);
		$smarty->display("collect/collect_add.html");
	break;
	case 'do_add':
		$cname = htmlspecialchars(trim($_POST['cname']));
		$cccharset=htmlspecialchars(trim($_POST['cccharset']));
		$channel_id = htmlspecialchars(trim($_POST['article_channel']));
		$sort = htmlspecialchars(trim($_POST['article_root_id']));
		$purl = (trim($_POST['purl']));
		$cosj=intval(trim($_POST['cosj']));
		$plurl = (trim($_POST['plurl']));
		$pcurl = (trim($_POST['pcurl']));
		$ctitle_ruler = (trim($_POST['ctitle_ruler']));
		$ccontent_ruler = (trim($_POST['ccontent_ruler']));
		$liebiao_ruler=(trim($_POST['liebiao_ruler']));
		$time_ruler = (trim($_POST['time_ruler']));
		$liebiao_nrruler=(trim($_POST['liebiao_nrruler']));
		$liebiaoid = htmlspecialchars(trim($_POST['liebiaoid']));
		$cc_url = (trim($_POST['cc_url']));
		$cc_bid = htmlspecialchars(trim($_POST['cc_bid']));
		$cc_eid = htmlspecialchars(trim($_POST['cc_eid']));
		$cc_buno=intval(trim($_POST['cc_buno']));
		$url_list = htmlspecialchars(trim($_POST['url_list']));
		if (empty($sort)){
		    $sort=0;
		}
		if(empty($liebiaoid)){$liebiaoid=0;}
		if(empty($cname) || empty($purl)){
			$Base->ErrorMsg('填写信息不完整，正在返回上一页……');exit();
		}

		$s= ovovgetfile($purl);
		$charset_ruler=getrole("charset=||\"",'gb2312');//字符编码
		preg_match("/".$charset_ruler."/iU",$s,$tt);
		if($tt[1]){
			$Db->ThisQuery("INSERT INTO `".$db_prefix."collect` (`cname`,`charset`,`purl`,`ccid`,`csid`,`cosj`) VALUES ('".$cname."','".$tt[1]."','".$purl."','".$channel_id."','".$sort."',".$cosj.")");
			$ccid=mysql_insert_id(); 
			$claid=$claid+1;
			$Base->AlertMsg('配置成功，正在转入第二步配置采集参数……','collect.php?action=setadd&claid='.$claid.'&ccid='.$ccid);exit();
		}else{
			$Base->AlertMsg('该链接不能采集，请确认链接是否能打开……','collect.php?action=view');exit();
		}
	break;
	
	case 'cs_collect'://测试采集
		$purl = (trim($_GET['purl']));
	  	$s=ovovgetfile($purl);
		$charset_ruler=getrole("charset=||\"",'gb2312');//字符编码
		preg_match("/".$charset_ruler."/iU",$s,$tt);
		echo "您要采集的网址是：".$purl;
		if($tt[1]){echo "<br>网站编码：".$tt[1]."<br><br><font color=green>该网址可以采集！！！</font>";}else{echo "<br><br><font color=red>该网址无法采集！！！</font>";};
		exit();
	break;
	//第二步采集测试
	case 'cs_collect2'://测试采集
		$cc_url = trim($_GET['cc_url']);
		$bid = intval(trim($_GET['bid']));
		$eid = intval(trim($_GET['eid']));
		$buno = intval(trim($_GET['buno']));
		for($m=$bid;$m<=$eid;$m=$m+$buno){ 
			$purl=str_replace("[ID]",$m,$cc_url);
		echo "您要采集的网址是：".$purl."<BR>";
		}
		exit();
	break;
	//第三步采集
	case 'cs_collect3':
		$ccid = intval(trim($_GET['ccid']));
		$cc_lurl=trim($_GET['cc_lurl']);
		$ruler = stripslashes(trim($_GET['ruler']));
		$lruler = stripslashes(trim($_GET['lruler']));
		$article = $Db->Fetch($Db->ThisQuery("SELECT * FROM `".$db_prefix."collect` WHERE `id` = ".intval($ccid).""));
		$article['charset']=="gb2312" ? $bodys=g2u(ovovgetfile($cc_lurl)):$bodys=ovovgetfile($cc_lurl);
		$bodyinfo=ovcolect_content($ruler,$article['charset'],$bodys);
		if($lruler){
		$bodyinfo=ovcolect_content_all($lruler,$article['charset'],$bodyinfo);
		print_r($bodyinfo);
		}else{
		echo "源代码：<textarea name=\"textarea\" id=\"textarea\" cols=\"65\" rows=\"4\">".$bodyinfo."</textarea><br><br><br>";
		echo $bodyinfo;
		}
		exit();
	break;
	//第四步采集
	case 'cs_collect4':
		$ccid = intval(trim($_GET['ccid']));
		$ruler = stripslashes(trim($_GET['ruler']));
		$cc_curl = stripslashes(trim($_GET['cc_curl']));
		$article = $Db->Fetch($Db->ThisQuery("SELECT * FROM `".$db_prefix."collect` WHERE `id` = ".intval($ccid).""));
		$article['charset']=="gb2312" ? $bodys=g2u(ovovgetfile($cc_curl)):$bodys=ovovgetfile($cc_curl);
		$bodys=ovcolect_content($ruler,$article['charset'],$bodys);
		echo "源代码：<textarea name=\"textarea\" id=\"textarea\" cols=\"65\" rows=\"4\">".$bodys."</textarea><br><br><br>";
		echo $bodys;
		exit();
	break;
	//查看源代码
	case 'viewbody':
		$ccid = intval(trim($_GET['ccid']));
		$ruler = trim($_GET['ruler']);
		$cc_lurl=trim($_GET['cc_lurl']);
		$article = $Db->Fetch($Db->ThisQuery("SELECT * FROM `".$db_prefix."collect` WHERE `id` = ".intval($ccid).""));
		//$idurl=stripslashes($article['idurl']);
		//$cc_bid=stripslashes($article['cc_bid']);
		//$ccurl=str_replace("[ID]",$cc_bid,$idurl);
		$article['charset']=="gb2312" ? $bodys=g2u(ovovgetfile($cc_lurl)):$bodys=ovovgetfile($cc_lurl);
		$body_ruler=getrole("</head>||</body>",$article['charset']);//字符编码
		preg_match("/".$body_ruler."/iU",$bodys,$bdtt);
		echo "<textarea name=\"textarea\" id=\"textarea\" cols=\"92\" rows=\"22\">".$bdtt[1]."</textarea>";
	break;
	case 'viewbody2':
		$ccid = intval(trim($_GET['ccid']));
		$cc_curl = trim($_GET['cc_curl']);
		$article = $Db->Fetch($Db->ThisQuery("SELECT * FROM `".$db_prefix."collect` WHERE `id` = ".intval($ccid).""));
		//echo getfile($cc_curl);
		$article['charset']=="gb2312" ? $bodys=g2u(ovovgetfile($cc_curl)):$bodys=ovovgetfile($cc_curl);
		$body_ruler=getrole("</head>||</body>",$article['charset']);//字符编码
		preg_match("/".$body_ruler."/iU",$bodys,$bdtt);
		echo "<textarea name=\"textarea\" id=\"textarea\" cols=\"92\" rows=\"22\">".$bdtt[1]."</textarea>";
	break;
	
	case 'do_setadd2'://保存第二步
		$cccharset=htmlspecialchars(trim($_POST['cccharset']));
		$liebiaoid = intval(trim($_POST['liebiaoid']));
		$cc_url = (trim($_POST['cc_url']));
		$cc_bid = htmlspecialchars(trim($_POST['cc_bid']));
		$cc_eid = htmlspecialchars(trim($_POST['cc_eid']));
		$cc_buno=intval(trim($_POST['cc_buno']));
		$url_list = htmlspecialchars(trim($_POST['url_list']));
		if(empty($cc_url) || empty($liebiaoid)){
			$Base->ErrorMsg('填写信息不完整，正在返回上一页……');exit();
		}
		$Db->ThisQuery("UPDATE `".$db_prefix."collect` SET `charset`='".$cccharset."',`isid`='".$liebiaoid."',`idurl`='".$cc_url."',`cc_bid`='".$cc_bid."',`cc_eid`='".$cc_eid."',`cc_buno`='".$cc_buno."',`urlcontent`='".$url_list."' WHERE `id` = ".$ccid."");
			$claid=$claid+1;
			$Base->AlertMsg('配置成功，正在转入第三步配置采集链接……','collect.php?action=setadd&claid='.$claid.'&ccid='.$ccid);exit();
	break;
	case 'do_setadd3'://保存第三步
		$cc_lurl=trim($_POST['cc_lurl']);
		$liebiao_nrruler=stripslashes(trim($_POST['liebiao_nrruler']));
		$liebiao_ruler = stripslashes(trim($_POST['liebiao_ruler']));
		if(empty($liebiao_nrruler) || empty($liebiao_ruler)){
			$Base->ErrorMsg('填写信息不完整，正在返回上一页……');exit();
		}
		$Db->ThisQuery("UPDATE `".$db_prefix."collect` SET `cc_lurl`='".$cc_lurl."',`liebiao_ruler`='".$liebiao_ruler."',`liebiao_nrruler`='".$liebiao_nrruler."' WHERE `id` = ".$ccid."");
			$claid=$claid+1;
			$Base->AlertMsg('配置成功，正在转入第四步配置采集内容……','collect.php?action=setadd&claid='.$claid.'&ccid='.$ccid);exit();
	break;
	case 'do_setadd4'://保存第四步
		$cc_curl=(trim($_POST['cc_curl']));
		$ctitle_ruler = stripslashes(trim($_POST['ctitle_ruler']));
		$ctitle_comfrom = stripslashes(trim($_POST['ctitle_comfrom']));
		$ctitle_author = stripslashes(trim($_POST['ctitle_author']));
		$ccontent_ruler = stripslashes(trim($_POST['ccontent_ruler']));
		$time_ruler = stripslashes(trim($_POST['time_ruler']));
		if(empty($ctitle_ruler) || empty($ccontent_ruler)){
			$Base->ErrorMsg('填写信息不完整，正在返回上一页……');exit();
		}
		$Db->ThisQuery("UPDATE `".$db_prefix."collect` SET `cc_curl`='".$cc_curl."',`ccomfrom_ruler`='".$ctitle_comfrom."',`cauthor_ruler`='".$ctitle_author."',`ctitle_ruler`='".$ctitle_ruler."',`ccontent_ruler`='".$ccontent_ruler ."',`time_ruler`='".$time_ruler ."' WHERE `id` = ".$ccid."");
		$claid=$claid+1;
		$Base->AlertMsg('恭喜您，您已经成功配置……','collect.php?action=setadd&claid='.$claid.'&ccid='.$ccid);exit();
	break;
	
	case 'edit':
		//$smarty->debugging = true;
		$article_id = $_GET['article_id'];
		if(empty($article_id)){
			$Base->ErrorMsg('参数错误，正在跳转至上一页……');exit();
		}
		if($Db->RowsAll("SELECT * FROM `".$db_prefix."collect` WHERE `id` = '".$article_id."'") == 0){
			$Base->ErrorMsg('此任务不存在或已经删除，正在返回上一页……');exit();
		}
		$article = $Db->Fetch($Db->ThisQuery("SELECT * FROM `".$db_prefix."collect` WHERE `id` = '".$article_id."'"));
			$article['ctitle_ruler']=stripslashes($article['ctitle_ruler']);
			$article['ccontent_ruler']=stripslashes($article['ccontent_ruler']);
			$article['time_ruler']=stripslashes($article['time_ruler']);
			$article['liebiao_ruler']=stripslashes($article['liebiao_ruler']);
			$article['liebiao_nrruler']=stripslashes($article['liebiao_nrruler']);
		
		$article_sort = $Db->thisQuery("SELECT * FROM `".$db_prefix."abcdata` WHERE `channel_root_id` = '".$article['ccid']."'");
		while($row = $Db->Fetch($article_sort)){
		   $article1[] = $row;
		}
		$channel = $Db->FetchAll("SELECT * FROM `".$db_prefix."abcdata` where `channel_root_id` = 0 and `channel_id`!=154 ORDER BY `channel_order`");
		$channel_list = "\n<select id=\"article_channel\" name=\"article_channel\" onChange=\"getSortList(this.form)\">\n";
		$channel_list = $channel_list."<option value=\"\">请选择</option>\n";
		foreach($channel as $temp){
		 if (($article['ccid']==$temp['channel_id'])) { 
		 		 $channel_list = $channel_list."<option value=\"".$temp['channel_id']."\"  selected>".$temp['channel_name']."</option>\n";
		 }
		 else{
		 $channel_list = $channel_list."<option value=\"".$temp['channel_id']."\" >".$temp['channel_name']."</option>\n";
		 }
		 }
		$channel_list = $channel_list."</select>\n";
		$smarty->assign("channel_list",$channel_list);
		$smarty->assign("article",$article);
		$smarty->assign("article1",$article1);
		$smarty->display("collect/collect_edit.html");
	break;
	case 'do_edit':
		$article_id = intval(trim($_GET['article_id']));
		if(empty($article_id)){
			$Base->ErrorMsg('参数错误，正在跳转至上一页……');exit();
		}
		if($Db->RowsAll("SELECT * FROM `".$db_prefix."collect` WHERE `id` = '".$article_id."'") == 0){
			$Base->ErrorMsg('此任务不存在或已经删除，正在返回上一页……');exit();
		}
		$cname = htmlspecialchars(trim($_POST['cname']));
		$channel_id = intval(trim($_POST['article_channel']));
		$sort = intval(trim($_POST['article_root_id']));
		$purl=trim($_POST['purl']);
		$cosj=intval(trim($_POST['cosj']));
		$cloects= ovovgetfile($purl);
		$charset_ruler=getrole("charset=||\"",'gb2312');//字符编码
		preg_match("/".$charset_ruler."/iU",$cloects,$tt);
		$cccharset=$tt[1];
		if(empty($cname)){
			$Base->ErrorMsg('填写信息不完整，正在返回上一页……');exit();
		}
		$Db->ThisQuery("UPDATE `".$db_prefix."collect` SET `cname`='".$cname."',`charset`='".$cccharset."',`ccid`=".$channel_id.",`csid`=".$sort.",`purl`='".$purl."',`cosj`=".$cosj." WHERE `id` = ".$article_id."");
		$Base->AlertMsg('修改配置成功，正在转入第二步配置采集参数……','collect.php?action=setadd&claid=2&ccid='.$article_id);exit();
	break;
	case 'del':
		$article_id = $_GET['article_id'];
		if(empty($article_id)){
			$Base->ErrorMsg('参数错误，正在跳转至上一页……');exit();
		}
		if($Db->RowsAll("SELECT * FROM `".$db_prefix."collect` WHERE `id` = '".$article_id."'") == 0){
			$Base->ErrorMsg('此任务不存在或已经删除，正在返回上一页……');exit();
		}
		$article_id_array = explode(",",$article_id);
		foreach($article_id_array as $temp){
			if(!empty($temp)){
				$Db->ThisQuery("DELETE FROM `".$db_prefix."collect` WHERE `id` = '".$temp."'");
			}
		}
		$Base->AlertMsg('删除采集任务成功，正在跳转至采集任务列表……','collect.php?action=view');exit();
	break;
	case 'delrenwu':
		$article_id = $_GET['article_id'];
		if(empty($article_id)){
			$Base->ErrorMsg('参数错误，正在跳转至上一页……');exit();
		}
		if($Db->RowsAll("SELECT * FROM `".$db_prefix."collect_history` WHERE `col_id` = '".$article_id."'") == 0){
			$Base->ErrorMsg('此任务不存在或已经删除，正在返回上一页……');exit();
		}
		$article_id_array = explode(",",$article_id);
		foreach($article_id_array as $temp){
			if(!empty($temp)){
				$Db->ThisQuery("DELETE FROM `".$db_prefix."collect_history` WHERE `col_id` = '".$temp."'");
			}
		}
		$Base->AlertMsg('删除采集任务成功，正在跳转至采集任务列表……','collect.php?action=start');exit();
	break;
	case 'delrenwu1':
		$article_id = $_GET['article_id'];
		if(empty($article_id)){
			$Base->ErrorMsg('ID参数错误，正在跳转至上一页……');exit();
		}
		if($Db->RowsAll("SELECT * FROM `".$db_prefix."collect_history` WHERE `id` = '".$article_id."'") == 0){
			$Base->ErrorMsg('此任务不存在或已经删除，正在返回上一页……');exit();
		}
		$article_id_array = explode(",",$article_id);
		foreach($article_id_array as $temp){
			if(!empty($temp)){
				$Db->ThisQuery("DELETE FROM `".$db_prefix."collect_history` WHERE `id` = '".$temp."'");
				$Db->ThisQuery("DELETE FROM `".$db_prefix."collect_liebiao` WHERE `coid` = '".$temp."'");
			}
		}
		$Base->AlertMsg('删除采集链接成功，正在跳转至采集任务列表……','collect.php?action=start');exit();
	break;
	case 'del_lieurl':
		$article_id =trim($_GET['lid']);
		if(empty($article_id)){
			$Base->ErrorMsg('参数错误，正在跳转至上一页……');exit();
		}
		if($Db->RowsAll("SELECT * FROM `".$db_prefix."collect_liebiao` WHERE `coid` = '".$article_id."'") == 0){
			$Base->ErrorMsg('此任务不存在或已经删除，正在返回上一页……');exit();
		}
		$article_id_array = explode(",",$article_id);
		foreach($article_id_array as $temp){
			if(!empty($temp)){
				$Db->ThisQuery("DELETE FROM `".$db_prefix."collect_liebiao` WHERE `coid` = '".$temp."'");
			}
		}
		$Base->AlertMsg('删除采集链接成功，需重新采集，正在跳转至采集任务列表……','collect.php?action=view');exit();
	break;
	case 'del_recollect':
		$article_id =trim($_GET['coid']);
		if(empty($article_id)){
			$Base->ErrorMsg('参数错误，正在跳转至上一页……');exit();
		}
		if($Db->RowsAll("SELECT * FROM `".$db_prefix."collect_history` WHERE `col_id` = '".$article_id."'") == 0){
			$Base->ErrorMsg('此任务不存在或已经删除，正在返回上一页……');exit();
		}
		$article_id_array = explode(",",$article_id);
		foreach($article_id_array as $temp){
			if(!empty($temp)){
				$Db->ThisQuery("update `".$db_prefix."collect_history` set  `is_collect`=0,`is_collecting`=0 WHERE `col_id` = '".$temp."'");
			}
		}
		$Base->AlertMsg('重新采集清空，正在跳转至采集任务列表……','collect.php?action=start');exit();
	break;
	case 'view':
		//$smarty->debugging = true;
		if(!empty($_GET['channel_id'])){
			if($Db->RowsAll("SELECT * FROM `".$db_prefix."abcdata` WHERE `channel_id` = '".$_GET['channel_id']."'") == 0){
				$Base->ErrorMsg('不存在此频道或此频道已经删除，正在跳转至上一页……');exit();
			}
			$sql = "SELECT * FROM `".$db_prefix."collect` WHERE `ccid` = '".$_GET['channel_id']."' ORDER BY `id` DESC";
		}
		 if(!empty($_GET['sort_id'])){
			if($Db->RowsAll("SELECT * FROM `".$db_prefix."abcdata` WHERE `channel_id` = '".$_GET['sort_id']."'") == 0){
				$Base->ErrorMsg('该分类不存在 或 已经删除，正在跳转回上一页面……');exit();
			}
			$sql = "SELECT * FROM `".$db_prefix."collect` WHERE `csid` = '".$_GET['sort_id']."' ORDER BY `id` DESC";
		
			}
			if(empty($_GET['channel_id']))
			{
			$sql = "SELECT * FROM `".$db_prefix."collect`  ORDER BY `id` DESC";
			}
		//echo $sql;die;
		$_SESSION['session_sql'] = $sql;
		$pageno=intval($_REQUEST['page']);
		if($pageno==0||$pageno<0)$pageno=1;
		$recordcount=$Db->RowsAll($sql);
		$pagerecord=50;//每页记录数
		$page_num=intval($recordcount/$pagerecord);
		if(($recordcount != 0 and($recordcount%$pagerecord)>0) or $recordcount == 0) $page_num++;
		if ($page_num<$pageno) $pageno=$page_num;
		$recordstart=($pageno-1)*$pagerecord;
		$recordend=$recordstart+$pagerecord;
		if($recordend>=$recordcount) $recordend=$recordcount;
		$pagesql=$sql." LIMIT $recordstart,$pagerecord";
		$article_source = $Db->ThisQuery($pagesql);
		if($Db->Rows($article_source) == 0){
			$Base->ErrorMsg('暂无任务列表 ，正在跳转至任务列表添加页面……','collect.php?action=add');exit();
		}
		while($article_list = $Db->Fetch($article_source)){
		    if (!$article_list['csid']){
		    $sort = $Db->Fetch($Db->ThisQuery("SELECT * FROM `".$db_prefix."abcdata` WHERE `channel_id` = '".$article_list['csid']."'"));
			$channel = $Db->Fetch($Db->ThisQuery("SELECT * FROM `".$db_prefix."abcdata` WHERE `channel_id` = '".$article_list['ccid']."'"));
		    }
		    else{
			$sort = $Db->Fetch($Db->ThisQuery("SELECT * FROM `".$db_prefix."abcdata` WHERE `channel_id` = '".$article_list['csid']."'"));
			$channel = $Db->Fetch($Db->ThisQuery("SELECT * FROM `".$db_prefix."abcdata` WHERE `channel_id` = '".$sort['channel_root_id']."'"));
					    }
			$article[] = array('id'=>$article_list['id'],'cname'=>$article_list['cname'],'cosj'=>$article_list['cosj'],'article_ccid'=>$article_list['ccid'],'article_channel_name'=>$channel['channel_name'],'article_csid'=>$article_list['csid'],'article_sort_name'=>$sort['channel_name'],'charset'=>$article_list['charset'],'ctitle_ruler'=>$article_list['ctitle_ruler'],'ccontent_ruler'=>$article_list['ccontent_ruler'],'idurl'=>$article_list['idurl'],'cc_bid'=>$article_list['cc_bid'],'cc_eid'=>$article_list['cc_eid'],'urlcontent'=>$article_list['urlcontent'],'addsj'=>$article_list['addsj']);
			unset($situation);
		}
		//print_r($article);die;
		if(!empty($_GET['channel_id'])){
			$this_url = "collect.php?action=".$ovoa_action."&channel_id=".$_GET['channel_id'];
		}else if(!empty($_GET['sort_id'])){
			$this_url = "collect.php?action=".$ovoa_action."&sort_id=".$_GET['sort_id'];
		}else{
			$this_url = "collect.php?action=".$ovoa_action;
		}
		$clist = $Db->FetchAll("SELECT * FROM `".$db_prefix."abcdata` where  `channel_id`>1 and `channel_id`<999 and `channel_id`!=154 ORDER BY `channel_order`");
		if($clist){
		foreach($clist as $temp){
			 if(empty($temp['channel_root_id'])) {
		$chnanellist.="<a href=\"collect.php?action=view&channel_id=".$temp['channel_id']."\">".$temp['channel_name']."</a>&nbsp;";
			 }
		}
		}else
		{
		$chnanellist.="暂没有添加一级类!";
		}
		$cl_id=$_GET['channel_id'];
		$cl_id2=$_GET['cl_id'];
		if((empty($cl_id))and(empty($cl_id2))){
		$cl_id=11;
		}
		elseif(!empty($cl_id2)){
		$cl_id=$cl_id2;
		}
		$slist = $Db->FetchAll("SELECT * FROM `".$db_prefix."abcdata` where `channel_root_id`=".$cl_id." ORDER BY `channel_order`");
		if($slist){
		foreach($slist as $temp){
		$sortlist.="<a href=\"collect.php?action=view&sort_id=".$temp['channel_id']."&channel_id=".$temp['channel_root_id']." \">".$temp['channel_name']."</a>&nbsp;";
		}
		}
		else
		{
		$sortlist="暂时没有添加二级类";
		}
		$smarty->assign("channel_list",$chnanellist); 
		$smarty->assign("sort_list",$sortlist); 
		$smarty->assign("this_url",$this_url);  
		$smarty->assign("list_num",$recordcount);  
		$smarty->assign("page_now",$pageno);
		$smarty->assign("page_frist",$this_url."&page=1");		
		$smarty->assign("page_pre",$this_url."&page=".($pageno-1));
		$smarty->assign("page_last",$this_url."&page=".($pageno+1));
		$smarty->assign("page_final",$this_url."&page=".$page_num);
		$smarty->assign("page_num",$page_num);	
		$smarty->assign("article",$article);  
		$smarty->display('collect/collect_list.html');
	break;
	case 'chaxun':
		//$smarty->debugging = true;
		$leibie=trim($_POST['leibie']);
		$guanjianzi=trim($_POST['guanjianzi']);
		if(empty($guanjianzi)){
			$Base->ErrorMsg('关键字为空，正在跳转至文章管理页面……','collect.php?action=view');exit();
		}
		if($leibie==1){
			$sql = "SELECT * FROM `".$db_prefix."collect` WHERE `id` = '".$guanjianzi."' ORDER BY `id` DESC";
		}else if($leibie==2){
			$sql = "SELECT * FROM `".$db_prefix."collect` WHERE `cname` like '%".$guanjianzi."%'  ORDER BY `id` DESC";
		}else{
			$sql = "SELECT * FROM `".$db_prefix."collect`  ORDER BY `id` DESC";
		}
		$_SESSION['session_sql'] = $sql;
		$pageno=intval($_REQUEST['page']);
		if($pageno==0||$pageno<0)$pageno=1;
		$recordcount=$Db->RowsAll($sql);
		$pagerecord=50;//每页记录数
		$page_num=intval($recordcount/$pagerecord);
		if(($recordcount != 0 and($recordcount%$pagerecord)>0) or $recordcount == 0) $page_num++;
		if ($page_num<$pageno) $pageno=$page_num;
		$recordstart=($pageno-1)*$pagerecord;
		$recordend=$recordstart+$pagerecord;
		if($recordend>=$recordcount) $recordend=$recordcount;
		$pagesql=$sql." LIMIT $recordstart,$pagerecord";
		$article_source = $Db->ThisQuery($pagesql);
		if($Db->Rows($article_source) == 0){
			$Base->ErrorMsg('暂无任务列表 ，正在跳转至任务列表添加页面……','collect.php?action=add');exit();
		}
		
		while($article_list = $Db->Fetch($article_source)){
		    if (!$article_list['csid']){
		    $sort = $Db->Fetch($Db->ThisQuery("SELECT * FROM `".$db_prefix."abcdata` WHERE `channel_id` = '".$article_list['csid']."'"));
			$channel = $Db->Fetch($Db->ThisQuery("SELECT * FROM `".$db_prefix."abcdata` WHERE `channel_id` = '".$article_list['ccid']."'"));
		    }
		    else{
			$sort = $Db->Fetch($Db->ThisQuery("SELECT * FROM `".$db_prefix."abcdata` WHERE `channel_id` = '".$article_list['csid']."'"));
			$channel = $Db->Fetch($Db->ThisQuery("SELECT * FROM `".$db_prefix."abcdata` WHERE `channel_id` = '".$sort['channel_root_id']."'"));
					    }
			$article[] = array('id'=>$article_list['id'],'cname'=>$article_list['cname'],'article_ccid'=>$article_list['ccid'],'article_channel_name'=>$channel['channel_name'],'article_csid'=>$article_list['csid'],'article_sort_name'=>$sort['channel_name'],'charset'=>$article_list['charset'],'ctitle_ruler'=>$article_list['ctitle_ruler'],'ccontent_ruler'=>$article_list['ccontent_ruler'],'idurl'=>$article_list['idurl'],'cc_bid'=>$article_list['cc_bid'],'cc_eid'=>$article_list['cc_eid'],'urlcontent'=>$article_list['urlcontent'],'addsj'=>$article_list['addsj']);
			unset($situation);
		}
		//print_r($article);die;
		if(!empty($_GET['channel_id'])){
			$this_url = "collect.php?action=".$ovoa_action."&channel_id=".$_GET['channel_id'];
		}else if(!empty($_GET['sort_id'])){
			$this_url = "collect.php?action=".$ovoa_action."&sort_id=".$_GET['sort_id'];
		}else{
			$this_url = "collect.php?action=".$ovoa_action;
		}
		$clist = $Db->FetchAll("SELECT * FROM `".$db_prefix."abcdata` where  `channel_id`>1 and `channel_id`<999 and `channel_id`!=154 ORDER BY `channel_order`");
		if($clist){
		foreach($clist as $temp){
			 if(empty($temp['channel_root_id'])) {
		$chnanellist.="<a href=\"collect.php?action=view&channel_id=".$temp['channel_id']."\">".$temp['channel_name']."</a>&nbsp;";
			 }
		}
		}else
		{
		$chnanellist.="暂没有添加一级类!";
		}
		$cl_id=$_GET['channel_id'];
		$cl_id2=$_GET['cl_id'];
		if((empty($cl_id))and(empty($cl_id2))){
		$cl_id=11;
		}
		elseif(!empty($cl_id2)){
		$cl_id=$cl_id2;
		}
		$slist = $Db->FetchAll("SELECT * FROM `".$db_prefix."abcdata` where `channel_root_id`=".$cl_id." ORDER BY `channel_order`");
		if($slist){
		foreach($slist as $temp){
		$sortlist.="<a href=\"collect.php?action=view&sort_id=".$temp['channel_id']."&channel_id=".$temp['channel_root_id']." \">".$temp['channel_name']."</a>&nbsp;";
		}
		}
		else
		{
		$sortlist="暂时没有添加二级类";
		}
		$smarty->assign("channel_list",$chnanellist); 
		$smarty->assign("sort_list",$sortlist); 
		$smarty->assign("this_url",$this_url);  
		$smarty->assign("list_num",$recordcount);  
		$smarty->assign("page_now",$pageno);
		$smarty->assign("page_frist",$this_url."&page=1");		
		$smarty->assign("page_pre",$this_url."&page=".($pageno-1));
		$smarty->assign("page_last",$this_url."&page=".($pageno+1));
		$smarty->assign("page_final",$this_url."&page=".$page_num);
		$smarty->assign("page_num",$page_num);	
		$smarty->assign("article",$article);  
		$smarty->display('collect/collect_list.html');
	break;
}
?>