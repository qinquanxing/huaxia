<?php
class member{
	private $data_handler;
	private $db_prefix;

	/**
	  * @param object $data_handler
	  */
	public function __construct($data_handler){
		global $db_prefix;
		$this->data_handler=$data_handler;
		$this->db_prefix=$db_prefix;
	}

	/**
	  * @desc 是否存在账号
	  * @param string $phone
	  * @return boolean
	  */
	public function isHas($phone){
		if($this->data_handler->Fetch($this->data_handler->thisQuery("SELECT 1 FROM `".$this->db_prefix."member` WHERE account={$phone}"))){			
			return true;
		}else{
			return false;
		}
	}

	/**
	  *@desc 创建用户
	  *@param array $insert_arr
	  *@return boolean
	  */
	public function create($insert_arr){		
		if(!is_array($insert_arr)){
			return false;
		}
		if(empty($insert_arr)){
			return false;
		}
		if(!$insert_arr['account']&&!$insert_arr['pwd']){
			return false;
		}
		$salt=mt_rand(100000,999999);
		$insert_arr['pwd']=md5(md5($insert_arr['pwd']).$salt);
		$insert_arr['account']=$insert_arr['account'];
		$insert_arr['phone']=$insert_arr['account'];
		$insert_arr['email']=$insert_arr['account'];
		$insert_arr['reg_type']=$insert_arr['reg_type'];		
		$insert_arr['salt']=$salt;
		$insert_arr['addtime']=time();
		if($this->data_handler->insert($this->db_prefix.'member',$insert_arr)){
			return true;
		}else{			
			return false;
		}
	}

	/**
	  * @desc 更新会员信息
	  * @param array $update_arr
	  * @param string $where
	  */
	public function update($update_arr,$where){
		if(!is_array($update_arr)){
			return false;
		}
		if(empty($update_arr)){
			return false;
		}
		if($this->data_handler->update($this->db_prefix.'member',$update_arr,$where)){
			return true;
		}else{
			return false;
		}
	}

	/**
	  * @desc 忘记密码
	  * @param string $account
	  * @param string $pwd
	  */
	public function forget($account,$pwd,$captcha){		
		if(!$account&&!$pwd&&!$captcha){
			return false;
		}
		if(!$curr_captcha=$this->getCaptcha($account,1)){
			return false;
		}

		if($curr_captcha==$captcha){
			$salt=mt_rand(100000,999999);
			$update_arr=array('pwd'=>md5(md5($pwd).$salt),
				'salt'=>$salt,
				'session_key'=>md5(time()));
			$where="`account`=$account";
			$this->update($update_arr,"`account`=$account",$where);
			return true;
		}
		return false;
	}

	/**
	  * @desc 获取用户所有信息
	  * @param string $account
	  * @param number $type
	  * @return array
	  */
	public function getInfo($account,$type=1){
		if($type==1){
			$rt=$this->data_handler->Fetch($this->data_handler->thisQuery("SELECT `id` as `mid`,`account`,`avatar`,`nickname`,`gender`,`phone`,`session_key` FROM `".$this->db_prefix."member` WHERE `account`='$account'"),'api');
			$rt['avatar']=API_URL.$rt['avatar'];
			return $rt;
		}else{
			$rt = $this->data_handler->Fetch($this->data_handler->thisQuery("SELECT `id` as `mid`,`account`,`avatar`,`nickname`,`gender`,`phone`,`session_key` FROM `".$this->db_prefix."member` WHERE `account`='$account'"),'api');
	        		$rt['avatar']= API_URL.$rt['avatar'];
	       		 return $rt;
		}
	}

	/**
	  * @desc 获取验证码
	  * @param string $phone
	  * @return array|boolean
	  */
	public function getCaptcha($phone,$type=0){
		$res=$this->data_handler->Fetch($this->data_handler->thisQuery("SELECT `randcode`,`addtime` FROM `".$this->db_prefix."captcha` WHERE `type`=$type AND `account`='$phone' ORDER BY `id` DESC"));
		if($res&&$res['randcode']){			
			if($res['addtime']+60000>time()){
				return $res['randcode'];
			}
		}
		return false;
	}

	/**
	  * @desc 验证登陆
	  * @param string $account
	  * @param string $pwd
	  * @return boolean
	  */
	public function checkLogin($account,$pwd){
		if(!$account||!$pwd){
			return false;
		}

		 $res=$this->data_handler->Fetch($this->data_handler->thisQuery("SELECT `id`,`pwd`,`salt` FROM `".$this->db_prefix."member` WHERE account={$account}"),'api');
		    if($res['pwd']!=md5(md5($pwd).$res['salt'])){
		        return false;
		    }

		    $where="`id`=".$res['id'];
		    $lasttime=time();
		    $update_arr=array('lasttime'=>$lasttime,'session_key'=>md5($lasttime));
		    $this->data_handler->update($this->db_prefix.'member',$update_arr,$where);		    
		    return  true;

	}

	/**
	  *  @desc
	  *  @查询所有省
	  */
	public function selectProvince(){
		$data=$this->data_handler->FetchAll("SELECT `name`,`code` FROM `".$this->db_prefix."province`");
		return $data;
	}

	/**
	  *  @desc
	  *  @将数据拼接到数据库
	  */
	public function splitdata($linkage){
		$linkage=implode(",",$linkage);		
		return $linkage;
	}

	/**
	  *  @desc 省
	  *  @code
	  */
	public function  selectCode($code){
		if($code){
			$data=$this->data_handler->Fetch($this->data_handler->thisQuery("SELECT `name`,`code` FROM `".$this->db_prefix."province` WHERE `code`={$code}"),'api');
			return  $data['name'];
		}
		
	}

	/**
	  *  @desc 省、市
	  *  @provincecode
	  */
	public function  selectProvinceCode($provincecode){
		if($provincecode){
			$data=$this->data_handler->Fetch($this->data_handler->thisQuery("SELECT `name`,`code` FROM `".$this->db_prefix."city` WHERE `provincecode`={$provincecode}"),'api');
			return  $data['name'];
		}
		
	}

	/**
	  *  @desc 省、市、县三级联动
	  *  @citycode
	  */
	public function  selectCitycode($citycode){
		if($citycode){
			$data=$this->data_handler->Fetch($this->data_handler->thisQuery("SELECT `name`,`code` FROM `".$this->db_prefix."area` WHERE `citycode`={$citycode}"),'api');
			return  $data['name'];
		}
		
	}

	/**
	  *  @desc 查询所有爱好
	  *  @hobby
	  */
	public function selectHobby(){
		$data=$this->data_handler->FetchAll("SELECT * FROM `".$this->db_prefix."hobby`");
		return $data;
	}

	/**
	  *  @desc 查询所有
	  */

}