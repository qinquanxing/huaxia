<?php /* Smarty version 2.6.14, created on 2015-11-10 14:49:06
         compiled from user/user_quanxian.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'in_array', 'user/user_quanxian.html', 81, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "ovov_sys/ovoa_header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script language="Javascript">  
function cc(N,bool){  
	for (var nn=0;nn<N;nn++){
 	 var aa=document.forms[nn].elements.length;
 	 for (var i=0; i<aa; i++){
	 var m =document.forms[nn].elements[i];
	 m.checked = bool==1 ? true : (bool==0 ? false : !m.checked);
 	}
	}
}
function checkdan(nn,bool){
	  var aa=document.forms[nn].elements.length;
	  for (var i=0; i<aa; i++){
	  		var m =document.forms[nn].elements[i];
			m.checked = bool==1 ? true : (bool==0 ? false : !m.checked);
		  }  
	
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
function checkthis(obj,nn){

		if(obj.checked==true){
					checkdan(nn,1);				
			}else{
					checkdan(nn,0);			
			}
}								
function setAll(id,N){
	var string = "";
	var id=id;
	for (var nn=0;nn<N;nn++){
		for (var i = 1 ; i<document.forms[nn].elements.length; i++){
			if(document.forms[nn].elements[i].checked !=""){
				if(i<(document.forms[nn].elements.length)){
					string = string + document.forms[nn].elements[i].value+",";
				}else{
					string = string + document.forms[nn].elements[i].value;
				}
			}
		}
	}
	if(string == ""){
		alert("请选择权限内容！");return false;
	}else{
		if(confirm('确认设置这些权限？')){
		//alert(string);
		location.href="user.php?action=do_user_add_quanxian&user_id="+id+"&list_id="+string;
		}
	}
}
	function listBgOver(obj){
		obj.style.background="#E8F4FF";
	}
	function listBgOut(obj){
		obj.style.background="#FFFFFF";
	}
</script>
<body>
<div class="main">
  <div class="main_title"><strong>设置权限</strong><span></span>
    <p></p>
  </div>
  <!--设置权限b-->
  <div class="contents" style="display:block">
    <div>
	<input type="hidden" id="user_id" value="<?php echo $this->_tpl_vars['id']; ?>
" />
        <table width="100%" border="0" cellspacing="1" cellpadding="0" style="background:#d5dde0;" class="table_font">
		<?php unset($this->_sections['dalei']);
$this->_sections['dalei']['name'] = 'dalei';
$this->_sections['dalei']['loop'] = is_array($_loop=$this->_tpl_vars['channelda']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['dalei']['show'] = true;
$this->_sections['dalei']['max'] = $this->_sections['dalei']['loop'];
$this->_sections['dalei']['step'] = 1;
$this->_sections['dalei']['start'] = $this->_sections['dalei']['step'] > 0 ? 0 : $this->_sections['dalei']['loop']-1;
if ($this->_sections['dalei']['show']) {
    $this->_sections['dalei']['total'] = $this->_sections['dalei']['loop'];
    if ($this->_sections['dalei']['total'] == 0)
        $this->_sections['dalei']['show'] = false;
} else
    $this->_sections['dalei']['total'] = 0;
if ($this->_sections['dalei']['show']):

            for ($this->_sections['dalei']['index'] = $this->_sections['dalei']['start'], $this->_sections['dalei']['iteration'] = 1;
                 $this->_sections['dalei']['iteration'] <= $this->_sections['dalei']['total'];
                 $this->_sections['dalei']['index'] += $this->_sections['dalei']['step'], $this->_sections['dalei']['iteration']++):
$this->_sections['dalei']['rownum'] = $this->_sections['dalei']['iteration'];
$this->_sections['dalei']['index_prev'] = $this->_sections['dalei']['index'] - $this->_sections['dalei']['step'];
$this->_sections['dalei']['index_next'] = $this->_sections['dalei']['index'] + $this->_sections['dalei']['step'];
$this->_sections['dalei']['first']      = ($this->_sections['dalei']['iteration'] == 1);
$this->_sections['dalei']['last']       = ($this->_sections['dalei']['iteration'] == $this->_sections['dalei']['total']);
?><form id="form<?php echo $this->_sections['dalei']['index']; ?>
" name="form<?php echo $this->_sections['dalei']['index']; ?>
">	
			<tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">          
			<td height="32" align="left" width="10%">&nbsp;<input type="checkbox" name="cid<?php echo $this->_sections['dalei']['index']; ?>
" id="cid<?php echo $this->_sections['dalei']['index']; ?>
" value="<?php echo $this->_tpl_vars['channelda'][$this->_sections['dalei']['index']]['channel_id']; ?>
" onClick="checkthis(this,<?php echo $this->_sections['dalei']['index']; ?>
)" <?php if (((is_array($_tmp=$this->_tpl_vars['channelda'][$this->_sections['dalei']['index']]['channel_id'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['user_cview']) : in_array($_tmp, $this->_tpl_vars['user_cview']))): ?> checked="checked"<?php endif; ?>/>&nbsp;<?php echo $this->_tpl_vars['channelda'][$this->_sections['dalei']['index']]['channel_name']; ?>
</td>
			<td align="left" width="90%" >&nbsp;<?php unset($this->_sections['xiaolei']);
$this->_sections['xiaolei']['name'] = 'xiaolei';
$this->_sections['xiaolei']['loop'] = is_array($_loop=$this->_tpl_vars['channelxiao']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['xiaolei']['show'] = true;
$this->_sections['xiaolei']['max'] = $this->_sections['xiaolei']['loop'];
$this->_sections['xiaolei']['step'] = 1;
$this->_sections['xiaolei']['start'] = $this->_sections['xiaolei']['step'] > 0 ? 0 : $this->_sections['xiaolei']['loop']-1;
if ($this->_sections['xiaolei']['show']) {
    $this->_sections['xiaolei']['total'] = $this->_sections['xiaolei']['loop'];
    if ($this->_sections['xiaolei']['total'] == 0)
        $this->_sections['xiaolei']['show'] = false;
} else
    $this->_sections['xiaolei']['total'] = 0;
if ($this->_sections['xiaolei']['show']):

            for ($this->_sections['xiaolei']['index'] = $this->_sections['xiaolei']['start'], $this->_sections['xiaolei']['iteration'] = 1;
                 $this->_sections['xiaolei']['iteration'] <= $this->_sections['xiaolei']['total'];
                 $this->_sections['xiaolei']['index'] += $this->_sections['xiaolei']['step'], $this->_sections['xiaolei']['iteration']++):
$this->_sections['xiaolei']['rownum'] = $this->_sections['xiaolei']['iteration'];
$this->_sections['xiaolei']['index_prev'] = $this->_sections['xiaolei']['index'] - $this->_sections['xiaolei']['step'];
$this->_sections['xiaolei']['index_next'] = $this->_sections['xiaolei']['index'] + $this->_sections['xiaolei']['step'];
$this->_sections['xiaolei']['first']      = ($this->_sections['xiaolei']['iteration'] == 1);
$this->_sections['xiaolei']['last']       = ($this->_sections['xiaolei']['iteration'] == $this->_sections['xiaolei']['total']);
?>
            <?php if ($this->_tpl_vars['channelxiao'][$this->_sections['xiaolei']['index']]['channel_root_id'] == $this->_tpl_vars['channelda'][$this->_sections['dalei']['index']]['channel_id']): ?>
        	<input type="checkbox" name="de_name" id="de_name" value="<?php echo $this->_tpl_vars['channelda'][$this->_sections['dalei']['index']]['channel_id']; ?>
-<?php echo $this->_tpl_vars['channelxiao'][$this->_sections['xiaolei']['index']]['channel_id']; ?>
" <?php if (((is_array($_tmp=$this->_tpl_vars['channelxiao'][$this->_sections['xiaolei']['index']]['channel_id'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['user_sview']) : in_array($_tmp, $this->_tpl_vars['user_sview']))): ?> checked="checked"<?php endif; ?> />&nbsp;<?php echo $this->_tpl_vars['channelxiao'][$this->_sections['xiaolei']['index']]['channel_name']; ?>

            <?php endif; ?>
            <?php endfor; endif; ?></td>
			</tr>
			</form><?php endfor; endif; ?>
			<tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">   
			<td height="32" align="center" width="10%">&nbsp;</td>       
			<td align="left" width="90%" colspan="2">&nbsp;<INPUT class="but_add" type=submit value=" " name="submit" id="submit"  onClick="setAll(<?php echo $this->_tpl_vars['id']; ?>
,<?php echo $this->_sections['dalei']['total']; ?>
);">&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" onClick="cc(<?php echo $this->_sections['dalei']['total']; ?>
,1)">全选</a>&nbsp;&nbsp;<a href="javascript:void(0)" onClick="cc(<?php echo $this->_sections['dalei']['total']; ?>
,0)">全不选</a>&nbsp;&nbsp;<a href="javascript:void(0)" onClick="cc(<?php echo $this->_sections['dalei']['total']; ?>
,2)">反选</a></td>
			</tr>
		  </table>
		 
	  </div>
  </div>
   <!--设置权限e-->
</div>
</div>
</body>
</html>