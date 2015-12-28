<?php /* Smarty version 2.6.14, created on 2015-05-19 14:31:31
         compiled from ovoa/ovoa.html */ ?>
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
<style type="text/css">
.ke-container{
	margin-left:10px;
}
</style>
<script language="javascript" type="text/javascript">
	KindEditor.ready(function(K) {
			var editor1 = K.create('textarea[name="intro_meo"]', {
				cssPath : '../e/plugins/code/prettify.css',
				uploadJson : '../e/php/upload_json.php',
				fileManagerJson : '../e/php/file_manager_json.php',
				allowFileManager : true,
				syncType:'auto',
				afterCreate : function() {
					var self = this;
					K.ctrl(document, 13, function() {
						self.sync();
						K('form[name=example]')[0].submit();
					});
					K.ctrl(self.edit.doc, 13, function() {
						 self.sync();
						K('form[name=example]')[0].submit();
					});
				},afterChange:function(){//同步给textarea
				   this.sync();
				 }
			});
			prettyPrint();
		});
function del_Channel(id){
	if(confirm('确定删除此分类？')){
		location.href = 'ovoa.php?action=Ovoa_Channel_Del&id='+id;
	}
}
function delDepartment(id){
	if(confirm('确定删除此部门？')){
		location.href = 'ovoa.php?action=Ovoa_Department_del&id='+id;
	}
}
function del_quanxian(id){
	if(confirm('确定删除此权限？')){
		location.href = 'ovoa.php?action=Do_Ovoa_Quanxian_DEL&del_qx_id='+id;
	}
}
function checkAll(){
	for (var p=0;p<document.forms[1].elements.length;p++){
		var m = document.forms[1].elements[p];
			if (m.checked==false){
				m.checked = true;
			}
			else{
				m.checked = false;
			}
	}
}


function delAll(){
	var string = "";
	for (var i = 0 ; i<document.forms[1].elements.length ; i++){
		if(document.forms[1].elements[i].checked !=""){
			if(i<(document.forms[1].elements.length)){
				string = string + document.forms[1].elements[i].value+",";
			}else{
				string = string + document.forms[1].elements[i].value;
			}
		}
	}
	if(string == ""){
					art.dialog({
                    time: 2,
                    lock: true,
                    icon: 'error',
                    content: '请选择内容'
               		});
	}else{
		//alert(string);
		if(confirm('确定删除这些用户？')){location.href="user.php?action=do_del&id="+string;}
	}
	
}
	function listBgOver(obj){
		obj.style.background="#E8F4FF";
	}
	function listBgOut(obj){
		obj.style.background="#FFFFFF";
	}
	
	jQuery(function($) {
			//频道栏目添加提交B
			$("#channel_add_submit").click(function() {
				if($("#channel_name").val()=='') {
					art.dialog({
                    time: 2,
                    lock: true,
                    icon: 'error',
                    content: '子分类名称不能为空!'
               		});
					$("#channel_name").focus();
					return false;
				}
				
				//子分类英文名是否为空
				if($("#channel_ename").val()==''){
					$("#channel_ename").focus();
					$("#channel_ename").addClass("s_sear_red");
					art.dialog({
                    time: 2,
                    lock: true,
                    icon: 'error',
                    content: '子分类英文名不能为空!'
               		});
					return false;
				}
				//子分类链接是否为空
				if($("#channel_urlname").val()==''){
					$("#channel_urlname").focus();
					$("#channel_urlname").addClass("s_sear_red");
					art.dialog({
                    time: 2,
                    lock: true,
                    icon: 'error',
                    content: '子分类链接不能为空!'
               		});
					return false;
				}


				//子分类内容是否为空
				if($("#intro_meo").val()==''){
					$("#intro_meo").focus();
					$("#intro_meo").attr("style","border:#F00 solid 1px;");
					art.dialog({
                    time: 2,
                    lock: true,
                    icon: 'error',
                    content: '子分类简介信息不能为空!'
               		});
					return false;
				}
			});
			//频道栏目添加提交e
			//部门添加添加提交b
			$("#Department_New_submit").click(function() {
				if($("#de_name").val()=='') {
					$("#de_name").addClass("s_sear_red");
					art.dialog({
                    time: 2,
                    lock: true,
                    icon: 'error',
                    content: '添加部门名称不能为空!'
               		});
					$("#de_name").focus();
					return false;
				}
			});
		//部门添加提交e
		//提交权限内容b
		$("#Quanxian_New_submit").click(function() {
				if($("#qx_name").val()=='') {
					$("#qx_name").addClass("s_sear_red");
					art.dialog({
                    time: 2,
                    lock: true,
                    icon: 'error',
                    content: '添加权限名称不能为空!'
               		});
					$("#qx_name").focus();
					return false;
				}
			});
		//提交权限内容e
		});
		
		
		
	
</script>
<body>
<div class="main">
  <div class="main_title"><strong>系统管理</strong></div>
  <div class="main_content">
  <!--选项卡B-->
    <div class="sub_title">
      <ul>
        <li <?php if ($this->_tpl_vars['claid'] == 0): ?>class="tab_on"<?php endif; ?>><a href="ovoa.php?action=Ovoa_Config&claid=0"><span>系统配置</span></a></li>
        <li><a href="user.php?claid=1"><span>用户管理</span></a></li>
        <li <?php if ($this->_tpl_vars['claid'] == 1 || $this->_tpl_vars['claid'] == 11 || $this->_tpl_vars['claid'] == 12): ?>class="tab_on"<?php endif; ?>><a href="ovoa.php?action=Ovoa_Channel&claid=1"><span>系统模块</span></a></li>
        <li <?php if ($this->_tpl_vars['claid'] == 2): ?>class="tab_on"<?php endif; ?>><a href="ovoa.php?action=Ovoa_Department&claid=2"><span>部门管理</span></a></li>
        <li <?php if ($this->_tpl_vars['claid'] == 3): ?>class="tab_on"<?php endif; ?>><a href="ovoa.php?action=Ovoa_Quanxian&claid=3"><span>权限管理</span></a></li>
        <li <?php if ($this->_tpl_vars['claid'] == 4): ?>class="tab_on"<?php endif; ?>><a href="ovov_abdata.php?action=Ovov_DataABC"><span>基础分类</span></a></li>
      </ul>
      <div class="search">
        <form action="ovoa.php?action=ovoa_chaxun&claid=<?php echo $this->_tpl_vars['claid']; ?>
" method="post" id="chaxun" name="chaxun" >
          <p>
            <input name="ovoa_sqlname" id="ovoa_sqlname"  type="text" value="<?php echo $this->_tpl_vars['ovoa_sqlname']; ?>
" />
          </p>
          <span>
          <INPUT class="but_sql" type=submit value=" " name="ovoa_sql_submit" id="ovoa_sql_submit">
          </span>
        </form>
      </div>
    </div>
	<!--选项卡E-->
    <!--系统配置b-->
    <div class="contents" <?php if ($this->_tpl_vars['claid'] == 0): ?>style="display:block"<?php endif; ?>>
      <div>
        <form action="ovoa.php?action=Do_Ovoa_Config" method="post" name="sysconfig" id="sysconfig" enctype="multipart/form-data">
          <table width="100%" border="0" cellspacing="1" cellpadding="0" style="background:#d5dde0;" class="table_font">
            <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp;系统名称：</td>
              <td align="left" width="80%" >&nbsp;
                <input class="u_input320" name="web_name" type="text" id="web_name" value="<?php echo $this->_tpl_vars['ovovweb']['web_name']; ?>
" />
                &nbsp;<span class="xspan">*系统名称</span></td>
            </tr>
			<tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp;IOS版本号：</td>
              <td align="left" width="80%" >&nbsp;
                <input class="u_input320" name="ver_ios" type="text" id="ver_ios" value="<?php echo $this->_tpl_vars['ovovweb']['ver_ios']; ?>
" />
                &nbsp;<span class="xspan">*IOS版本号</span></td>
            </tr>
			<tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp;IOS新版本下载地址：</td>
              <td align="left" width="80%" >&nbsp;
                <input class="u_input320" name="ver_ios_url" type="text" id="ver_ios_url" value="<?php echo $this->_tpl_vars['ovovweb']['ver_ios_url']; ?>
" />
                &nbsp;<span class="xspan">*IOS新版本下载地址</span></td>
            </tr>
			<tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp;android版本号：</td>
              <td align="left" width="80%" >&nbsp;
                <input class="u_input320" name="ver_android" type="text" id="ver_android" value="<?php echo $this->_tpl_vars['ovovweb']['ver_android']; ?>
" />
                &nbsp;<span class="xspan">*android版本号</span></td>
            </tr>
			<tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp;android新版本下载地址：</td>
              <td align="left" width="80%" >&nbsp;
                <input class="u_input320" name="ver_android_url" type="text" id="ver_android_url" value="<?php echo $this->_tpl_vars['ovovweb']['ver_android_url']; ?>
" />
                &nbsp;<span class="xspan">*android新版本下载地址</span></td>
            </tr>
			
            <!--<tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp;系统地址：</td>
              <td align="left" width="80%" >&nbsp;
                <input class="u_input320" name="web_url" type="text" id="web_url" value="<?php echo $this->_tpl_vars['ovovweb']['web_url']; ?>
" />
                &nbsp;<span class="xspan">*系统地址</span></td>
            </tr>
            <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp; LOGO地址：</td>
              <td align="left" width="80%" >&nbsp;
                <table>
                  <tr>
                    <td>&nbsp;
                      <INPUT type=text name="ovoa_logo" id="ovoa_logo" class="u_input320" value="<?php echo $this->_tpl_vars['ovovweb']['website_logo']; ?>
" ></td>
                    <td><iframe name="file_upload" src="upload.php?action=new_ovoafile&isReturn=true&dizhi=ovoa_logo&rstform=sysconfig" scrolling="no" frameborder="0" id="upload_file_iframe" style="height:28px; padding-top:0px;"></iframe></td>
                  </tr>
                </table></td>
            </tr>
            <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp;公司主页：</td>
              <td align="left" width="80%" >&nbsp;
                <input class="s_sear" name="website_url" type="text" id="website_url" value="<?php echo $this->_tpl_vars['ovovweb']['website_url']; ?>
" size="30" />
                &nbsp;<span class="xspan">*公司主页</span></td>
            </tr>
            <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp;系统管理员：</td>
              <td align="left" width="80%" >&nbsp;
                <input class="s_sear" name="web_admin" type="text" id="web_admin" value="<?php echo $this->_tpl_vars['ovovweb']['web_admin']; ?>
" size="30" />
                &nbsp;<span class="xspan">*系统管理员</span></td>
            </tr>
            <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp;管理员邮件：</td>
              <td align="left" width="80%" >&nbsp;
                <input class="s_sear" name="web_email" type="text" id="web_email" value="<?php echo $this->_tpl_vars['ovovweb']['web_email']; ?>
" size="30" />
                &nbsp;<span class="xspan">*管理员邮件</span></td>
            </tr>
            <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp;公司地址：</td>
              <td align="left" width="80%" >&nbsp;
                <input class="s_sear" name="web_address" type="text" id="web_address" value="<?php echo $this->_tpl_vars['ovovweb']['web_address']; ?>
" size="30" />
                &nbsp;<span class="xspan">*公司地址</span></td>
            </tr>
            <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp;客服热线：</td>
              <td align="left" width="80%" >&nbsp;
                <input class="s_sear" name="web_hotline" type="text" id="web_hotline" value="<?php echo $this->_tpl_vars['ovovweb']['web_hotline']; ?>
" size="30" />
                &nbsp;<span class="xspan">*客服热线</span></td>
            </tr>
            <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp;招聘热线：</td>
              <td align="left" width="80%" >&nbsp;
                <input class="s_sear" name="web_hrline" type="text" id="web_hrline" value="<?php echo $this->_tpl_vars['ovovweb']['web_hrline']; ?>
" size="30" />
                &nbsp;<span class="xspan">*招聘热线</span></td>
            </tr>
            <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp;传真：</td>
              <td align="left" width="80%" >&nbsp;
                <input class="s_sear" name="web_fax" type="text" id="web_fax" value="<?php echo $this->_tpl_vars['ovovweb']['web_fax']; ?>
" size="30" />
                &nbsp;<span class="xspan">*传真</span></td>
            </tr>
            <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp;备案信息：</td>
              <td align="left" width="80%" >&nbsp;
                <input class="u_input600" name="web_cert" type="text" id="web_cert" value="<?php echo $this->_tpl_vars['ovovweb']['web_cert']; ?>
" size="30" />
                &nbsp;<span class="xspan">*备案信息</span></td>
            </tr>
            <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp;上传扩展名：</td>
              <td align="left" width="80%" >&nbsp;
                <input class="u_input600" name="allowed_file" type="text" id="allowed_file" value="<?php echo $this->_tpl_vars['ovovweb']['allowed_file']; ?>
" />
                &nbsp;<span class="xspan">*上传扩展名</span></td>
            </tr>
            <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp;上传大小：</td>
              <td align="left" width="80%" >&nbsp;
                <select name="allowed_size" id="allowed_size">
                  <option value="0.5M"<?php if ($this->_tpl_vars['ovovweb']['allowed_size'] == "0.5M"): ?> selected="selected"<?php endif; ?>>0.5M</option>
                  <option value="1M"<?php if ($this->_tpl_vars['ovovweb']['allowed_size'] == '1M'): ?> selected="selected"<?php endif; ?>>1M</option>
                  <option value="2M"<?php if ($this->_tpl_vars['ovovweb']['allowed_size'] == '2M'): ?> selected="selected"<?php endif; ?>>2M</option>
                  <option value="10M"<?php if ($this->_tpl_vars['ovovweb']['allowed_size'] == '10M'): ?> selected="selected"<?php endif; ?>>10M</option>
                  <option value="20M"<?php if ($this->_tpl_vars['ovovweb']['allowed_size'] == '20M'): ?> selected="selected"<?php endif; ?>>20M</option>
                  <option value="60M"<?php if ($this->_tpl_vars['ovovweb']['allowed_size'] == '60M'): ?> selected="selected"<?php endif; ?>>60M</option>
                </select>
                &nbsp;<span class="xspan">*上传大小</span></td>
            </tr>
            <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp;是否开启伪静态：</td>
              <td align="left" width="80%" >&nbsp;
                <select name="web_wshtml" id="web_wshtml">
                  <option value="open"<?php if ($this->_tpl_vars['ovovweb']['web_wshtml'] == 'open'): ?> selected="selected"<?php endif; ?>>开</option>
                  <option value="close"<?php if ($this->_tpl_vars['ovovweb']['web_wshtml'] == 'close'): ?> selected="selected"<?php endif; ?>>关</option>
       			</select>
               </td>
            </tr>
            <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp;系统开关：</td>
              <td align="left" width="80%" >&nbsp;
                <select name="web_switch" id="web_switch">
                  <option value="open"<?php if ($this->_tpl_vars['ovovweb']['web_switch'] == 'open'): ?> selected="selected"<?php endif; ?>>开</option>
                  <option value="close"<?php if ($this->_tpl_vars['ovovweb']['web_switch'] == 'close'): ?> selected="selected"<?php endif; ?>>关</option>
                </select>
                <span style="COLOR: #f00">
                <label>
                  <input type="checkbox" name="self" id="self" value="1" <?php if ($this->_tpl_vars['ovovweb']['web_self'] == 1): ?> checked="checked"<?php endif; ?>>
                </label>
                自定义时间 从
                <label> <?php echo $this->_tpl_vars['sweekslect']; ?>
 </label>
                <label><?php echo $this->_tpl_vars['stimelect']; ?>
 : <?php echo $this->_tpl_vars['secondlect']; ?>
</label>
                到
                <label> <?php echo $this->_tpl_vars['eweekslect']; ?>
 </label>
                <?php echo $this->_tpl_vars['etimelect']; ?>
 : <?php echo $this->_tpl_vars['esecondlect']; ?>

                开启</span>&nbsp;<span class="xspan">*系统管理员</span></td>
            </tr>
            <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp;关闭原因：</td>
              <td align="left" width="80%" >&nbsp;
                <textarea class="textarea" name="close_reason" id="close_reason"><?php echo $this->_tpl_vars['ovovweb']['close_reason']; ?>
</textarea>
                &nbsp;<span class="xspan">*关闭原因</span></td>
            </tr>
            <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp;版权信息：</td>
              <td align="left" width="80%" >&nbsp;
                <textarea class="textarea" name="web_copyright" id="web_copyright"><?php echo $this->_tpl_vars['ovovweb']['web_copyright']; ?>
</textarea>
                &nbsp;<span class="xspan">*版权信息</span></td>
            </tr> 
            <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp;网站关键字：</td>
              <td align="left" width="80%" >&nbsp;
                <textarea class="textarea" name="web_keywords" id="web_keywords"><?php echo $this->_tpl_vars['ovovweb']['web_keywords']; ?>
</textarea>
                &nbsp;<span class="xspan">*网站关键字</span></td>
            </tr>
            <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp;网站描述：</td>
              <td align="left" width="80%" >&nbsp;
                <textarea class="textarea" name="web_regnotice" id="web_regnotice"><?php echo $this->_tpl_vars['ovovweb']['web_regnotice']; ?>
</textarea>
                &nbsp;<span class="xspan">*网站描述</span></td>
            </tr>-->
            <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp;</td>
              <td align="left" width="80%" colspan="2">&nbsp;
                <INPUT class="but_modfy" type=submit value=" " name="msg_send_submit" id="msg_send_submit"></td>
            </tr>
          </table>
        </form>
      </div>
    </div>
    <!--系统配置e--> 
    <!--分类管理b-->
    <div class="contents" <?php if ($this->_tpl_vars['claid'] == 1): ?>style="display:block"<?php endif; ?>>
      <form name="usernamelist">
        <div><a href="ovoa.php?action=Ovoa_Channel_Add&claid=11&jibie=1" class="s"><img src="common/skin/1/images/add.gif" /></a></div>
        <div>
          <table width="100%" border="0" cellspacing="1" cellpadding="0" style="background:#d5dde0;" class="table_font">
            <tr style="background:url(common/skin/1/images/table_title.gif) repeat-x;">
              <td height="32" align="center">ID号</td>
              <td align="center">分类名称</td>
              <td align="center">分类链接</td>
              <td align="center">排序数字</td>
              <td align="center">分类级别</td>
              <td align="center">操作</td>
            </tr>
            <?php unset($this->_sections['d']);
$this->_sections['d']['name'] = 'd';
$this->_sections['d']['loop'] = is_array($_loop=$this->_tpl_vars['channeld']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['d']['show'] = true;
$this->_sections['d']['max'] = $this->_sections['d']['loop'];
$this->_sections['d']['step'] = 1;
$this->_sections['d']['start'] = $this->_sections['d']['step'] > 0 ? 0 : $this->_sections['d']['loop']-1;
if ($this->_sections['d']['show']) {
    $this->_sections['d']['total'] = $this->_sections['d']['loop'];
    if ($this->_sections['d']['total'] == 0)
        $this->_sections['d']['show'] = false;
} else
    $this->_sections['d']['total'] = 0;
if ($this->_sections['d']['show']):

            for ($this->_sections['d']['index'] = $this->_sections['d']['start'], $this->_sections['d']['iteration'] = 1;
                 $this->_sections['d']['iteration'] <= $this->_sections['d']['total'];
                 $this->_sections['d']['index'] += $this->_sections['d']['step'], $this->_sections['d']['iteration']++):
$this->_sections['d']['rownum'] = $this->_sections['d']['iteration'];
$this->_sections['d']['index_prev'] = $this->_sections['d']['index'] - $this->_sections['d']['step'];
$this->_sections['d']['index_next'] = $this->_sections['d']['index'] + $this->_sections['d']['step'];
$this->_sections['d']['first']      = ($this->_sections['d']['iteration'] == 1);
$this->_sections['d']['last']       = ($this->_sections['d']['iteration'] == $this->_sections['d']['total']);
?>
            <tr bgcolor="#E8F4F4" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);" >
              <td align="center" height="33"><?php echo $this->_tpl_vars['channeld'][$this->_sections['d']['index']]['channel_id']; ?>
</td>
              <td style="padding-left:10px; text-align:left"><img src="common/images/jiakk.png" /> <a href="ovoa.php?action=Ovoa_Channel_Edit&claid=12&id=<?php echo $this->_tpl_vars['channeld'][$this->_sections['d']['index']]['channel_id']; ?>
&kid=<?php echo $this->_tpl_vars['kid']; ?>
&jibie=1"><?php echo $this->_tpl_vars['channeld'][$this->_sections['d']['index']]['channel_name']; ?>
</a>&nbsp;<a href="ovoa.php?action=Ovoa_Channel_Add&claid=11&id=<?php echo $this->_tpl_vars['channeld'][$this->_sections['d']['index']]['channel_id']; ?>
&kid=<?php echo $this->_tpl_vars['kid']; ?>
&jibie=2"><font color="#FF0000">[添加子类]</font></a></td>
              <td style="padding-left:10px; text-align:left"><?php echo $this->_tpl_vars['channeld'][$this->_sections['d']['index']]['channel_urlname']; ?>
</td>
              <td align="center"><?php echo $this->_tpl_vars['channeld'][$this->_sections['d']['index']]['channel_order']; ?>
</td>
              <td align="center"><?php echo $this->_tpl_vars['channeld'][$this->_sections['d']['index']]['jibie']; ?>
级</td>
              <td align="center"><a href="ovoa.php?action=Ovoa_Channel_Paixu&claid=13&id=<?php echo $this->_tpl_vars['channeld'][$this->_sections['d']['index']]['channel_id']; ?>
&oid=<?php echo $this->_tpl_vars['channeld'][$this->_sections['d']['index']]['channel_order']; ?>
">排序</a>&nbsp;&nbsp;&nbsp;<a href="ovoa.php?action=Ovoa_Channel_Edit&claid=12&id=<?php echo $this->_tpl_vars['channeld'][$this->_sections['d']['index']]['channel_id']; ?>
&kid=<?php echo $this->_tpl_vars['kid']; ?>
&jibie=1">修改</a>&nbsp;&nbsp;&nbsp;<a onClick="del_Channel('<?php echo $this->_tpl_vars['channeld'][$this->_sections['d']['index']]['channel_id']; ?>
')" href="#">删除</a></td>
            </tr>
            <!--<table id="g_<?php echo $this->_sections['d']['index']+1; ?>
" width="100%" border="0" cellspacing="0" cellpadding="0" style="display:none;">--> 
            <?php unset($this->_sections['x']);
$this->_sections['x']['name'] = 'x';
$this->_sections['x']['loop'] = is_array($_loop=$this->_tpl_vars['channelx']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['x']['show'] = true;
$this->_sections['x']['max'] = $this->_sections['x']['loop'];
$this->_sections['x']['step'] = 1;
$this->_sections['x']['start'] = $this->_sections['x']['step'] > 0 ? 0 : $this->_sections['x']['loop']-1;
if ($this->_sections['x']['show']) {
    $this->_sections['x']['total'] = $this->_sections['x']['loop'];
    if ($this->_sections['x']['total'] == 0)
        $this->_sections['x']['show'] = false;
} else
    $this->_sections['x']['total'] = 0;
if ($this->_sections['x']['show']):

            for ($this->_sections['x']['index'] = $this->_sections['x']['start'], $this->_sections['x']['iteration'] = 1;
                 $this->_sections['x']['iteration'] <= $this->_sections['x']['total'];
                 $this->_sections['x']['index'] += $this->_sections['x']['step'], $this->_sections['x']['iteration']++):
$this->_sections['x']['rownum'] = $this->_sections['x']['iteration'];
$this->_sections['x']['index_prev'] = $this->_sections['x']['index'] - $this->_sections['x']['step'];
$this->_sections['x']['index_next'] = $this->_sections['x']['index'] + $this->_sections['x']['step'];
$this->_sections['x']['first']      = ($this->_sections['x']['iteration'] == 1);
$this->_sections['x']['last']       = ($this->_sections['x']['iteration'] == $this->_sections['x']['total']);
?>
            <?php if ($this->_tpl_vars['channelx'][$this->_sections['x']['index']]['channel_root_id'] == $this->_tpl_vars['channeld'][$this->_sections['d']['index']]['channel_id']): ?>
            <tr onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);" bgcolor="#FFFFFF" >
              <td align="center" height="33"><?php echo $this->_tpl_vars['channelx'][$this->_sections['x']['index']]['channel_id']; ?>
</td>
              <td style="padding-left:10px; text-align:left"><font style="padding-left:10px;">|--<a href="ovoa.php?action=Ovoa_Channel_Edit&claid=12&id=<?php echo $this->_tpl_vars['channelx'][$this->_sections['x']['index']]['channel_id']; ?>
&kid=<?php echo $this->_tpl_vars['kid']; ?>
&jibie=2"><?php echo $this->_tpl_vars['channelx'][$this->_sections['x']['index']]['channel_name']; ?>
</a></font>&nbsp;<a href="ovoa.php?action=Ovoa_Channel_Add&claid=11&id=<?php echo $this->_tpl_vars['channelx'][$this->_sections['x']['index']]['channel_id']; ?>
&kid=<?php echo $this->_tpl_vars['kid']; ?>
&jibie=3"><font color="#FF0000">[添加子类]</font></a></td>
              <td style="padding-left:10px; text-align:left"><?php echo $this->_tpl_vars['channelx'][$this->_sections['x']['index']]['channel_urlname']; ?>
</td>
              <td align="center"><?php echo $this->_tpl_vars['channelx'][$this->_sections['x']['index']]['channel_order']; ?>
</td>
              <td align="center"><?php echo $this->_tpl_vars['channelx'][$this->_sections['x']['index']]['jibie']; ?>
级</td>
              <td align="center"><a href="ovoa.php?action=Ovoa_Channel_Paixu&claid=13&id=<?php echo $this->_tpl_vars['channelx'][$this->_sections['x']['index']]['channel_id']; ?>
&oid=<?php echo $this->_tpl_vars['channelx'][$this->_sections['x']['index']]['channel_order']; ?>
">排序</a>&nbsp;&nbsp;&nbsp;<a href="ovoa.php?action=Ovoa_Channel_Edit&claid=12&id=<?php echo $this->_tpl_vars['channelx'][$this->_sections['x']['index']]['channel_id']; ?>
&kid=<?php echo $this->_tpl_vars['kid']; ?>
&jibie=2">修改</a>&nbsp;&nbsp;&nbsp;<a onClick="del_Channel('<?php echo $this->_tpl_vars['channelx'][$this->_sections['x']['index']]['channel_id']; ?>
')" href="#">删除</a></td>
            </tr>
            <?php unset($this->_sections['xx']);
$this->_sections['xx']['name'] = 'xx';
$this->_sections['xx']['loop'] = is_array($_loop=$this->_tpl_vars['channelxx']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['xx']['show'] = true;
$this->_sections['xx']['max'] = $this->_sections['xx']['loop'];
$this->_sections['xx']['step'] = 1;
$this->_sections['xx']['start'] = $this->_sections['xx']['step'] > 0 ? 0 : $this->_sections['xx']['loop']-1;
if ($this->_sections['xx']['show']) {
    $this->_sections['xx']['total'] = $this->_sections['xx']['loop'];
    if ($this->_sections['xx']['total'] == 0)
        $this->_sections['xx']['show'] = false;
} else
    $this->_sections['xx']['total'] = 0;
if ($this->_sections['xx']['show']):

            for ($this->_sections['xx']['index'] = $this->_sections['xx']['start'], $this->_sections['xx']['iteration'] = 1;
                 $this->_sections['xx']['iteration'] <= $this->_sections['xx']['total'];
                 $this->_sections['xx']['index'] += $this->_sections['xx']['step'], $this->_sections['xx']['iteration']++):
$this->_sections['xx']['rownum'] = $this->_sections['xx']['iteration'];
$this->_sections['xx']['index_prev'] = $this->_sections['xx']['index'] - $this->_sections['xx']['step'];
$this->_sections['xx']['index_next'] = $this->_sections['xx']['index'] + $this->_sections['xx']['step'];
$this->_sections['xx']['first']      = ($this->_sections['xx']['iteration'] == 1);
$this->_sections['xx']['last']       = ($this->_sections['xx']['iteration'] == $this->_sections['xx']['total']);
?>
            <?php if ($this->_tpl_vars['channelxx'][$this->_sections['xx']['index']]['channel_root_id'] == $this->_tpl_vars['channelx'][$this->_sections['x']['index']]['channel_id']): ?>
            <tr onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);" bgcolor="#FFFFFF">
              <td align="center" height="33"><?php echo $this->_tpl_vars['channelxx'][$this->_sections['xx']['index']]['channel_id']; ?>
</td>
              <td style="text-align:left"><font style="padding-left:40px;" >|--<a href="ovoa.php?action=Ovoa_Channel_Edit&claid=12&id=<?php echo $this->_tpl_vars['channelxx'][$this->_sections['xx']['index']]['channel_id']; ?>
&jibie=3"><?php echo $this->_tpl_vars['channelxx'][$this->_sections['xx']['index']]['channel_name']; ?>
</a></font>&nbsp;<a href="ovoa.php?action=Ovoa_Channel_Add&claid=11&id=<?php echo $this->_tpl_vars['channelxx'][$this->_sections['xx']['index']]['channel_id']; ?>
&kid=<?php echo $this->_tpl_vars['kid']; ?>
&jibie=4"><font color="#FF0000">[添加子类]</font></a></td>
              <td style="padding-left:10px; text-align:left"><?php echo $this->_tpl_vars['channelxx'][$this->_sections['xx']['index']]['channel_urlname']; ?>
</td>
              <td align="center"><?php echo $this->_tpl_vars['channelxx'][$this->_sections['xx']['index']]['channel_order']; ?>
</td>
              <td align="center"><?php echo $this->_tpl_vars['channelxx'][$this->_sections['xx']['index']]['jibie']; ?>
级</td>
              <td align="center"><a href="ovoa.php?action=Ovoa_Channel_Paixu&claid=13&id=<?php echo $this->_tpl_vars['channelxx'][$this->_sections['xx']['index']]['channel_id']; ?>
&oid=<?php echo $this->_tpl_vars['channelxx'][$this->_sections['xx']['index']]['channel_order']; ?>
">排序</a>&nbsp;&nbsp;&nbsp;<a href="ovoa.php?action=Ovoa_Channel_Edit&claid=12&id=<?php echo $this->_tpl_vars['channelxx'][$this->_sections['xx']['index']]['channel_id']; ?>
&jibie=3">修改</a>&nbsp;&nbsp;&nbsp;<a onClick="del_Channel('<?php echo $this->_tpl_vars['channelxx'][$this->_sections['xx']['index']]['channel_id']; ?>
')" href="#">删除</a></td>
            </tr>
            <?php unset($this->_sections['xxx']);
$this->_sections['xxx']['name'] = 'xxx';
$this->_sections['xxx']['loop'] = is_array($_loop=$this->_tpl_vars['channelxxx']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['xxx']['show'] = true;
$this->_sections['xxx']['max'] = $this->_sections['xxx']['loop'];
$this->_sections['xxx']['step'] = 1;
$this->_sections['xxx']['start'] = $this->_sections['xxx']['step'] > 0 ? 0 : $this->_sections['xxx']['loop']-1;
if ($this->_sections['xxx']['show']) {
    $this->_sections['xxx']['total'] = $this->_sections['xxx']['loop'];
    if ($this->_sections['xxx']['total'] == 0)
        $this->_sections['xxx']['show'] = false;
} else
    $this->_sections['xxx']['total'] = 0;
if ($this->_sections['xxx']['show']):

            for ($this->_sections['xxx']['index'] = $this->_sections['xxx']['start'], $this->_sections['xxx']['iteration'] = 1;
                 $this->_sections['xxx']['iteration'] <= $this->_sections['xxx']['total'];
                 $this->_sections['xxx']['index'] += $this->_sections['xxx']['step'], $this->_sections['xxx']['iteration']++):
$this->_sections['xxx']['rownum'] = $this->_sections['xxx']['iteration'];
$this->_sections['xxx']['index_prev'] = $this->_sections['xxx']['index'] - $this->_sections['xxx']['step'];
$this->_sections['xxx']['index_next'] = $this->_sections['xxx']['index'] + $this->_sections['xxx']['step'];
$this->_sections['xxx']['first']      = ($this->_sections['xxx']['iteration'] == 1);
$this->_sections['xxx']['last']       = ($this->_sections['xxx']['iteration'] == $this->_sections['xxx']['total']);
?>
            <?php if ($this->_tpl_vars['channelxxx'][$this->_sections['xxx']['index']]['channel_root_id'] == $this->_tpl_vars['channelxx'][$this->_sections['xx']['index']]['channel_id']): ?>
            <tr onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);" bgcolor="#FFFFFF">
              <td align="center" height="33"><?php echo $this->_tpl_vars['channelxxx'][$this->_sections['xxx']['index']]['channel_id']; ?>
</td>
              <td style="text-align:left"><font style="padding-left:80px;">|--<a href="ovoa.php?action=Ovoa_Channel_Edit&claid=12&id=<?php echo $this->_tpl_vars['channelxxx'][$this->_sections['xxx']['index']]['channel_id']; ?>
&jibie=4"><?php echo $this->_tpl_vars['channelxxx'][$this->_sections['xxx']['index']]['channel_name']; ?>
</a></font></td>
              <td style="padding-left:10px; text-align:left"><?php echo $this->_tpl_vars['channelxxx'][$this->_sections['xxx']['index']]['channel_urlname']; ?>
</td>
              <td align="center"><?php echo $this->_tpl_vars['channelxxx'][$this->_sections['xxx']['index']]['channel_order']; ?>
</td>
              <td align="center"><?php echo $this->_tpl_vars['channelxxx'][$this->_sections['xxx']['index']]['jibie']; ?>
级</td>
              <td align="center"><a href="ovoa.php?action=Ovoa_Channel_Paixu&claid=13&id=<?php echo $this->_tpl_vars['channelxxx'][$this->_sections['xxx']['index']]['channel_id']; ?>
&oid=<?php echo $this->_tpl_vars['channelxxx'][$this->_sections['xxx']['index']]['channel_order']; ?>
">排序</a>&nbsp;&nbsp;&nbsp;<a href="ovoa.php?action=Ovoa_Channel_Edit&claid=12&id=<?php echo $this->_tpl_vars['channelxxx'][$this->_sections['xxx']['index']]['channel_id']; ?>
&jibie=4">修改</a>&nbsp;&nbsp;&nbsp;<a onClick="del_Channel('<?php echo $this->_tpl_vars['channelxxx'][$this->_sections['xxx']['index']]['channel_id']; ?>
')" href="#">删除</a></td>
            </tr>
            <?php endif; ?>
            <?php endfor; endif; ?>
            <?php endif; ?>
            <?php endfor; endif; ?>
            <?php endif; ?>
            <?php endfor; endif; ?>
            <?php endfor; endif; ?>
          </table>
        </div>
      </form>
    </div>
    <!--分类管理e--> 
    <!--部门管理b-->
    <div class="contents" <?php if ($this->_tpl_vars['claid'] == 2): ?>style="display:block"<?php endif; ?>>
        <div><a href="ovoa.php?action=Ovoa_Department_New&claid=21" class="s"><img src="common/skin/1/images/add.gif" /></a></div>
        <div>
          <table width="100%" border="0" cellspacing="1" cellpadding="0" style="background:#d5dde0;" class="table_font">
            <tr style="background:url(common/skin/1/images/table_title.gif) repeat-x;">
                <td height="32" align="center">ID号</td>
                <td align="center">部门名称</td>
                <td align="center">部门经理</td>
                <td align="center">部门人数</td>
                <td align="center">部门人员列表</td>
                <td align="center">部门描述</td>
                <td align="center">操作</td>
            </tr>
          <?php $_from = $this->_tpl_vars['department_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['department_list']):
?>
     	<tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);"  height="32" >
        <td align="center"><?php echo $this->_tpl_vars['department_list']['de_id']; ?>
</td>
        <td align="center"><?php echo $this->_tpl_vars['department_list']['de_name']; ?>
</td>
        <td align="center"><?php if ($this->_tpl_vars['department_list']['managename']):  echo $this->_tpl_vars['department_list']['managename'];  else: ?><font color="#FF0000">未知</font><?php endif; ?></td>
      	<td align="center"><?php echo $this->_tpl_vars['department_list']['renno']; ?>
</td>
       	<td align="center" style="text-align:left; padding-left:10px;"><?php echo $this->_tpl_vars['department_list']['renlist']; ?>
</td>
        <td align="center" style="text-align:left; padding-left:10px;"><?php echo $this->_tpl_vars['department_list']['de_intro']; ?>
</td>
        <td align="center"><a href="ovoa.php?action=Ovoa_Department_Edit&claid=22&dpxg_id=<?php echo $this->_tpl_vars['department_list']['de_id']; ?>
">修改</a>&nbsp;&nbsp;&nbsp;<a onClick="delDepartment('<?php echo $this->_tpl_vars['department_list']['de_id']; ?>
')" href="#">删除</a></td>
       </tr>
      <?php endforeach; endif; unset($_from); ?>
            </table>
        </div>
    </div>
    <!--部门管理e--> 
    <!--部门添加b-->
    <div class="contents" <?php if ($this->_tpl_vars['claid'] == 21): ?>style="display:block"<?php endif; ?>>
        <div><form action="ovoa.php?action=Dosave_Ovoa_Department_New" method="post" name="Department_New" id="Department_New" enctype="multipart/form-data">
          <table width="100%" border="0" cellspacing="1" cellpadding="0" style="background:#d5dde0;" class="table_font">
            <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp;部门名称：</td>
              <td align="left" width="80%" >&nbsp;<INPUT class="s_sear" type=text name="de_name" id="de_name">&nbsp;<span class="xspan">*部门名称</span></td>
            </tr>
              <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp;部门人员：</td>
              <td align="left" width="80%" >&nbsp;<SELECT id="de_jingli" name="de_jingli"><OPTION selected value=0>选择人员</OPTION> <?php $_from = $this->_tpl_vars['dept_user']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dept_user']):
?><OPTION value=<?php echo $this->_tpl_vars['dept_user']['user_id']; ?>
><?php echo $this->_tpl_vars['dept_user']['user_ture_name']; ?>
(<?php echo $this->_tpl_vars['dept_user']['user_name']; ?>
)</OPTION><?php endforeach; endif; unset($_from); ?></SELECT>&nbsp;<span class="xspan">*请选择部门经理</span></td>
            </tr>

            <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp;部门描述：</td>
              <td align="left" width="80%" >&nbsp;<textarea name="de_intro" id="de_intro" class="textarea"></textarea>&nbsp;<span class="xspan">*部门描述说明</span></td>
            </tr>
            <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp;</td>
              <td align="left" width="80%" colspan="2">&nbsp;
                <INPUT class="but_add" type=submit value=" " name="Department_New_submit" id="Department_New_submit"></td>
            </tr>
          </table></form>
         </div>
    </div>
    <!--部门添加e--> 
    <!--部门修改b-->
    <div class="contents" <?php if ($this->_tpl_vars['claid'] == 22): ?>style="display:block"<?php endif; ?>>
        <div><form action="ovoa.php?action=Ovoa_Department_Edit_Dosave&claid=999&dpxg_id=<?php echo $this->_tpl_vars['dpxg_id']; ?>
" method="post" name="Department_New" id="Department_New" enctype="multipart/form-data">
          <table width="100%" border="0" cellspacing="1" cellpadding="0" style="background:#d5dde0;" class="table_font">
            <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp;部门名称：</td>
              <td align="left" width="80%" >&nbsp;<INPUT class="s_sear" type=text name="de_name" id="de_name" value="<?php echo $this->_tpl_vars['department_xg']['de_name']; ?>
">&nbsp;<span class="xspan">*部门名称</span></td>
            </tr>
              <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp;部门人员：</td>
              <td align="left" width="80%" >&nbsp;<SELECT id="de_jingli" name="de_jingli"><?php if ($this->_tpl_vars['dpt_xg_user']): ?> <?php $_from = $this->_tpl_vars['dpt_xg_user']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dpt_xg_user']):
?><OPTION value=<?php echo $this->_tpl_vars['dpt_xg_user']['user_id']; ?>
 <?php if ($this->_tpl_vars['department_xg']['de_jingli'] == $this->_tpl_vars['dpt_xg_user']['user_id']): ?> selected<?php endif; ?>><?php echo $this->_tpl_vars['dpt_xg_user']['user_ture_name']; ?>
(<?php echo $this->_tpl_vars['dpt_xg_user']['user_name']; ?>
)</OPTION><?php endforeach; endif; unset($_from);  else: ?><OPTION selected value=0>该部门下没有人员</OPTION><?php endif; ?></SELECT>&nbsp;<span class="xspan">*请选择部门经理</span></td>
            </tr>
            <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp;部门描述：</td>
              <td align="left" width="80%" >&nbsp;<textarea name="de_intro" id="de_intro" class="textarea"><?php echo $this->_tpl_vars['department_xg']['de_intro']; ?>
</textarea>&nbsp;<span class="xspan">*部门描述说明</span></td>
            </tr>
            <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp;</td>
              <td align="left" width="80%" colspan="2">&nbsp;
                <INPUT class="but_modfy" type=submit value=" " name="Department_New_submit" id="Department_New_submit"></td>
            </tr>
          </table></form>
         </div>
    </div>
    <!--部门修改e--> 
    <!--权限管理b-->
    <div class="contents" <?php if ($this->_tpl_vars['claid'] == 3): ?>style="display:block"<?php endif; ?>>
    <div><a href="ovoa.php?action=Ovoa_Quanxian_New&claid=31" class="s"><img src="common/skin/1/images/add.gif" /></a></div>
        <div> <table width="100%" border="0" cellspacing="1" cellpadding="0" style="background:#d5dde0;" class="table_font">
            <tr style="background:url(common/skin/1/images/table_title.gif) repeat-x;">
                <td height="32" align="center">ID号</td>
                <td align="center">权限名称</td>
                <td align="center">权限说明</td>
                <td align="center">操作</td>
            </tr>
          <?php $_from = $this->_tpl_vars['quanxian_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['quanxian_list']):
?>
          <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);"  height="32" >
            <td align="center"><?php echo $this->_tpl_vars['quanxian_list']['qx_id']; ?>
</td>
            <td align="center"><?php echo $this->_tpl_vars['quanxian_list']['qx_name']; ?>
</td>
            <td style="text-align:left; padding-left:10px;"><?php echo $this->_tpl_vars['quanxian_list']['qx_explain']; ?>
</td>
            <td align="center" ><a href="ovoa.php?action=Ovoa_Quanxian_DIY&diyqx_id=<?php echo $this->_tpl_vars['quanxian_list']['qx_id']; ?>
&claid=33">自定义权限</a>&nbsp;&nbsp;&nbsp;<a href="ovoa.php?action=Ovoa_Quanxian_Edit&qxxg_id=<?php echo $this->_tpl_vars['quanxian_list']['qx_id']; ?>
&claid=32">修改</a>&nbsp;&nbsp;&nbsp;<a onClick="del_quanxian('<?php echo $this->_tpl_vars['quanxian_list']['qx_id']; ?>
')" href="#">删除</a></td>
          </tr>
      <?php endforeach; endif; unset($_from); ?>
       </table>
         </div>
        </div>
    <!--权限管理e-->
    <!--权限添加b-->
    <div class="contents" <?php if ($this->_tpl_vars['claid'] == 31): ?>style="display:block"<?php endif; ?>>
    <div><form action="ovoa.php?action=Do_Ovoa_Quanxian_New&claid=999" method="post" name="Quanxian_New" id="Quanxian_New" enctype="multipart/form-data">
          <table width="100%" border="0" cellspacing="1" cellpadding="0" style="background:#d5dde0;" class="table_font">
            <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp;权限名称：</td>
              <td align="left" width="80%" >&nbsp;<INPUT class="s_sear" type=text name="qx_name" id="qx_name">&nbsp;<span class="xspan">*权限名称</span></td>
            </tr>
			<tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp;权限说明：</td>
              <td align="left" width="80%" >&nbsp;<textarea name="qx_explain" id="qx_explain" class="textarea"><?php echo $this->_tpl_vars['quanxian']['qx_explain']; ?>
</textarea>&nbsp;<span class="xspan">*权限说明</span></td>
            </tr>
			<tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp;</td>
              <td align="left" width="80%" colspan="2">&nbsp;
                <INPUT class="but_add" type=submit value=" " name="Quanxian_New_submit" id="Quanxian_New_submit"></td>
            </tr>
			</table></form>		
	</div>
    </div> 
    <!--权限添加e-->
    <!--权限修改b-->
    <div class="contents" <?php if ($this->_tpl_vars['claid'] == 32): ?>style="display:block"<?php endif; ?>>
    <div><form action="ovoa.php?action=Do_Ovoa_Quanxian_Edit&claid=999&qxxg_id=<?php echo $this->_tpl_vars['quanxian_edit_id']; ?>
" method="post" name="Quanxian_Edit" id="Quanxian_Edit" enctype="multipart/form-data">
          <table width="100%" border="0" cellspacing="1" cellpadding="0" style="background:#d5dde0;" class="table_font">
            <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp;权限名称：</td>
              <td align="left" width="80%" >&nbsp;<INPUT class="s_sear" type=text name="qx_name" id="qx_name" value="<?php echo $this->_tpl_vars['quanxian_edit']['qx_name']; ?>
">&nbsp;<span class="xspan">*权限名称</span></td>
            </tr>
			<tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp;权限说明：</td>
              <td align="left" width="80%" >&nbsp;<textarea name="qx_explain" id="qx_explain" class="textarea"><?php echo $this->_tpl_vars['quanxian_edit']['qx_explain']; ?>
</textarea>&nbsp;<span class="xspan">*权限说明</span></td>
            </tr>
			<tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp;</td>
              <td align="left" width="80%" colspan="2">&nbsp;
                <INPUT class="but_modfy" type=submit value=" " name="Quanxian_New_submit" id="Quanxian_New_submit"></td>
            </tr>
			</table></form>
	</div>
	</div> 
    <!--权限修改e-->
	<!--自定义权限修改b-->
    <div class="contents" <?php if ($this->_tpl_vars['claid'] == 33): ?>style="display:block"<?php endif; ?>>
    <div></div>
	 </div>
	<!--自定义权限修改e-->
    <!--栏目添加b-->
    <div class="contents" <?php if ($this->_tpl_vars['claid'] == 11): ?>style="display:block"<?php endif; ?>>
      <div>
        <form action="ovoa.php?action=Do_Ovoa_Channel" method="post" name="rstform_lm" id="rstform_lm" enctype="multipart/form-data">
          <table width="100%" border="0" cellspacing="1" cellpadding="0" style="background:#d5dde0;" class="table_font">
            <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp;所属大分类：</td>
              <td align="left" width="80%" >&nbsp;
                <SELECT id="channel_root_id" name="channel_root_id">
                  <OPTION selected value=0>所属分类</OPTION><?php $_from = $this->_tpl_vars['channel']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['channel']):
?>
                  <OPTION value=<?php echo $this->_tpl_vars['channel']['channel_id']; ?>
 <?php if ($this->_tpl_vars['channel_top_id'] == $this->_tpl_vars['channel']['channel_id']): ?> selected <?php endif; ?>><?php echo $this->_tpl_vars['channel']['channel_name']; ?>
</OPTION>
            <?php endforeach; endif; unset($_from); ?></SELECT>
                &nbsp;<span class="xspan">*所属大分类</span></td>
            </tr>
            <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp;子分类名称：</td>
              <INPUT class=text type=hidden name="jibie" id="jibie" value="<?php echo $this->_tpl_vars['jibie']; ?>
">
              <td align="left" width="80%" >&nbsp;
                <INPUT class="s_sear" type=text name="channel_name" id="channel_name">
                &nbsp;<span class="xspan">*子分类名称</span></td>
            </tr>
            <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp;传值参数名：</td>
              <td align="left" width="80%" >&nbsp;
                <INPUT class="u_input320" type=text name="channel_ename" id="channel_ename">&nbsp;<span class="xspan">*参数只能为字母，数字，下划线</span></td>
            </tr>
            <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp;子分类链接：</td>
              <td align="left" width="80%" >&nbsp; <INPUT class="u_input320" type=text name="channel_urlname" id="channel_urlname" value="<?php echo $this->_tpl_vars['channel']['channel_urlname']; ?>
">&nbsp;<span class="xspan">*子分类链接</span></td>
            </tr>
            <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp;子分类模板：</td>
              <td align="left" width="80%" >&nbsp; <INPUT class="u_input320" type=text name="mbname" id="mbname" value="<?php echo $this->_tpl_vars['channel']['mbname']; ?>
">&nbsp;<span class="xspan">*子分类模板</span></td>
            </tr>
            <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp;分类排序ID：</td>
              <td align="left" width="80%" >&nbsp; <INPUT class="u_input80"  type=text name="channel_order" id="channel_order" value="<?php echo $this->_tpl_vars['num']; ?>
"> &nbsp;<span class="xspan">*按数字大小顺序排序</span>&nbsp;<input type="checkbox" name="channel_istop" id="channel_istop"  value="1" > 在顶部导航显示 <input type="checkbox" name="isdesk" id="isdesk"  value="1"> 在我的工作台显示</td>
            </tr>
            <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp;数据统计参数：</td>
              <td align="left" width="80%" >&nbsp; <INPUT class="u_input600" type=text name="tjchar" id="tjchar" value="">&nbsp;<span class="xspan">*（表名，主键名，条件语句）</span></td>
            </tr>
            <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp;工作台图标：</td>
              <td align="left" width="80%" ><table>
                  <tr>
                    <td>&nbsp;
                      <INPUT type=text name="channel_ico" id="channel_ico" class="u_input320" value="<?php echo $this->_tpl_vars['user']['user_photo']; ?>
" ></td>
                    <td><iframe name="file_upload" src="upload.php?action=new_ovoafile&isReturn=true&dizhi=channel_ico&rstform=rstform_lm" scrolling="no" frameborder="0" id="upload_file_iframe" style="height:28px; padding-top:0px;"></iframe></td>
                  </tr>
                </table></td>
            </tr>
            <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp;子分类简介：</td>
              <td align="left" width="80%" >&nbsp;
                <textarea class="textarea" name="intro_meo" id="intro_meo" style="width:600px; height:400px;"></textarea></td>
            </tr>
            <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp;</td>
              <td align="left" width="80%" colspan="2">&nbsp;
                <INPUT class="but_add" type=submit value=" " name="channel_add_submit" id="channel_add_submit"></td>
            </tr>
          </table>
        </form>
      </div>
    </div>
    <!--栏目添加e-->
    <!--栏目修改b-->
    <div class="contents" <?php if ($this->_tpl_vars['claid'] == 12): ?>style="display:block"<?php endif; ?>>
      <div>
        <form action="ovoa.php?action=Do_Ovoa_Channel_Edit&Channel_xg_id=<?php echo $this->_tpl_vars['Channel_xgid']; ?>
" method="post" name="rstform_lmxg" id="rstform_lmxg" enctype="multipart/form-data">
          <table width="100%" border="0" cellspacing="1" cellpadding="0" style="background:#d5dde0;" class="table_font">
            <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp;所属大分类：</td>
              <td align="left" width="80%" >&nbsp;
                <SELECT id="channel_root_id" name="channel_root_id"><OPTION selected value=0>所属分类</OPTION><?php unset($this->_sections['d']);
$this->_sections['d']['name'] = 'd';
$this->_sections['d']['loop'] = is_array($_loop=$this->_tpl_vars['xg_channel']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['d']['show'] = true;
$this->_sections['d']['max'] = $this->_sections['d']['loop'];
$this->_sections['d']['step'] = 1;
$this->_sections['d']['start'] = $this->_sections['d']['step'] > 0 ? 0 : $this->_sections['d']['loop']-1;
if ($this->_sections['d']['show']) {
    $this->_sections['d']['total'] = $this->_sections['d']['loop'];
    if ($this->_sections['d']['total'] == 0)
        $this->_sections['d']['show'] = false;
} else
    $this->_sections['d']['total'] = 0;
if ($this->_sections['d']['show']):

            for ($this->_sections['d']['index'] = $this->_sections['d']['start'], $this->_sections['d']['iteration'] = 1;
                 $this->_sections['d']['iteration'] <= $this->_sections['d']['total'];
                 $this->_sections['d']['index'] += $this->_sections['d']['step'], $this->_sections['d']['iteration']++):
$this->_sections['d']['rownum'] = $this->_sections['d']['iteration'];
$this->_sections['d']['index_prev'] = $this->_sections['d']['index'] - $this->_sections['d']['step'];
$this->_sections['d']['index_next'] = $this->_sections['d']['index'] + $this->_sections['d']['step'];
$this->_sections['d']['first']      = ($this->_sections['d']['iteration'] == 1);
$this->_sections['d']['last']       = ($this->_sections['d']['iteration'] == $this->_sections['d']['total']);
?><OPTION value=<?php echo $this->_tpl_vars['xg_channel'][$this->_sections['d']['index']]['channel_id']; ?>
 <?php if ($this->_tpl_vars['xg_channel'][$this->_sections['d']['index']]['channel_id'] == $this->_tpl_vars['xg_set_channel']['channel_root_id']): ?> selected <?php endif; ?>><?php echo $this->_tpl_vars['xg_channel'][$this->_sections['d']['index']]['channel_name']; ?>
</OPTION>
             <?php unset($this->_sections['x']);
$this->_sections['x']['name'] = 'x';
$this->_sections['x']['loop'] = is_array($_loop=$this->_tpl_vars['xg_channel2']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['x']['show'] = true;
$this->_sections['x']['max'] = $this->_sections['x']['loop'];
$this->_sections['x']['step'] = 1;
$this->_sections['x']['start'] = $this->_sections['x']['step'] > 0 ? 0 : $this->_sections['x']['loop']-1;
if ($this->_sections['x']['show']) {
    $this->_sections['x']['total'] = $this->_sections['x']['loop'];
    if ($this->_sections['x']['total'] == 0)
        $this->_sections['x']['show'] = false;
} else
    $this->_sections['x']['total'] = 0;
if ($this->_sections['x']['show']):

            for ($this->_sections['x']['index'] = $this->_sections['x']['start'], $this->_sections['x']['iteration'] = 1;
                 $this->_sections['x']['iteration'] <= $this->_sections['x']['total'];
                 $this->_sections['x']['index'] += $this->_sections['x']['step'], $this->_sections['x']['iteration']++):
$this->_sections['x']['rownum'] = $this->_sections['x']['iteration'];
$this->_sections['x']['index_prev'] = $this->_sections['x']['index'] - $this->_sections['x']['step'];
$this->_sections['x']['index_next'] = $this->_sections['x']['index'] + $this->_sections['x']['step'];
$this->_sections['x']['first']      = ($this->_sections['x']['iteration'] == 1);
$this->_sections['x']['last']       = ($this->_sections['x']['iteration'] == $this->_sections['x']['total']);
 if ($this->_tpl_vars['xg_channel2'][$this->_sections['x']['index']]['channel_root_id'] == $this->_tpl_vars['xg_channel'][$this->_sections['d']['index']]['channel_id']): ?> <OPTION value=<?php echo $this->_tpl_vars['xg_channel2'][$this->_sections['x']['index']]['channel_id']; ?>
 <?php if ($this->_tpl_vars['xg_channel2'][$this->_sections['x']['index']]['channel_id'] == $this->_tpl_vars['xg_set_channel']['channel_root_id']): ?> selected <?php endif; ?>>&nbsp;&nbsp;&nbsp;&nbsp;|--<?php echo $this->_tpl_vars['xg_channel2'][$this->_sections['x']['index']]['channel_name']; ?>
</OPTION>
                 <?php unset($this->_sections['xx']);
$this->_sections['xx']['name'] = 'xx';
$this->_sections['xx']['loop'] = is_array($_loop=$this->_tpl_vars['xg_channel3']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['xx']['show'] = true;
$this->_sections['xx']['max'] = $this->_sections['xx']['loop'];
$this->_sections['xx']['step'] = 1;
$this->_sections['xx']['start'] = $this->_sections['xx']['step'] > 0 ? 0 : $this->_sections['xx']['loop']-1;
if ($this->_sections['xx']['show']) {
    $this->_sections['xx']['total'] = $this->_sections['xx']['loop'];
    if ($this->_sections['xx']['total'] == 0)
        $this->_sections['xx']['show'] = false;
} else
    $this->_sections['xx']['total'] = 0;
if ($this->_sections['xx']['show']):

            for ($this->_sections['xx']['index'] = $this->_sections['xx']['start'], $this->_sections['xx']['iteration'] = 1;
                 $this->_sections['xx']['iteration'] <= $this->_sections['xx']['total'];
                 $this->_sections['xx']['index'] += $this->_sections['xx']['step'], $this->_sections['xx']['iteration']++):
$this->_sections['xx']['rownum'] = $this->_sections['xx']['iteration'];
$this->_sections['xx']['index_prev'] = $this->_sections['xx']['index'] - $this->_sections['xx']['step'];
$this->_sections['xx']['index_next'] = $this->_sections['xx']['index'] + $this->_sections['xx']['step'];
$this->_sections['xx']['first']      = ($this->_sections['xx']['iteration'] == 1);
$this->_sections['xx']['last']       = ($this->_sections['xx']['iteration'] == $this->_sections['xx']['total']);
 if ($this->_tpl_vars['xg_channel3'][$this->_sections['xx']['index']]['channel_root_id'] == $this->_tpl_vars['xg_channel2'][$this->_sections['x']['index']]['channel_id']): ?><OPTION value=<?php echo $this->_tpl_vars['xg_channel3'][$this->_sections['xx']['index']]['channel_id']; ?>
 <?php if ($this->_tpl_vars['xg_channel3'][$this->_sections['xx']['index']]['channel_id'] == $this->_tpl_vars['xg_set_channel']['channel_root_id']): ?> selected <?php endif; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|--<?php echo $this->_tpl_vars['xg_channel3'][$this->_sections['xx']['index']]['channel_name']; ?>
</OPTION>
                  <?php endif; ?> <?php endfor; endif; ?> <?php endif;  endfor; endif;  endfor; endif; ?> </SELECT>
                &nbsp;<span class="xspan">*所属大分类</span></td>
            </tr>
            <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp;子分类名称：</td>
             <INPUT class=text type=hidden name="channel_kid" id="channel_kid" value="<?php echo $this->_tpl_vars['channel_kid']; ?>
">
       		 <INPUT class=text type=hidden name="jibie" id="jibie" value="<?php echo $this->_tpl_vars['jibie']; ?>
">
              <td align="left" width="80%" >&nbsp;
                <INPUT class="s_sear" type=text name="channel_name" id="channel_name" value="<?php echo $this->_tpl_vars['xg_set_channel']['channel_name']; ?>
">
                &nbsp;<span class="xspan">*子分类名称</span></td>
            </tr>
            <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp;传值参数名：</td>
              <td align="left" width="80%" >&nbsp;
                <INPUT class="u_input320" type=text name="channel_ename" id="channel_ename" value="<?php echo $this->_tpl_vars['xg_set_channel']['channel_ename']; ?>
">
                &nbsp;<span class="xspan">*参数只能为字母，数字，下划线</span></td>
            </tr>
            <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp;子分类链接：</td>
              <td align="left" width="80%" >&nbsp;
                <INPUT class="u_input320" type=text name="channel_urlname" id="channel_urlname" value="<?php echo $this->_tpl_vars['xg_set_channel']['channel_urlname']; ?>
">
                &nbsp;<span class="xspan">*
                <input type="checkbox" name="qingyong" id="qingyong"  value="1" <?php if ($this->_tpl_vars['xg_set_channel']['channel_urlok']): ?> checked<?php endif; ?>>
                是否启用转向链接</span></td>
            </tr>
            <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp;子分类模板：</td>
              <td align="left" width="80%" >&nbsp;
                <INPUT class="u_input320" type=text name="mbname" id="mbname" value="<?php echo $this->_tpl_vars['xg_set_channel']['mbname']; ?>
">
                &nbsp;<span class="xspan">*子分类模板</span></td>
            </tr>
            <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp;分类排序ID：</td>
              <td align="left" width="80%" >&nbsp; <INPUT class="u_input80"  type=text name="channel_order" id="channel_order" value="<?php echo $this->_tpl_vars['xg_set_channel']['channel_order']; ?>
">&nbsp;<span class="xspan">*按数字大小顺序排序</span>&nbsp;<input type="checkbox" name="channel_istop" id="channel_istop"  value="1" <?php if ($this->_tpl_vars['xg_set_channel']['channel_istop']): ?> checked<?php endif; ?>> 在顶部导航显示 <input type="checkbox" name="isdesk" id="isdesk"  value="1" <?php if ($this->_tpl_vars['xg_set_channel']['isdesk']): ?> checked<?php endif; ?>> 在我的工作台显示</td>
            </tr>
            <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp;数据统计参数：</td>
              <td align="left" width="80%" >&nbsp;
                <INPUT class="u_input600"  type=text name="tjchar" id="tjchar" value="<?php echo $this->_tpl_vars['xg_set_channel']['tjchar']; ?>
">
                &nbsp;<span class="xspan">*（表名，主键名，条件语句）</span></td>
            </tr>
            <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp;工作台图标：</td>
              <td align="left" width="80%" ><table>
                  <tr>
                    <td>&nbsp;
                      <INPUT type=text name="channel_ico" id="channel_ico" class="u_input320" value="<?php echo $this->_tpl_vars['xg_set_channel']['channel_ico']; ?>
" ></td>
                    <td><iframe name="file_upload" src="upload.php?action=new_ovoafile&isReturn=true&dizhi=channel_ico&rstform=rstform_lmxg" scrolling="no" frameborder="0" id="upload_file_iframe" style="height:28px; padding-top:0px;"></iframe></td>
                  </tr>
                </table></td>
            </tr>
            <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp;子分类简介：</td>
              <td align="left" width="80%" >&nbsp;
                <textarea class="textarea" name="intro_meo" id="intro_meo" style="width:600px; height:400px;"><?php echo $this->_tpl_vars['xg_set_channel']['intro_meo']; ?>
</textarea></td>
            </tr>
            <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp;</td>
              <td align="left" width="80%" colspan="2">&nbsp;
                <INPUT class="but_modfy" type=submit value=" " name="channel_add_submit" id="channel_add_submit"></td>
            </tr>
          </table>
        </form>
      </div>
    </div>
    <!--栏目修改e--> 
    <!--栏目排序b--> 
     <div class="contents" <?php if ($this->_tpl_vars['claid'] == 13): ?>style="display:block"<?php endif; ?>>
      <div>
        <form action="ovoa.php?action=Ovoa_Channel_Paixu_Do&pxid=<?php echo $this->_tpl_vars['Ovoa_Channel_Paixu_id']; ?>
" method="post" name="rstform_paxu" id="rstform_paxu" enctype="multipart/form-data">
          <table width="100%" border="0" cellspacing="1" cellpadding="0" style="background:#d5dde0;" class="table_font">
            <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp;排序数字：</td>
              <td align="left" width="80%" >&nbsp;<INPUT name="neworder"  type=text class="u_input80" id="neworder" value="<?php echo $this->_tpl_vars['oid']; ?>
" size="4"> &nbsp;<span class="xspan">*按数字顺序排序</span></td>
            </tr>
              <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
              <td height="32" align="center" width="10%">&nbsp;</td>
              <td align="left" width="80%" colspan="2">&nbsp;
                <INPUT class="but_modfy" type=submit value=" " name="channel_paixu_submit" id="channel_paixu_submit"></td>
            </tr>
		</table></form>
        </div></div>
    <!--栏目排序e--> 
	<!--基础数据b-->
    <div class="contents" <?php if ($this->_tpl_vars['claid'] == 4): ?>style="display:block"<?php endif; ?>>
      <div>
	  </div>
	</div>
	<!--基础数据b-->
  </div>
</div>
</body>
</html>