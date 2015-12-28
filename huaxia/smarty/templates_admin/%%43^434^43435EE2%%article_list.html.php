<?php /* Smarty version 2.6.14, created on 2015-05-19 14:33:51
         compiled from article/article_list.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'smartTruncate', 'article/article_list.html', 146, false),array('modifier', 'date_format', 'article/article_list.html', 148, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "ovov_sys/ovoa_header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script language="javascript" type="text/javascript" src="common/rili/WdatePicker.js"></script>
<script language="javascript" type="text/javascript">
	function listBgOver(obj){
		obj.style.background="#E8F4FF";
	}
	function listBgOut(obj){
		obj.style.background="#FFFFFF";
	}


/****************排序***************/
	function set(mode,action,id,or_value){
	art.dialog.prompt("请输入以下数字：\n其中‘1’代表‘是’，‘0’代表‘否’", function(data){
    // data 代表输入数据;
	if(data != "" && data){
	art.dialog.confirm('确认做此操作？', function(){
		art.dialog.open("set.php?mode="+mode+"&action="+action+"&id="+id+"&value="+data,{title: '确认做此操作',width: '0px',height:'0px',time:2});
		}, function(){
		art.dialog.tips('你取消了操作');
	});
	}
    }, or_value);
	}
	/****************设置推荐、锁定、指定***************/
	function noset(mode,action,id,or_value){ 
      window.location.href="set.php?mode="+mode+"&action="+action+"&id="+id+"&value="+or_value;
	 }
	 
	function checkAll(form){
		for (var p=0;p<form.elements.length;p++){
		var m = form.elements[p];
			if (m.checked==false){
				m.checked = true;
			}
			else{
				m.checked = false;
			}
	}
}
	function delAll(action,article_root_id,guanjianzi,leibie,article_channel){
		var string = "";
		for (var i = 0 ; i<document.forms[1].elements.length-3 ; i++){
			if(document.forms[1].elements[i].checked !=""){
				if(i<(document.forms[1].elements.length - 4)){
					string = string + document.forms[1].elements[i].value+",";
				}else{
					string = string + document.forms[1].elements[i].value;
				}
			}
		}
		if(string == ""){
			art.dialog.alert('请选择文章');
		}else{
		art.dialog({
			content: '确认删除这些文章？',lock:true,
			ok: function () {
				location.href="article.php?action=article_del&article_id="+string+"&actionx="+action+"&article_root_id="+article_root_id+"&guanjianzi="+guanjianzi+"&leibie="+leibie+"&article_channel="+article_channel;
		},
		cancelVal: '关闭',
		cancel: true //为true等价于function(){}

		});
	}
	}
	
	function del(id,action,article_root_id,guanjianzi,leibie,article_channel){
			art.dialog({
			content: '确定删除此文章？',lock:true,
			ok: function () {
				location.href = 'article.php?action=article_del&article_id='+id+"&actionx="+action+"&article_root_id="+article_root_id+"&guanjianzi="+guanjianzi+"&leibie="+leibie+"&article_channel="+article_channel;
		},
		cancelVal: '关闭',
		cancel: true //为true等价于function(){}
		});
		
	}
	
	function ZhuanyiAll(action,article_root_id,guanjianzi,leibie,article_channel){
		var string = "";
		for (var i = 0 ; i<document.forms[1].elements.length-3 ; i++){
			if(document.forms[1].elements[i].checked !=""){
				if(i<(document.forms[1].elements.length - 4)){
					string = string + document.forms[1].elements[i].value+",";
				}else{
					string = string + document.forms[1].elements[i].value;
				}
			}
		}
		if(string == ""){
			art.dialog.alert('请选择文章');
		}else{
			
			art.dialog({
			content: '确认转移这些文章？',lock:true,
			ok: function () {
			art.dialog.open('article.php?action=article_zhuanyi&article_id='+string,{title: '确认转移这些文章?',width: '50%',height:'210px'});
		},
		cancelVal: '关闭',
		cancel: true //为true等价于function(){}
		});
		}
	}
function paixu(mode,action,id,or_value){
	var setvalue=prompt("请输入数字",or_value);
	if(setvalue != "" && setvalue){
		if(confirm("确认做此操作?")){
			window.location.href="set.php?mode="+mode+"&action="+action+"&id="+id+"&value="+setvalue;
		}
	}
}	
</script>
<body>
<div class="main">
  <div class="main_title"><a href="article.php?cid=9&action=article_view"><strong>文章管理</strong></a> <span></span>
    <p></p>
  </div>
  <div class="main_content">
  <!--文章管理b-->
  <div class="contents" style="display:block">
    <div>
    <form method="get" action="article.php?action=chaxun" name="zhannei">
    <input type="hidden" value="article_chaxun" name="action" />
    <input type="radio" value="1" name="leibie" <?php if ($this->_tpl_vars['leibie'] == 1): ?>checked<?php endif; ?>>&nbsp;ID &nbsp;
    <input type="radio" value="2" name="leibie" <?php if ($this->_tpl_vars['leibie'] == 2): ?>checked<?php endif; ?>>&nbsp;文章标题&nbsp;
    <input type="radio" value="3" name="leibie" <?php if ($this->_tpl_vars['leibie'] == 3): ?>checked<?php endif; ?>>&nbsp;作者&nbsp;
    <input type="text" name="guanjianzi" size="40" value="<?php echo $this->_tpl_vars['guanjianzi']; ?>
">
    <span id="article_channel_div"><?php echo $this->_tpl_vars['channel_list']; ?>
</span><span id="article_sort_div"><font color="#FF0000"><?php if ($this->_tpl_vars['xialeilist'] == ""): ?>请选择频道！<?php else:  echo $this->_tpl_vars['xialeilist'];  endif; ?></font></span>
    <input type="submit" value=" 搜 索 " name="sqlkeywrod" class="button">
    </form> </div>	
    <div><form name="channel_form"><table width="100%" border="0" cellspacing="1" cellpadding="0" style="background:#d5dde0;" class="table_font">
  	<tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);" align="center">
    <td height="32" align="center">选择</td>
    <td>ID</td>
    <td>标题</td>
    <td>所属情况/(频道-&gt;分类)</td>
	<td>时间</td>
    <td>添加人</td>
    <td>顺序</td>
    <td width="10%">状态</td>
    <td>操作&nbsp;&nbsp;&nbsp;&nbsp; <a href="article.php?action=article_add">添加文章</a></td>
  </tr><?php $_from = $this->_tpl_vars['article']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['article']):
?>
  <tr height="32" align="center" bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
    <td><input type="checkbox" name="article" value="<?php echo $this->_tpl_vars['article']['article_id']; ?>
" /></td>
    <td align=center><?php echo $this->_tpl_vars['article']['article_id']; ?>
</td>
    <td><a href="article.php?action=article_edit&article_id=<?php echo $this->_tpl_vars['article']['article_id']; ?>
&actionx=<?php echo $this->_tpl_vars['action']; ?>
&article_root_id=<?php echo $this->_tpl_vars['article_root_id']; ?>
&guanjianzi=<?php echo $this->_tpl_vars['guanjianzi']; ?>
&leibie=<?php echo $this->_tpl_vars['leibie']; ?>
&article_channel=<?php echo $this->_tpl_vars['article_channel']; ?>
" title='<?php echo $this->_tpl_vars['article']['article_title']; ?>
'><?php echo ((is_array($_tmp=$this->_tpl_vars['article']['article_title'])) ? $this->_run_mod_handler('smartTruncate', true, $_tmp, '30', "...") : smarty_modifier_smartTruncate($_tmp, '30', "...")); ?>
</a></td>
    <td><a href="article.php?action=article_view&channel_id=<?php echo $this->_tpl_vars['article']['article_cid']; ?>
"><?php echo $this->_tpl_vars['article']['article_channel_name']; ?>
</a>-><a href="article.php?action=article_view&channel_id=<?php echo $this->_tpl_vars['article']['article_cid']; ?>
&sort_id=<?php echo $this->_tpl_vars['article']['article_sid']; ?>
"><?php echo $this->_tpl_vars['article']['article_sort_name']; ?>
</a></td>
    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['article']['add_time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d %H:%I:%S') : smarty_modifier_date_format($_tmp, '%Y-%m-%d %H:%I:%S')); ?>
</td>
	<td><?php echo $this->_tpl_vars['article']['article_add_user']; ?>
</td>
    <td><?php echo $this->_tpl_vars['article']['paixu']; ?>
</td>
    <td><?php echo $this->_tpl_vars['article']['article_situation']; ?>
</td>
    <td>
    

<a href="#" onClick="paixu('article','paixu','<?php echo $this->_tpl_vars['article']['article_id']; ?>
','<?php echo $this->_tpl_vars['article']['paixu']; ?>
');">排序</a>
  <a href="#" onClick="noset('article','top','<?php echo $this->_tpl_vars['article']['article_id']; ?>
',<?php if ($this->_tpl_vars['article']['is_top'] == 1): ?>0<?php else: ?>1<?php endif; ?>);"><?php if ($this->_tpl_vars['article']['is_top'] == 1): ?>撤销<?php endif; ?>顶置</a>

  <a href="#" onClick="noset('article','lock','<?php echo $this->_tpl_vars['article']['article_id']; ?>
',<?php if ($this->_tpl_vars['article']['is_locked'] == 1): ?>0<?php else: ?>1<?php endif; ?>);"><?php if ($this->_tpl_vars['article']['is_locked'] == 1): ?>撤销<?php endif; ?>锁定</a>&nbsp;
  <a href="article.php?action=article_edit&article_id=<?php echo $this->_tpl_vars['article']['article_id']; ?>
&actionx=<?php echo $this->_tpl_vars['action']; ?>
&article_root_id=<?php echo $this->_tpl_vars['article_root_id']; ?>
&guanjianzi=<?php echo $this->_tpl_vars['guanjianzi']; ?>
&leibie=<?php echo $this->_tpl_vars['leibie']; ?>
&article_channel=<?php echo $this->_tpl_vars['article_channel']; ?>
">修改</a>&nbsp;
  <a href="#" onClick="del('<?php echo $this->_tpl_vars['article']['article_id']; ?>
','<?php echo $this->_tpl_vars['action']; ?>
','<?php echo $this->_tpl_vars['article_root_id']; ?>
','<?php echo $this->_tpl_vars['guanjianzi']; ?>
','<?php echo $this->_tpl_vars['leibie']; ?>
','<?php echo $this->_tpl_vars['article_channel']; ?>
');">删除</a>
    </td>
  </tr><?php endforeach; endif; unset($_from); ?>
  <tr height="32" align="center" bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
    <td colspan="9"><input name="Submit" type="button" class="button" onClick="checkAll(this.form);" value="  全 选  " />
    &nbsp; <input name="delall" type="button" class="button" id="delall" onClick="delAll('<?php echo $this->_tpl_vars['action']; ?>
','<?php echo $this->_tpl_vars['article_root_id']; ?>
','<?php echo $this->_tpl_vars['guanjianzi']; ?>
','<?php echo $this->_tpl_vars['leibie']; ?>
','<?php echo $this->_tpl_vars['article_channel']; ?>
');" value="  删 除 所 选  " />&nbsp; </td>
  </tr>
  <tr height="32" align="center" bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
    <td colspan="9"><?php echo $this->_tpl_vars['pagelist']; ?>
&nbsp;共<?php echo $this->_tpl_vars['total']; ?>
记录<?php echo $this->_tpl_vars['page_num']; ?>
页 当前第<?php echo $this->_tpl_vars['page_now']; ?>
页<!--<a href="<?php echo $this->_tpl_vars['page_frist']; ?>
">首页</a>&nbsp;<a href="<?php echo $this->_tpl_vars['page_last']; ?>
">下一页</a>&nbsp; <a href="<?php echo $this->_tpl_vars['page_pre']; ?>
">上一页</a>&nbsp;<a href="<?php echo $this->_tpl_vars['page_final']; ?>
">尾页</a> 共<?php echo $this->_tpl_vars['list_num']; ?>
记录<?php echo $this->_tpl_vars['page_num']; ?>
页 当前第<?php echo $this->_tpl_vars['page_now']; ?>
页--></td>
  </tr>
</table>
</form>
</div>
</div>
   <!--文章管理e-->
</div>
</div>
</body>
</html>