<?php
//namespace //

class Code{
    private $sms_account='xd000258';
    private $sms_pwd="bjdulei52890311";
    private $max_num=10;
    
    /**
     * @desc 设置短信服务账号
     * @param string $sms_account
     */
    public function setSmsAccount($sms_account){
        $this->sms_account=$sms_account;
    }
    
    /**
     * @desc 设置短信服务密码
     * @param string $sms_pwd
     */
    public function setSmsPwd($sms_pwd){
        $this->sms_pwd=$sms_pwd;
    }
    
    /**
     * @desc 设置短新每日最多发送数量
     * @param int $max_num
     */
    public function setMaxNum($max_num){
        $this->max_num=$max_num;
    }
    
   /**
    * @desc 发送注册验证码
    * @param string $phone
    */
    public function sendRegSm($phone){
        
    }
    
    /**
     * @desc 发送找回密码验证码
     * @param unknown $phone
     */
    public function sendForgetSm($phone){
        
    }
    
    /**
     * 发送验证码
     *
     */
    public function send_code($phone,$content)
    {
        $content=urlencode($content);
        $sendurl="http://dx.ipyy.net/sms.aspx?action=send&userid=&account=".$this->sms_account."&password=".$this->sms_pwd."&mobile=".$phone."&content=".$content."&sendTime=&extno=";
        
        if (function_exists('curl_init')) {
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $sendurl);
            curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; U; Linux i686; zh-CN; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
            curl_setopt($curl, CURLOPT_HEADER, 0);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $tmpInfo = simplexml_load_string(curl_exec($curl));
            curl_close($curl);
            if($tmpInfo->returnstatus=="Success"){
                return 1;
            }else{
                return 0;
            }
        }else{
            return 0;
            //$sysLog->return_json("0","未开启curl");
        }
    }
    
    
    /**
     * 判断账号户是否存在
     *
     */
    public function accounIsExists($account){
        global $Db,$db_prefix;
        if($Db->Fetch($Db->ThisQuery("SELECT `m_id` FROM `".$db_prefix."member` WHERE `m_user`='$account'"))){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    
    /**
     * 是否可发短信
     *
     */
    public function isAllowSend($phone){
        global $Db,$db_prefix;
        $nowTimeStamp = strtotime(date('Ymd'));
        $total = $Db->RowsAll("SELECT `addtime` FROM `".$db_prefix."captcha` WHERE `phone`='$phone' AND `addtime`>'$nowTimeStamp'");
         
        if($total > $this->max_num){
            return FALSE;
        }else{
            return TRUE;
        }
    }
    
    /**
     * 验证码保存
     *
     */
    function save($phone, $randCode,$type=0){
        global $Db,$db_prefix;
        $Db->ThisQuery("INSERT INTO `".$db_prefix."captcha` (`account`, `randcode`,`type`, `addtime`) VALUES ('$phone','$randCode','$type','".time()."')");
    }
}
?>