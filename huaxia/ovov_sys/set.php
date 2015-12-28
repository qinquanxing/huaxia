<?php
require_once("common.inc.php");
$User->CheckLogin();
$mode = $_GET['mode'];
if(empty($mode)){$Base->WarnBack("参数错误！");exit();}
	switch($mode){
		case "channel":
			if($qxid!=1){
				$Base->ErrorMsg('你不是超级管理员，无权管理！');exit();
			}
			if($_GET['action'] == "order"){
				$sql = "UPDATE `".$db_prefix."channel` SET `channel_order` = '".$_GET['value']."' WHERE `channel_id` = '$_REQUEST[id]';";
				$Db->ThisQuery($sql);
				$Base->WarnBack("设置成功！");
			}
		break;
		case "sort":
			if($qxid!=1){
				$Base->ErrorMsg('你不是超级管理员，无权管理！');exit();
			}
			if($_GET['action'] == "order"){
		
				$sql = "UPDATE `".$db_prefix."channel` SET `channel_order` = '".$_GET['value']."' WHERE `channel_id` = '$_REQUEST[id]';";
				$Db->ThisQuery($sql);
				$Base->WarnBack("设置成功！");
			}
		break;
		case "hy_sort":
			if($qxid!=1){
				$Base->ErrorMsg('你不是超级管理员，无权管理！');exit();
			}
			if($_GET['action'] == "order"){
				$sql = "UPDATE `".$db_prefix."huiyuan_sort` SET `huiyuan_sort_order` = '".$_GET['value']."' WHERE `id` = '$_REQUEST[id]';";
				$Db->ThisQuery($sql);
				$Base->WarnBack("设置成功！");
			}
		break;
		case "article":
			if($_GET['action'] == "recommend"){
				$sql = "UPDATE `".$db_prefix."article` SET `is_recommend` = '".$_GET['value']."' WHERE `article_id` = '$_REQUEST[id]';";
				$Db->ThisQuery($sql);
				$Base->AlertMsg('设置成功！','article.php?cid=9&action=article_view');exit();
				//$Base->WarnBack("设置成功！");
			}else if($_GET['action'] == "top"){
				$sql = "UPDATE `".$db_prefix."article` SET `is_top` = '".$_GET['value']."' WHERE `article_id` = '$_REQUEST[id]';";
				$Db->ThisQuery($sql);
				$Base->AlertMsg('设置成功！','article.php?cid=9&action=article_view');exit();
			}else if($_GET['action'] == "lock"){
				$sql = "UPDATE `".$db_prefix."article` SET `is_locked` = '".$_GET['value']."' WHERE `article_id` = '$_REQUEST[id]';";
				$Db->ThisQuery($sql);
				$Base->AlertMsg('设置成功！','article.php?cid=9&action=article_view');exit();
			}else if($_GET['action'] == "paixu"){
				$sql = "UPDATE `".$db_prefix."article` SET `is_sequence` = '".$_GET['value']."' WHERE `article_id` = '$_REQUEST[id]';";
				$Db->ThisQuery($sql);
				$Base->AlertMsg('设置成功！','article.php?cid=9&action=article_view');exit();
			}
			
		break;
		default:
			$Base->WarnBack("参数错误！");
		break;
	}
?>