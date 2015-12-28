<?php
	/***********************************
	 *名称：view.class.php
	 *类列：view处理类
	 *作用：常用处理显示类
	 *用法：采用任何引用方式直接使用
	 *初始：无
	 *输入：无
	 *作者：Ovov
	 *版权：欧维时代（北京）
	 *时间：2011-6-16
	***********************************/
class View{
		/*********************************************************
		 * function DateDiff($date1,$date2,$unit) 时间比较函数
		 *
		 * @param $date1	比较日期
		 * @param $date2	比较日期
		 * @param $unit 	s为秒，i为分钟，h为小时，d为天，默认为天
		 * @return 			返回两个日期相差几秒、几分钟、几小时或几天
		 *********************************************************/
		 function DateDiff($date1,$date2,$unit="") { 
				  switch ($unit) { 
					case 's': 
						 $dividend = 1; 
					break; 
					case 'i': 
						 $dividend = 60; 
					break; 
					case 'h': 
						 $dividend = 3600; 
					break; 
					case 'd': 
						$dividend = 86400; 
					break; 
					default: 
					 $dividend = 86400; 
				 } 
				 $time1=strtotime($date1); 
				 $time2=strtotime($date2); 
				 if ($time1&&$time2) 
				 return intval((integer)($time1-$time2)/$dividend); 
				 return false; 
		 }
	  /*****************************************************************
	  * function Getunsql($str,$kid=1) 过滤规则替换函数
	  *
	  * @param $str	转换字符串
	  * @param $kid	转换类型
	  * @return 			
	  *****************************************************************/
	  function Getunsql($str,$kid){
				$ovovarr1=array("union","and","or","select","update","from","where","order","by","delete","insert","into","values","create","table","database");
				$ovovarr2=array("un-ion","a-nd","o-r","se-lect","up-date","fr-om","wh-ere","or-der","b-y","del-ete","in-sert","in-to","va-lues","cre-ate","ta-ble","database");
				if($kid==1){
				return str_replace($ovovarr1,$ovovarr2,$str);
				}else{
				return str_replace($ovovarr2,$ovovarr1,$str);
				}
			
	  }
	    /**********************************
		 * function rizhi() 添加日志函数
		 *
		 * @param $rz_table		操作表名
		 * @param $rz_zdid		操作表ID
		 * @param $rz_zdname	字段名称
		 * @param $rz_leixing 	操作类型
		 * @return 				无
		 ***********************************/
		 function Rizhi($rz_table,$rz_zdid,$rz_zdname,$rz_leixing){
			      global $Db,$db_prefix,$Base;
				  session_start();
				  $ip=$Base->GetIp();
				  $Db->ThisQuery("insert into `".$db_prefix."rizhi` (`rz_table`,`rz_zdid`,`rz_zdname`,`rz_leixing`,`rz_yhid`,`rz_ip`) values ('".$rz_table."','".$rz_zdid."','".$rz_zdname."','".$rz_leixing."',".$_SESSION['user_id'].",'".$ip."')");
		 }
		/**********************************
		 * function getmsg() 添加弹出消息函数
		 *
		 * @param $mesid	消息ID
		 * @param $uid		用户ID
		 * @param $uname	用户名
		 * @param $msgtitle	标题
		 * @param $msgurl 	标题链接
		 * @return 			无
		***********************************/
		 function Getmsg($mesid,$uid,$uname,$msgtitle,$msgurl){
				  global $Db,$db_prefix,$Base;
				  $ip=$Base->GetIp();
				  $addtime=time();
				  $Db->ThisQuery("insert into `".$db_prefix."getmsg` (`mid`,`uid`,`uname`,`msgtitle`,`msgurl`,`addtime`,`getip`) values (".$mesid.",".$uid.",'".$uname."','".$msgtitle."','".$msgurl."','".$addtime."','".$ip."')");
		 }	
		/**********************************
		 * function Recycle() 添加到回收站函数
		 *
		 * @param $rtitle		回收站显示标题
		 * @param $redchar		还原参数字符串
		 * @return 				无
		 ***********************************/
		 function Recycle($rtitle,$redchar){
				  global $Db,$db_prefix,$Base;
				  session_start();
				  $ip=$Base->GetIp();
				  $deltime=time();
				  $Db->ThisQuery("insert into `".$db_prefix."recycle` (`uid`,`rtitle`,`redchar`,`deltime`,`reip`) values (".$_SESSION['user_id'].",'".$rtitle."','".$redchar."',".$deltime.",'".$ip."')");
		 }
		/****************************************
		 * function Reduction() 还原回收站内容函数
		 *
		 * @param $rid			回收站ID
		 * @param $table		表名
		 * @param $ziduan		字段
		 * @param $tjziduan		条件字段
		 * @param $tjid			条件ID
		 * @return 				无
		 *****************************************/
		function Reduction($rid,$table,$ziduan,$tjziduan,$tjid){
				 global $Db,$db_prefix,$Base;
				 session_start();
				 $ip=$Base->GetIp();
				 $redtime=time();
				 $Db->ThisQuery("update `".$db_prefix."recycle` set `isdel`=1,`redtime`=".$redtime.",`redip`='".$ip."',`reduid`=".$_SESSION['user_id']." where `rid`=".$rid."");
				 $Db->ThisQuery("update `".$db_prefix.$table."` set `".$ziduan."`=0  where `".$tjziduan."`='".$tjid."'");
		}
		/*************************************
		 * function Printname() 自定义查询函数
		 *
		 * @param $tablename	表名
		 * @param $ziduanname	字段
		 * @param $tjziduan		，条件字段
		 * @param $id			条件ID
		 * @return 				返回查询数组
		 **************************************/
		function Printname($tablename,$ziduanname,$tjziduan,$id){
				 global $Db,$db_prefix;
				 $evername = $Db->FetchAll("SELECT `".$ziduanname."` FROM `".$db_prefix.$tablename."` WHERE `".$tjziduan."` = '".$id."'");
				 if(!$evername){
					return "";
				 }
				 foreach($evername as $temp){
					$evername=$temp[$ziduanname];
				 }
				return $evername;
		}
		/************************************************
		 * function Printchannelname() 单条查询频道栏目名称
		 *
		 * @param $channel_id	频道ID
		 * @return channel_name 返回栏目名称
		 ***************************************************/
		 function Printchannelname($channel_id){
				  global $Db,$db_prefix;
				  $chanel = $Db->FetchAll("SELECT `channel_name` FROM `".$db_prefix."abcdata` WHERE `channel_id` = '".$channel_id."'"); 
				  if(!$chanel){
						return "";
					}
				   foreach($chanel as $temp){
						$chanelname=$temp['channel_name'];
				   }
				   return $chanelname;
		 }
		/*********************************************************
		 * function Print_arr_channelname() 批量查询频道栏目名称函数
		 *
		 * @param $idarr		多个频道ID字符串，格式如：1,2,3,4
		 * @return channel_name 返回多个栏目字符串加，分开
		 **********************************************************/
		function Print_arr_channelname($idarr){
				global $Db,$db_prefix;
				$userarr=explode(",",$idarr);
				for($i=0;$i<count($userarr);$i++)
				{
				$chanel = $Db->Fetch($Db->ThisQuery("SELECT `channel_name` FROM `".$db_prefix."channel` WHERE `channel_id` = ".$userarr[$i].""));
				$chanelname.=$chanel?$chanel['channel_name'].",":"";
				}
				$chanelname=rtrim($chanelname,",");
				return $chanelname;
		}
		/**********************************************
		 * function Print_truename() 查询会员真实姓名函数
		 *
		 * @param $uid		会员ID
		 * @return 返回真实姓名user_ture_name
		***********************************************/
		function Print_truename($uid){
				global $Db,$db_prefix;
				if($uid==0){$usersname="所有会员";}else{
				$users = $Db->FetchAll("SELECT `user_ture_name` FROM `".$db_prefix."users` WHERE `user_id` = ".intval($uid)." ");
				if(!$users){
				return "";
				}
				foreach($users as $temp){
				$usersname=$temp['user_ture_name'];
				}
				}
			return $usersname;
		}
		/***************************************************
		 * function Print_truename() 批量查询会员真实姓名函数
		 *
		 * @param $uidarr		会员ID字符串，格式如：1,2,3,4
		 * @return 返回真实姓名以，隔开
		****************************************************/
		function Print_arr_truename($uidarr){
				global $Db,$db_prefix;
				$userarr=explode(",",$uidarr);
				for($i=0;$i<count($userarr);$i++)
				{
				$users = $Db->Fetch($Db->ThisQuery("SELECT `user_ture_name` FROM `".$db_prefix."users` WHERE `user_id` = ".intval($userarr[$i])." "));
				$usersname.=$users?$users['user_ture_name'].",":"";
				}
				$usersname=rtrim($usersname,",");
				return $usersname;
		}
		/**********************************************************
		 * function Print_depart_truename() 按部门查询会员真实姓名函数
		 *
		 * @param $did		部门ID
		 * @return 返回真实姓名以，隔开
		***********************************************************/
		function Print_depart_truename($did){
				global $Db,$db_prefix;
				$users =$Db->FetchAll("SELECT `user_ture_name` FROM `".$db_prefix."users` WHERE `user_right` = ".intval($did)." and `user_ifdel`=0");
				 if(!$users){
					return "";
				}
				foreach($users as $temp){
				$usersname.=$temp['user_ture_name'].",";
				}
				$usersname=rtrim($usersname,",");
				return $usersname;
		}
		/***************************************************************
		 * function Print_user($id,$ziduan) 自定义查询会员表单个字段函数
		 *
		 * @param $id		会员ID
		 * @param $ziduan	自定义查询字段
		 * @return 返回自定义字段的数据
		****************************************************************/
		function Print_user($id,$ziduan){
				global $Db,$db_prefix;
				$user_view_arr = $Db->FetchAll("SELECT ".$ziduan." FROM `".$db_prefix."users` WHERE `user_id` = ".intval($id)." ");
				if(!$user_view_arr){
					return "";
				}
				foreach($user_view_arr as $temp){
				$user_view=$temp[$ziduan];
				}
				return $user_view;
		}
		/***********************************************************
		 * function Print_diy_quanxian($id,$ziduan) 输出权限内容函数
		 *
		 * @param $id		权限ID
		 * @param $ziduan	自定义查询字段
		 * @return 返回自定义字段的数据
		***********************************************************/
		function Print_diy_quanxian($id,$ziduan){
				global $Db,$db_prefix;
				$user_view_arr = $Db->FetchAll("SELECT ".$ziduan." FROM `".$db_prefix."quanxian` WHERE `qx_id` = ".intval($id)." ");
				if(!$user_view_arr){
					return "";
				}
				foreach($user_view_arr as $temp){
				$user_view=$temp[$ziduan];
				}
				return $user_view;
			}
		/****************************************************************
		 * function Print_channel_view($id,$ziduan,$sid) 查询权限内容函数
		 *
		 * @param $id		权限ID
		 * @param $ziduan	自定义查询字段
		 * @return 返回自定义字段的数据
		****************************************************************/
		function Print_channel_view($id,$ziduan,$sid){
				global $Db,$db_prefix;
				if(empty($sid)){
				$csql="SELECT ".$ziduan." FROM `".$db_prefix."channel` WHERE `jibie` = ".$id." and `channel_kid`=0 and `channel_ifdel`=0 order by `channel_order`";}else
				{
				
				$csql="SELECT ".$ziduan." FROM `".$db_prefix."channel` WHERE  `channel_root_id` in ($sid) and  `jibie` = ".$id." and `channel_kid`=0 and `channel_ifdel`=0 order by `channel_order`";
				
				}
				$channel_arr = $Db->FetchAll($csql);
				if(!$channel_arr){
					return "";
				}
				foreach($channel_arr as $temp){
				$channel_view.=$temp[$ziduan].",";
				}
				return rtrim($channel_view,",");
		}
		/****************************************************************
		 * function Print_channel_jibie($id) 查询频道级别函数
		 *
		 * @param $id		频道ID
		 * @return 			返回频道级别[jibie]
		****************************************************************/
		function Print_channel_jibie($id)
				{
				global $Db,$db_prefix;
				$channel_arr = $Db->FetchAll("SELECT `jibie` FROM `".$db_prefix."channel` WHERE `channel_id` = ".intval($id)."  and `channel_ifdel`=0 order by `channel_order`");
				if(!$channel_arr){
					return "";
				}
				foreach($channel_arr as $temp){
				$channel_view=$temp['jibie'];
				}
				return $channel_view;
				
			}
		/****************************************************************
		 * function Print_department($id) 单条查询部门名称函数
		 *
		 * @param $did		部门ID
		 * @return 			返回部门名称de_name
		****************************************************************/
		function Print_department($did){
				global $Db,$db_prefix;
				$department = $Db->FetchAll("SELECT `de_name` FROM `".$db_prefix."department` WHERE `de_id` = ".$did."");
				if(!$department){
					return "";
				}
				foreach($department as $temp){
				$departmentname=$temp['de_name'];
				}
				return $departmentname;
		}
		/****************************************************************
		 * function Print_arrdepartment($did) 批量查询部门名称函数
		 *
		 * @param $did		部门ID字符串[1,2,3,4]
		 * @return 			返回部门名称字符串【，隔开】
		****************************************************************/
		function Print_arrdepartment($did){
				global $Db,$db_prefix;
				$ddarr=explode(",",$did);
				for($i=0;$i<count($ddarr);$i++)
				{
				$department = $Db->Fetch($Db->ThisQuery("SELECT `de_name` FROM `".$db_prefix."department` WHERE `de_id` = ".intval($ddarr[$i]).""));
				$departmentname.=$department?$department['de_name'].",":"";
				}
				$departmentname=rtrim($departmentname,",");
				return $departmentname;
		}
		/****************************************************************
		 * function Print_desknums($did) 统计我的工作台数量函数
		 *
		 * @param $sqlarr		条件查询SQL语法
		 * @return 				返回总数
		****************************************************************/
		function Print_desknums($sqlarr){
				global $Db,$db_prefix;
				$dang=date("Y-m-d");
				$ddarr=explode(",",$sqlarr);
				$sqls="SELECT ".$ddarr[1]." FROM `".$db_prefix.$ddarr[0]."` WHERE uid=".$_SESSION['user_id']." and ".$ddarr[2]." and FROM_UNIXTIME(addtime,'%Y-%m-%d')='".$dang."'";
				$total=$Db->RowsAll($sqls);
				return $total;
		}
		/****************************************************************
		 * function Print_quid_arr($did,$uid) 列出符合条件权限的所有用户ID函数
		 *
		 * @param $did		权限种类ID
		 * @param $uid		当前会员ID
		 * @return 			返回user_id字符串，隔开
		****************************************************************/
		function Print_quid_arr($did,$uid){
				global $Db,$db_prefix;
				$manage_arr= $Db->FetchAll("SELECT `user_id` FROM `".$db_prefix."users` WHERE `user_quanxian` = ".$did." ");
				if(!$manage_arr){
					return "";
				}
				foreach($manage_arr as $temp){
				$manage_id.=$temp['user_id'].",";
				}
				$manage_id=$manage_id.$uid;
				$manage_id=rtrim($manage_id,",");
				return $manage_id;
		}
		/****************************************************************
		 * function Print_deuid_arr($did) 列出符合条件部门的所有用户ID函数
		 *
		 * @param $did		权限种类ID
		 * @return 			返回用户会员user_id字符串，隔开
		****************************************************************/
		function Print_deuid_arr($did){
			global $Db,$db_prefix;
			$manage_arr= $Db->FetchAll("SELECT `user_id` FROM `".$db_prefix."users` WHERE `user_right` = ".intval($did)." ");
			if(!$manage_arr){
				return "";
			}
			foreach($manage_arr as $temp){
			$manage_id.=$temp['user_id'].",";
			}
			$manage_id=rtrim($manage_id,",");
			return $manage_id;
		}
		/****************************************************************
		 * function dansj($ziduan,$biaoming,$tiaojian,$id) 通用单个数据查询
		 *
		 * @param $ziduan		列表字段数组
		 * @param $biaoming		表名
		 * @param $tiaojian		条件
		 * @param $id			ID
		 * @return 				
		****************************************************************/
		function Dansj($ziduan=array(),$biaoming,$tiaojian,$id){
				global $Db,$Base,$db_prefix,$web_wshtml,$languagexz;
				foreach($ziduan as $ziduanvalue){
					$ziduanarray[]="`".$ziduanvalue."`";
				}
				$ziduanstr=implode(",",$ziduanarray);
				 $sqls="select ".$ziduanstr." from `".$db_prefix."$biaoming` where  `$tiaojian`= $id";
				$lie_source=$Db->ThisQuery($sqls);
				$lie=$Db->Fetch($lie_source);
				return $lie;
 		} 
		/****************************************************************
		 * function Sliebiao($ziduan,$type,$type_value,$ifdel,$tab,$data) 通用列表数据查询
		 *
		 * @param $ziduan		字段数组
		 * @param $type			表名
		 * @param $type_value	类别值
		 * @param $ifdel		是否删除字段名称
		 * @param $tab			表名 
		 * @param $data			数据
		 * @return 				
		****************************************************************/
		function Sliebiao($ziduan=array(),$type,$type_value='',$ifdel='',$tab='',$data=array()){       
				 global $Db,$db_prefix,$total,$pagelist,$deliebiao;
					foreach($ziduan as $ziduanvalue){
					$ziduanarray[]="`".$ziduanvalue."`";
					}
					$ziduanstr=implode(",",$ziduanarray);
				 	 $fields='';
					$insertvalue='';
					foreach($data as $key=>$value){
						if(!empty($value)){
						  $fields.=" and `".$key."`='".$value."'"; 
						 }else{
						  $fields.=''; 
						 }
					$fields=substr($fields,0); 
			 }
			 if(!empty($ziduanstr)){$ziduanstr.=",";}
			 $page=trim($_GET['page']);
			 $sql_new="select  `id`   from   `".$db_prefix."$tab`   where   `$ifdel`=0   and   `$type`=".$type_value."".$fields."  ";  
			 $total=$Db->RowsAll($sql_new);
			 $pageno=intval($_REQUEST['page']);
			 if($pageno==0||$pageno<0)
			 $pageno=1;
			 $per=5;//每页记录数	
			 $pagelist = Pagination($total, $per, $pageno);
			 //     咨询日期   店号   区域       姓名           工作时间 c_rate 两率查询 c_retdate 回访日期/下店日期 c_visiman 回访人  
			 $sqlview="select  ".$ziduanstr."`id`,`c_uid`   from `".$db_prefix."$tab`  where   `$ifdel`=0   and   `$type`=".$type_value."".$fields."  limit  ".($pageno-1)*$per.",".$per."";
			 $deliebiao=$Db->FetchAll($sqlview);
			 foreach($deliebiao as  $key=>$value){
			  $uid=$Db->Fetch($Db->ThisQuery("select  `user_name`,`user_right`   from `".$db_prefix."users`  where  `user_id`= ".intval($value['c_uid'])."")); 
		      $user_right=$Db->Fetch($Db->ThisQuery("select  `de_name`   from `".$db_prefix."department`  where  `de_id`= ".intval($uid['user_right']).""));
			 $deliebiao[$key]['user_right']=$user_right['de_name'];
			 $deliebiao[$key]['u_name']=$uid['user_name'];
			 $deliebiao[$key]['c_addtime']=date("Y-m-d  h:m:s",$value['c_addtime']);
			 } 
		 }
		/****************************************************************************
		 * Supdates($table,$data,$id,$ziduan,$filename,$name,$tiaozhuan) 修改数据通用函数
		 *
		 * @param $table		表名
		 * @param $data			数据
		 * @param $id			修改ID
		 * @param $ziduan		是否删除字段名称
		 * @param $filename		字段名 
		 * @param $name			修改名称
		 * @tiaozhuan			跳转链接
		 * @file				文件上传集合$_$_FILES
		 * @return 		
		*******************************************************************************/
  		function Supdates($table,$data,$id,$ziduan,$filename='',$name='',$tiaozhuan='',$file){
				global $Db,$db_prefix,$cid,$uid,$Base,$View;
				$fields='';
				$insertvalue='';
				foreach($data as $key=>$value){
					
					$FieldType=$Db->FieldType("select `".$key."` from `".$db_prefix.$table."`");
					if ($FieldType->type == 'int'){
						$value=intval(trim($value));
						$fields.=",`".$key."`=".$value." "; 
					}else{
						$value=htmlspecialchars(trim($value));
						$fields.=",`".$key."`='".$value."'"; 
					}
				}
				$fields=substr($fields,1);
				$sqlstr="update `".$db_prefix.$table."`  set  ".$fields."   where  `".$ziduan."` =".$id."";
				$result=$Db->ThisQuery($sqlstr);
				if ($file) {
				$upfiles= new files_one;//实例upload.class.php	
				$filearr=array();
				foreach($file as $key=>$val){
					$unm=count($val['name'])-1;
					for ($i=0;$i<$unm;$i++){
						$filearr[$i]['name']=$val['name'][$i];
						$filearr[$i]['tmp_name']=$val['tmp_name'][$i];
						$filearr[$i]['type']=$val['type'][$i];
						$filearr[$i]['size']=$val['size'][$i];
					}
				}
				//上传文件
				foreach ($filearr as $key=>$val) {
					$upfiles->Upload_file_one($val,$id,$table);
				}
				}
				View::Rizhi($db_prefix."".$table,$id,'修改所有字段',"修改".$name);//4、修改的那个地方的名称
				$Base->Errinfo(2,'修改成功!',$filename.".php?cid=".$cid."&action=$tiaozhuan");//5、跳回到那里
		}

		/****************************************************************************
		 * Ginsert($table,$data,$type,$filename='',$name='',$tiaozhuan='') 添加数据通用函数
		 *
		 * @param $table		表名
		 * @param $data			数据
		 * @param $type			修改ID
		 * @param $filename		字段名 
		 * @param $name			修改名称
		 * @param tiaozhuan		跳转链接
		 * @return 		
		*******************************************************************************/
		function Ginsert($table,$data,$type,$filename='',$name='',$tiaozhuan=''){
				  global $Db,$db_prefix,$data,$cid,$uid,$Base;
				  $data['c_type']=$type;//添加人的id
				  $data['c_addtime']=time();//添加是的时间 
				  $data['c_uid']=$uid;//添加人的id 
				  $fields='';
				  $insertvalue='';
				  foreach($data  as  $key=>$value){
					$ziduan=$Db->FieldType("select  `".$key."`  from `".$db_prefix.$table."`");
					if($ziduan->type == 'string')
					{
						$value=htmlspecialchars(trim($value));
						$fields.=",`".$key."`='".$value."'"; 
					}elseif ($ziduan->type == 'int'){
						$value=intval(trim($value));
						$fields.=",`".$key."`=".$value." "; 
					}
                  }
				  $fields=substr($fields,1);
				  $sqlstr="insert into `".$db_prefix.$table."` set  ".$fields." ";
				  $result=$Db->ThisQuery($sqlstr);
				  $getid=mysql_insert_id();//上一步执行新添加的数据的id
				  View::rizhi($db_prefix."".$table,$getid,'添加所有字段',"添加".$name);
				  $Base->Errinfo(2,'添加成功!',$filename.".php?cid=".$cid."&action=$tiaozhuan"); 
		}
		/********************************************************************************************
		 * Gdel($table,$zhuan='',$tiaozhuan='',$ifdel='',$id='',$zdid='',$content='') 通用删除函数
		 *
		 * @param $table		表名
		 * @param $zhuan		跳转的php页面值
		 * @param $tiaozhuan	跳转的action页面值
		 * @param $ifdel		是否删除字段 
		 * @param $ID			ID字段
		 * @param $zdid 		ID值 
		 * @param $content 		内容信息 
		 * @return 		
		*******************************************************************************/
	    function Gdel($table,$zhuan='',$tiaozhuan='',$ifdel='',$id='',$zdid='',$content='' ){
				global $Db,$db_prefix,$data,$cid,$uid,$Base;
				if($id==0){
				  $Base->Errinfo(2,'参数错误，正在跳转至上一页……');exit();
				}
				if($Db->RowsAll("SELECT `$zdid` FROM  `".$db_prefix."$table`  WHERE `".$zdid."`='".$id."'") == 0){//1、表名
				  $Base->Errinfo(2,'此信息不存在或已经删除，正在返回上一页……',"authorized_service.php?action=$tiaozhuan");exit();//2、跳转的action页面值
				}
				  $article_id_array = explode(",",$id);
				  foreach($article_id_array as $temp){
					if(!empty($temp)){
						 $Db->ThisQuery("update  `".$db_prefix."$table`  set `$ifdel`=1 where `".$zdid."`='".$temp."'"); //3、表名和是否删除字段、id字段 
						 $rtitle="【".$content."】";//(表名，字段，条件字段，条件ID)//4、content内容信息、是否删除字段、id字段名
						$redchar="$table,$ifdel,$zdid,".$temp;//表名，删除字段，条件字段，删除ID
						View::Recycle($rtitle,$redchar);
					   }
						View::rizhi($db_prefix.$table, $temp,$zdid,'删除'.$content);//5、content内容信息
					} 
				 $Db->ThisQuery("update  `".$db_prefix."$table`  set `$ifdel`=1 where  `".$zdid."`='".$id."'");
				   //6、表名、是否删除、id字段名、id字段值
				   $Base->Errinfo(2,'删除成功!',$zhuan.".php?&action=$tiaozhuan");//7、跳转的action页面值
	 	}
		/********************************************************************************************
		 * Insert($table,$data,$filename='',$name='',$tiaozhuan='') 通用添加函数
		 *
		 * @param $table		表名
		 * @param $data			数据数组
		 * @param $filename		执行php文件名字
		 * @param $name			当前操作名称
		 * @param $tiaozhuan	跳转的action页面值
		 * @file				文件上传集合$_$_FILES
		 * @return 		
		*******************************************************************************/
		function Insert($table,$data,$filename='',$name='',$tiaozhuan='',$file){
				global $Db,$db_prefix,$cid,$uid,$Base,$View;
				$fields='';
				foreach($data as $key=>$value){
				$FieldType=$Db->FieldType("select `".$key."` from `".$db_prefix.$table."`");
					if ($FieldType->type == 'int'){
						$value=intval(trim($value));
						$fields.=",`".$key."`=".$value." "; 
					}else{
						$value=htmlspecialchars(trim($value));
						$fields.=",`".$key."`='".$value."'"; 
					}
				}
				$fields=substr($fields,1);
				$sqlstr="insert into `".$db_prefix.$table."` set  $fields";
				$result=$Db->ThisQuery($sqlstr);
				$getid=mysql_insert_id();//上一步执行新添加的数据的id
				if ($file) {
				$upFile= new files_one;//实例upload.class.php
				$filearr=array();
				foreach($file as $key=>$val){
					$unm=count($val['name'])-1;
					for ($i=0;$i<$unm;$i++){
						$filearr[$i]['name']=$val['name'][$i];
						$filearr[$i]['tmp_name']=$val['tmp_name'][$i];
						$filearr[$i]['type']=$val['type'][$i];
						$filearr[$i]['size']=$val['size'][$i];
					}
				}
				//上传文件
				foreach ($filearr as $key=>$val) {
					$upFile->Upload_file_one($val,$getid,$table);
				}
				}
				$View->rizhi($db_prefix."".$table,$getid,'添加所有字段',"添加".$name);
				$Base->Errinfo(2,'添加成功',$filename.".php?cid=".$cid."&action=$tiaozhuan");
	 	 }

		/********************************************************************************************
		 * Z_dan($ziduan,$biaoming,$where) 通用查询单条函数
		 *
		 * @param $ziduan		字段名称
		 * @param $biaoming		表名
		 * @param $where		条件SQL
		 * @return 		
		*******************************************************************************/
		function Z_dan($ziduan,$biaoming,$where){
				global $Db,$db_prefix;
				$ziduanstr=implode("`,`",$ziduan);
				$ziduanstr="`".$ziduanstr."`";
				$dan=$Db->Fetch($Db->ThisQuery("SELECT ".$ziduanstr." FROM `".$db_prefix.$biaoming."` ".$where));
				return $dan;
		}
		/********************************************************************************************
		 * Z_duo($ziduan,$biaoming,$where) 通用查询多条函数
		 *
		 * @param $ziduan		字段名称
		 * @param $biaoming		表名
		 * @param $where		条件SQL
		 * @return 		
		*******************************************************************************/
		function Z_duo($ziduan,$biaoming,$where){
			global $Db,$db_prefix;
			$ziduanstr=implode("`,`",$ziduan);
			$ziduanstr="`".$ziduanstr."`";
			$dan=$Db->FetchAll("SELECT ".$ziduanstr." FROM `".$db_prefix.$biaoming."` ".$where);
			return $dan;
		}
		/********************************************************************************************
		 * Sele($root_id,$id,$name) 输出下拉框函数
		 *
		 * @param 基础数据ID $root_id
		 * @param 数据ID $id
		 * @param select名称 $name
		 * @return unknown
		*******************************************************************************/
		function Sele($root_id,$id,$name){
				global $Db,$db_prefix;
				$sele_arr=$Db->FetchAll("select `channel_name`,`channel_id` from `".$db_prefix."abcdata` where `channel_root_id` = ".intval($root_id)." and `channel_ifdel` = 0");
				$daima="<select name=\"date[$name]\" id=\'".$name."\'><option value=\"0\">请选择</option>";
				foreach ($sele_arr as $key=>$val){
					if ($val['channel_id'] == $id) {
						$daima.="<option value=\'".$val['channel_id']."\' selected >".$val['channel_name']."</option>";
					}else{
						$daima.="<option value=\'".$val['channel_id']."\'>".$val['channel_name']."</option>";
					}
				}
				$daima.="</select>";
				return $daima;
		}
		 /****************************************************************
		 * function Stliebiao($ziduan,$type,$type_value,$ifdel,$tab,$data,$mold) 通用列表相同表中不同类型的数据查询
		 *
		 * @param $ziduan		字段数组
		 * @param $type			表名
		 * @param $type_value	类别值
		 * @param $ifdel		是否删除字段名称
		 * @param $tab			表名 
		 * @param $data			数据
		 * @param $mold			区分相同表中的不同数据类型
		 * @return 				
		****************************************************************/
		function Stliebiao($ziduan=array(),$type,$type_value='',$ifdel='',$tab='',$data=array(),$mold=''){       
				 global $Db,$db_prefix,$total,$pagelist,$deliebiao;
					foreach($ziduan as $ziduanvalue){
					$ziduanarray[]="`".$ziduanvalue."`";
					}
					$ziduanstr=implode(",",$ziduanarray);
				 	 $fields='';
					$insertvalue='';
					foreach($data as $key=>$value){
						if(!empty($value)){
						  $fields.=" and `".$key."`='".$value."'"; 
						 }else{
						  $fields.=''; 
						 }
					$fields=substr($fields,0); 
			 }
			 if(!empty($ziduanstr)){$ziduanstr.=",";}
			 $page=trim($_GET['page']);
			 $sql_new="select  `id`   from   `".$db_prefix."$tab`   where   `$ifdel`=0   and   `$type`=".$type_value."".$fields."  "; 
			 if(!empty($mold)){
				  $sql_new.="  and  `type`=".intval($mold)."";
				 }
			 $total=$Db->RowsAll($sql_new);
			 $pageno=intval($_REQUEST['page']);
			 if($pageno==0||$pageno<0)
			 $pageno=1;
			 $per=5;//每页记录数	
			 $pagelist = Pagination($total, $per, $pageno);
			 //     咨询日期   店号   区域       姓名           工作时间 c_rate 两率查询 c_retdate 回访日期/下店日期 c_visiman 回访人  
			 $sqlview="select  ".$ziduanstr."`id`,`c_uid`   from `".$db_prefix."$tab`  where   `$ifdel`=0   and   `$type`=".$type_value."".$fields."  ";
			  if(!empty($mold)){
				  $sqlview.="  and  `type`=".intval($mold)."";
				 }
			  $sqlview.="  limit  ".($pageno-1)*$per.",".$per." ";
			 $deliebiao=$Db->FetchAll($sqlview);
			 foreach($deliebiao as  $key=>$value){
			  $uid=$Db->Fetch($Db->ThisQuery("select  `user_name`,`user_right`   from `".$db_prefix."users`  where  `user_id`= ".intval($value['c_uid'])."")); 
		      $user_right=$Db->Fetch($Db->ThisQuery("select  `de_name`   from `".$db_prefix."department`  where  `de_id`= ".intval($uid['user_right']).""));
			 $deliebiao[$key]['user_right']=$user_right['de_name'];
			 $deliebiao[$key]['u_name']=$uid['user_name'];
			 $deliebiao[$key]['c_addtime']=date("Y-m-d  h:m:s",$value['c_addtime']);
			 } 
		}
		
	}
?>
