<?php /* Smarty version 2.6.14, created on 2015-05-19 14:33:53
         compiled from feedback/f_list.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "ovov_sys/ovoa_header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<body>
<script language="javascript" type="text/javascript">
function listBgOver(obj){
	obj.style.background="#E8F4FF";
}
function listBgOut(obj){
	obj.style.background="#FFFFFF";
}
function del(id){
	if(confirm('确定删除此留言？')){
		location.href = 'feedback.php?action=do_del&id='+id;
	}
}
</script>
<div class="main">
  <div class="main_title"><strong>留言管理</strong><span></span>
    <p></p>
  </div>
  <div class="main_content">
	<div class="contents" style="display:block">
        <table width="100%" border="0" cellspacing="1" cellpadding="0" style="background:#d5dde0;" class="table_font">
          <tr style="background:url(common/skin/1/images/table_title.gif) repeat-x;">
                <td height="32" align="center">ID</td>
                <td align="center">姓名</td>
                <td align="center">邮箱</td>
                <td align="center">手机</td>
                <td align="center">留言时间</td>
                <td align="center">操作</td>
          </tr>
<?php if ($this->_tpl_vars['res']): ?>
<?php $_from = $this->_tpl_vars['res']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['res']):
?>
          <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
                <td height="32" align="center"><?php echo $this->_tpl_vars['res']['fd_id']; ?>
</td>
                <td height="32" align="center"><?php echo $this->_tpl_vars['res']['fd_name']; ?>
</td>
                <td height="32" align="center"><?php echo $this->_tpl_vars['res']['fd_email']; ?>
</td>
                <td height="32" align="center"><?php echo $this->_tpl_vars['res']['fd_phone']; ?>
</td>
                <td height="32" align="center"><?php echo $this->_tpl_vars['res']['add_time']; ?>
</td>
                <td align="center">
                	<a href="feedback.php?action=do_see&id=<?php echo $this->_tpl_vars['res']['fd_id']; ?>
">查看</a>
                	<a onClick="del(<?php echo $this->_tpl_vars['res']['fd_id']; ?>
)" href="javascript:void(0);">删除</a>
				</td>
          </tr>
<?php endforeach; endif; unset($_from); ?>
<?php else: ?>
          <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);"><td colspan="8" height="32" align="center">暂无任何消息！</td></tr>
<?php endif; ?>
        </table>
		<br/>
	<div class="page">
	<span>
<?php if ($this->_tpl_vars['total']): ?>
		第<?php echo $this->_tpl_vars['page_now']; ?>
页/共<?php echo $this->_tpl_vars['page_num']; ?>
页，共<?php echo $this->_tpl_vars['total']; ?>
条</span> <?php echo $this->_tpl_vars['pagelist']; ?>

<?php endif; ?>
	</div>
  </div>
</div>
</div>
</body>
</html>