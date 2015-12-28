<?php
 class FormExt{
	function AddHandle($elements = array()){
		global $Base;
		if(empty($elements) || !is_array($elements)){
			$Base->ErrorMsg('没有必要元素或元素不以数组形式定义！');exit();
		}
		foreach ($elements as $temp){
			if(empty($temp['name'])){
				$Base->ErrorMsg('无元素！');exit();
			}
			if(empty($temp['is_empty'])){
				$temp['is_empty'] = 1;
			}
			if(empty($temp['is_html'])){
				$temp['is_html'] = 1;
			}
			if(empty($temp['is_trim'])){
				$temp['is_trim'] = 1;
			}
			if($temp['is_empty'] == 1 && empty($_POST[$temp['name']])){
				$Base->ErrorMsg('请将信息填写完整！');exit();
			}
			if(!empty($temp['len']) && strlen($_POST['name'])>$temp['len']){
				$Base->ErrorMsg($temp['name'].'超出长度！');exit();
			}			
			if($temp['is_html']){
				if($temp['is_trim']){
					$res[] = array('name'=>$temp['name'],'value'=>htmlspecialchars(trim($_POST[$temp['name']])));
				}else{
					$res[] = array('name'=>$temp['name'],'value'=>htmlspecialchars($_POST[$temp['name']]));
				}
			}else{
				if($temp['is_trim']){
					$res[$temp['name']] = array('name'=>$temp['name'],'value'=>trim($_POST[$temp['name']]));
				}else{
					$res[$temp['name']] = array('name'=>$temp['name'],'value'=>$_POST[$temp['name']]);
				}
			}
		}
		return $res;
	}
	
	function InsertInfo($table,$elements=array()){
		global $Base,$Db,$db_array;
		if(empty($elements) || (!is_array($elements))){
			$Base->ErrorMsg('没有必要元素 或 元素不以数组形式定义！');exit();
		}
		$sql = "INSERT INTO `".$db_array['db_prefix'].$table."` (`";
		foreach($elements as $temp){
			if(empty($temp['name'])){
				$Base->ErrorMsg('无元素！');exit();
			}
			$sql .= $temp['name']."`,`";
		}
		$sql = substr($sql,0,strlen($sql)-2);
		$sql .= ") VALUES ('";
		foreach($elements as $temp){
			$sql .= $temp['value']."','";
		}
		$sql = substr($sql,0,strlen($sql)-2);
		$sql .= ")";
		$Db->ThisQuery($sql);
	}
	
	function UpdateInfo($table,$elements=array(),$condition){
		global $Base,$Db,$db_array;
		if(empty($elements) || (!is_array($elements))){
			$Base->ErrorMsg('没有必要元素 或 元素不以数组形式定义！');exit();
		}
		$sql = "UPDATE `".$db_array['db_prefix'].$table."` SET `";
		foreach($elements as $temp){
			if(empty($temp['name'])){
				$Base->ErrorMsg('无元素！');exit();
			}
			$sql .= $temp['name']."` = '".$temp['value']."',`";
		}
		$sql = substr($sql,0,strlen($sql)-2);
		$sql .= " WHERE ".$condition;
		$Db->ThisQuery($sql);
	}
	
	function MkForm($name,$elements,$action,$mode=array('POST','GET'),$width=540){
		global $Base;
		if(empty($elements) || (!is_array($elements))){
			$Base->ErrorMsg('没有必要元素 或 元素不以数组形式定义！');exit();
		}
		$form = "<form id=\"form1\" name=\"form1\" method=\"".$mode[0]."\" action=\"".$action."\">\n";
		$form .= "<table width=\"".$width."\" border=\"0\" align=\"center\">\n";
		$form .= "  <tr class=\"td_titlea\"><td colspan=\"3\" align=\"center\" class=\"lft_inf_title\">".$name."</td></tr>\n";
		foreach($elements as $temp){
			if(empty($temp['name']) || empty($temp['intro'])){
				$Base->ErrorMsg('元素名称不能为空！');exit();
			}
			if(empty($temp['is_empty'])){
				$temp['is_empty'] = 0;
			}
			if(empty($temp['type'])){
				$temp['type'] = 'text';
			}
			if($temp['is_empty']){
				$form .= "<tr><td width=\"119\">".$temp['intro']."：</td><td width=\"153\"><input type=\"".$temp['type']."\" name=\"".$temp['name']."\" id=\"".$temp['name']."\" value=\"".$temp['value']."\" size=\"20\" /></td><td width=\"254\"><div class=\"bg1\">".$temp['comment']."</div></td></tr>\n";
			}else{
				$form .= "<tr><td width=\"119\">".$temp['intro']."：<font color=red>必填</font></td><td width=\"153\"><input type=\"".$temp['type']."\" name=\"".$temp['name']."\" id=\"".$temp['name']."\" value=\"".$temp['value']."\" size=\"20\" /></td><td width=\"254\"><div class=\"bg1\">".$temp['comment']."</div></td></tr>\n";
			}
		}
		$form .= "<tr class=\"lft_inf_title\"><td colspan=\"3\" align=\"center\"><label><input name=\"submit\" type=\"submit\" class=\"button\" id=\"submit\" value=\"提交\" /></label>&nbsp;&nbsp;<label><input name=\"rest\" type=\"reset\" class=\"button\" id=\"rest\" value=\"重置\" /></label></td></tr></table></form>";
		echo $form;
	}
	
	function FormHead($name,$action,$method = array('POST','GET')){
		echo "<form id=\"form1\" name=\"form1\" method=\"post\" action=\"".$action."\">\n";
		echo "<table width=\"600\" border=\"0\" align=\"center\">\n";
		echo "<tr class=\"td_titlea\">\n";
		echo "<td colspan=\"3\" align=\"center\" class=\"lft_inf_title\">".$name."</td>\n";
		echo "</tr>\n";
	}
	
	function MkText($elements = array()){
		echo "<tr>\n";
		echo "<td width=\"119\">".$elements['intro']."：</td>\n";
		echo "<td width=\"153\"><input type=\"text\" name=\"".$elements['name']."\" id=\"".$name."\" size=\"30\" value=\"".$elements['value']."\" /></td>\n";
		echo "<td width=\"254\"><div class=\"bg1\">".$elements['comment']."</div></td>\n";
		echo " </tr>\n";
	}
	
	function MkPassword($elements = array()){
		echo "<tr>\n";
		echo "<td width=\"119\">".$elements['intro']."：</td>\n";
		echo "<td width=\"153\"><input type=\"password\" name=\"".$elements['name']."\" id=\"".$name."\" size=\"30\" value=\"".$elements['value']."\" /></td>\n";
		echo "<td width=\"254\"><div class=\"bg1\">".$elements['comment']."</div></td>\n";
		echo " </tr>\n";
	}
	
	function MkTextarea($elements = array()){
		echo "<tr>\n";
		echo "<td width=\"119\">".$elements['intro']."：</td>\n";
		echo "<td width=\"407\" colspan=\"2\"\"><textarea name=\"".$elements['name']."\"cols=\"60\" rows=\"10 \">".$elements['value']."</textarea></td>\n";
		echo " </tr>\n";
	}
	
	function MkSelect($elements = array()){
		echo "<tr>\n";
		echo "<td width=\"119\">".$elements['intro']."：</td>\n";
		echo "<td width=\"153\">\n";
		if(!empty($elements['divname'])){
		echo "<div id=\"".$elements['divname']."\">\n";
		}
		echo "<select id=\"".$elements['name']."\" name=\"".$elements['name']."\" ".$elements['use_ok'].">\n";
		foreach ($elements['value'] as $option){
			if(!$option['is_selected']){
				echo "<option value=\"".$option['value']."\">".$option['display']."</option>\n";
			}else{
				echo "<option value=\"".$option['value']."\" selected=\"selected\">".$option['display']."</option>\n";
			}
		}
		echo "</select>\n";
		if(!empty($elements['divname'])){
		echo "</div>\n";
		}
		echo "</td>\n";
		echo "<td width=\"254\"><div class=\"bg1\">".$elements['comment']."</div></td>\n";
		echo " </tr>\n";
	}
	
	function MkMenu($elements = array()){
		echo "<tr>\n";
		echo "<td width=\"119\">".$elements['intro']."：</td>\n";
		echo "<td width=\"153\"><select name=\"".$elements['name']."\" size=\"5\" multiple=\"multiple\">\n";
		foreach ($elements['value'] as $option){
			if(!$option['is_selected']){
				echo "<option value=\"".$option['value']."\">".$option['display']."</option>\n";
			}else{
				echo "<option value=\"".$option['value']."\" selected=\"selected\">".$option['display']."</option>\n";
			}
		}
		echo "</select></td>\n";
		echo "<td width=\"254\"><div class=\"bg1\">".$elements['comment']."</div></td>\n";
		echo " </tr>\n";
	}
	function Mkcheckbox($elements = array()){
		echo "<tr>\n";
		echo "<td width=\"119\">".$elements['intro']."：</td>\n";
		echo "<td width=\"153\">";
		foreach ($elements['value'] as $option){
			if(!$option['is_selected']){
				echo "<input value=\"".$option['value']."\" type=\"checkbox\" name=\"".$elements['name']."\" id=\"".$elements['name']."\" >".$option['display']."<br>\n";
			}else{
				echo "<input value=\"".$option['value']."\" type=\"checkbox\" name=\"".$elements['name']."\" id=\"".$elements['name']."\" checked>".$option['display']."<br>\n";
			}
		}
		echo "</td>\n";
		echo "<td width=\"254\"><div class=\"bg1\">".$elements['comment']."</div></td>\n";
		echo " </tr>\n";
	}
	function Mkradio($elements = array()){
		echo "<tr>\n";
		echo "<td width=\"119\">".$elements['intro']."：</td>\n";
		echo "<td width=\"153\">";
		foreach ($elements['value'] as $option){
			if(!$option['is_selected']){
				echo "<input value=\"".$option['value']."\" type=\"radio\" name=\"".$elements['name']."\" id=\"".$elements['name']."\" >".$option['display']."<br>\n";
			}else{
				echo "<input value=\"".$option['value']."\" type=\"radio\" name=\"".$elements['name']."\" id=\"".$elements['name']."\" checked>".$option['display']."<br>\n";
			}
		}
		echo "</td>\n";
		echo "<td width=\"254\"><div class=\"bg1\">".$elements['comment']."</div></td>\n";
		echo " </tr>\n";
	}

	function FormBottom(){
  		echo "<tr class=\"lft_inf_title\">\n";
		echo "<td colspan=\"3\" align=\"center\">\n<label>\n";
        echo "<input name=\"submit\" type=\"submit\" class=\"button\" id=\"submit\" value=\"提交\" />\n</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>\n";
      	echo "<input name=\"rest\" type=\"reset\" class=\"button\" id=\"rest\" value=\"重置\" />\n";
      	echo "</label></td>\n";
    	echo "</tr>\n</table>\n</form>\n";
	}
	function WebHead(){
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>欧维时代OA后台办公管理系统</title>
<link href="css/main.css" rel="stylesheet" type="text/css" />
<link href="css/txt.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
 }
	function WebBottom(){
		echo "</body>\n";
		echo "</html>";
	}
}
$FormExt = new FormExt();
?>