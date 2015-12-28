<?php 
/****************************************************
 * @项目   购我爱2.0
 * @功能   后台定位数据管理
 * @日期   2015.11.10
 ****************************************************/
require 'common.inc.php';
$action = isset($_GET['action'])?trim($_GET['action']):'';
$data = $updata = array();
function ajax_rt($state=0,$infotxt='操作有误',$time=2){
    $icon = $state==1?'succeed':'error';
    exit('{"staus":"'.$state.'","infotxt":"'.$infotxt.'","icon":"'.$icon.'","time":"'.$time.'"}') ;
}
switch ($action){
    //----------- 城市管理s -----------//
    case 'manage_edit':
        $id = isset($_GET['id'])?intval($_GET['id']):0;
        if($id){
                $data = $Db->ThisQuery("select * from jt_member where id='{$id}'");
                $con=mysql_fetch_assoc($data);
                $smarty->assign('post_url', 'position.php?action=manage_do_edit&id='.$id);
                $smarty->assign('con',$con);                
                $smarty->display('position/manage_edit.html');
        }
    break;
    case 'manage_do_edit':     
        $id=isset($_GET['id'])?intval($_GET['id']):0;
        $reg_type=$_POST['reg_type'];
        $pwd=$_POST['password'];
        $phone=$_POST['phone'];
        $email=$_POST['email'];
        $state=$_POST['state'];
        $addtime=time();
        $sms_code=$_POST['scode'];
        $invest_code=$_POST['icode'];
        //加密密码
        // $slat=mt_rand(100000,999999);
        $slat=8888;
        $pwd=md5(md5($password).$slat);
        if($id){
            $istrue=$Db->ThisQuery("update jt_member set reg_type={$reg_type}, pwd='{$pwd}',phone='{$phone}', email='{$email}', state='{$state}',addtime='{$addtime}', sms_code='{$sms_code}', invest_code='{$invest_code}' where id='{$id}' ");
            if($istrue){
                //echo "修改成功";
                //echo "<script>alert('修改成功!');window.history.back(-2); </script>";
                ajax_rt(1,'修改成功',2);
            }else{
                //echo '修改失败';
               // echo "<script>alert('修改失败');window.history.back(-2);</script>";
                ajax_rt(0,'修改失败',2);
            }
        }
    break;  
    case 'manage_del':
        $id = isset($_GET['id'])?trim($_GET['id']):'';
        if($id){
            $istrue = $Db->ThisQuery("delete from jt_member where id='{$id}'");
            if($istrue){
                ajax_rt(1,'删除成功',2);
            }else{
                ajax_rt(0,'删除失败',2);
            }
        }
    break;
    case 'manage_add':
    $smarty->assign('post_url','position.php?action=manage_do_add');
    $smarty->display('position/manage_add.html');
    break;
    case 'manage_do_add':
        $reg_type=$_POST['reg_type'];
        $pwd=$_POST['password'];
        $phone=$_POST['phone'];
        $email=$_POST['email'];
        $state=$_POST['state'];
        $addtime=time();
        $sms_code=$_POST['scode'];
        $invest_code=$_POST['icode'];
        //加密密码
        // $slat=mt_rand(100000,999999);
        $slat=8888;
        $pwd=md5(md5($password).$slat);
        if(!empty($_POST)){
            $istrue = $Db->ThisQuery("insert into jt_member( `reg_type`, `pwd`, `phone`, `email`, `state`, `addtime`, `sms_code`, `invest_code`) value('{$reg_type}','{$pwd}','{$phone}','{$email}','{$state}','{$addtime}','{$sms_code}','{$invest_code}')");
            if($istrue){
                echo '插入成功';
                // ajax_rt(1,'插入成功',2);
                echo "<script>alert('添加成功!');window.history.back(-2); </script>";
            }else{
                echo '插入失败';
                // ajax_rt(0,'插入失败',2);
            }
        }
    break;
    case 'manage_delAll':
        $gid = isset($_GET['gid'])?trim($_GET['gid']):'';
        var_dump($gid);exit;
        if($gid){
            $gid = rtrim($gid,',');
            //$istrue = $Db->update($db_prefix.'city', $updata,"`id` IN ($gid)");
            $istrue = $Db->ThisQuery("delete from jt_member where id IN {$gid}");
            if($istrue){
                ajax_rt(1,'删除成功',2);
            }else{
                ajax_rt(0,'删除失败',2);
            }
        }
    break;

    //----------- 城市管理e -----------//
    
    
}
?>