<?php /* Smarty version 2.6.14, created on 2015-12-17 09:57:57
         compiled from member/manage.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "ovov_sys/ovoa_header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<body>
<div class="main">
 	<div id='db1' class="contents" style="display:block">
 	<a class="s" onclick="ajax_chanel('position.php?action=manage_add','新建','800px','320px')" href="javascript:void(0);">
		<img src="common/skin/1/images/add.gif">
	</a>
    <form id="iform">
        <table id='table_id' align='center' width="100%" border="0" cellspacing="1" cellpadding="0" style="background:#d5dde0;" class="table_font">
          	<tr height="32" style="background:url(common/skin/1/images/table_title.gif) repeat-x;">
				<td width="50px" align="center">选择</td>
				<td align="center">用户ID</td>
				<td align="center">注册类型</td>
				<td align="center">密码</td>
				<td align="center">电话</td>
				<td align="center">邮箱</td>
				<td align="center">状态</td>
				<td align="center">添加时间</td>
				<td align="center">邀请码</td>
				<td align="center">验证码</td>
				<td align="center" width="270px">操作</td>
            </tr>
<?php if ($this->_tpl_vars['res']): ?>
<?php $_from = $this->_tpl_vars['res']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['res']):
?>
          	<tr height="32" bgcolor="#FFFFFF" align="center" onmouseout="listBgOut(this);" onmouseover="listBgOver(this);" <?php if ($this->_tpl_vars['res']['is_show'] == 0): ?>style="color:#cdcdcd";<?php endif; ?> id="list">
          		<td align="center"><input type="checkbox" value="<?php echo $this->_tpl_vars['res']['id']; ?>
" name="check_id" id="cbox"></td>
		<td align="center"><?php echo $this->_tpl_vars['res']['id']; ?>
</td>
		<td align="center"><?php echo $this->_tpl_vars['res']['reg_type']; ?>
</td>
		<td align="center"><?php echo $this->_tpl_vars['res']['pwd']; ?>
</td>
		<td align="center"><?php echo $this->_tpl_vars['res']['phone']; ?>
</td>
		<td align="center"><?php echo $this->_tpl_vars['res']['email']; ?>
</td>
		<td align="center"><?php echo $this->_tpl_vars['res']['state']; ?>
</td>
		<td align="center"><?php echo $this->_tpl_vars['res']['addtime']; ?>
</td>
		<td align="center"><?php echo $this->_tpl_vars['res']['invest_code']; ?>
</td>
		<td align="center"><?php echo $this->_tpl_vars['res']['sms_code']; ?>
</td>
		<td align="center">
<?php if ($this->_tpl_vars['res']['is_show'] == 1): ?>
			<a class="cz_btn" href="javascript:void(0);" onclick="ovajax_confirm('position.php','action=manage_show&id=<?php echo $this->_tpl_vars['res']['id']; ?>
','确认取消显示')">取消显示</a>
	<?php else: ?>
			<a class="cz_btn" href="javascript:void(0);" onclick="ovajax_confirm('position.php','action=manage_show&id=<?php echo $this->_tpl_vars['res']['id']; ?>
&up=1','确认显示')">显示</a>
	<?php endif; ?>	
			<a class="cz_btn" href="javascript:void(0);" onclick="ajax_chanel('position.php?action=manage_edit&id=<?php echo $this->_tpl_vars['res']['id']; ?>
','修改','800px','320px')">修改</a>
			<a class="cz_btn" href="javascript:void(0);" onclick="ovajax_confirm('position.php','action=manage_del&id=<?php echo $this->_tpl_vars['res']['id']; ?>
','确认删除')">删除</a>
			<!--ovajax_confirm('position.php','action=manage_del&id=<?php echo $this->_tpl_vars['res']['id']; ?>
&up=1','确认删除')-->
		</td>
            </tr>
<?php endforeach; endif; unset($_from); ?>
	<tr height="32" bgcolor="#FFFFFF" align="center" onmouseout="listBgOut(this);" onmouseover="listBgOver(this);">
		<td colspan="11">
		<!-- <input class="button" type="button" value=" 全 选 " onclick="ov_checkAll('iform');" name="Submit"/>
		<input id="delall" class="button" type="button" value=" 删 除 选 中 " onclick="ov_delall('iform','position.php?action=manage_delAll','gid=','确定要删除选中',0,2);"/> -->
		<!-- <input type="checkbox" id="all">  -->
		<input type="button" value="全选" class="btn" id="selectAll">   
		<input type="button" value="全不选" class="btn" id="unSelect">   
		<input type="button" value="反选" class="btn" id="reverse">   
		<input type="button" value="获得选中的所有值" class="btn" id="getValue"> 
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
<script>
$("#selectAll").click(function () { 
   $("#cbox,#all").attr("checked", true);   
}); 
$("#unSelect").click(function () {   
   $("#cbox,#all").attr("checked", false);   
}); 
$("#reverse").click(function () {  
    // $("#cbox,#all").each(function () {   
    //     $(this).attr("checked", !$(this).attr("checked"));   
    // }); 
    // allchk(); 
    $("#cbox,#all").each(function () {   
        $(this).attr("checked", !$(this).attr("checked"));   
        alert(aa);
    }); 
    allchk(); 
});
$("#getValue").click(function(){ 
    var valArr = new Array; 
    $("#cbox,#all").each(function(i){ 
        valArr[i] = $(this).val(); 
    }); 
    var vals = valArr.join(',');//转换为逗号隔开的字符串 
    alert(vals); 
}); 
</script>
</body>
</html>