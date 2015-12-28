<?php
session_start();
require_once("common.inc.php");
$User->CheckLogin();
include_once("unsql.php");
$ovoa_action=trim($_GET['action']);
$ovoa_action?$ovoa_action=$ovoa_action:$ovoa_action=trim($_POST['action']);
$ovoa_action?$ovoa_action=$ovoa_action:$ovoa_action="userlist";
$claid=intval(trim($_GET['claid']));
!$claid && $ovoa_action=='userlist' ?$claid=1:'';
$smarty->assign("claid",$claid);

switch($ovoa_action){
	case 'forceonline'://强制下线
	    $uid=intval(trim($_GET['uid']));
		$Db->ThisQuery("update `".$db_prefix."users` set `login_time`=0 where `user_id`=".$uid."");
		$Base->AlertMsg('设置强制下线成功','user.php?action=online');exit();
	break;
	case 'locklogin'://锁定用户
		$uid=intval(trim($_GET['uid']));
		$Db->ThisQuery("update `".$db_prefix."users` set `isok`=1,`login_time`=0 where `user_id`=".$uid."");
		$Base->AlertMsg('锁定用户成功','user.php?action=online');exit();
	break;
	case 'lockip'://封用户IP
		$uid=intval(trim($_GET['uid']));
		$nowsj=time();
		$lockusr=$Db->Fetch($Db->ThisQuery("select `user_id`,`user_lastip`,`addtime` from `".$db_prefix."users` where `user_id`=".intval($uid).""));
		$Db->ThisQuery("insert into `".$db_prefix."blackip` set `uid`=".$uid.",`ip`='".$lockusr['user_lastip']."',`addtime`=".$nowsj."");
		$Db->ThisQuery("update `".$db_prefix."users` set `login_time`=0 where `user_id`=".$uid."");
		$Base->AlertMsg('封用户IP成功','user.php?action=online');exit();
	break;

	case 'userlist':
		$usersql="select * from `".$db_prefix."users` a left join `".$db_prefix."department` b on `a`.`user_right`=`b`.`de_id` left join `".$db_prefix."quanxian` c on `a`.`user_quanxian`=`c`.`qx_id` where `a`.`user_ifdel`=0 order by `user_id` desc";
		$department=$Db->FetchAll("select `de_id`,`de_name` from `".$db_prefix."department` where `de_ifdel`=0");//所有部门
		$smarty->assign("department",$department);
		$smarty->assign("user_position",$user_position);
		
		$page=$_GET['page'];
		if(empty($page)){$page=1;}
		$total=$Db->RowsAll($usersql);
		$pageno=intval($_REQUEST['page']);
		if($pageno==0||$pageno<0)$pageno=1;
		$per=10;//每页记录数
		$page_num=ceil($total/$per);
		$pagelist=Pagination($total, $per, $page);
		
		if($Db->RowsAll($usersql) == 0){
			$Base->ErrorMsg('暂无用户，正在跳转至用户添加页面……','user.php?action=add_user');exit();
		}
		$usersql=$usersql." LIMIT ".($page-1)*$per.",".$per."";
		$user_source = $Db->ThisQuery($usersql);
		while($user_listxx = $Db->Fetch($user_source)){
		$lastsj=intval(time()-1*60);//1分钟访问为在线人数
		$onlineok=$Db->RowsAll("select `user_id`  from `".$db_prefix."users` where `user_id`=".$user_listxx['user_id']." and `user_lastsj`>=".$lastsj."");
		$newuser[]=array('user_id'=>$user_listxx['user_id'],'user_name'=>$user_listxx['user_name'],'user_ture_name'=>$user_listxx['user_ture_name'],'user_sex'=>$user_listxx['user_sex'],'user_position'=>$View->Printchannelname($user_listxx['user_position']),'de_name'=>$user_listxx['de_name'],'qx_name'=>$user_listxx['qx_name'],'user_cview'=>$user_listxx['user_cview'],'onlineok'=>$onlineok,'user_lastsj'=>date("Y-m-d H:i:s",$user_listxx['user_lastsj']),'user_lastip'=>$user_listxx['user_lastip']);
		}

		$qx_id=$View->Print_user(intval($_SESSION['user_list']['user_id']),'user_quanxian');//查询权限ID
		$smarty->assign('qx_id',$qx_id);
		$quanxian=$Db->FetchALL("select * from`".$db_prefix."quanxian` where `qx_ifdel`=0");
		$smarty->assign("quanxian",$quanxian);
		$smarty->assign('pagelist',$pagelist);
		$smarty->assign("total",$total); 
		$smarty->assign("page_num",$page_num);
		$smarty->assign("page_now",$pageno);
		$smarty->assign("users",$newuser);
		$smarty->display("user/user_list.html");exit();
	break;
		//在线用户
		case 'user_online':
		$lastsj=intval(time()-1*60);//1分钟访问为在线人数
		$usersql="select * from `".$db_prefix."users` a left join `".$db_prefix."department` b on `a`.`user_right`=`b`.`de_id` left join `".$db_prefix."quanxian` c on `a`.`user_quanxian`=`c`.`qx_id` where `a`.`user_ifdel`=0 and  `a`.`user_lastsj`>=".$lastsj." order by `user_id` desc";
		$page=$_GET['page'];
		if(empty($page)){$page=1;}
		$total=$Db->RowsAll($usersql);
		$pageno=intval($_REQUEST['page']);
		if($pageno==0||$pageno<0)$pageno=1;
		$per=100;//每页记录数
		$page_num=ceil($total/$per);
		$pagelist=Pagination($total, $per, $page);
		
		if($Db->RowsAll($usersql) == 0){
			$Base->ErrorMsg('暂无用户，正在跳转至用户添加页面……','user.php?action=add_user');exit();
		}
		$usersql=$usersql." LIMIT ".($page-1)*$per.",".$per."";

		$user_source = $Db->ThisQuery($usersql);
		while($user_listxx2 = $Db->Fetch($user_source)){
		$inservice=$Db->RowsAll("select `user_id`  from `".$db_prefix."users` where `user_id`=".$user_listxx2['user_id']." ");
		
		$newuser[]=array('user_id'=>$user_listxx2['user_id'],'user_name'=>$user_listxx2['user_name'],'user_ture_name'=>$user_listxx2['user_ture_name'],'user_sex'=>$user_listxx2['user_sex'],'user_position'=>$View->Printchannelname($user_listxx2['user_position']),'user_workexperience'=>$user_listxx2['user_workexperience'],'de_name'=>$user_listxx2['de_name'],'qx_name'=>$user_listxx2['qx_name'],'user_cview'=>$user_listxx2['user_cview'],'user_entrydate'=>date("Y-m-d",$user_listxx2['user_entrydate']),'inservice'=>$inservice,'quitstime'=>date("Y-m-d",$user_listxx2['quitstime']),'user_lastsj'=>date("Y-m-d H:i:s",$user_listxx2['user_lastsj']),'user_lastip'=>$user_listxx2['user_lastip']);
		}
		//print_R($newuser);die;
		$qx_id=$View->Print_user(intval($_SESSION['user_list']['user_id']),'user_quanxian');//查询权限ID
		$smarty->assign('qx_id',$qx_id);
		$quanxian=$Db->FetchALL("select * from`".$db_prefix."quanxian` where `qx_ifdel`=0");
		$smarty->assign("quanxian",$quanxian);
		$smarty->assign('pagelist',$pagelist);
		$smarty->assign("total",$total); 
		$smarty->assign("page_num",$page_num);
		$smarty->assign("page_now",$pageno);
		$smarty->assign("online_users",$newuser);
		$smarty->display("user/user_list.html");exit();
	break;
	//查询用户
	case 'chaxun':
		$username=trim($_POST['username']);
		$slt=intval(trim($_POST['slt']));
		if(empty($username)&& $slt){
		$usersql="select * from `".$db_prefix."users` a left join `".$db_prefix."department` b on `a`.`user_right`=`b`.`de_id` left join `".$db_prefix."quanxian` c on `a`.`user_quanxian`=`c`.`qx_id` where `a`.`user_ifdel`=0 and `a`.`user_quanxian`=".$slt." order by user_id desc";
		}else
		{
		$usersql="select * from `".$db_prefix."users` a left join `".$db_prefix."department` b on `a`.`user_right`=`b`.`de_id` left join `".$db_prefix."quanxian` c on `a`.`user_quanxian`=`c`.`qx_id` where `a`.`user_ifdel`=0 and ( `a`.`user_name` like '%".$username."%' or `a`.`user_ture_name` like '%".$username."%') order by user_id desc";
		}
		//echo $usersql;die;
		$page=$_GET['page'];
		if(empty($page)){$page=1;}
		$total=$Db->RowsAll($usersql);
		$pageno=intval($_REQUEST['page']);
		if($pageno==0||$pageno<0)$pageno=1;
		$per=10;//每页记录数
		$page_num=ceil($total/$per);
		$pagelist=Pagination($total, $per, $page);
		
		if($Db->RowsAll($usersql) == 0){
			$Base->ErrorMsg('对不起，没有找到您要找的用户……','user.php');exit();
		}
		$usersql=$usersql." LIMIT ".($page-1)*$per.",".$per."";
		$user_source = $Db->ThisQuery($usersql);
		while($user_listxx3 = $Db->Fetch($user_source)){
		$lastsj=intval(time()-1*60);//1分钟访问为在线人数
		$onlineok=$Db->RowsAll("select `user_id`  from `".$db_prefix."users` where `user_id`=".$user_listxx3['user_id']." and `user_lastsj`>=".$lastsj."");
		$newuser[]=array('user_id'=>$user_listxx3['user_id'],'user_name'=>$user_listxx3['user_name'],'user_ture_name'=>$user_listxx3['user_ture_name'],'user_sex'=>$user_listxx3['user_sex'],'user_position'=>$View->Printchannelname($user_listxx3['user_position']),'user_workexperience'=>$user_listxx3['user_workexperience'],'de_name'=>$user_listxx3['de_name'],'qx_name'=>$user_listxx3['qx_name'],'user_cview'=>$user_listxx3['user_cview'],'onlineok'=>$onlineok);
		}
		$quanxian=$Db->FetchALL("select * from`".$db_prefix."quanxian` where `qx_ifdel`=0");
		$smarty->assign("quanxian",$quanxian);
		$smarty->assign("user_sqlname",$username);
		$smarty->assign('pagelist',$pagelist);
		$smarty->assign("total",$total); 
		$smarty->assign("page_num",$page_num);
		$smarty->assign("page_now",$pageno);
		$smarty->assign("users",$newuser);
		$smarty->display("user/user_list.html");exit();
	break;
	case 'add_user':
		$bianhao_arr=$Db->Fetch($Db->ThisQuery("select `user_id` from `".$db_prefix."users` order by `user_id` desc limit 0,1"));
		$bianhao=$bianhao_arr[0]+1001;
		$user_bianhao="OV".$bianhao;//用户编号自动计算
		$department=$Db->FetchAll("select `de_id`,`de_name` from `".$db_prefix."department` where `de_ifdel`=0");//所有部门
		$quanxian=$Db->FetchAll("select `qx_id`,`qx_name` from `".$db_prefix."quanxian` where `qx_ifdel`=0");//所有权限
		$smarty->assign("department",$department);
		$smarty->assign("user_bianhao",$user_bianhao);
		$smarty->assign("quanxian",$quanxian);
		$smarty->display("user/user_list.html");exit();
	break;
	
	case 'do_add_user':		
		$user_name = $Base->CheckUsr(htmlspecialchars(trim($_POST['user_name'])));
		$user_ture_name = $Base->CheckUsr(htmlspecialchars(trim($_POST['user_ture_name'])));
		$user_password1 =md5(htmlspecialchars(trim($_POST['user_password1'])));
		$user_password2 =md5(htmlspecialchars(trim($_POST['user_password2'])));
		$user_right = $Base->CheckUsr(htmlspecialchars(trim($_POST['user_right'])));
		$user_quanxian = $Base->CheckUsr(htmlspecialchars(trim($_POST['user_quanxian'])));
		$user_sex=$Base->CheckUsr(htmlspecialchars(trim($_POST['user_sex'])));
		$user_phone=$Base->CheckUsr(htmlspecialchars(trim($_POST['user_phone'])));
		$user_qq=$Base->CheckUsr(htmlspecialchars(trim($_POST['user_qq'])));
		$user_email=trim($_POST['user_email']);
		$user_state=intval(trim($_POST['user_state']));
		$user_contact_tel=trim($_POST['user_contact_tel']);
		$user_remarks=$Base->CheckUsr(htmlspecialchars(trim($_POST['user_remarks'])));
		$menua=$View->Print_diy_quanxian($user_quanxian,'cview');
		$menub=$View->Print_diy_quanxian($user_quanxian,'sview');
				
		//处理系统自带的和以前自定义的权限ID;
		$menua=arr2str(array_unique(explode(",",$menua)));
		$menub=arr2str(array_unique(explode(",",$menub)));
		//print_r($menub);die;

		if(empty($user_name) || empty($user_ture_name) || empty($user_password1) || empty($user_password2) || empty($user_right) || empty($user_quanxian)){
			$Base->WarnBack('信息填写不完整!');exit();
		}
		if($user_password1 != $user_password2){
			$Base->WarnBack('两次输入的密码不相同，请重新输入!');exit();
		}
		if(strlen($user_name) > 16 || strlen($user_password1) > 32 || strlen($user_name) < 3){
			$Base->WarnBack('用户名长度需要大于3小于16,密码长度小于32!');exit();
		}
		if($Db->RowsAll("SELECT `user_id` FROM `".$db_prefix."users` WHERE `user_name` = '".$user_name."'") != 0){
			$Base->WarnBack('该用户名已经存在!');exit();
		}
		
		$ovrnd = substr(uniqid(rand()), -10);
		$user_pass = md5($user_password1.$ovrnd);
		$Db->ThisQuery("insert into `".$db_prefix."users` (`user_name`,`user_ture_name`,`user_password`,`user_right`,`ovrnd`,`user_quanxian`,`user_sex`,`user_phone`,`user_qq`,`user_email`,`user_cview`,`user_view`,`user_state`) values ('".$user_name."','".$user_ture_name."','".$user_pass."','".$user_right."','".$ovrnd."','".$user_quanxian."','".$user_sex."','".$user_phone."','".$user_qq."','".$user_email."','".$menua."','".$menub."','".$user_state."')");
		//添加日志
		$id=$Db->Fetch($Db->ThisQuery("select `user_id` from `".$db_prefix."users` order by `user_id` desc"));
		$View->rizhi($db_prefix.'users',$id['user_id'],$user_name,'添加用户');
		$Base->AlertMsg('添加用户成功,请进一步设置用户权限','user.php?action=user_add_quanxian&id='.$id['user_id']);exit();
	break;
	
	case 'user_add_quanxian':
		$id=$Base->CheckUsr(htmlspecialchars(trim($_GET['id'])));
		$user_sview=explode(",",$View->Print_user($id,'user_view'));
		$user_cview=explode(",",$View->Print_user($id,'user_cview'));
		$smarty->assign("id",$id);
		$folk_re = $Db->ThisQuery("select `channel_id`,`channel_name` from `".$db_prefix."channel` where `channel_root_id`=0 and `channel_ifdel`=0 order by channel_order,channel_id");
		while($row = $Db->Fetch($folk_re)){
			$xnums=$Db->RowsAll("select `channel_id` from `".$db_prefix."channel` where `channel_root_id`=".$row['channel_id']." and `channel_ifdel`=0 ");
			$row['total']=$xnums;
			$channelda[] = $row;
		}
		$smarty->assign("channelda",$channelda);
		$channelxiao=$Db->FetchAll("select `channel_id`,`channel_root_id`,`channel_name` from `".$db_prefix."channel` where `jibie`=2 and `channel_ifdel`=0 order by channel_order,channel_id");
		$smarty->assign("channelxiao",$channelxiao);
		$smarty->assign("user_sview",$user_sview);
		$smarty->assign("user_cview",$user_cview);
		$smarty->display("user/user_quanxian.html");exit();
	break;
	case 'do_user_add_quanxian':
		 $list_id=trim($_GET['list_id']);
		 $qxuid=intval(trim($_GET['user_id']));
		 $lid=explode(",",$list_id);
		 foreach($lid as $key)
		 {
		 $lidx=explode("-",$key);
		 $lid1[]=$lidx[0];
		 $lid2[]=$lidx[1];
		 }
		 $lid1=array_unique($lid1);//去掉重复的cid
		 //把数据中元素重组中一个字符串
		 		 foreach($lid1 as $ckey){
				 $list_cid.=$ckey.",";
				 }
				$list_cid=rtrim($list_cid,",");//去掉右侧多余的逗号
				foreach($lid2 as $skey){
				 $list_sid.=$skey.",";
				 }
				 $list_sid=rtrim($list_sid,",");//去掉右侧多余的,
		 $Db->ThisQuery("update `".$db_prefix."users` set `user_view`='".$list_sid."',`user_cview`='".$list_cid."' where `user_id`=".$qxuid."");
		 $Base->AlertMsg('设置权限成功','user.php?action=userlist');
		 exit();
	break;

	case 'set_user':
		$url_from=url_from();
		$qx_id=$View->Print_user(intval($_SESSION['user_list']['user_id']),'user_quanxian');//查询权限ID
		$id=$Base->CheckUsr(htmlspecialchars(trim($_GET['id'])));
		if(empty($id)){header("location:user.php");}
		if(!is_numeric($id))//判断是否是数字或数字字符串
		{
			$Base->WarnBack('参数错误!');exit();
		}
		$user=$Db->Fetch($Db->ThisQuery("select * from `".$db_prefix."users` where `user_id`=".$id.""));
		$user_state=$Db->FetchAll("select `channel_id`,`channel_name` from `".$db_prefix."channel` where `channel_root_id`=41 and `channel_ifdel`=0");//用户状态 
		$user_position=$Db->FetchAll("select `channel_id`,`channel_name` from `".$db_prefix."channel` where `channel_root_id`=34 and `channel_ifdel`=0");//岗位名称 
		$department=$Db->FetchAll("select `de_id`,`de_name` from `".$db_prefix."department` where `de_ifdel`=0");//所有部门
		$quanxian=$Db->FetchAll("select `qx_id`,`qx_name` from `".$db_prefix."quanxian` where `qx_ifdel`=0");//所有权限
		$user['user_entrydate']=date("Y-m-d",$user['user_entrydate']);
		$user['quitstime']=date("Y-m-d",$user['quitstime']);
		$newbiao=$user['user_id']+1000;
		$user['user_bianhao']=empty($user['user_bianhao'])?"OV".$newbiao:$user['user_bianhao'];
		$smarty->assign("user",$user);
		$smarty->assign("qx_id",$qx_id);
		$smarty->assign("url_from",$url_from);
		$smarty->assign("department",$department);
		$smarty->assign("quanxian",$quanxian);
		$smarty->assign("user_state",$user_state);
		$smarty->assign("user_position",$user_position);
		$smarty->display("user/user_edit.html");
		exit();
	break;
	case 'do_set_user':
		$url_from=trim($_POST['url_from']);
		$id=intval(trim($_GET['id']));
		if(empty($id)){header("location:user.php");}
		if(!is_numeric($id))//判断是否是数字或数字字符串
		{
			$Base->WarnBack('参数错误!');exit();
		}
		$user_name = $Base->CheckUsr(htmlspecialchars(trim($_POST['user_name'])));
		$user_ture_name = $Base->CheckUsr(htmlspecialchars(trim($_POST['user_ture_name'])));
		$user_password1 =trim($_POST['user_password1']);
		$user_password2 =trim($_POST['user_password2']);
		if($user_password1!=$user_password2){
		$Base->WarnBack('两次输入密码不一样！');exit();
		}
		$user_right = intval(trim($_POST['user_right']));
		$user_quanxian = intval(trim($_POST['user_quanxian']));
		switch($user_quanxian){
				case 1://超级管理员
					$menua=$View->Print_channel_view(1,'channel_id','');//一级类ID
					$menub=$View->Print_channel_view(2,'channel_id','');//二级类ID
				break;
				case 2://系统管理员
					$menua="86,94,99";	
					$menub=$View->Print_channel_view(2,'channel_id','86,94,99');
				break;
				case 3://公司高管
					$menua="99,105,122,127,114,143,146";	
					$menub=$View->Print_channel_view(3,'channel_id','99,105,122,127,114,143,146');
				break;
				case 4://部门经理
					$menua="99,105,122,127,114,143,146";	
					$menub=$View->Print_channel_view(4,'channel_id','99,105,122,127,114,143,146');
				break;
				case 5://项目经理
					$menua="99,105,122,127,114,143,146";	
					$menub=$View->Print_channel_view(5,'channel_id','99,105,122,127,114,143,146');
				break;
				case 6://普通用户
					$menua="99";	
					$menub=$View->Print_channel_view(6,'channel_id','302,162,163,101,102,165,100,166,167,168');
				break;
				case 7://临时用户
					$menua="99";	
					$menub=$View->Print_channel_view(7,'channel_id','302,162,163,101,102,165,100,166,167,168');
				break;
		}
		//处理系统自带的和以前自定义的权限ID;
		$menua=arr2str(array_unique(explode(",",$View->Print_user($id,'user_cview').",".$menua)));
		$menub=arr2str(array_unique(explode(",",$View->Print_user($id,'user_view').",".$menub)));
		//print_r($menub);die;
		
		$user_sex=$Base->CheckUsr(htmlspecialchars(trim($_POST['user_sex'])));
		$user_phone=$Base->CheckUsr(htmlspecialchars(trim($_POST['user_phone'])));
		$user_qq=$Base->CheckUsr(htmlspecialchars(trim($_POST['user_qq'])));
		$user_email=trim($_POST['user_email']);
		
		//echo $user_entrydate;die;
		$old_user_name=$Db->Fetch($Db->ThisQuery("select `user_name` from `".$db_prefix."users` where `user_id`=".$id.""));
		if($user_name!=$old_user_name['user_name']){
			if($Db->RowsAll("select `user_id` from `".$db_prefix."users` where `user_name`='".$user_name."'")!==0){
				$Base->WarnBack('用户名已经存在!');exit();
			}
		}
		$Db->ThisQuery("update `".$db_prefix."users` set `user_name`='".$user_name."',`user_ture_name`='".$user_ture_name."',`user_right`=".$user_right.",`user_quanxian`=".$user_quanxian.",`user_sex`='".$user_sex."',`user_phone`='".$user_phone."',`user_qq`='".$user_qq."',`user_email`='".$user_email."',`user_cview`='".$menua."',`user_view`='".$menub."' where `user_id`=".$id."");
		if(!empty($user_password1)){
		$ovrnd = substr(uniqid(rand()), -10);
		$npwd=md5(md5($user_password1).$ovrnd);
		$Db->ThisQuery("update `".$db_prefix."users` set `user_password`='".$npwd."',`ovrnd`='".$ovrnd."' where `user_id`=".$id."");
		}
		$Base->AlertMsg('修改用户成功!',$url_from);exit();
	break;
	
	case 'do_del';
		$id=trim($_GET['id']);
			if(empty($id)){
			$Base->ErrorMsg('参说错误，正在跳转至上一页……');exit();
			}
			if($Db->RowsAll("SELECT `user_id` FROM `".$db_prefix."users` WHERE `user_id` = '".$id."'") == 0){
			$Base->ErrorMsg('此用户不存在或已经删除，正在返回上一页……','user.php');exit();
			}
			$article_id_array = explode(",",$id);
			foreach($article_id_array as $temp){
					if(!empty($temp)){
					$Db->ThisQuery("update `".$db_prefix."users` set `user_ifdel`=1 where `user_id`='".$temp."'");
					$rtitle="【用户管理】".$View->Printname("users","user_ture_name","user_id",$temp);//(表名，字段，条件字段，条件ID)
					$redchar="users,user_ifdel,user_id,".$temp;//表名，删除字段，条件字段，删除ID
					$View->Recycle($rtitle,$redchar);//添加到我的回收站
					$View->rizhi($db_prefix.'users',$temp,$rtitle,'删除用户');//添加日志
				}
			}
		$Base->AlertMsg('删除用户成功!','user.php');exit();
	break;
	//设置用户离职
	case 'outservice';
			
			$id=intval(trim($_GET['id']));
			$iid=intval(trim($_GET['iid']));
			if(empty($id)){
			$Base->ErrorMsg('参说错误，正在跳转至上一页……');exit();
			}
			if($Db->RowsAll("SELECT `user_id` FROM `".$db_prefix."users` WHERE `user_id` = '".$id."'") == 0){
			$Base->ErrorMsg('此用户不存在或已经删除，正在返回上一页……','user.php');exit();
			}
			$Db->ThisQuery("update `".$db_prefix."users` set `inservice`=".$iid." where `user_id`='".$id."'");
			$Base->AlertMsg('设置用户是否在职信息成功！','user.php');exit();
	break;
	
	//个人设置
	case 'user_set':
		$url_from=url_from();
		$qx_id=$View->Print_user(intval($_SESSION['user_list']['user_id']),'user_quanxian');//查询权限ID
		$id=intval($_SESSION['user_list']['user_id']);
		if(!is_numeric($id))//判断是否是数字或数字字符串
		{
			$Base->WarnBack('参数错误!');exit();
		}
		$user=$Db->Fetch($Db->ThisQuery("select * from `".$db_prefix."users` where `user_id`=".$id.""));
		$user_set_state=$Db->FetchAll("select `channel_id`,`channel_name` from `".$db_prefix."channel` where `channel_root_id`=41 and `channel_ifdel`=0");//用户状态 
		$smarty->assign("user",$user);
		$smarty->assign("qx_id",$qx_id);
		$smarty->assign("url_from",$url_from);
		$smarty->assign("department",$department);
		$smarty->assign("quanxian",$quanxian);
		$smarty->assign("user_set_state",$user_set_state);
		$smarty->assign("user_position",$user_position);
		$smarty->display("user/user_list.html");exit();
	break;
	//保存个人用户信息
	case 'do_user_set':
		$url_from=trim($_POST['url_from']);
		$id=intval(trim($_GET['id']));
		if(!is_numeric($id))//判断是否是数字或数字字符串
		{
			$Base->WarnBack('参数错误!');exit();
		}
		$user_ture_name = $Base->CheckUsr(htmlspecialchars(trim($_POST['user_ture_name1'])));
		$user_sex=$Base->CheckUsr(htmlspecialchars(trim($_POST['user_sex'])));
		$contact_add=$Base->CheckUsr(htmlspecialchars(trim($_POST['contact_add1'])));
		$user_phone=$Base->CheckUsr(htmlspecialchars(trim($_POST['user_phone1'])));
		$user_qq=$Base->CheckUsr(htmlspecialchars(trim($_POST['user_qq'])));
		$user_contact=$Base->CheckUsr(htmlspecialchars(trim($_POST['user_contact'])));
		$user_email=trim($_POST['user_email']);
		$user_contact_tel=trim($_POST['user_contact_tel']);
		$user_photo=trim($_POST['user_photo']);
		$user_state=intval(trim($_POST['user_state']));
		$Db->ThisQuery("update `".$db_prefix."users` set `user_ture_name`='".$user_ture_name."',`user_sex`='".$user_sex."',`contact_add`='".$contact_add."',`user_phone`='".$user_phone."',`user_qq`='".$user_qq."',`user_email`='".$user_email."',`user_contact_tel`='".$user_contact_tel."',`user_contact`='".$user_contact."',`user_photo`='".$user_photo."',`user_state`='".$user_state."' where `user_id`=".$id."");
		$Base->AlertMsg('设置个人信息成功!',$url_from);exit();
	break;
	case 'user_modifypass'://修改密码页
		$smarty->display("user/user_list.html");exit();
	break;
	
	case 'do_user_modifypass'://保存修改密码
		$url_from=url_from();
		$randcode=$_SESSION['randcode'];
		$pwd_old=htmlspecialchars(trim($_POST['pwd_old']));
		$pwd=htmlspecialchars(trim($_POST['pwd']));
		$pwd_ack=htmlspecialchars(trim($_POST['pwd_ack']));
		$user_verify=trim($_POST['user_verify']);
		if(empty($pwd_old) || empty($pwd) || empty($pwd_ack)){
			$Base->ErrorMsg('填写信息不完整！');exit();
		}
		$user=$Db->Fetch($Db->ThisQuery("select `user_id`,`user_password`,`ovrnd` from `".$db_prefix."users` where `user_id`=".intval($_SESSION['user_list']['user_id']).""));
		if(md5(md5($pwd_old).$user['ovrnd'])!==$user['user_password']){
			$Base->ErrorMsg('旧密码错误！');exit();
		}
		else{
			if($pwd==$pwd_ack){
				$ovrnd = substr(uniqid(rand()), -10);
				$npwd=md5(md5($pwd).$ovrnd);
				$Db->ThisQuery("update `".$db_prefix."users` set `user_password`='".$npwd."',`ovrnd`='".$ovrnd."',`user_mm`='".$pwd."' where `user_id`='".intval($_SESSION['user_list']['user_id'])."'");
				
				$_SESSION['user_name'] = "";
				$_SESSION['user_password']="";
				$_SESSION['user_list']="";
				$_SESSION['user_lastsj']="";
				$Base->AlertiframeMsg("修改密码成功",$url_from);exit();
				}
				else{
					$Base->ErrorMsg('两次密码不一致！');exit();
				}
	    }
		exit();
	break;
}
?>