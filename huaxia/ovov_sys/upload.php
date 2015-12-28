<?php
require_once("common.inc.php");
$User->CheckLogin();
$allowed_file = explode(",",$allowed_file);
$dizhi = trim($_GET['dizhi']);
$rstform = trim($_GET['rstform']);
$introduce = trim($_GET['introduce']);
switch($allowed_size){
	case '60M':
		$allowed_size = 60*1024*1024;
	break;
	case '10M':
		$allowed_size = 10*1024*1024;
	break;
	case '20M':
		$allowed_size = 20*1024*1024;
	break;
	case '2M':
		$allowed_size = 2*1024*1024;
	break;
	case '1M':
		$allowed_size = 1024*1024;
	break;
	case '0.5M':
		$allowed_size = 512*1024;
	break;
}
class files {
	var $path,$extentsion,$attachment_name;
		function Upload_ovoafile($files,$dizhi){
		global $quid,$allowed_file,$allowed_size,$Db,$db_prefix,$Base,$ovoa,$FormExt,$web_url,$dizhi,$rstform,$introduce; 
		$attachment = $files['tmp_name'];
		$extention = strrchr($files['name'],".");
		$extention = strtolower($extention);
		$showtime=date("Y-m-d H:i:s");
		$mypcyzm=str_replace("-","",$showtime);
		$mypcyzm=str_replace(" ","",$mypcyzm);
		$mypcyzm=str_replace(":","",$mypcyzm);
		$attachment = $files['tmp_name']; 
		$extention = strrchr($files['name'],".");
		$gzname=explode(".",$files['name']);
		$top_docname=$gzname[0];//文件名称
		$docname=$gzname[1];
		$extention = strtolower($extention);
		$attachment_name =date("YmdHi")."_".rand(1000,9999).".".$docname;
		$filna=date("Y-m")."/".date("d");
		$dir="../upload/".$filna; 
        if (is_dir($dir)==false){mkdirs($dir, 0777);} 
		$path = $dir."/".$attachment_name;
		//echo $extention;exit();
		if(!in_array($extention,$allowed_file)){
			$Base->WarnBack('文件类型不允许！');exit();
		}
		if($files['size']>$allowed_size || $files['size'] == 0){
			$Base->WarnBack('文件超过允许大小！');exit();
		}	
		if(is_uploaded_file($attachment)){
				
			@move_uploaded_file($attachment,$path);
				
			@chmod ($path,0666);
				
			if(@filesize($path) != $files['size']){
					
				@unlink($path);
				$Base->WarnBack("检查权限或检查文件夹是否存在！");
			}else{		
				$Db->ThisQuery("INSERT INTO `".$db_prefix."file` (`uid`,`file_name`,`file_extention`,`file_url`,`file_add_time`,`file_size`,`file_add_user`) VALUES (".$quid.",'".$files[name]."','".$extention."','".substr($path,0,strlen($path))."',NOW(),'".$this->GetSize($files['size'])."','".$_SESSION['user_name']."')");		
				if(in_array($extention,array('.jpg','.jepg','.gif','.bmp','png','.emf','.flv'))){
					$message = "<img src=\"".$web_url.substr($path,2,strlen($path))."\">";
				}else{
					$message = "<a href=\"".$web_url.substr($path,2,strlen($path))."\">".$files['name']."</a>";

				}
		echo "<form style=\"margin:0px\" action=\"upload.php?action=upload_ovoa&dizhi=".$dizhi."&rstform=".$rstform."&introduce=".$introduce."\" method=\"post\" enctype=\"multipart/form-data\" name=\"fileform\" id=\"fileform\">";
		echo "<input name=\"attachment\" type=\"file\" style=\"width:160px;\"/>\n";
		echo "<input type='submit' class=\"button\" value='上传'/>&nbsp;";
//		echo "<script type=\"text/javascript\">parent.document.".$rstform.".".$dizhi.".value='".substr($path,3,strlen($path))."';</script>";
		echo "<script type=\"text/javascript\">parent.document.".$rstform.".".$dizhi.".value='".substr($path,3,strlen($path))."';</script>";
//		echo "<script type=\"text/javascript\">parent.document.".$rstform.".".$introduce.".value='".$top_docname."';</script>";
			}
		}else{
			$Base->WarnBack("检查权限或文件夹是否存在！");
		}			
	}

	function GetSize($size) {
		$kb = 1024;         // Kilobyte
		$mb = 1024 * $kb;   // Megabyte
		$gb = 1024 * $mb;   // Gigabyte
		$tb = 1024 * $gb;   // Terabyte
	
		if($size < $kb) {
			return $size." B";
		}else if($size < $mb) {
			return round($size/$kb,2)." KB";
		}else if($size < $gb) {
			return round($size/$mb,2)." MB";
		}else if($size < $tb) {
			return round($size/$gb,2)." GB";
		}else {
			return round($size/$tb,2)." TB";
		}
	}
}
	$File = new files();
	$action = $_GET['action'];
		if(empty($action)){
		$action = 'new_ovoafile';
	}
	if(!in_array($action,array('new_ovoafile','upload_ovoa','del','view'))){
		$Base->ErrorMsg('参说错误，正在返回上一页……');exit();
	}
	if(in_array($action,array('view','del')) && $qxid != 1){
		$Base->ErrorMsg('非超级管理员无法管理！');exit();
	}
switch($action){
	case "new_ovoafile":
		echo "<form style=\"margin:0px;  \" action=\"upload.php?action=upload_ovoa&dizhi=".$dizhi."&rstform=".$rstform."&introduce=".$introduce."\" method=\"post\" enctype=\"multipart/form-data\" name=\"fileform\" id=\"fileform\">";
		echo "<input name=\"attachment\" type=\"file\" style=\"width:160px;\"/>\n";
		echo "<input type='submit' class=\"button\" value='上传'/>&nbsp;";
	break;
	case "upload_ovoa" :
				$files = $_FILES['attachment'];
				if(empty($files['name'])){
					$Base->WarnBack("请选择文件！");exit();
				}
				$File->Upload_ovoafile($files,$dizhi,$rstform);
	break;
	case "view":
		//$smarty->debugging = true;
		$Admin->CheckLogin();
		$sql = "SELECT * FROM `".$db_prefix."file` ORDER BY `file_id` DESC";
		$_SESSION['session_sql']=$sql;
		$pageno=intval($_REQUEST['page']);
		if($pageno==0||$pageno<0)$pageno=1;
		$recordcount=$Db->RowsAll($sql);
		$pagerecord=10;//每页记录数
		$page_num=intval($recordcount/$pagerecord);
		if(($recordcount != 0 and($recordcount%$pagerecord)>0) or $recordcount == 0) $page_num++;
		if ($page_num<$pageno) $pageno=$page_num;
		$recordstart=($pageno-1)*$pagerecord;
		$recordend=$recordstart+$pagerecord;
		if($recordend>=$recordcount) $recordend=$recordcount;
		$pagesql=$sql." LIMIT $recordstart,$pagerecord";
		$res=$Db->ThisQuery($pagesql);
		while($result = $Db->Fetch($res)){
			$files[]=$result;
		}
		
		$this_url = "upload.php?action=".$action;
		$smarty->assign("this_url",$this_url);  
		$smarty->assign("list_num",$recordcount);  
		$smarty->assign("page_now",$pageno);
		$smarty->assign("page_frist",$this_url."&page=1");		
		$smarty->assign("page_pre",$this_url."&page=".($pageno-1));
		$smarty->assign("page_last",$this_url."&page=".($pageno+1));
		$smarty->assign("page_final",$this_url."&page=".$page_num);
		$smarty->assign("page_num",$page_num);
		$smarty->assign("files",$files);
		$smarty->display("upload_list.html");
		
	break;
	case "del":
		if(empty($_GET['file_id'])){
			$Base->ErrorMsg("参数错误，没有选择文件！");exit();
		}
		$file_id_array = explode(",",$_GET['file_id']);
		foreach ($file_id_array as $temp){
			$file = $Db->Fetch($Db->ThisQuery("SELECT * FROM `".$db_prefix."file` WHERE `file_id` = '".$temp."'"));
			@unlink('../'.$file['file_url']);
			$Db->ThisQuery("DELETE FROM `".$db_prefix."file` WHERE `file_id` = '".$file['file_id']."'");
		}
		$Base->AlertMsg('删除成功！');exit();
	break;
}
?>