<?php
session_start();
require_once("common.inc.php");
$User->CheckLogin();
include_once('unsql.php');
$ovoa_action=trim($_GET['action']);
$ovoa_action?$ovoa_action=$ovoa_action:$ovoa_action=trim($_POST['action']);
$ovoa_action?$ovoa_action=$ovoa_action:$ovoa_action="GetchanelList";
switch($ovoa_action){
	  case 'GetchanelList'://查询基础数据分类
		$pid=intval(trim($_POST['pid']));
		$city_arr=$Db->FetchALL("select `channel_id`,`channel_name`,`channel_ename` from `".$db_prefix."abcdata` where `channel_root_id`=".$pid." and `channel_kid`=0 and `channel_ifdel`=0");
		if($city_arr && $pid){
			$sort_list = "<select id=\"article_root_id\" name=\"article_root_id\" onChange=\"getSortLists()\">\n";
			$sort_list .= '<option value="">--请选择--</option>';
			foreach($city_arr as $temp){
// 			    if(!$temp['channel_ename']){
				    $sort_list = $sort_list."<option value=\"".$temp['channel_id']."\">".$temp['channel_name']."</option>\n";
// 			    }
			}
			$sort_list = $sort_list."</select>\n";
			echo $sort_list;
		}
		exit();
	break;

	case 'GetchanelLists'://查询基础数据分类
		$pid=intval(trim($_POST['pid']));
		$city_arr=$Db->FetchALL("select `channel_id`,`channel_name`,`channel_ename` from `".$db_prefix."abcdata` where `channel_root_id`=".$pid." and `channel_kid`=0 and `channel_ifdel`=0");
		if($city_arr && $pid){
			$sort_list = "<select id=\"article_root_id\" name=\"article_reroot_id\" >\n";
			$sort_list .= '<option value="">--请选择--</option>';
			foreach($city_arr as $temp){
// 			    if(!$temp['channel_ename']){
				    $sort_list = $sort_list."<option value=\"".$temp['channel_id']."\">".$temp['channel_name']."</option>\n";
// 			    }
			}
			$sort_list = $sort_list."</select>\n";
			echo $sort_list;
		}else{
			echo "<font color=red>没有下级栏目！</font>&nbsp;";
		}
		exit();
	break;
	
    case 'get_city'://查询城市
		$pid=intval(trim($_POST['pid']));
		$city_arr=$Db->FetchALL("select `id`,`pname` from `".$db_prefix."province` where `pid`=".$pid." and `cid`=0");
		if($city_arr){
			$sort_list = "\n<select id=\"city\" name=\"city\" onchange=\"GetArea()\" onclick=\"GetArea()\">\n";
			//$sort_list = $sort_list."<option value=\"0\">请选择城市</option>\n";
			foreach($city_arr as $temp){
				$sort_list = $sort_list."<option value=\"".$temp['id']."\">".$temp['pname']."</option>\n";
			}
			$sort_list = $sort_list."</select>\n";
			echo $sort_list;
		}else{
			echo "<font color=red>没有数据！</font>&nbsp;";
		}
		exit();
	break;
	
	case 'get_area'://查询地区
		$cid=intval(trim($_POST['cid']));
		$pid=intval(trim($_POST['pid']));
		$area_arr=$Db->FetchALL("select `id`,`pname` from `".$db_prefix."province` where `pid`=".intval($pid)." and `cid`=".intval($cid)."");
		if($area_arr){
			$sort_list = "\n<select id=\"area\" name=\"area\">\n";
			//$sort_list = $sort_list."<option value=\"0\">请选择地区</option>\n";
			foreach($area_arr as $temp){
				$sort_list = $sort_list."<option value=\"".$temp['id']."\">".$temp['pname']."</option>\n";
			}
			$sort_list = $sort_list."</select>\n";
			echo $sort_list;
		}else{
			echo "<font color=red>没有数据！</font>&nbsp;";
		}
		exit();
	break;
    case 'onlinenums'://在线人数
		$lastsj=intval(time()-1*60);//10分钟访问为在线人数
		$onlinenums=$Db->RowsAll("select `user_id`  from `".$db_prefix."users` where `user_ifdel`=0 and `user_lastsj`>=".$lastsj."");
		echo intval($onlinenums);exit();
	break;
/********2013-12-12*********/
 case 'Getchannel'://查询基础数据分类
		$pid=intval(trim($_POST['pid']));
		$city_arr=$Db->FetchALL("select `channel_id`,`channel_name` from `".$db_prefix."channel` where `channel_root_id`=".$pid." and `channel_kid`=0");
		if($city_arr && $pid){
			$sort_list = "<select id=\"article_root_id\" name=\"sid\" >\n";
			//$sort_list = $sort_list."<option value=\"0\">请选择城市</option>\n";onclick=\"GetArea()\"
			foreach($city_arr as $temp){
				$sort_list = $sort_list."<option value=\"".$temp['channel_id']."\">".$temp['channel_name']."</option>\n";
			}
			$sort_list = $sort_list."</select>\n";
			echo $sort_list;
		}else{
			echo "<font color=red>没有数据！</font>&nbsp;";
		}
		exit();
	break;
	 default:
			echo "北京欧维时代专业网站开发";exit();
	break;
}
?>
