<?php 
/****************************************************
 * @项目   华夏军拓
 * @功能   后台 - 会员管理
 * @日期   2015.12.14
 ****************************************************/
require 'common.inc.php';
$action = isset($_GET['action'])?trim($_GET['action']):'';
$data = $updata = array();
function ajax_rt($state=0,$infotxt='操作有误',$time=2){
    $icon = $state==1?'succeed':'error';
    exit('{"staus":"'.$state.'","infotxt":"'.$infotxt.'","icon":"'.$icon.'","time":"'.$time.'"}') ;
    exit('{"staus":"'.$state.'","infotxt":"'.$infotxt.'","icon":"'.$icon.'","time":"'.$time.'"}') ;
}
switch ($action){
    //----------- s -----------//
    case 'manage':
        $res=$Db->FetchAll('SELECT * FROM `'.$db_prefix.'member` ');
        if($res)
        foreach ($res as &$v){
            $v['addtime'] = date('Y-m-d H:i:s', $v['addtime']);
        }
        //var_dump($res);exit;
        $smarty->assign('res', $res);
        $smarty->display('member/manage.html');
    break;
    case 'manage_add':
        $smarty->display('member/manage_add.html');
    break;
    case 'city_do_add':
        $data = $_POST['data'];
        if(!$data['name']){
            ajax_rt(0,'请填写城市名称',2);
        }
        if($Db->RowsAll('SELECT `id` FROM `'.$db_prefix.'member` WHERE `is_del`=0 AND `name`=\''.$data['name'].'\'')){
            ajax_rt(0,'添加城市已存在',2);
        }
        if(!$data['initial']||strlen($data['initial'])!=1){
            ajax_rt(0,'请填写拼音首字母',2);
        }
        $data['addtime'] = time();
        $istrue=$Db->insert($db_prefix.'city', $data);
        if($istrue){
            ajax_rt(1,'添加成功',2);
        }else{
            ajax_rt(0,'添加失败',2);
        }
    break;
    case 'city_edit':
        $id = isset($_GET['id'])?intval($_GET['id']):0;
        if($id){
            $res = $Db->Fetch($Db->ThisQuery('SELECT `name`,`initial` FROM `'.$db_prefix.'member` WHERE `is_del`=0 AND `id`='.$id));
            $smarty->assign('res',$res);
            $smarty->assign('post_url', 'position.php?action=city_do_edit&id='.$id);
            $smarty->display('member/city_edit.html');
        }
    break;
    case 'city_do_edit':
        $id = isset($_GET['id'])?intval($_GET['id']):0;
        if($id){
            $updata = $_POST['data'];
            if(!$updata['name']){
                ajax_rt(0,'请填写城市名称',2);
            }
            if(!$updata['initial']||strlen($updata['initial'])!=1){
                ajax_rt(0,'请填写拼音首字母',2);
            }
            $where = "`id`=$id";
            $istrue=$Db->update($db_prefix.'city', $updata, $where);
            if($istrue){
                ajax_rt(1,'修改成功',2);
            }else{
                ajax_rt(0,'修改失败',2);
            }
        }
    break;
    case 'manage_del':
        $id = isset($_GET['id'])?trim($_GET['id']):'';
        var_dump($id);exit;
        if($id){
            $updata['is_del'] = 1;
            $istrue = $Db->update($db_prefix.'city', $updata,"`id`=$id");
            if($istrue){
                ajax_rt(1,'删除成功',2);
            }else{
                ajax_rt(0,'删除失败',2);
            }
        }
    break;
    case 'city_delAll':
        $gid = isset($_GET['gid'])?trim($_GET['gid']):'';
        if($gid){
            $gid = rtrim($gid,',');
            $updata['is_del'] = 1;
            $istrue = $Db->update($db_prefix.'city', $updata,"`id` IN ($gid)");
            if($istrue){
                ajax_rt(1,'删除成功',2);
            }else{
                ajax_rt(0,'删除失败',2);
            }
        }
    break;
    //----------- e -----------//
}
?>