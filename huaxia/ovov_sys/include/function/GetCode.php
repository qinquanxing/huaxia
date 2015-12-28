<?php
class verify
{
	var $img=false,$style=0,$num=4,$width=60,$height=20,$dilimter=" ",$str='';
	var $numArray = array('0','1','2','3','4','5','6','7','8','9');
	var $textArray = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
	function verify($num=4,$style=0,$str='',$width=50,$height=20)
	{
		$this->width = $width ? $width : $this->width;
		$this->height = $height ? $height : $this->height;
		$this->img = $this->create($this->width,$this->height);
		$this->style = $style ? $style : $this->style;
		$this->num = $num ? $num : $this->num;
		$this->str = $str ? $str : $this->setStr($this->style,$this->num);
		$this->img = $this->text($this->img,$this->str);
	}
	/**
	* create a image
	* 创建一个图片
	*/
	function create ($x=60,$y=20){
		$img = imagecreate($x,$y);
		$bgcolor = imagecolorallocate($img,246,249,252);
		return $img;
	}
	
	/**
	* set the string
	* 设置文字
	*/
	function setStr ($style=0,$num=4){
		if($this->str)
		{
			session_start();
			return $this->str;
		}
		if($style === 0)
		{
			$strArray = array_rand($this->numArray,$num);
		}
		elseif($style === 1)
		{
			$strArray = array_rand($this->textArray,$num);
		}
		else
		{
			$tempStr = str_replace(" ","",implode(",",$this->numArray).",".implode(",",$this->textArray));
			$tempArray = explode(",",$tempStr);
			$strArray = array_rand($tempArray,$num);
		}
		foreach($strArray as $k => $v)
		{
			$strValue[] = $tempArray[$v]; 
		}
		$str = implode($this->dilimter,$strValue);
		$this->str = $str;
		return $str;
	}
	
	/**
	* write the text
	* 写入文字
	*/
	function text($img,$str,$color=false)
	{
		$color = $color ? $color : imagecolorallocate($img,211,0,95);
		imagestring($img,4,7,3,strtoupper($str),$color);
		return $img;
	}
	
	/**
	* display the image
	* 显示图片
	*/
	function display()
	{
		session_start();
		$_SESSION['verify'] = str_replace($this->dilimter,"",$this->str);
		imagegif($this->img);
	}
}
$verify = new verify(5,2,false,85,20);
$verify->display();
?>
