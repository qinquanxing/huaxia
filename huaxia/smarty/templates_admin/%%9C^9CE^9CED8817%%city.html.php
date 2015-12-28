<?php /* Smarty version 2.6.14, created on 2015-11-10 19:14:55
         compiled from position/city.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "ovov_sys/ovoa_header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<body>
<div class="main">
 	<div id='db1' class="contents" style="display:block">
	<a class="s" onclick="ajax_chanel('position.php?action=city_add','新建','800px','320px')" href="javascript:void(0);">
		<img src="common/skin/1/images/add.gif">
	</a>
 	
    <form id="iform">
        <table id='table_id' align='center' width="100%" border="0" cellspacing="1" cellpadding="0" style="background:#d5dde0;" class="table_font">
          	<tr height="32" style="background:url(common/skin/1/images/table_title.gif) repeat-x;">
				<td width="50px" align="center">选择</td>
				<td width="50px" align="center">ID号</td>
				<td align="center">城市</td>
				<td align="center">首字母</td>
				<td align="center">创建时间</td>
				<td align="center" width="270px">操作</td>
            </tr>
<?php if ($this->_tpl_vars['res']): ?>
<?php $_from = $this->_tpl_vars['res']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['res']):
?>
          	<tr height="32" bgcolor="#FFFFFF" align="center" onmouseout="listBgOut(this);" onmouseover="listBgOver(this);" <?php if ($this->_tpl_vars['res']['is_show'] == 0): ?>style="color:#cdcdcd";<?php endif; ?>>
          		<td align="center"><input type="checkbox" value="<?php echo $this->_tpl_vars['res']['id']; ?>
" name="check_id"></td>
				<td align="center"><?php echo $this->_tpl_vars['res']['id']; ?>
</td>
				<td align="center"><?php echo $this->_tpl_vars['res']['name']; ?>
</td>
				<td align="center"><?php echo $this->_tpl_vars['res']['initial']; ?>
</td>
				<td align="center"><?php echo $this->_tpl_vars['res']['addtime']; ?>
</td>
				<td align="center">
<?php if ($this->_tpl_vars['res']['is_show'] == 1): ?>
					<a class="cz_btn" href="javascript:void(0);" onclick="ovajax_confirm('position.php','action=city_show&id=<?php echo $this->_tpl_vars['res']['id']; ?>
','确认取消显示')">取消显示</a>
<?php else: ?>
					<a class="cz_btn" href="javascript:void(0);" onclick="ovajax_confirm('position.php','action=city_show&id=<?php echo $this->_tpl_vars['res']['id']; ?>
&up=1','确认显示')">显示</a>
<?php endif; ?>	
					<a class="cz_btn" href="javascript:void(0);" onclick="ajax_chanel('position.php?action=city_edit&id=<?php echo $this->_tpl_vars['res']['id']; ?>
','修改','800px','320px')">修改</a>
					<a class="cz_btn" href="javascript:void(0);" onclick="ovajax_confirm('position.php','action=city_del&id=<?php echo $this->_tpl_vars['res']['id']; ?>
&up=1','确认删除')">删除</a>
				</td>
            </tr>
<?php endforeach; endif; unset($_from); ?>
			<tr height="32" bgcolor="#FFFFFF" align="center" onmouseout="listBgOut(this);" onmouseover="listBgOver(this);">
				<td colspan="11">
				<input class="button" type="button" value=" 全 选 " onclick="ov_checkAll('iform');" name="Submit"/>
				<input id="delall" class="button" type="button" value=" 删 除 选 中 " onclick="ov_delall('iform','position.php?action=city_delAll','gid=','确定要删除选中',0,2);"/>
				</td>
			</tr>
			<tr height="32" align="center" bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
			  <td colspan="13"><?php echo $this->_tpl_vars['pagelist']; ?>
&nbsp;共<?php echo $this->_tpl_vars['total']; ?>
记录<?php echo $this->_tpl_vars['page_num']; ?>
页 当前第<?php echo $this->_tpl_vars['page_now']; ?>
页
		  	</tr>
<?php else: ?>
			<tr height="32" bgcolor="#FFFFFF" align="center" onmouseout="listBgOut(this);" onmouseover="listBgOver(this);">
			  <td height=32 align="center" colspan="13">暂无数据</td>
            </tr>
<?php endif; ?>
		 </table>
	 </form>
  </div>
</div>
<script src="./common/rili/WdatePicker.js" type="text/javascript" language="javascript"></script>
<script>
$("#start_time,#end_time,#act_time").focus(function(){
	WdatePicker({startDate:'%y-%M-01 00:00:00',dateFmt:'yyyy-MM-dd HH:mm:ss',alwaysUseStartDate:true})
});
function open_img(img_path,id){
	var throughBox = art.dialog.through;
	throughBox({
		id:id,
		padding: 0,
	    title: '照片',
	    content: '<img src="'+img_path+'"/>',
	    //lock: true
	});
}
</script>
</body>
</html>