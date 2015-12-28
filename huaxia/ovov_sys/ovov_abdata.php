<?php
session_start();
require_once("common.inc.php");
$User->CheckLogin();
include_once("unsql.php");
$ovoa_action=trim($_GET['action']);
$ovoa_action?$ovoa_action=$ovoa_action:$ovoa_action=trim($_POST['action']);
$ovoa_action?$ovoa_action=$ovoa_action:$ovoa_action="Ovov_DataABC";
$claid=intval(trim($_GET['claid']));
!$claid && $ovoa_action=='userlist' ?$claid=1:'';
$smarty->assign("claid",$claid);
switch($ovoa_action){
	case 'Ovov_DataABC'://基础分类栏目列表管理
		$cid=0;//模板CID,0为系统子类
		//一级
	    $channeld=$Db->FetchAll("select `channel_id`,`channel_root_id`,`channel_name`,`channel_urlname`,`channel_order`,`jibie` from `".$db_prefix."abcdata` where `channel_root_id`=0 and `channel_kid`=".$cid." and `channel_ifdel`=0 order by `channel_order` ");
	    //二级
		$channelx=$Db->FetchAll("select `channel_id`,`channel_root_id`,`channel_name`,`channel_urlname`,`channel_order`,`jibie` from `".$db_prefix."abcdata` where `jibie`=2 and `channel_kid`=".$cid." and `channel_ifdel`=0 order by `channel_order` ");
		//三级
		$channelxx=$Db->FetchAll("select `channel_id`,`channel_root_id`,`channel_name`,`channel_urlname`,`channel_order`,`jibie` from `".$db_prefix."abcdata` where `jibie`=3 and `channel_kid`=".$cid." and `channel_ifdel`=0 order by `channel_order` ");
		//四级
		$channelxxx=$Db->FetchAll("select `channel_id`,`channel_root_id`,`channel_name`,`channel_urlname`,`channel_order`,`jibie` from `".$db_prefix."abcdata` where `jibie`=4 and `channel_kid`=".$cid." and `channel_ifdel`=0 order by `channel_order` ");
		$smarty->assign("channeld",$channeld);
		$smarty->assign("kid",$cid);
		$smarty->assign("channelx",$channelx);
		$smarty->assign("channelxx",$channelxx);
		$smarty->assign("channelxxx",$channelxxx);
		$smarty->display("ovoa/ovov_abdata.html");exit();
	break;
	case 'Ovov_Channel_Add'://添加基础分类栏目
		$url_from=url_from();//获取上页来源URL链接
		$channel_top_id=intval(trim($_GET["id"]));
		$jibie=intval(trim($_GET['jibie']));
		$kid=intval(trim($_GET["kid"]));
		$channel=$Db->FetchAll("select `channel_id`,`channel_root_id`,`channel_name`,`channel_urlname`,`mbname` from `".$db_prefix."abcdata` where  channel_kid=".$kid." order by `channel_order` desc");
		$num=$id?$Db->RowsAll("select `channel_id`,`channel_root_id`,`channel_name`,`channel_urlname` from `".$db_prefix."abcdata` where  channel_kid=".$kid." and `channel_root_id`=".$id." order by `channel_order` desc"):$Db->RowsAll("select `channel_id`,`channel_root_id`,`channel_name`,`channel_urlname` from `".$db_prefix."abcdata` where  channel_kid=".$kid." and `channel_root_id`=0 order by `channel_order` desc");
		$smarty->assign("channel_top_id",$channel_top_id);
		$smarty->assign("num",$num+1);
		$smarty->assign("jibie",$jibie);
		$smarty->assign("web_url",$web_url);
		$smarty->assign("channel_kid",$kid);
		$smarty->assign("channel",$channel);
		$smarty->display("ovoa/ovov_abdata.html");exit();
	break;

	case 'Do_Ovov_Channel'://保存基础分类栏目
		$channel_name = htmlspecialchars(trim($_POST['channel_name']));
		$channel_ename = htmlspecialchars(trim($_POST['channel_ename']));
		$jibie=intval(trim($_POST['jibie']));
		$channel_urlname = htmlspecialchars(trim($_POST['channel_urlname']));
		$channel_root_id = htmlspecialchars(trim($_POST['channel_root_id']));
		$intro_meo = htmlspecialchars(trim($_POST['intro_meo']));
		$tjchar=trim($_POST['tjchar']);
		$qingyong =intval(htmlspecialchars(trim($_POST['qingyong'])));
		$isliebiao =intval(htmlspecialchars(trim($_POST['isliebiao'])));
		$channel_istop =intval(htmlspecialchars(trim($_POST['channel_istop'])));
		$isdesk=intval(htmlspecialchars(trim($_POST['isdesk'])));
		$channel_ico=htmlspecialchars(trim($_POST['channel_ico']));
		$channel_order=intval(htmlspecialchars(trim($_POST['channel_order'])));
		$channel_alias=htmlspecialchars(trim($_POST['channel_alias']));//20140122添加的别名的字段
		$mbname=htmlspecialchars(trim($_POST['mbname']));
		if(empty($qingyong)){$qingyong=0;}
		if(empty($isliebiao)){$isliebiao=0;}
		if(empty($channel_istop)){$channel_istop=0;}
		if(empty($channel_name) || empty($channel_urlname)){
			$Base->WarnBack('信息填写不完整,子类名称和子类链接必须填写！');exit();
		}
		$Db->ThisQuery("insert into `".$db_prefix."abcdata` (`channel_alias`,`channel_root_id`,`channel_name`,`channel_ename`,`channel_urlname`,`channel_urlok`,`channel_type`,`channel_order`,`intro_meo`,`jibie`,`mbname`,`channel_istop`,`isdesk`,`channel_ico`,`tjchar`) values ('".$channel_alias."','".$channel_root_id."','".$channel_name."','".$channel_ename."','".$channel_urlname."',".$qingyong.",".$isliebiao.",'".$channel_order."','".$intro_meo."',".$jibie.",'".$mbname."',".$channel_istop.",".$isdesk.",'".$channel_ico."','".$tjchar."')");
		$Base->AlertMsg('添加子类成功!','ovov_abdata.php?cid=33&action=Ovov_DataABC');exit();
	break;
	case 'Ovov_Channel_Edit'://栏目修改
		$Channel_xgid=intval(trim($_GET['id']));
		$jibie=intval(trim($_GET['jibie']));
		$kid=intval(trim($_GET["kid"]));
		$set_channel=$Db->Fetch($Db->ThisQuery("select * from `".$db_prefix."abcdata` where `channel_id`=".$Channel_xgid.""));
		$channel=$Db->FetchAll("select `channel_id`,`channel_root_id`,`channel_name`,`jibie`,`mbname` from `".$db_prefix."abcdata` where `channel_root_id`=0 and channel_kid=".$kid." order by `channel_order` desc");
		$channel2=$Db->FetchAll("select `channel_id`,`channel_root_id`,`channel_name`,`jibie` from `".$db_prefix."abcdata` where `jibie`=2 and channel_kid=".$kid." order by `channel_order` desc");
		//三级
		$channel3=$Db->FetchAll("select `channel_id`,`channel_root_id`,`channel_name`,`jibie` from `".$db_prefix."abcdata` where `jibie`=3 and channel_kid=".$kid." order by `channel_order` desc");
		//print_r($channel);
		$smarty->assign("Channel_xgid",$Channel_xgid);
		$smarty->assign("jibie",$jibie);
		$smarty->assign("channel_kid",$kid);
		$smarty->assign("xg_channel",$channel);
		$smarty->assign("xg_channel2",$channel2);
		$smarty->assign("xg_channel3",$channel3);
		$smarty->assign("xg_set_channel",$set_channel);
		$smarty->display("ovoa/ovov_abdata.html");exit();
	break;
	case 'Do_Ovov_Channel_Edit'://保存栏目修改
		 $Channel_xg_id=intval(trim($_GET['Channel_xg_id'])); 
		$channel_name = htmlspecialchars(trim($_POST['channel_name']));
		$channel_ename = htmlspecialchars(trim($_POST['channel_ename']));
		$channel_urlname = htmlspecialchars(trim($_POST['channel_urlname']));
		$channel_root_id = htmlspecialchars(trim($_POST['channel_root_id']));
		//$jibie=$View->Print_abcdate_jibie($channel_root_id)+1;
		$intro_meo = htmlspecialchars(trim($_POST['intro_meo']));
		$qingyong =intval(htmlspecialchars(trim($_POST['qingyong'])));
		$isliebiao =intval(htmlspecialchars(trim($_POST['isliebiao'])));
		$show=intval(htmlspecialchars(trim($_POST['show'])));
		$is_recommend=intval(htmlspecialchars(trim($_POST['is_recommend'])));
		$channel_istop =intval(htmlspecialchars(trim($_POST['channel_istop'])));
		$isdesk=intval(htmlspecialchars(trim($_POST['isdesk'])));
		$channel_ico=htmlspecialchars(trim($_POST['channel_ico']));
		$channel_order=intval(htmlspecialchars(trim($_POST['channel_order'])));
		$mbname=htmlspecialchars(trim($_POST['mbname']));
		$channel_alias=htmlspecialchars(trim($_POST['channel_alias']));//20140122添加的别名的字段
		$tjchar=trim($_POST['tjchar']);
		//echo $mbname;die;
		if(empty($qingyong)){$qingyong=0;}
		if(empty($isliebiao)){$isliebiao=0;}
		if(empty($show)){$show=0;}
		if(empty($is_recommend)){$is_recommend=0;}
		if(empty($channel_istop)){$channel_istop=0;}
		if(empty($channel_name) || empty($channel_urlname)){
			$Base->WarnBack('信息填写不完整,子类名称和子类链接必须填写！');exit();
		}
		// echo "update `".$db_prefix."abcdata` set `channel_name`='".$channel_name."',`channel_ename`='".$channel_ename."',`channel_urlname`='".$channel_urlname."',`channel_root_id`='".$channel_root_id."',`channel_urlok`=".$qingyong.",`channel_order`=".$channel_order.",`intro_meo`='".$intro_meo."',`mbname`='".$mbname."',`channel_istop`=".$channel_istop.",`isdesk`=".$isdesk.",`channel_ico`='".$channel_ico."',`tjchar`='".$tjchar."' where `channel_id`=".$Channel_xg_id."";die;
		$Db->ThisQuery("update `".$db_prefix."abcdata` set `channel_alias`='".$channel_alias."',`channel_name`='".$channel_name."',`channel_ename`='".$channel_ename."',`channel_urlname`='".$channel_urlname."',`channel_root_id`='".$channel_root_id."',`channel_urlok`=".$qingyong.",`channel_type`=".$isliebiao.",`isshow`=".$show.",`is_recommend`=".$is_recommend.",`channel_order`=".$channel_order.",`intro_meo`='".$intro_meo."',`mbname`='".$mbname."',`channel_istop`=".$channel_istop.",`isdesk`=".$isdesk.",`channel_ico`='".$channel_ico."',`tjchar`='".$tjchar."' where `channel_id`=".$Channel_xg_id."");
		$Base->AlertMsg('修改子类成功!','ovov_abdata.php?cid=33&action=Ovov_DataABC');exit();
	break;
	case 'Ovov_Channel_Paixu'://频道栏目排序
		$px_id = intval(trim($_GET['id']));
		$oid=intval(trim($_GET['oid']));
		$smarty->assign("oid",$oid);
		$smarty->assign("Ovov_Channel_Paixu_id",$px_id);
		$smarty->display("ovoa/ovov_abdata.html");exit();
	break;
	case 'Ovov_Channel_Paixu_Do'://保存栏目排序设置
		$pxid = intval(trim($_GET['pxid']));
		$neworder = intval(trim($_POST['neworder']));
		$Db->ThisQuery("update `".$db_prefix."abcdata` set `channel_order`=".$neworder." where `channel_id`=".$pxid."");
		$Base->AlertMsg('设置排序成功!','ovov_abdata.php?cid=33&action=Ovov_DataABC');exit();
	break;

	case 'Ovov_Channel_Del'://删除栏目
		$id=htmlspecialchars(trim($_GET['id']));
		$Db->ThisQuery("update `".$db_prefix."abcdata` set `channel_ifdel`=1 where `channel_id`=".$id."");
		$Db->ThisQuery("update `".$db_prefix."abcdata` set `channel_ifdel`=1 where `channel_root_id`=".$id."");
		$Base->AlertMsg('删除成功!','ovov_abdata.php?cid=33&action=Ovov_DataABC');exit();
	break;

}
?>