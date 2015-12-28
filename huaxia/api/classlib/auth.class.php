<?php
/**
  * @ desc    用于验证输入的格式是否正确
  */
class auth{
	//验证手机正则
	public static $mobileReg='/^(13|14|15|17|18)[\d]{9}$/';
	//手机验证
	public static function mobile($mobile){
		return preg_match(self::$mobileReg,$mobile);
	}

	//验证邮箱正则
	public static $mailReg='/^[a-z0-9]+([._\\-]*[a-z0-9])*@([a-z0-9]+[-a-z0-0]*[a-z0-9]+.){1,63}[a-z0-9]{2,4}$/';
	//邮箱验证
	public static function mail($email){
		return preg_match(self::$mailReg,$email);
	}
}