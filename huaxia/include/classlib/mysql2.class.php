<?php
class Db2 {
	
	function ErrorMsg($msg,$url="javascript:history.go(-1)",$time='2'){
		echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>无标题文档</title>
			</head>
			
			<body>
			<div style="border:#0066CC solid 1px; background-color:#0066CC; color:#FFFFFF; font-family:\'Courier New\', Courier, monospace; font-size:16px; font-weight:bold; text-align:left">错误信息</div>
			<div style=" border:#0066CC solid 1px; font-family:\'Courier New\', Courier, monospace; font-size:12px; color:#0066CC; text-align:center">'.$msg.'</div>
			</body>
			</html>';

	}
	
	function DbConnect($db_host,$db_user,$db_password){
		if(@$conn = mysql_connect($db_host,$db_user,$db_password)){
			mysql_query("SET NAMES 'GBK'");
			return $conn;
		}else{
			$this->ErrorMsg(mysql_error());
			exit();
		}
	}
	
	function CreateDb($database,$conn){
		$this->Query("DROP DATABASE IF EXISTS `".$database."`",$conn);
		$sql = 'CREATE DATABASE `'.$database.'`';
		$this->Query($sql,$conn);
	}
	
	function DropDb($database,$conn){
		$sql = 'DROP DATABASE `'.$database.'`';
		$this->Query($sql,$conn);
	}
	
	function SelectDb($db_name,$conn){
		if(!@mysql_select_db($db_name,$conn)){
			$this->ErrorMsg(mysql_error());
			exit();
		}
	}
	
	function DbSelectQuery($sql,$db_database,$conn){
		if(@$result = mysql_db_query($db_database,$sql,$conn)){
			return $result;
		}else{
			$this->ErrorMsg(mysql_error());
			exit();
		}
	}
	
	function Query($sql,$conn){
		if(@$result = mysql_query($sql,$conn)){
			return $result;
		}else{
			$this->ErrorMsg(mysql_error());
			exit();
		}
	}
	
	function ThisQuery($sql){
		global $db_host2,$db_user2,$db_password2,$db_database2;
		$conn = $this->DbConnect($db_host2,$db_user2,$db_password2);
		$this->SelectDb($db_database2,$conn);
		return $this->Query($sql,$conn);
	}
		
	function Fetch($result_sql){
		if(@$result = mysql_fetch_array($result_sql)){
			return $result;
		}
	}
	
	function Rows($result_sql){
		if(@$result = mysql_num_rows($result_sql)){
			return $result;
		}
	}
	
	function FetchAll($sql){
		global $db_host2,$db_user2,$db_password2,$db_database2;
		$conn = $this->DbConnect($db_host2,$db_user2,$db_password2);
		$this->SelectDb($db_database2,$conn);
		$res = $this->Query($sql,$conn);
		while($result = @mysql_fetch_array($res)){
			$rs[] = $result;
		}
		return $rs;
	}
	
	function RowsAll($sql){
		global $db_host2,$db_user2,$db_password2,$db_database2;
		$conn = $this->DbConnect($db_host2,$db_user2,$db_password2);
		$this->SelectDb($db_database2,$conn);
		$res = $this->Query($sql,$conn);
		return mysql_num_rows($res);
	}
}
?>