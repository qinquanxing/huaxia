<?php 
/**
 * [购我爱2.0 订单接口]
 * 创建时间 2015-11-04 10.48
 */
require 'config.php';
require 'cklogin.php';
//参数接收
$action=isset($_POST['action'])?trim($_POST['action']):'0';
$return_data=array('state'=>'0');
switch ($action){
    //提交订单
    case 'submit':
        $addr_id =isset($_POST['addr_id'])?trim($_POST['addr_id'],','):0;//收货地址id
        $products=isset($_POST['products'])?trim($_POST['products'],','):'';//产品
        $nums    =isset($_POST['nums'])?trim($_POST['nums'],','):'';//数量
        $time = isset($_POST['time'])?trim($_POST['time']):0;//送货时间
        $ticket_id= isset($_POST['ticket_id'])?trim($_POST['ticket_id']):0;//优惠券
        $remark = isset($_POST['remark'])?trim($_POST['remark']):'';//备注
        if(!$addr_id){
            $return_data['return_data']='请选择收货地址';
            exit(json_encode($return_data));
        }
        //`id`, `member_id`, `name`, `phone`, `province`, `city`, `county`, `addr`, `postcode`, `addtime`, `update_time`
        $shopping_addr_rs=$Db->Fetch($Db->ThisQuery("SELECT * FROM `".$db_prefix."shopping_addr` WHERE `id`=$addr_id AND `member_id`=$mid"));
        if(!$shopping_addr_rs){
            $return_data['return_data']='请选择收货地址';
            exit(json_encode($return_data));
        }
        if(!$products||!$nums){
            $return_data['return_data']='购买商品参数有误';
            exit(json_encode($return_data));
        }
        //判断是产品与产品购买数量否一致
        if(strlen($products)!=strlen($nums)){
            $return_data['return_data']='数据异常0，请稍后再试';
            exit(json_encode($return_data));
        }
        $products_arr=explode(',', $products);
        $nums_arr=explode(',', $nums);
        $products_unique_arr=array_unique($products_arr);
        $products_len = count($products_arr);
        $products_unique_len = count($products_unique_arr);
        //判断是否存在重复提交商品
        if($products_len!=$products_unique_len){
            $return_data['return_data']='数据异常1，请稍后再试';
            exit(json_encode($return_data));
        }
        $ticket_money=0;
        $real_amount=0;
        $amount=0;
        if($ticket_id){
            //$Db->Fetch($Db->ThisQuery("SELECT FROM  WHRE "));
        }
        
        $send_time_len = strlen($time);
        if($send_time_len==11){
            if(!preg_match('/^\d{2}:\d{2}-\d{2}:\d{2}$/', $time)){
                $return_data['return_data']='送货时间格式不正确';
                exit(json_encode($return_data));
            }
        }else{
            $time=date('H:i');
        }
        
        $product_rs=$Db->FetchAll("SELECT `id`,`name`,`price`,`bargain_price`,`is_discount`,`img` FROM `".$db_prefix."product` WHERE `id` IN($products) ");
        
        $real_product_len=count($product_rs);
        if($real_product_len!=$products_len){
            $return_data['return_data']='数据异常2，请稍后再试';
            exit(json_encode($return_data));
        }
        $curr_time = $_SERVER['REQUEST_TIME'];
        
        foreach ($product_rs as $key=>$val){
            if($product_rs[$key]['is_discount']==1){
                $product_rs[$key]['real_price']=$product_rs[$key]['bargain_price']*$nums_arr[$key];
            }else{
                $product_rs[$key]['real_price']=$product_rs[$key]['price']*$nums_arr[$key];
            }
            
            $amount+=$product_rs[$key]['real_price']*$nums_arr[$key];
        }
        $real_amount=$amount-$ticket_money;
        
        $order_insert=array(
            'member_id'=>$mid,
            'amount'=>$amount,
            'ticket_id'=>$ticket_id,
            'ticket_money'=>$ticket_money,
            'real_amount'=>$real_amount,
            'delivery_time'=>$time,
            'remark'=>$remark,
            'addtime'=>$curr_time,
            'state'=>'待付款'
        );
        //生成订单
        $flag1=$Db->insert($db_prefix.'order', $order_insert);
        if(!$flag1){
            $return_data['return_data']='提交异常1，请稍后再试';
            exit(json_encode($return_data));
        }
        $order_id=$Db->lastId();
        $order_id_len = strlen($order_id);
        $order_no=$order_id_len<13?'No'.str_repeat(0,13-$order_id_len).$order_id:'No'.$order_id;
        $order_update=array('order_no'=>$order_no);
        $where = "`id`=$order_id";
        $flag2=$Db->update($db_prefix.'order', $order_update, $where);
        if(!$flag2){
            $Db->ThisQuery("DELETE FROM `".$db_prefix."order` WHERE $where");
            $return_data['return_data']='提交异常2，请稍后再试';
            exit(json_encode($return_data));
        }
        //生成购物记录
        $insert_sql = "INSERT INTO `".$db_prefix."order_info` (`order_id`,`product_id`,`name`,`price`,`nums`,`img`,`addtime`) VALUES ";
        foreach ($product_rs as $key=>$val){
            $insert_sql.='(\'';
            $insert_sql.=$order_id.'\',\'';
            $insert_sql.=$product_rs[$key]['id'].'\',\'';
            $insert_sql.=$product_rs[$key]['name'].'\',\'';
            $insert_sql.=$product_rs[$key]['price'].'\',\'';
            $insert_sql.=$nums_arr[$key].'\',\'';
            $insert_sql.=$product_rs[$key]['img'].'\',\'';
            $insert_sql.=$curr_time.'\'';
            $insert_sql.='),';
        }
        $insert_sql=rtrim($insert_sql,',');
        
        //`id`, `member_id`, `order_id`, `name`, `phone`, `province`, `city`, `county`, `addr`, `addtime`
        $addr_insert=array(
            'member_id'=>$mid,
            'order_id'=>$order_id,
            'name'=>$shopping_addr_rs['name'],
            'phone'=>$shopping_addr_rs['phone'],
            'province'=>$shopping_addr_rs['province'],
            'city'=>$shopping_addr_rs['city'],
            'county'=>$shopping_addr_rs['county'],
            'addr'=>$shopping_addr_rs['addr'],
            'addtime'=>$curr_time,
        );
        $Db->insert($db_prefix.'order_addr', $addr_insert);
        $flag3=$Db->ThisQuery($insert_sql);
        if($flag3){
            $return_data['return_data']=$order_id;
        }else{
            $Db->ThisQuery("DELETE FROM `".$db_prefix."order` WHERE $where");
            $return_data['return_data']='提交异常3，请稍后再试';
            exit(json_encode($return_data));
        }
    break;
    //订单列表
    case 'list':
        $sql = "SELECT `id`,`order_no`,`real_amount`,`is_pay`,`addtime`,`state` FROM `".$db_prefix."order` WHERE `member_id`=$mid";
        $rows = $Db->RowsAll($sql);
        $return = array();
        if($rows){
            $page = isset($_REQUEST['page'])?intval($_REQUEST['page']):1;//分类id
            $per = 10;
            if(!$page) {$page = 1;}
            $sql .= " ORDER BY `id` DESC ";
            $sql .= " LIMIT ".$per*($page-1).",$per";
            $res=$Db->FetchAll($sql);
            if($res){
                $totalPage = ceil($rows/$per);
                $return['page']=array(
                    'record_total'=>(string)$rows,
                    'page_total'=>(string)$totalPage,
                    'page_no'=>(string)$page,
                    'per_num'=>(string)$per
                );
                $list_data = array();
                foreach ($res as $key => $val){
                    $list_data[$key]['id'] = $res[$key]['id'];
                    $list_data[$key]['order_no'] = $res[$key]['order_no'];
                    $list_data[$key]['amount'] = $res[$key]['real_amount'];
                    $list_data[$key]['is_pay'] = $res[$key]['is_pay'];
                    $list_data[$key]['state'] = $res[$key]['state'];
                    $tmp_arr=$Db->FetchAll("SELECT `product_id`,`img` FROM `".$db_prefix."order_info` WHERE `order_id`='".$res[$key]['id']."' LIMIT 4");
                    if($tmp_arr){
                        foreach ($tmp_arr as $k => $v){
                            $list_data[$key]['products'][$k]['id']=$v['product_id'];
                            $list_data[$key]['products'][$k]['img']=$v['img']?API_URL.$v['img']:'';
                        }
                    }else{
                        $list_data[$key]['products'][$k]['id']='0';
                        $list_data[$key]['products'][$k]['img']='';
                    }
                    $list_data[$key]['order_time'] = date('Y-m-d H:i:s',$res[$key]['addtime']);
                }
                $return['list']=$list_data;
                $return_data['return_data']=$return;
            }else{
                $return_data['return_data']='暂无数据';
                exit(json_encode($return_data));
            }
        }else{
            $return_data['return_data']='暂无数据';
            exit(json_encode($return_data));
        }
    break;
    //订单详情
    case 'detail':
        $id=isset($_POST['id'])?trim($_POST['id']):0;
        if(!$id){
            $return_data['return_data']='参数错误';
            exit(json_encode($return_data));
        }
        $res=$Db->Fetch($Db->ThisQuery("SELECT `id`,`order_no`,`real_amount`,`amount`,`freight`,`ticket_money`,`remark`,`state`,`delivery_time`,`addtime` FROM `".$db_prefix."order` WHERE `member_id`=$mid AND `id`=$id"));
        if(!$res){
            $return_data['return_data']='该订单不存在或已被删除';
            exit(json_encode($return_data));
        }
        
        $addr=$Db->Fetch($Db->ThisQuery("SELECT `id`,`member_id`,`name`,`phone`,`province`,`city`,`county`,`addr` FROM `".$db_prefix."order_addr` WHERE `order_id`=".$res['id']));
        $products=$Db->FetchAll("SELECT `product_id`,`name`,`price`,`nums`,`img` FROM `".$db_prefix."order_info` WHERE `order_id`=".$res['id']);
        
        $return['name']=$addr['name']?$addr['name']:'';
        $return['phone']=$addr['phone']?$addr['phone']:'';
        $return['address']=$addr['province'].$addr['city'].$addr['county'].$addr['addr'];
        
        $return['order_id']=$res['id'];
        $return['order_no']=$res['order_no'];
        $return['order_state']=$res['state'];
        $return['order_time']=date('Y-m-d H:i:s',$res['addtime']);
        $return['delivery_time']=$res['delivery_time'];
        $return['remark']=$res['remark'];
        $return['amount']=$res['amount'];
        $return['freight']=$res['freight'];
        $return['ticket_money']=$res['ticket_money'];
        $return['real_amount']=$res['real_amount'];
        
        foreach ($products as $key=>$val){
            $return['products'][$key]['id']=$products[$key]['product_id'];
            $return['products'][$key]['name']=$products[$key]['name'];
            $return['products'][$key]['price']=$products[$key]['price'];
            $return['products'][$key]['nums']=$products[$key]['nums'];
            $return['products'][$key]['img']=$products[$key]['img']?API_URL.$products[$key]['img']:'';
        }
        $return_data['return_data']=$return;
    break;
    //取消订单
    case 'cancel':
        $id = isset($_POST['id'])?intval($_POST['id']):0;
        if(!$id){
            $return_data['return_data']='参数错误';
            exit(json_encode($return_data));
        }
        $order_rs=$Db->Fetch($Db->ThisQuery("SELECT `state` FROM `".$db_prefix."order` WHERE `id`=$id"));
        if(!$order_rs){
            $return_data['return_data']='订单不存在或已被删除';
            exit(json_encode($return_data));
        }
        if($order_rs['state']!='待付款'){
            $return_data['return_data']=$order_rs['state'].'的订单无法取消';
            exit(json_encode($return_data));
        }
        $update_arr = array('state'=>'已取消');
        $where = "`id`=$id";
        $flag=$Db->update($db_prefix.'order', $update_arr, $where);
        if($flag){
            $return_data['return_data']='取消成功';
        }else{
            $return_data['return_data']='取消失败';
            exit(json_encode($return_data));
        }
    break;
    //删除订单
    case 'del':
        $id = isset($_POST['id'])?intval($_POST['id']):0;
        if(!$id){
            $return_data['return_data']='参数错误';
            exit(json_encode($return_data));
        }
        $order_rs=$Db->Fetch($Db->ThisQuery("SELECT `state` FROM `".$db_prefix."order` WHERE `id`=$id"));
        if(!$order_rs){
            $return_data['return_data']='订单不存在或已被删除';
            exit(json_encode($return_data));
        }
        if($order_rs['state']!='已取消'&&$order_rs['state']!='交易完成'){
            $return_data['return_data']=$order_rs['state'].'的订单无法删除';
            exit(json_encode($return_data));
        }
        $update_arr = array('state'=>'已取消');
        $where = "`id`=$id";
        $flag=$Db->ThisQuery("DELETE FROM `".$db_prefix."order` WHERE id=$id");
        if($flag){
            $return_data['return_data']='删除成功';
        }else{
            $return_data['return_data']='删除失败';
            exit(json_encode($return_data));
        }
    break;
    //确认收货
    case 'confirm':
        $id = isset($_POST['id'])?intval($_POST['id']):0;
        if(!$id){
            $return_data['return_data']='参数错误';
            exit(json_encode($return_data));
        }
        $order_rs=$Db->Fetch($Db->ThisQuery("SELECT `state` FROM `".$db_prefix."order` WHERE `id`=$id"));
        if(!$order_rs){
            $return_data['return_data']='订单不存在或已被删除';
            exit(json_encode($return_data));
        }
        if($order_rs['state']!='已发货'){
            $return_data['return_data']='参错异常';
            exit(json_encode($return_data));
        }
        $update_arr = array('state'=>'交易完成');
        $where = "`id`=$id";
        $flag=$Db->update($db_prefix.'order', $update_arr, $where);
        if($flag){
            $return_data['return_data']='操作成功';
        }else{
            $return_data['return_data']='操作失败';
            exit(json_encode($return_data));
        }
    break;
    default:
        $return_data['return_data']='参数有误 -1';
        exit(json_encode($return_data));
    break;
}

$return_data['state']='1';
exit(json_encode($return_data));
?>