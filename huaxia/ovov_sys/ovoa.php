<?php
require_once("common.inc.php");
$User->CheckLogin();
$ovoa_action=isset($_REQUEST['action'])?trim($_REQUEST['action'])?trim($_REQUEST['action']):'Ovoa_Config':'Ovoa_Config';

$claid=isset($_GET['claid'])?intval($_GET['claid']):'';
!$claid && $ovoa_action=='userlist' ?$claid=1:'';
$smarty->assign("claid",$claid);
switch($ovoa_action){
	case 'Ovoa_Config'://系统配置
		$sweekslect=weekslect("sweekid",$sweekid,0,6);//星期函数（名称，默认值，开始值，结束值）
		$eweekslect=weekslect("eweekid",$eweekid,0,6);//星期函数（名称，默认值，开始值，结束值）
		$stimelect=timelect("shour",$shour,"00","23");//开始小时函数（名称，默认值，开始值，结束值）
		$secondlect=timelect("ssecond",$ssecond,"00","59");//开始秒函数（名，默认值，开始值，结束值）
		$etimelect=timelect("ehour",$ehour,"00","23");//结束小时函数（名称，默认值，开始值，结束值）
		$esecondlect=timelect("esecond",$esecond,"00","59");//结束称秒时函数（名，默认值，开始值，结束值）
		$smarty->assign('sweekslect',$sweekslect);
		$smarty->assign('eweekslect',$eweekslect);
        $smarty->assign('stimelect',$stimelect);
		$smarty->assign('secondlect',$secondlect);
		$smarty->assign('etimelect',$etimelect);
		$smarty->assign('esecondlect',$esecondlect);
// 		$smarty->assign('web',$web);
		$smarty->display("ovoa/ovoa.html");exit();
	break;
	case 'Do_Ovoa_Config'://保存系统配置
		$config_path = '../config/web.config.php';
		if(!file_exists($config_path)){
			$Base->ErrorMsg('文件错误：/config/web.config.php 不存在！');exit();
		}
        $web_new_name = htmlspecialchars(trim($_POST['web_name']));
		$new_ver_ios = intval($_POST['ver_ios']);
        $new_ver_android = intval($_POST['ver_android']);
		$new_ver_ios_url = htmlspecialchars(trim($_POST['ver_ios_url']));
        $new_ver_android_url = htmlspecialchars(trim($_POST['ver_android_url']));
        
		$fp = @fopen($config_path,'r+');
		if(!$content = @fread($fp,filesize($config_path))){
			$Base->ErrorMsg('无法读取/config/web.config.php文件！');exit();
		}
		
		$content = str_replace("\$web_name = \"{$web_name}\"","\$web_name = \"{$web_new_name}\"",$content);
		$content = str_replace("\$ver_ios = \"{$ver_ios}\"","\$ver_ios = \"{$new_ver_ios}\"",$content);
		$content = str_replace("\$ver_android = \"{$ver_android}\"","\$ver_android = \"{$new_ver_android}\"",$content);
		$content = str_replace("\$ver_ios_url = \"{$ver_ios_url}\"","\$ver_ios_url = \"{$new_ver_ios_url}\"",$content);
		$content = str_replace("\$ver_android_url = \"{$ver_android_url}\"","\$ver_android_url = \"{$new_ver_android_url}\"",$content);
		
		$fp = @fopen($config_path,'w+');
		if(@fwrite($fp,$content)){
			$Base->AlertMsg('参数保持成功，正在返回上一页……','ovoa.php');exit();
		}else{
			$Base->AlertMsg('参数保持失败，正在返回上一页……','ovoa.php');exit();
		}
	break;
	case 'Ovoa_Channel'://系统栏目列表管理
		$cid=0;//模板CID,0为系统子类
		//一级
		$channeld=$Db->FetchAll("select `channel_id`,`channel_root_id`,`channel_name`,`channel_urlname`,`channel_order`,`jibie` from `".$db_prefix."channel` where `channel_root_id`=0 and `channel_kid`=".$cid." and `channel_ifdel`=0 order by `channel_order` ");
		//二级
		$channelx=$Db->FetchAll("select `channel_id`,`channel_root_id`,`channel_name`,`channel_urlname`,`channel_order`,`jibie` from `".$db_prefix."channel` where `jibie`=2 and `channel_kid`=".$cid." and `channel_ifdel`=0 order by `channel_order` ");
		//三级
		$channelxx=$Db->FetchAll("select `channel_id`,`channel_root_id`,`channel_name`,`channel_urlname`,`channel_order`,`jibie` from `".$db_prefix."channel` where `jibie`=3 and `channel_kid`=".$cid." and `channel_ifdel`=0 order by `channel_order` ");
		//四级
		$channelxxx=$Db->FetchAll("select `channel_id`,`channel_root_id`,`channel_name`,`channel_urlname`,`channel_order`,`jibie` from `".$db_prefix."channel` where `jibie`=4 and `channel_kid`=".$cid." and `channel_ifdel`=0 order by `channel_order` ");
		
		$smarty->assign("channeld",$channeld);
		$smarty->assign("kid",$cid);
		$smarty->assign("channelx",$channelx);
		$smarty->assign("channelxx",$channelxx);
		$smarty->assign("channelxxx",$channelxxx);
		$smarty->display("ovoa/ovoa.html");exit();
	break;
	case 'Ovoa_Channel_Add'://添加系统栏目
		$url_from=url_from();//获取上页来源URL链接
		$channel_top_id=isset($_GET["id"])?intval($_GET["id"]):0;
		$jibie=isset($_GET['jibie'])?intval($_GET['jibie']):0;
		$kid=isset($_GET['kid'])?intval($_GET["kid"]):0;
		$channel=$Db->FetchAll("select `channel_id`,`channel_root_id`,`channel_name`,`channel_urlname`,`mbname` from `".$db_prefix."channel` where  channel_kid=".$kid." order by `channel_order` desc");
		$num=isset($id)?$Db->RowsAll("select `channel_id`,`channel_root_id`,`channel_name`,`channel_urlname` from `".$db_prefix."channel` where  channel_kid=".$kid." and `channel_root_id`=".$id." order by `channel_order` desc"):$Db->RowsAll("select `channel_id`,`channel_root_id`,`channel_name`,`channel_urlname` from `".$db_prefix."channel` where  channel_kid=".$kid." and `channel_root_id`=0 order by `channel_order` desc");
		$smarty->assign("channel_top_id",$channel_top_id);
		$smarty->assign("num",$num+1);
		$smarty->assign("jibie",$jibie);
		$smarty->assign("channel_kid",$kid);
		$smarty->assign("channel",$channel);
		$smarty->display("ovoa/ovoa.html");exit();
	break;

	case 'Do_Ovoa_Channel'://保存系统栏目管理
		$channel_name = htmlspecialchars(trim($_POST['channel_name']));
		$channel_ename = htmlspecialchars(trim($_POST['channel_ename']));
		$jibie=intval(trim($_POST['jibie']));
		$channel_urlname = htmlspecialchars(trim($_POST['channel_urlname']));
		$channel_root_id = htmlspecialchars(trim($_POST['channel_root_id']));
		if (get_magic_quotes_gpc()) {
			$intro_meo = stripslashes($_POST['intro_meo']);//子分类简介
		} else {
			$intro_meo = $_POST['intro_meo'];//子分类简介
		}
		$tjchar=trim($_POST['tjchar']);
		@$qingyong =intval(htmlspecialchars(trim($_POST['qingyong'])));
		@$channel_istop =intval(htmlspecialchars(trim($_POST['channel_istop'])));
		@$isdesk=intval(htmlspecialchars(trim($_POST['isdesk'])));
		$channel_ico=htmlspecialchars(trim($_POST['channel_ico']));
		$channel_order=intval(htmlspecialchars(trim($_POST['channel_order'])));
		$mbname=htmlspecialchars(trim($_POST['mbname']));
		if(empty($qingyong)){$qingyong=0;}
		if(empty($channel_istop)){$channel_istop=0;}
		if(empty($channel_name) || empty($channel_urlname)){
			$Base->WarnBack('信息填写不完整,子类名称和子类链接必须填写！');exit();
		}
		$Db->ThisQuery("insert into `".$db_prefix."channel` (`channel_root_id`,`channel_name`,`channel_ename`,`channel_urlname`,`channel_urlok`,`channel_order`,`intro_meo`,`jibie`,`mbname`,`channel_istop`,`isdesk`,`channel_ico`,`tjchar`) values ('".$channel_root_id."','".$channel_name."','".$channel_ename."','".$channel_urlname."',".$qingyong.",'".$channel_order."','".$intro_meo."',".$jibie.",'".$mbname."',".$channel_istop.",".$isdesk.",'".$channel_ico."','".$tjchar."')");
		$Base->AlertMsg('添加子类成功!','ovoa.php?action=Ovoa_Channel&claid=1');exit();
	break;
	case 'Ovoa_Channel_Edit'://栏目修改
		$Channel_xgid=intval(trim($_GET['id']));
		$jibie=intval(trim($_GET['jibie']));
		$kid=intval(trim($_GET["kid"]));
		$set_channel=$Db->Fetch($Db->ThisQuery("select * from `".$db_prefix."channel` where `channel_id`=".$Channel_xgid.""));
		$channel=$Db->FetchAll("select `channel_id`,`channel_root_id`,`channel_name`,`jibie`,`mbname` from `".$db_prefix."channel` where `channel_root_id`=0 and channel_kid=".$kid." order by `channel_order` desc");
		$channel2=$Db->FetchAll("select `channel_id`,`channel_root_id`,`channel_name`,`jibie` from `".$db_prefix."channel` where `jibie`=2 and channel_kid=".$kid." order by `channel_order` desc");
		//三级
		$channel3=$Db->FetchAll("select `channel_id`,`channel_root_id`,`channel_name`,`jibie` from `".$db_prefix."channel` where `jibie`=3 and channel_kid=".$kid." order by `channel_order` desc");
		//print_r($channel);
		$smarty->assign("Channel_xgid",$Channel_xgid);
		$smarty->assign("jibie",$jibie);
		$smarty->assign("channel_kid",$kid);
		$smarty->assign("xg_channel",$channel);
		$smarty->assign("xg_channel2",$channel2);
		$smarty->assign("xg_channel3",$channel3);
		$smarty->assign("xg_set_channel",$set_channel);
		$smarty->display("ovoa/ovoa.html");exit();
	break;
	case 'Do_Ovoa_Channel_Edit'://保存栏目修改
		$Channel_xg_id=intval(trim($_GET['Channel_xg_id']));
		$channel_name = htmlspecialchars(trim($_POST['channel_name']));
		$channel_ename = htmlspecialchars(trim($_POST['channel_ename']));
		$channel_urlname = htmlspecialchars(trim($_POST['channel_urlname']));
		$channel_root_id = htmlspecialchars(trim($_POST['channel_root_id']));
		$jibie=$View->Print_channel_jibie($channel_root_id)+1;
		if (get_magic_quotes_gpc()) {
			$intro_meo = stripslashes($_POST['intro_meo']);//子分类简介
		} else {
			$intro_meo = $_POST['intro_meo'];//子分类简介
		}
		@$qingyong =intval(htmlspecialchars(trim($_POST['qingyong'])));
		@$channel_istop =intval(htmlspecialchars(trim($_POST['channel_istop'])));
		@$isdesk=intval(htmlspecialchars(trim($_POST['isdesk'])));
		$channel_ico=htmlspecialchars(trim($_POST['channel_ico']));
		$channel_order=intval(htmlspecialchars(trim($_POST['channel_order'])));
		$mbname=htmlspecialchars(trim($_POST['mbname']));
		$tjchar=trim($_POST['tjchar']);
		if(empty($qingyong)){$qingyong=0;}
		if(empty($channel_istop)){$channel_istop=0;}
		if(empty($channel_name) || empty($channel_urlname)){
			$Base->WarnBack('信息填写不完整,子类名称和子类链接必须填写！');exit();
		}
		$Db->ThisQuery("update `".$db_prefix."channel` set `channel_name`='".$channel_name."',`channel_ename`='".$channel_ename."',`channel_urlname`='".$channel_urlname."',`channel_root_id`='".$channel_root_id."',`channel_urlok`=".$qingyong.",`channel_order`=".$channel_order.",`intro_meo`='".$intro_meo."',`jibie`=".$jibie.",`mbname`='".$mbname."',`channel_istop`=".$channel_istop.",`isdesk`=".$isdesk.",`channel_ico`='".$channel_ico."',`tjchar`='".$tjchar."' where `channel_id`=".$Channel_xg_id."");
		$Base->AlertMsg('修改子类成功!','ovoa.php?action=Ovoa_Channel&claid=1');exit();
	break;
	
	case 'Ovoa_Department'://系统部门列表管理
		$department_list=$Db->ThisQuery("select * from `".$db_prefix."department` where `de_ifdel`=0");
		while($tempx=$Db->Fetch($department_list)){
		$tempx['managename']=$View->Print_truename($tempx['de_jingli']);
		$tempx['renno']=$Db->RowsAll("select `user_id` from `".$db_prefix."users` WHERE `user_right` = ".$tempx['de_id']."");
		$tempx['renlist']=$View->Print_depart_truename($tempx['de_id']);
		$depart[]=$tempx;
		}
		$smarty->assign("department_list",$depart);
		$smarty->display("ovoa/ovoa.html");
		exit();
	break;
	case 'Ovoa_Department_New'://新建部门
		$dept_user=$Db->FetchAll("select `user_id`,`user_name`,`user_ture_name` from `".$db_prefix."users` where  `user_ifdel`=0 order by user_id desc");		
		$smarty->assign('dept_user',$dept_user);
		$smarty->display("ovoa/ovoa.html");exit();
	break;
	case 'Dosave_Ovoa_Department_New'://保存部门
		$de_name=$Base->CheckUsr(htmlspecialchars(trim($_POST['de_name'])));
		$de_jingli=intval(trim($_POST['de_jingli']));
		$de_intro=$Base->CheckUsr(htmlspecialchars(trim($_POST['de_intro'])));
		if(empty($de_name)){$Base->WarnBack('请填写部门名称!');exit();}
		if($Db->RowsAll("SELECT `de_id` FROM `".$db_prefix."department` WHERE `de_name` = '".$de_name."'") != 0){
			$Base->WarnBack('该部门已经存在!');exit();
		}
		$Db->ThisQuery("insert into `".$db_prefix."department` (`de_name`,`de_jingli`,`de_intro`) values ('".$de_name."','".$de_jingli."','".$de_intro."')");
		if($de_jingli){$Db->ThisQuery("update `".$db_prefix."users` set `user_quanxian`=4 where `user_id`=".$de_jingli."");}//用户升级为部门经理
		$de_id=$Db->Fetch($Db->ThisQuery("select `de_id` from `".$db_prefix."department` order by `de_id` desc"));
		$View->rizhi($db_prefix.'department',$de_id['de_id'],$de_name,'添加部门');//添加日志
		$Base->AlertMsg('添加部门成功!','ovoa.php?action=Ovoa_Department&claid=2');exit();
		
	case 'Ovoa_Department_Edit'://修改部门名称
		$dpt_xgid=intval(trim($_GET['dpxg_id']));
		$dpt_xg_user=$Db->FetchAll("select `user_id`,`user_name`,`user_ture_name` from `".$db_prefix."users` where `user_right`= ".$dpt_xgid." and `user_ifdel`=0 order by user_id desc");
		$department_xg=$Db->Fetch($Db->ThisQuery("select * from `".$db_prefix."department` where `de_id`=".$dpt_xgid.""));
		$smarty->assign('dpt_xg_user',$dpt_xg_user);		
		$smarty->assign("department_xg",$department_xg);
		$smarty->assign("dpxg_id",$department_xg['de_id']);
		$smarty->display("ovoa/ovoa.html");exit();	
	break;
	
	case 'Ovoa_Department_Edit_Dosave'://保存修改部门名称
		$dpxg_id=intval(trim($_GET['dpxg_id']));
		$de_name=$Base->CheckUsr(htmlspecialchars(trim($_POST['de_name'])));
		$de_jingli=$Base->CheckUsr(htmlspecialchars(trim($_POST['de_jingli'])));
		$de_intro=$Base->CheckUsr(htmlspecialchars(trim($_POST['de_intro'])));
		if(empty($de_name)){$Base->WarnBack('填写部门名称!');exit();}		
		$department=$Db->Fetch($Db->ThisQuery("select `de_name` from `".$db_prefix."department` where `de_id`=".$dpxg_id.""));
		//判断是否修改了名字
		if($de_name!==$department['de_name']){
			//判断新的部门名称是否存在
			if($Db->RowsAll("SELECT `de_id` FROM `".$db_prefix."department` WHERE `de_name` = '".$de_name."'") != 0){
				$Base->WarnBack('该部门已经存在!');exit();
			}
		}		
		$Db->ThisQuery("update `".$db_prefix."department` set `de_name`='".$de_name."',`de_jingli`='".$de_jingli."',`de_intro`='".$de_intro."' where `de_id`=".$dpxg_id."");
		if($de_jingli && @$id>1){$Db->ThisQuery("update `".$db_prefix."users` set `user_quanxian`=4 where `user_id`=".$de_jingli."");}//用户升级为部门经理
		$View->rizhi($db_prefix.'department',$dpxg_id,$de_name,'修改部门');//添加日志
		$Base->AlertMsg('修改部门!','ovoa.php?action=Ovoa_Department&claid=2');exit();
	break;
	
	case 'Ovoa_Department_del'://删除部门
		$id=$Base->CheckUsr(htmlspecialchars(trim($_GET['id'])));
		if(empty($id)){header("location:Department.php");exit();}
		if(!is_numeric($id))//判断是否是数字或数字字符串
		{
			$Base->WarnBack('参数错误!');exit();
		}
		$Db->ThisQuery("update `".$db_prefix."department` set `de_ifdel`=1 where `de_id`=".$id."");
		$Base->AlertMsg('删除部门成功!','ovoa.php?action=Ovoa_Department&claid=2');exit();
	break;

	case 'Ovoa_Quanxian'://系统权限管理
		$quanxian_list=$Db->FetchALL("select * from`".$db_prefix."quanxian` where `qx_ifdel`=0");
		$smarty->assign("quanxian_list",$quanxian_list);
		$smarty->display("ovoa/ovoa.html");exit();
	break;
	case 'Ovoa_Quanxian_New'://添加系统权限
			$smarty->display("ovoa/ovoa.html");exit();
	break;
	case 'Do_Ovoa_Quanxian_New'://保存系统权限管理
		$qx_name=$Base->CheckUsr(htmlspecialchars(trim($_POST['qx_name'])));
		$qx_explain=$Base->CheckUsr(htmlspecialchars(trim($_POST['qx_explain'])));
		if(empty($qx_name)){$Base->WarnBack('请填写权限名称!');exit();}
		if($Db->RowsAll("SELECT `qx_id` FROM `".$db_prefix."quanxian` WHERE `qx_name` = '".$qx_name."'") != 0){
			$Base->WarnBack('该权限已经存在!');exit();
		}
		$Db->ThisQuery("insert into `".$db_prefix."quanxian` (`qx_name`,`qx_ip`,`qx_explain`) values ('".$qx_name."','".$Base->GetIp()."','".$qx_explain."')");
		//添加日志
		$qx_id=$Db->Fetch($Db->ThisQuery("select `qx_id` from `".$db_prefix."quanxian` order by `qx_id` desc"));
		$View->rizhi($db_prefix.'quanxian',$qx_id['qx_id'],$qx_name,'添加权限');
		$Base->AlertMsg('添加权限名称成功!','ovoa.php?action=Ovoa_Quanxian&claid=3');exit();
	break;
	case 'Ovoa_Quanxian_DIY'://自定义权限
		$diyqx_id=intval(trim($_GET['diyqx_id']));
		$folk_re = $Db->ThisQuery("select `channel_id`,`channel_name` from `".$db_prefix."channel` where `channel_root_id`=0 and `channel_ifdel`=0 order by channel_order,channel_id");
		while($row = $Db->Fetch($folk_re)){
			$xnums=$Db->RowsAll("select `channel_id` from `".$db_prefix."channel` where `channel_root_id`=".$row['channel_id']." and `channel_ifdel`=0 ");
			$row['total']=$xnums;
			$channelda[] = $row;
		}
		$smarty->assign("channelda",$channelda);
		$channelxiao=$Db->FetchAll("select `channel_id`,`channel_root_id`,`channel_name` from `".$db_prefix."channel` where `jibie`=2 and `channel_ifdel`=0 order by channel_order,channel_id");
		$smarty->assign("channelxiao",$channelxiao);
		$user_sview=explode(",",$View->Print_diy_quanxian($diyqx_id,'sview'));
		$user_cview=explode(",",$View->Print_diy_quanxian($diyqx_id,'cview'));
 		@$qxname=$View->Print_diy_quanxian($id,'qx_name');
		$smarty->assign("qxname",$qxname);
		$smarty->assign("diyqx_id",$diyqx_id);
		$smarty->assign("user_sview",$user_sview);
		$smarty->assign("user_cview",$user_cview);
		$smarty->display("ovoa/ovoa_quanxian_quanxian.html");exit();
	break;
	case 'Do_Ovoa_Quanxian_DIY'://保存自定义权限
		 $list_id=trim($_GET['list_id']);
		 $qxid=intval(trim($_GET['qxid']));
		 $lid=explode(",",$list_id);
		 foreach($lid as $key)
		 {
		 $lidx=explode("-",$key);
		 $lid1[]=$lidx[0];
		 @$lid2[]=$lidx[1];
		 }
		 $lid1=array_unique($lid1);//去掉重复的cid
		 //把数据中元素重组中一个字符串
		 $list_cid = '';
		 		 foreach($lid1 as $ckey){
				 $list_cid.=$ckey.",";
				 }
				$list_cid=rtrim($list_cid,",");//去掉右侧多余的逗号
				$list_sid = '';
				foreach($lid2 as $skey){
				 $list_sid.=$skey.",";
				 }
				 $list_sid=rtrim($list_sid,",");//去掉右侧多余的,
		$Db->ThisQuery("update `".$db_prefix."quanxian` set `cview`='".$list_cid."',`sview`='".$list_sid."' where `qx_id`=".$qxid."");
		$Base->AlertMsg('自定义权限设置成功!','ovoa.php?action=Ovoa_Quanxian&claid=3');exit();
	break;
	case 'Ovoa_Quanxian_Edit'://修改权限内容
		$qxxg_id=intval(trim($_GET['qxxg_id']));
		$quanxian_edit=$Db->Fetch($Db->ThisQuery("select * from `".$db_prefix."quanxian` where `qx_id`=".$qxxg_id.""));
		$smarty->assign("quanxian_edit",$quanxian_edit);
		$smarty->assign("quanxian_edit_id",$quanxian_edit['qx_id']);
		$smarty->display("ovoa/ovoa.html");exit();
	break;
	
	case 'Do_Ovoa_Quanxian_Edit'://保存修改权限内容
		$qxxg_id=intval(trim($_GET['qxxg_id']));
		$qx_name=$Base->CheckUsr(htmlspecialchars(trim($_POST['qx_name'])));
		$qx_explain=$Base->CheckUsr(htmlspecialchars(trim($_POST['qx_explain'])));
		if(empty($qx_name)){$Base->WarnBack('请填写权限名称!');exit();}		
		$quanxian=$Db->Fetch($Db->ThisQuery("select `qx_name` from `".$db_prefix."quanxian` where `qx_id`=".$qxxg_id.""));
		//判断是否修改了名字
		if($qx_name!==$quanxian['qx_name']){
			//判断新的部门名称是否存在
			if($Db->RowsAll("SELECT `qx_id` FROM `".$db_prefix."quanxian` WHERE `qx_name` ='".$qx_name."'") != 0){
				$Base->WarnBack('该权限已经存在!');exit();
			}
		}
		$Db->ThisQuery("update `".$db_prefix."quanxian` set `qx_name`='".$qx_name."',`qx_explain` = '".$qx_explain."' where `qx_id`=".$qxxg_id."");
		//添加日志
		$View->rizhi($db_prefix.'quanxian',$qxxg_id,$qx_name,'修改权限');
		$Base->AlertMsg('修改权限成功!','ovoa.php?action=Ovoa_Quanxian&claid=3');
	break;
	
	case 'Do_Ovoa_Quanxian_DEL'://保存自定义权限
		$del_qx_id=intval(trim($_GET['del_qx_id']));
		//echo $_SESSION['user_id'];exit();
		$Db->ThisQuery("update `".$db_prefix."quanxian` set `qx_ifdel`=1 where `qx_id`=".$del_qx_id."");
		//添加日志
		$qx_name=$Db->Fetch($Db->ThisQuery("select `qx_name` from `".$db_prefix."quanxian` where `qx_id`=".$del_qx_id.""));
		$View->rizhi($db_prefix.'quanxian',$del_qx_id,$qx_name['qx_name'],'删除权限');
		$Base->AlertMsg('删除权限成功!','ovoa.php?action=Ovoa_Quanxian&claid=3');exit();
	break;
	case 'Ovoa_Channel_Paixu'://频道栏目排序
		$px_id = intval(trim($_GET['id']));
		$oid=intval(trim($_GET['oid']));
		$smarty->assign("oid",$oid);
		$smarty->assign("Ovoa_Channel_Paixu_id",$px_id);
		$smarty->display("ovoa/ovoa.html");exit();
	break;
	case 'Ovoa_Channel_Paixu_Do'://保存栏目排序设置
		$pxid = intval(trim($_GET['pxid']));
		$neworder = htmlspecialchars(trim($_POST['neworder']));
		$Db->ThisQuery("update `".$db_prefix."channel` set `channel_order`=".$neworder." where `channel_id`=".$pxid."");
		$Base->AlertMsg('设置排序成功!','ovoa.php?action=Ovoa_Channel&claid=1');exit();
	break;

	case 'Ovoa_Channel_Del'://删除栏目
		$id=htmlspecialchars(trim($_GET['id']));
		$Db->ThisQuery("update `".$db_prefix."channel` set `channel_ifdel`=1 where `channel_id`=".$id."");
		$Db->ThisQuery("update `".$db_prefix."channel` set `channel_ifdel`=1 where `channel_root_id`=".$id."");
		//$Db->ThisQuery("delete from `".$db_prefix."channel` where `channel_id`=".$id."");
		//$Db->ThisQuery("delete from `".$db_prefix."channel` where `channel_root_id`=".$id."");
		$Base->AlertMsg('删除成功!','ovoa.php?action=Ovoa_Channel&claid=1');exit();
	break;
	
	case 'Ovoa_DataABC'://基础数据
		$smarty->display("ovoa/ovoa.html");exit();
	break;
	case "about_us":
		require_once("../config/about_us_config.php");
		$smarty->assign("about_us",urldecode($about_us));
		$smarty->display("ovoa/about_us.html");
	break;
	case "about_us_set":
		$new_about_us = urlencode(str_replace("\\","",$_POST['about_us']));
		$about_us_path="../config/about_us_config.php";
		require_once("../config/about_us_config.php");
		if(!file_exists($about_us_path)){
			$Base->AlertMsg('文件不存在','ovoa.php?action=about_us');exit();
		}
		$fp = @fopen($about_us_path,'r+');
		if(!$content = @fread($fp,filesize($about_us_path))){
			$Base->AlertMsg('无法读取文件','ovoa.php?action=about_us');exit();
		}
		$content = str_replace("\$about_us = \"{$about_us}\";","\$about_us = \"{$new_about_us}\";",$content);
		$fp = @fopen($about_us_path,'w+');
		if(@fwrite($fp,$content)){
			$Base->AlertMsg('操作成功','ovoa.php?action=about_us');exit();
		}else{
			$Base->AlertMsg('操作失败','ovoa.php?action=about_us');exit();
		}
	break;
}
?>