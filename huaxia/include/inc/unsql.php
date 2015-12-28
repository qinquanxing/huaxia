<?php
error_reporting(0);
//要过滤的非法字符
$ArrFiltrate=array("union","and","or","select","update","from","where","order","by","delete","insert","into","values","create","table","database");
//出错后要跳转的url,不填则默认前一页
$StrGoUrl="/";
//是否存在数组中的值
function FunStringExist($StrFiltrate,$ArrFiltrate){
foreach ($ArrFiltrate as $key=>$value){
    if (eregi($value,$StrFiltrate)){
        return true;
    }
  }
return false;
}
//合并$_POST 和 $_GET
if(function_exists(array_merge)){
	 $ArrPostAndGet=array_merge($_POST,$_GET);//php5.x以上支持
    //$ArrPostAndGet=array_merge($HTTP_POST_VARS,$HTTP_GET_VARS);//php 5.x 以下 5.x以上需要开启register_long_arrays
}else{
    foreach($HTTP_POST_VARS as $key=>$value){
        $ArrPostAndGet[]=$value;
    }
    foreach($HTTP_GET_VARS as $key=>$value){
        $ArrPostAndGet[]=$value;
    }
}
 //echo print_r($_POST);die;
//验证开始
foreach($ArrPostAndGet as $key=>$value){
//     if (FunStringExist($value,$ArrFiltrate)){
    if (in_array($value,$ArrFiltrate)){
        echo "<script language=\"javascript\">alert(\"非法字符\");</script>";
        if (empty($StrGoUrl)){
        echo "<script language=\"javascript\">history.go(-1);</script>";
        }else{
        echo "<script language=\"javascript\">window.location=\"".$StrGoUrl."\";</script>";
        }
        exit;
    }
}
?>