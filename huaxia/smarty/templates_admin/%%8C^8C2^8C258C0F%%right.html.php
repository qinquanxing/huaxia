<?php /* Smarty version 2.6.14, created on 2015-05-19 14:31:29
         compiled from ovov_sys/right.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'in_array', 'ovov_sys/right.html', 7, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "ovov_sys/ovoa_header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<body>
<div class="main">
	<div class="main_title"><strong>我的工作台</strong><span></span><p></p></div>
    <div class="main_content">
    	<ul class="indexul">
		<?php $_from = $this->_tpl_vars['mydesk']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['mydesk'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['mydesk']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['mydesk']):
        $this->_foreach['mydesk']['iteration']++;
 if (((is_array($_tmp=$this->_tpl_vars['mydesk']['channel_id'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['user_view']) : in_array($_tmp, $this->_tpl_vars['user_view'])) || ((is_array($_tmp=$this->_tpl_vars['mydesk']['channel_id'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['user_cview']) : in_array($_tmp, $this->_tpl_vars['user_cview']))): ?><li><div><a href="<?php if ($this->_tpl_vars['mydesk']['channel_urlok']):  echo $this->_tpl_vars['mydesk']['channel_urlname'];  else:  echo $this->_tpl_vars['mydesk']['channel_urlname']; ?>
?action=<?php echo $this->_tpl_vars['mydesk']['channel_ename']; ?>
&cid=<?php echo $this->_tpl_vars['mydesk']['channel_id'];  endif; ?>" target="right" ><img src="<?php echo $this->_tpl_vars['mydesk']['channel_ico']; ?>
" /></a><br /><a href="<?php if ($this->_tpl_vars['mydesk']['channel_urlok']):  echo $this->_tpl_vars['mydesk']['channel_urlname'];  else:  echo $this->_tpl_vars['mydesk']['channel_urlname']; ?>
?action=<?php echo $this->_tpl_vars['mydesk']['channel_ename']; ?>
&cid=<?php echo $this->_tpl_vars['mydesk']['channel_id'];  endif; ?>" target="right"><?php echo $this->_tpl_vars['mydesk']['channel_name']; ?>
</a><?php if ($this->_tpl_vars['mydesk']['mynums']): ?><strong><?php echo $this->_tpl_vars['mydesk']['mynums']; ?>
</strong><?php endif; ?></div></li>
		<?php endif;  endforeach; endif; unset($_from); ?>
        </ul>
        <div class="fd zx"></div><div class="fd yx"></div>
    </div>
</div>
</div>
</body>
</html>