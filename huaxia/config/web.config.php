<?php
date_default_timezone_set('Asia/Chongqing');
$ver=14;//版本号,只能为数字，请不要修改。
$vermd5='41f8df1fca6245eef52593961b4c08f9';//版本号MD5值
$web_name = "华夏军拓";
$web_url = "http://localhost/";
$website_url = "http://localhost/";
$website_logo = "upload/2015-02/04/201502041059_8519.png";
$website_2d = "upload/2015-02/04/201502041100_3730.png";
$web_admin = "jc";
$web_switch = "open";
$web_email = "jckf9068@163.com";
$close_reason = "系统正在升级中，如有任何疑问，请联系管理员！";

$web_smtpserver = "smtp.126.com";
$web_port = "25";
$web_smtppass = "liangxiaojing5#1";
$web_smtpusermail = "wangming6133@126.com";
$web_self = "0";
$sweekid = "1";
$eweekid = "0";
$shour = "9";
$ehour = "22";
$ssecond = "00";
$esecond = "00";
$skinnum= "1";
$ovov_sesionname="ovovcms";//勿修改
$web_copyright = "";
$allowed_file = ".rar,.mp3,.wma,.jpg,.gif,.bmp,.doc,.ppt,.txt,.xls,.pdf,.swf,.png,.flv";
$allowed_size = "10M";
$web_wshtml = "close";
$web_getapi = "";
$web_getapitxt = "";
//use after add
$web_address = "北京市朝阳区八里庄南里30号楼";
$web_hotline = "010-58629068";
$web_hrline = "13693670934";
$web_fax = "传真：8";
$web_cert = "ICP证：京ICP备";
$web_keywords = "京朝房产";
$web_regnotice = "京朝房产";

$ovovweb = array(
		"web_name"=>$web_name,
		"web_url"=>$web_url,
		"website_url"=>$website_url,
		"website_logo"=>$website_logo,
		"website_2d"=>$website_2d,
		"web_admin"=>$web_admin,
		"web_email"=>$web_email,
		"web_switch"=>$web_switch,
		"web_self"=>$web_self,
		"sweekid"=>$sweekid,
		"eweekid"=>$eweekid,
		"shour"=>$shour,
		"ehour"=>$ehour,
		"ssecond"=>$ssecond,
		"esecond"=>$esecond,
		"close_reason"=>$close_reason,
		"allowed_file"=>$allowed_file,
		"allowed_size"=>$allowed_size,
		"web_copyright"=>$web_copyright,
		"web_wshtml"=>$web_wshtml,
		"web_smtpserver"=>$web_smtpserver,
		"web_port"=>$web_port,
		"web_smtppass"=>$web_smtppass,
		"web_smtpusermail"=>$web_smtpusermail,
		"web_address"=>$web_address,
		"web_hotline"=>$web_hotline,
		"web_hrline"=>$web_hrline,
		"web_fax"=>$web_fax,
		"web_cert"=>$web_cert,
		"web_keywords"=>$web_keywords,
		"web_regnotice"=>$web_regnotice
	);
$systemTables = array(
 'abcdata',
 'adv',
 'adv_order',
 'article',
 'blackip',
 'channel',
 'collect',
 'collect_history',
 'collect_liebiao',
 'department',
 'file',
 'fsite',
 'getmsg',
 'log',
 'message',
 'quanxian',
 'recycle',
 'rizhi',
 'sysconfig',
 'users'
);

?>