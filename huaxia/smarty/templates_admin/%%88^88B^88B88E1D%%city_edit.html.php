<?php /* Smarty version 2.6.14, created on 2015-11-10 17:10:37
         compiled from position/city_edit.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "ovov_sys/ovoa_header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<body>
<div class="main">
	<div class="contents" style="display:block">
		<form action="<?php echo $this->_tpl_vars['post_url']; ?>
" name="add_form" id="add_form" method="post" enctype="multipart/form-data">
		<table width="100%" border="0" cellspacing="1" cellpadding="0" style="background:#d5dde0;" class="table_font">
			<tr style="background:url(common/skin/1/images/table_title.gif) repeat-x;">
				<td height=32 align="right" width="100">城市名称&nbsp;</td>
				<td align="left" bgcolor="#FFFFFF">&nbsp;
					<input class="u_input320" type=text name="data[name]" id="name" value="<?php echo $this->_tpl_vars['res']['name']; ?>
" />
				</td>
			</tr>
			<tr style="background:url(common/skin/1/images/table_title.gif) repeat-x;">
				<td height=32 align="right" width="100">拼音首字母&nbsp;</td>
				<td align="left" bgcolor="#FFFFFF">&nbsp;
					<input class="s_sear" type=text name="data[initial]" id="initial" value="<?php echo $this->_tpl_vars['res']['initial']; ?>
"/>
				</td>
			</tr>
			<tr style="background:url(common/skin/1/images/table_title.gif) repeat-x;">
				<td height=32 align="right"></td>
				<td height="32" align="left" colspan="2" bgcolor="#FFFFFF">&nbsp;
					<input id="add" class="but_add" type="button" onclick="check()" name="add" value=" ">
				</td>
			</tr>
		</table>
		</form>
	</div>
</div>
<script>
function check(){
	if($("#name").val()==''||$("#name").val()==undefined){
		art.dialog({content: "请填写城市名称",time:"2",lock: true,icon:"error"});
		return false;
	}
	if($("#initial").val()==''||$("#initial").val()==undefined){
		art.dialog({content: "请填写拼音首字母",time:"2",lock: true,icon:"error"});
		return false;
	}
	$('#add_form').ajaxSubmit(function(data){
		var Result = eval('('+data+')');  
		if(Result.staus==1){
			art.dialog({content: Result.infotxt,time:Result.time,lock: true,icon:Result.icon});
			setTimeout('window.parent.location.reload();',(Result.time*1000));
		}else{
			art.dialog({content: Result.infotxt,time:Result.time,lock: true,icon:Result.icon});
		}
	});
}
</script>
</body>
</html>