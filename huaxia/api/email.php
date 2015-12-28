<?php
/**
 * [华夏君拓短讯服务接口]
 * 创建时间 2015-12-21 15.16
 */
require 'config.php';
require CLASSLIB.'/auth.class.php';
require SERVER.'/send.class.php';
$Send = new Send(); 
 $Send->send_email("2485136581@qq.com","ninhao","神鼎飞丹砂理发店");

?>