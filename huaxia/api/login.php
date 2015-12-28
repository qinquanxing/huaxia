<?php 
        /**
         * [华夏君拓1.0登录接口]
         * 创建时间 2015-12-14 18.23
         */
        require 'config.php';
        require SERVER.'/member.class.php';
        $member = new member($Db);

        $account=isset($_REQUEST['account'])?trim($_REQUEST['account']):0;
        $pwd=isset($_REQUEST['pwd'])?trim($_REQUEST['pwd']):0;

        //登陆方式 1手机，2邮箱
        //参数接收
        if(!$account){
            exit(json_encode(array('state'=>0,'return_data'=>"请输入登录账号")));
        }
        if(!$pwd){
            exit(json_encode(array('state'=>0,'return_data'=>"请输入登录密码")));
        }

        //判断是否是手机登陆
        if($member->checkLogin($account,$pwd)){
            $member_info=$member->getInfo($account);
            exit(json_encode(array('state'=>1,'return_data'=>$member_info)));
        }else{
            exit(json_encode(array('state'=>0,'return_data'=>'账号或密码错误')));
        }
   

?>