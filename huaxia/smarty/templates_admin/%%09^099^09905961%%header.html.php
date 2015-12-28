<?php /* Smarty version 2.6.14, created on 2015-05-19 14:31:29
         compiled from ovov_sys/header.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'in_array', 'ovov_sys/header.html', 17, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "ovov_sys/ovoa_header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<body>
<div class="header">
	<div class="logo"><a href="<?php echo $this->_tpl_vars['ovovweb']['web_url']; ?>
" target="_blank"><img src="common/skin/1/images/logo.gif" /></a></div>
    <div class="sub_nav">
		<?php if ($this->_tpl_vars['qx_id'] == 1): ?><a href="user.php?claid=1" target="right" class="a6">系统管理员</a><?php endif; ?>
        <a href="user.php?action=user_set&claid=2" target="right" class="a3">个人设置</a>
        <!-- <a href="msg.php?action=msg_list&claid=1" target="right" class="a1">消息中心</a> -->
		<a href="user.php?action=user_modifypass&claid=3" target="right" class="a2">修改密码</a>
        <a href="javascript:void(0);" onClick="showModalDialog('index.php?ovoa=AboutSys',window,'dialogHeight:300px;dialogWidth:360px;dialogleft:350px;help:no;status:no;scroll:no');"  class="a4">关于本系统</a></li>
       <a href="javascript:parent.location.href='login.php?action=logout'" onClick="return confirm('确定要退出吗？');" class="a5">安全退出</a>
		</div>
    <div class="nav">
    	<div class="nav_left"></div>
    	<ul>
		<li class="n1"><a class="click" href="index.php?ovoa=ovoa_right" target="right">系统首页</a></li>    
		<?php $_from = $this->_tpl_vars['mytopmenu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['mytopmenu'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['mytopmenu']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['mytopmenu']):
        $this->_foreach['mytopmenu']['iteration']++;
 if (((is_array($_tmp=$this->_tpl_vars['mytopmenu']['channel_id'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['user_tview']) : in_array($_tmp, $this->_tpl_vars['user_tview'])) || ((is_array($_tmp=$this->_tpl_vars['mytopmenu']['channel_id'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['user_view']) : in_array($_tmp, $this->_tpl_vars['user_view']))): ?>
    	<li class="n<?php echo ($this->_foreach['mytopmenu']['iteration']-1)+2; ?>
"><a href="<?php if ($this->_tpl_vars['mytopmenu']['channel_urlok']):  echo $this->_tpl_vars['mytopmenu']['channel_urlname'];  else:  echo $this->_tpl_vars['mytopmenu']['channel_urlname']; ?>
?action=<?php echo $this->_tpl_vars['mytopmenu']['channel_ename']; ?>
&cid=<?php echo $this->_tpl_vars['mytopmenu']['channel_id'];  endif; ?>"  target="right"><?php echo $this->_tpl_vars['mytopmenu']['channel_name']; ?>
</a></li>
		<?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>
        </ul>
        <div class="nav_right"></div>
    </div>
    <div class="userbox">
    	<div class="ub_left"></div>
    	<div class="ub_con"><?php echo $this->_tpl_vars['user_name']; ?>
，欢迎您！  用户权限：<?php echo $this->_tpl_vars['qx']; ?>
   <SCRIPT language=JavaScript>d = new Date();document.write((d.getFullYear())+"年"+(d.getMonth()+1)+"月"+d.getDate()+ "日"); </SCRIPT> <SCRIPT language=JavaScript>
					d = new Date();
					switch (d.getDay()) {
					case 0:
					strweek="日";
					break;
					case 1:
					strweek="一";
					break;
					case 2:
					strweek="二";
					break;
					case 3:
					strweek="三";
					break;
					case 4:
					strweek="四";
					break;
					case 5:
					strweek="五";
					break;
					case 6:
					strweek="六";
					break;
					}
					document.write("星期"+ strweek);
                  </SCRIPT></div>
        <div class="ub_right"></div>
    	<div class="ub_gg"><MARQUEE onmouseover=this.stop() onmouseout=this.start() scrollamount="2">公告栏滚动文字：重要信息，点击查看详情</MARQUEE></div>
    </div>
</div>
<div class="zhezhao" style="position:fixed; top:0; left:0; z-index:2; width:100%;height:100%; background:#000; filter:alpha(opacity=70); opacity:0.7;display:none;"></div>
</body>
</html>