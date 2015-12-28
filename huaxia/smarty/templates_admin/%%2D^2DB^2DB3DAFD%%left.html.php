<?php /* Smarty version 2.6.14, created on 2015-12-15 16:05:52
         compiled from ovov_sys/left.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'in_array', 'ovov_sys/left.html', 5, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "ovov_sys/ovoa_header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<body>
<div class="left">
<?php unset($this->_sections['menua']);
$this->_sections['menua']['name'] = 'menua';
$this->_sections['menua']['loop'] = is_array($_loop=$this->_tpl_vars['menua']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['menua']['show'] = true;
$this->_sections['menua']['max'] = $this->_sections['menua']['loop'];
$this->_sections['menua']['step'] = 1;
$this->_sections['menua']['start'] = $this->_sections['menua']['step'] > 0 ? 0 : $this->_sections['menua']['loop']-1;
if ($this->_sections['menua']['show']) {
    $this->_sections['menua']['total'] = $this->_sections['menua']['loop'];
    if ($this->_sections['menua']['total'] == 0)
        $this->_sections['menua']['show'] = false;
} else
    $this->_sections['menua']['total'] = 0;
if ($this->_sections['menua']['show']):

            for ($this->_sections['menua']['index'] = $this->_sections['menua']['start'], $this->_sections['menua']['iteration'] = 1;
                 $this->_sections['menua']['iteration'] <= $this->_sections['menua']['total'];
                 $this->_sections['menua']['index'] += $this->_sections['menua']['step'], $this->_sections['menua']['iteration']++):
$this->_sections['menua']['rownum'] = $this->_sections['menua']['iteration'];
$this->_sections['menua']['index_prev'] = $this->_sections['menua']['index'] - $this->_sections['menua']['step'];
$this->_sections['menua']['index_next'] = $this->_sections['menua']['index'] + $this->_sections['menua']['step'];
$this->_sections['menua']['first']      = ($this->_sections['menua']['iteration'] == 1);
$this->_sections['menua']['last']       = ($this->_sections['menua']['iteration'] == $this->_sections['menua']['total']);
?>
<?php if (((is_array($_tmp=$this->_tpl_vars['menua'][$this->_sections['menua']['index']]['channel_id'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['user_cview']) : in_array($_tmp, $this->_tpl_vars['user_cview']))): ?>
    <dl>
        <dt><?php echo $this->_tpl_vars['menua'][$this->_sections['menua']['index']]['channel_name']; ?>
</dt>
		<?php unset($this->_sections['menub']);
$this->_sections['menub']['name'] = 'menub';
$this->_sections['menub']['loop'] = is_array($_loop=$this->_tpl_vars['menub']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['menub']['show'] = true;
$this->_sections['menub']['max'] = $this->_sections['menub']['loop'];
$this->_sections['menub']['step'] = 1;
$this->_sections['menub']['start'] = $this->_sections['menub']['step'] > 0 ? 0 : $this->_sections['menub']['loop']-1;
if ($this->_sections['menub']['show']) {
    $this->_sections['menub']['total'] = $this->_sections['menub']['loop'];
    if ($this->_sections['menub']['total'] == 0)
        $this->_sections['menub']['show'] = false;
} else
    $this->_sections['menub']['total'] = 0;
if ($this->_sections['menub']['show']):

            for ($this->_sections['menub']['index'] = $this->_sections['menub']['start'], $this->_sections['menub']['iteration'] = 1;
                 $this->_sections['menub']['iteration'] <= $this->_sections['menub']['total'];
                 $this->_sections['menub']['index'] += $this->_sections['menub']['step'], $this->_sections['menub']['iteration']++):
$this->_sections['menub']['rownum'] = $this->_sections['menub']['iteration'];
$this->_sections['menub']['index_prev'] = $this->_sections['menub']['index'] - $this->_sections['menub']['step'];
$this->_sections['menub']['index_next'] = $this->_sections['menub']['index'] + $this->_sections['menub']['step'];
$this->_sections['menub']['first']      = ($this->_sections['menub']['iteration'] == 1);
$this->_sections['menub']['last']       = ($this->_sections['menub']['iteration'] == $this->_sections['menub']['total']);
?>
		<?php if ($this->_tpl_vars['menub'][$this->_sections['menub']['index']]['channel_root_id'] == $this->_tpl_vars['menua'][$this->_sections['menua']['index']]['channel_id'] && ((is_array($_tmp=$this->_tpl_vars['menub'][$this->_sections['menub']['index']]['channel_id'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['user_view']) : in_array($_tmp, $this->_tpl_vars['user_view']))): ?> <?php if ($this->_tpl_vars['menub'][$this->_sections['menub']['index']]['channel_root_id'] == 50): ?>
        <?php if ($this->_tpl_vars['menub'][$this->_sections['menub']['index']]['channel_id'] == 55 || $this->_tpl_vars['menub'][$this->_sections['menub']['index']]['channel_id'] == 56 || $this->_tpl_vars['menub'][$this->_sections['menub']['index']]['channel_id'] == 59 || $this->_tpl_vars['menub'][$this->_sections['menub']['index']]['channel_id'] == 60): ?>
         <dd><a href="<?php if ($this->_tpl_vars['menub'][$this->_sections['menub']['index']]['channel_urlok']):  echo $this->_tpl_vars['menub'][$this->_sections['menub']['index']]['channel_urlname'];  else:  echo $this->_tpl_vars['menub'][$this->_sections['menub']['index']]['channel_urlname']; ?>
?cid=<?php echo $this->_tpl_vars['menub'][$this->_sections['menub']['index']]['channel_id']; ?>
&action=<?php echo $this->_tpl_vars['menub'][$this->_sections['menub']['index']]['channel_ename'];  endif; ?>" target="right"><?php echo $this->_tpl_vars['menub'][$this->_sections['menub']['index']]['channel_name']; ?>
</a></dd>
		<?php endif;  else: ?><dd><a href="<?php if ($this->_tpl_vars['menub'][$this->_sections['menub']['index']]['channel_urlok']):  echo $this->_tpl_vars['menub'][$this->_sections['menub']['index']]['channel_urlname'];  else:  echo $this->_tpl_vars['menub'][$this->_sections['menub']['index']]['channel_urlname']; ?>
?cid=<?php echo $this->_tpl_vars['menub'][$this->_sections['menub']['index']]['channel_id']; ?>
&action=<?php echo $this->_tpl_vars['menub'][$this->_sections['menub']['index']]['channel_ename'];  endif; ?>" target="right"><?php echo $this->_tpl_vars['menub'][$this->_sections['menub']['index']]['channel_name']; ?>
</a></dd><?php endif;  endif; ?>
        <?php endfor; endif; ?>
       <!-- <dd class="bot"></dd>-->
    </dl>
<?php endif; ?>
<?php endfor; endif; ?>
</div>
<div class="zhezhao" style="position:fixed; top:0; left:0;z-index:9999; width:100%;height:130%; background:#000; filter:alpha(opacity=70); opacity:0.7;display:none;margin-right:-50px;"></div>
</body>
</html>