<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty truncate modifier plugin
 *
 * Type:     modifier<br>
 * Name:     truncate<br>
 * Purpose:  Truncate a string to a certain length if necessary,
 *           optionally splitting in the middle of a word, and
 *           appending the $etc string or inserting $etc into the middle.
 * @link http://smarty.php.net/manual/en/language.modifier.truncate.php
 *          truncate (Smarty online manual)
 * @author   Monte Ohrt <monte at ohrt dot com>
 * @param string
 * @param integer
 * @param string
 * @param boolean
 * @param boolean
 * @return string
 */
 
/***************************************************************************
* cut_string.php
* ------------------------------
* Date : Jul 16, 2005
* Copyright : none
* Mail : 
*
* 作用:出数据库ubb处理（即把ubb代码替换成html代码）
*
*writer: knight
***************************************************************************/

function smarty_modifier_ubb($String,$bColor="#F8F8F8")
{
	//die("ddd");
	$String = str_replace("│","|",$String);
	//$String = str_replace("&amp;nbsp;","",$String);
	$String = preg_replace("/\[b\](.+?)\[\/b\]/is","<b>\\1</b>",$String);
	$String = preg_replace("/\[i\](.+?)\[\/i\]/is","<i>\\1</i>",$String);
	$String = preg_replace("/\[u\](.+?)\[\/u\]/is","<u>\\1</u>",$String);
	$String = preg_replace("/\[center\](.+?)\[\/center\]/is","<center>\\1</center>",$String);
	$String = preg_replace("/\[url\](http:\/\/.+?)\[\/url\]/is","<a href=\\1 target=blank>\\1</a>",$String);
	$String = preg_replace("/\[email\](.+?)\[\/email\]/is","<a href=mailto:\\1>\\1</a>",$String);
	$String = preg_replace("/\[img\](.+?)\[\/img\]/is","<a href=\\1 target=blank><img src=\\1 border=0 title=点击放大观看></a>",$String);
	$String = preg_replace("/\[code\](.+?)\[\/code\]/is","<table cellspacing='0' cellpadding='0' border='0' width='100%' bgcolor='{$bColor}' align='center'><tr><td><table border='0' cellspacing='1' cellpadding='4' width='100%'><tr><td class='tbnei' align='left'><font color='#666666'>Code:</font><br>\\1</td></tr></table></td></tr></table>",$String);
	$String = preg_replace("/\[color=(.+?)\](.+?)\[\/color\]/is","<font color=\\1>\\2</font>",$String);
	return $String;
}
/*
function smarty_modifier_truncate($string, $length = 80, $etc = '...',
                                  $break_words = false, $middle = false)
{
    if ($length == 0)
        return '';

    if (strlen($string) > $length) {
        $length -= strlen($etc);
        if (!$break_words && !$middle) {
            $string = preg_replace('/\s+?(\S+)?$/', '', substr($string, 0, $length+1));
        }
        if(!$middle) {
            return substr($string, 0, $length).$etc;
        } else {
            return substr($string, 0, $length/2) . $etc . substr($string, -$length/2);
        }
    } else {
        return $string;
    }
}
*/
/* vim: set expandtab: */

?>
