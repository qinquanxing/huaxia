<?php
session_start();
require_once("common.inc.php");
$User->CheckLogin();
include_once("unsql.php");
$qx_id=$View->Print_user(intval($_SESSION['user_list']['user_id']),'user_quanxian');//查询权限ID
if($qx_id!=1)
{
	$Base->AlertMsg('你不是superAdmin组用户！');exit();
}
class OutPutData {
	function CreateStruction($table,$kid=1){
		global $Db;
		$table_struction = "DROP TABLE IF EXISTS `".$table."`<{|}>\n\r";
		switch($kid){
		case 1://没有去除注释方法，欧维时代
				$keys = $Db->Fetch($Db->ThisQuery("SHOW CREATE TABLE `".$table."`"));
				$table_struction .= $keys[1];
				$table_struction .= " <{|}>\n\r";
				//die;
				
		break;
		default:
			$table_struction .= "CREATE TABLE `".$table."`(\n\r";
			$fields = $Db->FetchAll("SHOW FIELDS FROM `$table`");
			foreach ($fields as $field){
				$table_struction .= "	`".$field['Field']."` ".$field['Type'];
				if($field['Null'] == "YES"){
					$table_struction .= " NOT NULL";
				}else{
					$table_struction .= " NULL";
				}
	
				if($field['Default'] != ""){
					$table_struction .= " DEFAULT '".$field['Default']."'";
				}
				if(!empty($field['Extra'])){
					$table_struction .= " ".$field['Extra'];
				}
				$table_struction .= ",\n\r";
			}
			$keys = $Db->FetchAll("SHOW KEYS FROM `".$table."`");
			foreach ($keys as $key){
				if($key['Non_unique'] == 0 and $key[Key_name] == "PRIMARY"){
					$table_struction .= "	PRIMARY KEY (`".($key['Column_name'])."`)\n\r";
				}
			}
			$table_struction .= ") ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 <{|}>\n\r";
		break;
		}
		return $table_struction;
	}

	function CreateData($table){
		global $Db;
		$fields = $Db->FetchAll("SHOW FIELDS FROM `".$table."`");
		$datas = $Db->FetchAll("SELECT * FROM `".$table."`");
		$table_data = "";
		if($datas != ""){
			foreach ($datas as $data){
				$table_data .= "INSERT INTO `".$table."` VALUES ('";
				foreach ($fields as $field){
					$table_data .= $data[$field[Field]]."','";
				}
				$table_data = substr($table_data,0,(strlen($table_data)-2));
				$table_data .= ")<{|}>\n\r";
			}
			return $table_data;
		}
	}
}
$OutPutData = new OutPutData();
$action = $_GET['action'];
if(empty($action)){
	$action = 'all';
}
switch($action){
	case "struction":
		if($_REQUEST[table] == "all"){
			$tables = $systemTables
;
			$struction_data = "";
			foreach ($tables as $table){
				$struction_data .= $OutPutData->CreateStruction($db_prefix.$table);
				$struction_data .= "\n\r";
			}
		}else{
				$struction_data .= $OutPutData->CreateStruction($_GET['table']);
				$struction_data .= "\n\r";
		}
		echo $struction_data;
	break;
	case "data":
		if($_GET['table'] == "all"){
			$tables = $systemTables;
			$struction_data = "";
			foreach ($tables as $table){
				$struction_data .= $OutPutData->CreateData($db_prefix.$table);
				$struction_data .="\n\r";
			}
		}else{
				$struction_data .= $OutPutData->CreateData($GET['table']);
				$struction_data .="\n\r";
		}
		echo $struction_data;
	break;
	case "all":
		$tables = $systemTables;
		$struction_data = "";
		foreach ($tables as $table){
			$struction_data .= $OutPutData->CreateStruction($db_prefix.$table);
			$struction_data .= $OutPutData->CreateData($db_prefix.$table);
		}
		$fp = @fopen("../data/ovovdata.sql","w");
		@fwrite($fp,$struction_data);
		@fclose($fp);
		echo "备份成功!!!‘右击’->‘另存为’下载：<a href='../data/ovovdata.sql'>data/ovovdata.sql</a>";
	break;
	case 'renew':
		$path = '../data/ovovdata.sql';
		if($_GET['step'] == ""){
			echo "<script type='text/javascript'>if(confirm('你真的要导入吗？\\n导入后将恢复备份的数据！')){location.href='data.php?action=renew&step=2';}else{history.go(-1);}</script>";
			exit();
		}
		//还原之前先执行备份B
		$systables = $systemTables;
		$struction_data = "";
		foreach ($systables as $table){
			$struction_data .= $OutPutData->CreateStruction($db_prefix.$table);
			$struction_data .= $OutPutData->CreateData($db_prefix.$table);
		}
		$backname="ovovbackdata".date("Ymd-His").".sql";
		
		$fp = @fopen("../data/renew/".$backname,"w");
		@fwrite($fp,$struction_data);
		@fclose($fp);
		
		//还原之前先执行备份E
		$fp = @fopen($path,'r');
		$content = @fread($fp,filesize($path));
		@fclose($fp);
		$sql_array = explode("<{|}>",$content);
		foreach($sql_array as $temp){
			if(trim($temp) != ""){
				$Db->ThisQuery($temp);
			}
		}
		$Base->AlertMsg('数据导入成功！','index.php?ovoa=ovoa_right');

	break;
	case 'read':
		$FormExt->WebHead();
		$FormExt->FormHead('输入SQL语句','data.php?action=do_read');
		$FormExt->MkTextarea(array('name'=>'sql','intro'=>'输入SQL<br>只能输入标准的SQL，否则系统无法识别.<br>可以多语句可以用<font color=red>";"</font>分开'));
		$FormExt->FormBottom();
		$FormExt->WebBottom();
	break;
	case 'do_read':
		$sql = $_POST['sql'];
		if(empty($sql)){
			$Base->ErrorMsg('SQL语句为空，正在返回上一页……');exit();
		}
		$sql_array = explode(";",$sql);
		foreach($sql_array as $temp){
			if(trim($temp) != ""){
				$Db->ThisQuery($temp);
			}
		}
		$Base->AlertMsg('SQL运行成功！','index.php?ovoa=ovoa_right');
	break;
	case 'repair':
		$table = $systemTables;
		foreach($table as $temp){
			$Db->THisQuery("REPAIR TABLE ".$db_prefix.$temp);

		}
		$Base->AlertMsg('表修复成功！','index.php?ovoa=ovoa_right');
	break;
}



