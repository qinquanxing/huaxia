<?php /* Smarty version 2.6.14, created on 2015-05-19 14:33:56
         compiled from manage_ad/manage_ad_adlist.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'manage_ad/manage_ad_adlist.html', 37, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "ovov_sys/ovoa_header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script language="javascript" type="text/javascript" src="common/rili/WdatePicker.js"></script>
<link rel="stylesheet" href="../e/themes/default/default.css" />
<link rel="stylesheet" href="../e/plugins/code/prettify.css" />
<script charset="utf-8" src="../e/kindeditor.js"></script>
<script charset="utf-8" src="../e/lang/zh_CN.js"></script>
<script charset="utf-8" src="../e/plugins/code/prettify.js"></script>
<script language="javascript" type="text/javascript">
	function listBgOver(obj){
		obj.style.background="#E8F4FF";
	}
	function listBgOut(obj){
		obj.style.background="#FFFFFF";
	}
</script>
<body>
<div class="main">
  <div class="main_title"><strong>广告位列表</strong> <span></span><p></p></div>
  <div class="main_content">
  <!--文章管理b-->
  <div class="contents" style="display:block">
    <div><form name="channel_form"><table width="100%" border="0" cellspacing="1" cellpadding="0" style="background:#d5dde0;" class="table_font">
  	<tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);" align="center">
    <td height="32" align="center">ID</td>
    <td align="center" >广告位名称</td>
    <!-- <td  align="center" >售价/周</td> -->
    <td align="center" >广告位尺寸</td>
    <!-- <td align="center" >订单数</td> -->
    <td align="center" >操作&nbsp;&nbsp;<a href="manage_ad.php?action=addad">［添加广告位］</a></td>
  </tr>
<?php $_from = $this->_tpl_vars['adList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
  <tr height="32" align="center" bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
    <td align="center"><?php echo $this->_tpl_vars['item']['adv_id']; ?>
</td>
    <td align="center"><a href="manage_ad.php?action=viewad&adid=<?php echo $this->_tpl_vars['item']['adv_id']; ?>
"><?php echo $this->_tpl_vars['item']['name']; ?>
</a></td>
    <!-- <td align="center"><?php echo $this->_tpl_vars['item']['price']; ?>
</td> -->
    <td align="center"><?php echo $this->_tpl_vars['item']['width']; ?>
x<?php echo $this->_tpl_vars['item']['height']; ?>
</td>
    <!-- <td align="center"><?php echo ((is_array($_tmp=@$this->_tpl_vars['adNum'][$this->_tpl_vars['item']['adv_id']])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
</td> -->
    <td align="center"><a href="manage_ad.php?action=delad&adid=<?php echo $this->_tpl_vars['item']['adv_id']; ?>
" onClick="if(!confirm('删除此广告位？'))return false;">删除</a>&nbsp;&nbsp;<a href="manage_ad.php?action=editad&adid=<?php echo $this->_tpl_vars['item']['adv_id']; ?>
">编辑</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="manage_ad.php?action=addrder&adid=<?php echo $this->_tpl_vars['item']['adv_id']; ?>
">添加</a>&nbsp;&nbsp;<a href="manage_ad.php?action=viewad&adid=<?php echo $this->_tpl_vars['item']['adv_id']; ?>
">浏览</a><!--&nbsp;&nbsp;<a href="manage_ad.php?action=getad&adid=<?php echo $this->_tpl_vars['item']['adv_id']; ?>
">获取本站调用代码</a>-->&nbsp;&nbsp;<a href="manage_ad.php?action=getadwai&adid=<?php echo $this->_tpl_vars['item']['adv_id']; ?>
">获取外部调用代码</a></td>
  </tr>
<?php endforeach; endif; unset($_from); ?>
  <tr height="32" align="center" bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
    <td colspan="8"><?php echo $this->_tpl_vars['pagelist']; ?>
&nbsp;共<?php echo $this->_tpl_vars['total']; ?>
记录<?php echo $this->_tpl_vars['page_num']; ?>
页 当前第<?php echo $this->_tpl_vars['page_now']; ?>
页</td>
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