<?php
/**
 * 广告类
 *
 */

class Ad{

	/**
	 * 文字广告
	 */
	const AD_CLASS_TEXT = 1;
	
	/**
	 * 图片广告
	 */
	const AD_CLASS_IMAGE = 2;
	
	/**
	 * 代码广告
	 */
	const AD_CLASS_CODE = 3;
	
	/**
	 * 广告类别
	 */
	private $_adClass = array(
						//self::AD_CLASS_TEXT  =>    '文字',
						self::AD_CLASS_IMAGE =>    '图片',
						self::AD_CLASS_CODE  =>    '代码'
					);
					
	/**
	 * 待审核
	 */
	const AD_ORDER_STATE_NOPASS = 0;
	
	/**
	 * 审核通过
	 */
	const AD_ORDER_STATE_PASSED = 1;
	
	/**
	 * 获取私有变量
	 */				
	public function __get($name){
		return $this->$name;
	}
					
	/**
	 * 添加广告位
	 */				
	public function addAd($form,$user){
		global $Db,$db_prefix;
		$data = array(
					'name'    =>  str::moveHtml($form['name']),
					'width'   =>  ceil($form['width']),
					'height'  =>  ceil($form['height']),
					'price'   =>  $form['price'],
					'add_user_id' =>  $user,
					'add_time' =>  str::getNowTime(),
					'add_ip' =>  str::GetIp()
					);
		if($adid = $Db->insert( $db_prefix."adv",$data)){
			return $adid;
		} else {
			return false;
		}
	}

	/**
	 * 编辑广告位
	 */
	public function editAd($adid,$form){
		global $Db,$db_prefix;
		$where = $Db->quoteInto("adv_id=?",$adid);
		$data = array(
					'name'    =>  str::moveHtml($form['name']),
					'width'   =>  ceil($form['width']),
					'height'  =>  ceil($form['height']),
					'price'   =>  $form['price'],
					);
		if( $Db->update($db_prefix."adv",$data,$where) ){
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * 删除广告位
	 */
	public function delAd($adid){
		global $Db,$db_prefix;
		$where = $Db->quoteInto("adv_id=?",$adid);
		if( $Db->delete($db_prefix."adv",$where) ){
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * 获取所有的广告位名称
	 */
	public function getAdList(){
		global $Db,$db_prefix;
		$sql = "select adv_id,name,width,height,price from `".$db_prefix."adv` where `is_del` = 0 order by adv_id desc";
		$rows = $Db->fetchAll($sql);
		return $rows;
	}
	
	/**
	 * 获取某个广告位的信息
	 */
	public function getAdInfo($adid,$cacheTime=0){
		global $Db,$db_prefix;
		$where = $Db->quoteInto("adv_id=?",$adid);
		$sql = "select adv_id,width,height,name,price,add_user_id,add_time from `".$db_prefix."adv` where `is_del` = 0 and $where";
		$row = $Db->fetchRows($sql,$cacheTime);
		return $row;
	}
	
	/**
	 * 获取广告下订单数
	 */
	public function getAdOrderNum(){
		global $Db,$db_prefix;
		$sql = "select adv_id,count(order_id) as num from `".$db_prefix."adv_order`  where `is_del` = 0 group by adv_id";
		$rows = $Db->fetchAlls($sql);
		if(!empty($rows)){
			foreach ($rows as $row){
				$newrows[$row['adv_id']] = $row['num'];
			}
		}
		return $newrows;
	}
	
	/**
	 * 添加广告订单
	 */
	public function addOrder($form,$user){
		global $Db,$db_prefix;
		$data = array(
				'adv_id'      =>    ceil($form['adv_id']),
				'title'     =>    str::moveHtml($form['title']),
				'class'     =>    ceil($form['class']),
				'text'      =>    str::moveHtml($form['text']),
				'img'       =>    str::moveHtml($form['img']),
				'url'       =>    str::moveHtml($form['url']),
				'code'      =>    trim($form['code']),
				'price'     =>    round($form['price'],2),
				'state'     =>    $form['state'],
				'start_date' =>    $form['start_date'],
				'stop_date'  =>    $form['stop_date'],
				'add_user_id'   =>    $user,
				'add_time'   =>    str::getNowTime(),
				'add_ip'   =>    str::GetIp()
				);
		if( $orderid = $Db->insert($db_prefix."adv_order",$data) ){
			return $orderid;
		} else {
			return false;
		}
	}
	
	/**
	 * 编辑广告订单
	 */
	public function editOrder($orderid,$form){
		global $Db,$db_prefix;
		$where = $Db->quoteInto("order_id = ?",$orderid);
		$data = array(
				'adv_id'      =>    ceil($form['adv_id']),
				'title'     =>    str::moveHtml($form['title']),
				'class'     =>    ceil($form['class']),
				'text'      =>    str::moveHtml($form['text']),
				'img'       =>    str::moveHtml($form['img']),
				'url'       =>    str::moveHtml($form['url']),
				'code'      =>    trim($form['code']),
				'price'     =>    $form['price'],
				'state'     =>    $form['state'],
				'start_date' =>    $form['start_date'],
				'stop_date'  =>    $form['stop_date'],
				'add_time'   =>    str::getNowTime()
				);
		if( $Db->update($db_prefix."adv_order",$data,$where) ){
			return true;
		} else {
			return false;
		}		
	}
	
	/**
	 * 删除广告订单
	 */
	public function delOrder($orderid){
		global $Db,$db_prefix;
		$where = $Db->quoteInto("order_id = ?",$orderid);
		if( $Db->delete($db_prefix."adv_order",$where) ){
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * 获取某个广告订单的详情，含订单位
	 */
	public function getOrderInfo($orderid,$cacheTime=0){
		global $Db,$db_prefix;
		if(empty($orderid))return array();
		$sql = "select dao.order_id,dao.adv_id,dao.title,dao.class,dao.url,dao.text,dao.img,dao.code,dao.price,dao.show_times,dao.hits,dao.state,dao.start_date,dao.stop_date,dao.add_user_id,da.name,da.width,da.height,da.price from `".$db_prefix."adv_order` as dao left join `".$db_prefix."adv` as da on(dao.adv_id=da.adv_id) where dao.is_del = 0 and dao.order_id=$orderid";
		$row = $Db->fetchRows($sql,$cacheTime);
		return $row;
	}

	/**
	 * 获取某个广告订单的详情
	 */
	public function getOrderDetail($orderid,$cacheTime=0){
		global $Db,$db_prefix;
		if(empty($orderid))return array();
		$sql = "select order_id,adv_id,title,class,url,text,img,code,price,show_times,hits,state,start_date,stop_date,add_user_id from `".$db_prefix."adv_order` where is_del = 0 and order_id=$orderid";
		$row = $Db->fetchRows($sql,$cacheTime=0);
		return $row;
	}

	/**
	 * 获取某个广告订单的详情/到首页
	 */
	public function getOrderDetailToIndex($orderid,$cacheTime=3600){
		global $Db,$db_prefix;
		if(empty($orderid))return array();
		$sql = "select dao.order_id,dao.adv_id,dao.title,dao.class,dao.url,dao.text,dao.img,dao.code,dao.price,dao.show_times,dao.hits,dao.state,dao.start_date,dao.stop_date,dao.add_user_id,da.name,da.width,da.height,da.price from `".$db_prefix."adv_order` as dao left join `".$db_prefix."adv` as da on(dao.adv_id=da.adv_id) where  dao.is_del = 0 and dao.order_id=$orderid";
		$row = $Db->fetchRows($sql,$cacheTime);
		return $row;
	}	
	
	/**
	 * 获取广告位下的广告订单
	 */
	public function getAdOrder( $adid ,$cacheTime=0){
		global $Db,$db_prefix;
		$sql = "select order_id,adv_id,title,class,url,text,img,code,price,show_times,hits,state,start_date,stop_date from `".$db_prefix."adv_order` where is_del = 0 and adv_id=$advid";
		$rows = $Db->fetchAlls($sql,$cacheTime);
		return $rows;
	}

	/**
	 * 输出广告
	 */
	public function outputAd($adid,$cacheTime=3600){
		global $Db,$db_prefix;
		$sql = "select order_id from `".$db_prefix."adv_order` where ".str::getNowTime()." >= start_date  and stop_date>=".str::getNowTime()." and state=".self::AD_ORDER_STATE_PASSED." and `is_del` = 0  and `adv_id`=".$adid."";
		$rows = $Db->fetchAlls($sql);
		$num = count($rows);
		if($num == 0){
			$adInfo = $this->getAdInfo($adid,$cacheTime);
			$ad = '<a href="" target="_blank">';
			$ad .= '<img src="'.$web_url.'ad'.$adInfo['width'].'_'.$adInfo['height'].'.gif" width='.$adInfo['width'].' height='.$adInfo['height'].' border="0">';
			$ad .= '</a>';
		}
		if($num == 1){
			$ad = $this->createOutput($rows[0]['order_id'],$cacheTime);
		}
		elseif($num>1){
			$newkey = array_rand($rows);
			$ad = $this->createOutput($rows[$newkey]['order_id'],$cacheTime);
		}
		return $ad;
	}	
	
	/**
	 * 获取某广告位的多少数量订单
	 */
	public function outputAllAd($adid,$limit=3,$cacheTime=3600){
		global $Db,$db_prefix;
		$sql = "select order_id from `".$db_prefix."adv_order` where start_date<=".str::getNowTime()." and stop_date>=".str::getNowTime()." and state=".self::AD_ORDER_STATE_PASSED." and adv_id=$adid order by last_click_time desc limit $limit";
		$rows = $Db->fetchAlls($sql,$cacheTime);
		$ad = array();
		foreach ($rows as $key=>$row){
			$ad[$key] = $this->createOutput($row['order_id'],$cacheTime);
		}
		return $ad;
	}
	
	/**
	 * 获取某个广告位的多少条广告订单到数组
	 * @param $adid 广告位
	 * @param $limit 多少个
	 * @param $hash 是否随机获取
	 */
	public function outputAdToArray($adid,$limit=1,$hash=false,$cacheTime=3600){
		global $Db,$db_prefix;
		$order = $hash?'last_click_time desc':'rand()';
		$sql = "select order_id,title,url,text,img,code,class from `".$db_prefix."adv_order` where start_date<=".str::getNowTime()." and stop_date>=".str::getNowTime()." and state=".self::AD_ORDER_STATE_PASSED." and adv_id=$adid order by $order limit $limit";
		$rows = $Db->fetchAlls($sql,$cacheTime);
		if(!empty($rows)){
			$orderids = array();
			foreach ($rows as $row){
				$orderids[] = $row['order_id'];
			}			
			$orderids = implode(',',$orderids);
			
			$sql = "update `".$db_prefix."adv_order` set show_times=show_times+1 where order_id in($orderids)";
			$Db->querys($sql);
		}
		return $rows;
	}
	
	/**
	 * 输出广告订单
	 */
	private function createOutput($orderid,$cacheTime=0){
		global $Db,$db_prefix;
		$orderDetail = $this->getOrderDetailToIndex($orderid,$cacheTime);
//		print_r($orderDetail);
		switch ($orderDetail['class']){
			case self::AD_CLASS_TEXT:
				//$ad = '<span style="width:'.$orderDetail['width'].'px;height:'.$orderDetail['height'].'px">';
				$ad = '<a href="'.SITEHOST.'goto.php?id='.$orderDetail['order_id'].'" target="_blank">'.$orderDetail['text'].'</a>';
				//$ad .= '</span>';
				break;
			case self::AD_CLASS_IMAGE:
				//$ad = '<div id="ad_'.$orderDetail['order_id'].'">';
				$ad = '<a href="'.SITEHOST.'goto.php?id='.$orderDetail['order_id'].'" target="_blank">';
				$ad .= '<img src="'.SITEHOST.$orderDetail['img'].'" width='.$orderDetail['width'].' height='.$orderDetail['height'].' border="0">';
				$ad .= '</a>';
				//$ad .= '</div>';
				break;
			case self::AD_CLASS_CODE:
				//$ad = '<div id="ad_'.$orderDetail['order_id'].'" style="width:'.$orderDetail['width'].'px;height:'.$orderDetail['height'].'px">';
				$ad = $orderDetail['code'];
				//$ad .= '</div>';
				break;
			default:
				$ad = '<a href="" target="_blank">';
				$ad .= '<img src="'.$web_url.'upload/ad'.$orderDetail['width'].'_'.$orderDetail['height'].'.gif" width='.$orderDetail['width'].' height='.$orderDetail['height'].' border="0">';
				$ad .= '</a>';
				break;
		}
		$this->broAdd($orderid);
		return $ad;
	}
	
	/**
	 * 浏览量++
	 */
	private function broAdd($orderid){
		global $Db,$db_prefix;
		$where = $Db->quoteInto("order_id = ?",$orderid);
		$sql = "update `".$db_prefix."adv_order` set show_times=show_times+1 where $where";
		$Db->querys($sql);
	}
	
	/**
	 * 点击量++
	 */
	public function clickAdd($orderid){
		global $Db,$db_prefix;
		$where = $Db->quoteInto("order_id = ?",$orderid);
		$sql = "update `".$db_prefix."adv_order` set hits=hits+1,last_click_time=".time()." where $where";
		$Db->querys($sql);
	}
	
	/**
	 * 获取企业链接
	 */
	public function getCompanyList($adid,$limit=10,$cacheTime=43200){
		global $Db,$db_prefix;
		$sql = "select order_id,title,img from `".$db_prefix."adv_order` where adv_id=$adid and state=".self::AD_ORDER_STATE_PASSED." order by order_id limit $limit";
		$rows = $Db->fetchAlls($sql,$cacheTime);
		return $rows;
	}	
	
	
}

?>