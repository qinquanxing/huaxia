<?php
/******批量创建目录函数******/
function mkdirs($dir){
	if(!is_dir($dir)){
		if(!mkdirs(dirname($dir))){
			return false;
		}
		if(!mkdir($dir,0777)){
			return false;
		}
	}
	return true;
}
/******批量删除目录函数******/
function rmdirs($dir){
	$d=dir($dir);
	while(false!==($child=$d->read())){
		if($child!='.' && $child!='..'){
			if(is_dir($dir.'/'.$child)){
				rmdirs($dir.'/'.$child);
			}else{
				unlink($dir.'/'.$child);
			}
		}
		$d->close();
		rmdir($dir);
	}
}