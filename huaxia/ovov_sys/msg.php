<?php
session_start();
require_once("common.inc.php");$User->CheckLogin();
include_once("unsql.php");
$ovoa_action=trim($_GET['action']);
$ovoa_action?$ovoa_action=$ovoa_action:$ovoa_action=trim($_POST['action']);
$ovoa_action?$ovoa_action=$ovoa_action:$ovoa_action="msg_list";
$claid=intval(trim($_GET['claid']));
$smarty->assign("claid",$claid);
switch($ovoa_action){
	case 'msg_send'://发送消息
		$uid =intval(trim($_GET['uid']));
		$url_from=url_from();
		$qx_id=$View->Print_user($_SESSION['user_id'],'user_quanxian');//查询权限ID
		$user=$Db->FetchAll("select `user_id`,`user_name`,`user_ture_name` from `".$db_prefix."users` where `user_ifdel`=0");
		$smarty->assign('url_from',$url_from);
		$smarty->assign('uid',$uid);
		$smarty->assign('user',$user);
		$smarty->assign('qxid',$qx_id);
		$smarty->display("msg/msg_list.html");
	break;
	case 'do_msg_send'://保存发送消息
		//查询当前用户的权限
		$url_from=trim($_POST['url_from']);
		$uid =intval(trim($_POST['receiver']));
		$mid =intval(trim($_POST['mid']));
		$news_files=trim($_POST['news_files']);
		if(empty($mid)){$mid=0;}
		$title = $Base->CheckUsr(htmlspecialchars(trim($_POST['news_title'])));
		$content = $Base->CheckUsr(htmlspecialchars(trim($_POST['news_content'])));
	
		if(empty($title)||empty($content)){
			$Base->WarnBack('信息填写不完整!');exit();
			}
		$time=intval(time());
		$Db->ThisQuery("insert into `".$db_prefix."message` (`uid`,`mid`,`kid`,`seid`,`title`,`content`,`news_files`,`time`) values ('".$uid."','".$mid."',1,'".$_SESSION['user_id']."','".$title."','".$content."','".$news_files."','".$time."')");
		$gid=mysql_insert_id();//当前消息ID
		if($mid){
		$Db->ThisQuery("update `".$db_prefix."message` set `isread`=0 where id=".$mid." ");
		}
		$guid=$uid;//接收人ID
		$guname=$View->Print_user($uid,"user_name");//接收人username
		$gmsgtitle=$title;//消息标题
		$gmsgurl=$mid?"zonghe.php?action=news_view&id=".$mid."&mid=1&gid=".$gid."":"zonghe.php?action=news_view\&id=".$gid."&gid=".$gid."&mid=1";//弹出消息链接
		$View->getmsg($gid,$guid,$guname,$gmsgtitle,$gmsgurl);//添加弹出消息(用户名，标题，标题链接)
		$Base->AlertMsg('发送成功',$url_from);exit();
		break;
	case 'msg_list'://我的消息中心列表
			$mid=intval(trim($_GET['mid']));//查询当前用户的权限
		switch($mid){
			case '0'://系统消息
					$tiaojian="uid=0";
					$systiaojian="uid=0";
			break;
			case '1'://我收到消息
					$tiaojian="uid=".$_SESSION['user_id']." and mid=0 ";
					$systiaojian="uid>0 and mid=0";
			break;
			case '2'://已发送消息
					$tiaojian="seid=".$_SESSION['user_id']." and mid=0";
					$systiaojian="seid>0 and mid=0";
			break;
		}
			//echo $tiaojian;
		$qx_id=$View->Print_user($_SESSION['user_id'],'user_quanxian');//查询权限ID
		$sqls=$qx_id==1?"select * from `".$db_prefix."message` where ".$systiaojian." and kid=1 and `isdel`=0 ":"select * from `".$db_prefix."message` where  ".$tiaojian." and kid=1 and `isdel`=0 ";
		//查询数据
		//echo $sqls;
		$page=$_GET['page'];
		if(empty($page)){$page=1;}
		$total=$Db->RowsAll($sqls);
		$pageno=intval($_REQUEST['page']);
		if($pageno==0||$pageno<0)$pageno=1;
		$per=10;//每页记录数
		$page_num=ceil($total/$per);
		$pagelist=Pagination($total, $per, $page);
		/*if($Db->RowsAll($sqls) == 0){
			$Base->ErrorMsg('暂无消息，正在跳转……','zonghe.php?action=add_news');exit();
		}*/
		$page_sql=$sqls." order by `time` desc LIMIT ".($page-1)*$per.",".$per."";
		$news_array=$Db->ThisQuery($page_sql);
		while($news_sql=$Db->Fetch($news_array)){
		$news_sql['isread']=$news_sql['isread']?"<font color=\"#666666\">【已阅读】</font>":"<font color=\"#FF0000\">【未阅读】</font>";
		$news_sql['seid']=$news_sql['seid'];
		$news_sql['sendnmae']=$View->Print_truename($news_sql['seid']);
		$news_sql['receiver']=$View->Print_truename($news_sql['uid']);
		$news_sql['time']=date("Y-m-d h:i:s",$news_sql['time']);
		$news[]=$news_sql;
		}
		$smarty->assign('total',$total);
		$smarty->assign('mid',$mid);
		$smarty->assign('qx_id',$qx_id);
		$smarty->assign('page_num',$page_num);
		$smarty->assign("page_now",$pageno);
		$smarty->assign('pagelist',$pagelist);
		$smarty->assign("news",$news);
		$smarty->assign("action",$action);
		$smarty->display("msg/msg_list.html");
	break;
	case 'msg_chaxun'://消息查询
			$mid=intval(trim($_GET['msg_mid']));//查询当前用户的权限
			$msg_name=trim($_POST['msg_sqlname']);
		switch($mid){
			case '0'://系统消息
					$tiaojian="uid=0";
					$systiaojian="uid=0";
			break;
			case '1'://我收到消息
					$tiaojian="uid=".$_SESSION['user_id']." and mid=0 ";
					$systiaojian="uid>0 and mid=0";
			break;
			case '2'://已发送消息
					$tiaojian="seid=".$_SESSION['user_id']." and mid=0";
					$systiaojian="seid>0 and mid=0";
			break;
		}
			//echo $tiaojian;
		$qx_id=$View->Print_user($_SESSION['user_id'],'user_quanxian');//查询权限ID
		$sqls=$qx_id==1?"select * from `".$db_prefix."message` where ".$systiaojian." and kid=1 and `isdel`=0  and (`title` like '%".$msg_name."%' or `content` like '%".$msg_name."%')":"select * from `".$db_prefix."message` where  ".$tiaojian." and kid=1 and `isdel`=0 and (`title` like '%".$msg_name."%' or `content` like '%".$msg_name."%') ";
		//查询数据
		//echo $sqls;
		$page=$_GET['page'];
		if(empty($page)){$page=1;}
		$total=$Db->RowsAll($sqls);
		$pageno=intval($_REQUEST['page']);
		if($pageno==0||$pageno<0)$pageno=1;
		$per=10;//每页记录数
		$page_num=ceil($total/$per);
		$pagelist=Pagination($total, $per, $page);
		/*if($Db->RowsAll($sqls) == 0){
			$Base->ErrorMsg('暂无消息，正在跳转……','zonghe.php?action=add_news');exit();
		}*/
		$page_sql=$sqls." order by `time` desc LIMIT ".($page-1)*$per.",".$per."";
		$news_array=$Db->ThisQuery($page_sql);
		while($news_sql=$Db->Fetch($news_array)){
		$news_sql['isread']=$news_sql['isread']?"<font color=\"#666666\">【已阅读】</font>":"<font color=\"#FF0000\">【未阅读】</font>";
		$news_sql['seid']=$news_sql['seid'];
		$news_sql['sendnmae']=$View->Print_truename($news_sql['seid']);
		$news_sql['receiver']=$View->Print_truename($news_sql['uid']);
		$news_sql['time']=date("Y-m-d h:i:s",$news_sql['time']);
		$news[]=$news_sql;
		}
		$smarty->assign('total',$total);
		$smarty->assign('msg_sqlname',$msg_name);
		$smarty->assign('mid',$mid);
		$smarty->assign('qx_id',$qx_id);
		$smarty->assign('page_num',$page_num);
		$smarty->assign("page_now",$pageno);
		$smarty->assign('pagelist',$pagelist);
		$smarty->assign("news",$news);
		$smarty->assign("action",$action);
		$smarty->display("msg/msg_list.html");
	break;
	case 'msg_sendlist'://已发消息
		$smarty->display("msg/msg_list.html");
	break;
	case 'msg_sysmsg'://系统消息
		$smarty->display("msg/msg_list.html");
	break;
	case 'msg_detail'://详细消息
		$id=intval(trim($_GET['id']));
		$gid=intval(trim($_GET['gid']));
		$url_from="zonghe.php?action=news_view&id=".$id."&mid=1";
		$mid=trim($_GET['mid']);
		if($mid<2){
			$Db->ThisQuery("update `".$db_prefix."message` set `isread`=1 where id=".$id." ");
			$Db->ThisQuery("update `".$db_prefix."message` set `isread`=1 where id=".$gid." ");
			}
		$Db->ThisQuery("update `".$db_prefix."getmsg` set `isread`=1 where mid=".$id." ");//设置弹出消息已阅读
		$Db->ThisQuery("update `".$db_prefix."getmsg` set `isread`=1 where mid=".$gid." ");//设置弹出消息已阅读
		$c_sql=$Db->ThisQuery("select * from `".$db_prefix."message` where id=".$id." ");
		while($c_array=$Db->Fetch($c_sql)){
		$c_array['sname']=$View->Print_truename($c_array['seid']);
		$c_array['time']=date("Y-m-d h:i:s",$c_array['time']);
		$content[]=$c_array;
		}
		$msglist=$Db->ThisQuery("select * from `".$db_prefix."message` where `mid`=".$id."");
		while($m_array=$Db->Fetch($msglist)){
			$m_array['unmae']=$View->Print_truename($m_array['seid']);
			$m_array['time']=date("Y-m-d h:i:s",$m_array['time']);
			$msglist_2[]=$m_array;
		}
		$smarty->assign("user_id",$_SESSION['user_id']);
		$smarty->assign("id",$id);
		$smarty->assign("url_from",$url_from);
		$smarty->assign("mid",$mid);
		$smarty->assign("msglist",$msglist_2);
		$smarty->assign("content",$content);
		$smarty->display("msg/msg_list.html");
	break;
}
?>