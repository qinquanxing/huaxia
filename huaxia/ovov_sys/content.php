<?php
session_start();
require_once("common.inc.php");$User->CheckLogin();
include_once("unsql.php");
$action = $_GET['action']?htmlspecialchars($_GET['action']):'';
$file = $_GET['file']?htmlspecialchars($_GET['file']):'';
$smarty->assign('file', $file);
if(!in_array($file, array('qrcode','aboutSoft','serviceTel','protocol'))){
    $urlFrom = url_from();
    $Base->AlertMsg('参数错误，正在返回至上一页...', $urlFrom);exit();
}

switch ($action){
    //配置文件
    case 'open':
        if($file == 'qrcode'){
            $smarty->assign('tabName', '二维码');
        }
        if($file == 'aboutSoft'){
            $smarty->assign('tabName', '关于软件');
        }
        if($file == 'serviceTel'){
            $smarty->assign('tabName', '客服电话');
        }        
        if($file == 'protocol'){
            $smarty->assign('tabName', '注册协议');
        }        
        $file_name = 'localData/'.$file.'.php';
        if(file_exists($file_name)){
            if(filesize($file_name)>0){
                require $file_name;
                $smarty->assign('contents', urldecode($contents));
            }
        }
        else
        {
            exit('文件不存在');
        }
        $smarty->display('ovoa/config.html');
    break;
    
    case 'saveData':
        $file_name = 'localData/'.$file.'.php';
        if($update_content = isset($_POST['data'])?$_POST['data']:''){
            foreach ($update_content as $k => $v){
                $update_content[$k] = (trim($v));
            }
            $fp = fopen($file_name, "r");
            $read_content = fread($fp, filesize($file_name));
            fclose($fp);
            require $file_name;
            $read_content = str_replace('$contents = "'.$contents.'"','$contents = "'.urlencode($update_content['contents']).'"', $read_content);
            $fp = fopen($file_name, "w");
            if(fwrite($fp, $read_content)){
                echo 1;
            }
            fclose($fp);exit;
        }
    break;
}
?>