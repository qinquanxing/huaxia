<?php /* Smarty version 2.6.14, created on 2015-05-19 14:31:35
         compiled from user/user_list.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "ovov_sys/ovoa_header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script language="javascript" type="text/javascript">
	function listBgOver(obj){
		obj.style.background="#E8F4FF";
	}
	function listBgOut(obj){
		obj.style.background="#FFFFFF";
	}
function del(id){
	//alert(id);
	if(confirm('确定删除此用户？')){
		location.href = 'user.php?action=do_del&id='+id;
	}
}
function checkAll(){
	for (var p=0;p<document.forms[2].elements.length;p++){
		var m = document.forms[2].elements[p];
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
	for (var i = 0 ; i<document.forms[2].elements.length ; i++){
		if(document.forms[2].elements[i].checked !=""){
			if(i<(document.forms[2].elements.length)){
				string = string + document.forms[2].elements[i].value+",";
			}else{
				string = string + document.forms[2].elements[i].value;
			}
		}
	}
	if(string == ""){
		//alert("请选择内容！");
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

</script>
<script language="javascript" type="text/javascript" src="common/rili/WdatePicker.js"></script>
<script type="text/javascript"> 
	jQuery(function($) {
		//标题不能为空
		$("#user_name").focus();
		$("#user_name").blur(function() {
			aa();
		});
		//添加用户提交
		$("#usr_addsubmit").click(function() {
				if(aa()==false) {
					//alert("用户登录名不能为空！");
					art.dialog({
                    time: 2,
                    lock: true,
                    icon: 'error',
                    content: '用户登录名不能为空'
               		});
					return false;
				}
				//考勤号码是否为空
				if($("#kqid").val()==''){
					$("#kqid").focus();
					//$("#kqid").attr("style","border:#F00 solid 1px;");
					$("#kqid").addClass("s_sear_red");
					art.dialog({
                    time: 2,
                    lock: true,
                    icon: 'error',
                    content: '考勤号码不能为空'
               		});
					return false;
				}
				//输入密码是否为空
				if($("#user_password1").val()==''){
					$("#user_password1").focus();
					//$("#user_password1").attr("style","border:#F00 solid 1px;");
					$("#user_password1").addClass("s_sear_red");
					//alert("密码不能为空");
					art.dialog({
                    time: 2,
                    lock: true,
                    icon: 'error',
                    content: '密码不能为空'
               		});
					return false;
				}
				//确认输入密码是否为空
				if($("#user_password2").val()==''){
					$("#user_password2").focus();
					//$("#user_password2").attr("style","border:#F00 solid 1px;");
					$("#user_password2").addClass("s_sear_red");
					//alert("确认密码不能为空");
					art.dialog({
                    time: 2,
                    lock: true,
                    icon: 'error',
                    content: '确认密码不能为空'
               		});
					return false;
				}
				//两次输入密码是否一致
				if($("#user_password1").val()!=$("#user_password2").val()){
					$("#user_password1").focus();
					//$("#user_password1").attr("style","border:#F00 solid 1px;");
					$("#user_password1").addClass("s_sear_red");
					//alert("两次输入密码不一致！");
					art.dialog({
                    time: 2,
                    lock: true,
                    icon: 'error',
                    content: '两次输入密码不一致'
               		});
					return false;
				}
				//真实姓名不能为空
				if($("#user_ture_name").val()==''){
					$("#user_ture_name").focus();
					//$("#user_ture_name").attr("style","border:#F00 solid 1px;");
					$("#user_ture_name").addClass("s_sear_red");
					//alert("真实姓名不能为空");
					art.dialog({
                    time: 2,
                    lock: true,
                    icon: 'error',
                    content: '真实姓名不能为空'
               		});
					return false;
				}
				//职位名称不能为空
					if($("#user_position").val()==''){
					$("#user_position").focus();
					//$("#user_position").attr("style","border:#F00 solid 1px;");
					$("#user_position").addClass("s_sear_red");
					//alert("职位名称不能为空");
					art.dialog({
                    time: 2,
                    lock: true,
                    icon: 'error',
                    content: '职位名称不能为空'
               		});

					return false;
				}

			});
			//用户设置提交
				$("#user_set_submit").click(function() {
				
				if($("#user_ture_name1").val()=='') {
					art.dialog({
                    time: 2,
                    lock: true,
                    icon: 'error',
                    content: '真实姓名不能为空!'
               		});
					$("#user_ture_name1").focus();
					return false;
				}

				//现住址不能为空
				if($("#contact_add1").val()==''){
					$("#contact_add1").focus();
					$("#contact_add1").addClass("s_sear_red");
					art.dialog({
                    time: 2,
                    lock: true,
                    icon: 'error',
                    content: '现住址不能为空'
               		});

					return false;
				}
				//联系电话不能为空
					if($("#user_phone1").val()==''){
					$("#user_phone1").focus();
					$("#user_phone1").addClass("s_sear_red");
					art.dialog({
                    time: 2,
                    lock: true,
                    icon: 'error',
                    content: '联系电话不能为空'
               		});

					return false;
				}

			});

			//修改密码提交
		$("#modifypass_submit").click(function() {
				if($("#pwd_old").val()=='') {
					//alert("原始密码不能为空！");
					art.dialog({
                    time: 2,
                    lock: true,
                    icon: 'error',
                    content: '原始密码不能为空'
               		});
					$("#pwd_old").focus();
					$("#pwd_old").addClass("s_sear_red");
					return false;
				}
				
				//新密码是否为空
				if($("#pwd").val()==''){
					$("#pwd_old").addClass("s_sear");
					$("#pwd").addClass("s_sear_red");
					//alert("新密码不能为空");
					art.dialog({
                    time: 2,
                    lock: true,
                    icon: 'error',
                    content: '新密码不能为空'
               		});
					$("#pwd").focus();
					return false;
				}

 				//确认新密码是否为空
				if($("#pwd_ack").val()==''){
					$("#pwd").addClass("s_sear_red");
					$("#pwd_ack").addClass("s_sear_red");
					//alert("确认新密码不能为空");
					art.dialog({
                    time: 2,
                    lock: true,
                    icon: 'error',
                    content: '确认新密码不能为空'
               		});			
					$("#pwd_ack").focus();		
					return false;
				}
				// 两次输入新密码是否一致
				if($("#pwd").val()!=$("#pwd_ack").val()){
					$("#pwd").addClass("s_sear_red");
					$("#pwd_ack").addClass("s_sear_red");
					//alert("两次输入新密码不一致");
					art.dialog({
                    time: 2,
                    lock: true,
                    icon: 'error',
                    content: '两次输入新密码不一致!'
               		});	
					$("#pwd").focus();
					return false;
				}
				//原始密码验证b
				if($("#pwd_old").val()!=''){
				var bol=false;
				 $.ajax({
                type:'post',
                async:false,
                url:'checkCode.php?action=pwd',
                data:'code='+$("#pwd_old").val(),
				success:function(responseData){  
         			var Result = eval('('+responseData+')');  
           			 if(Result.verifycode=='Y'){bol=true;}
            		else {bol=false;$("#pwd_old").focus();
					$("#pwd_old").addClass("s_sear_red");
					//alert("原始密码不正确");
					art.dialog({
                    time: 2,
                    lock: true,
                    icon: 'error',
                    content: '原始密码不正确!'
               		});	
					}  
           			}
         		});
         		return bol;
				}
				//原始密码验证e
				
			});
		
		});
		
function aa(){
			if($("#user_name").val()==''){
				//$("#user_name").attr("style","border:#F00 solid 1px;");
				$("#user_name").addClass("s_sear_red");
				//alert("用户名不能为空");
				return false;
			}else{
				$("#user_name").attr("style","");
				return true;
			}	
}
</script>
<body>
<div class="main">
  <div class="main_title"><strong>用户管理</strong><span></span>
    <p></p>
  </div>
  <div class="main_content">
    <div class="sub_title">
      <ul><?php if ($this->_tpl_vars['qxid'] == 1): ?>
        <li <?php if ($this->_tpl_vars['claid'] == 0): ?>class="tab_on"<?php endif; ?>><a href="user.php?action=add_user&claid=0"><span>添加用户</span></a></li>
        <li <?php if ($this->_tpl_vars['claid'] == 1): ?>class="tab_on"<?php endif; ?>><a href="user.php?action=userlist&claid=1"><span>用户管理</span></a></li><?php endif; ?>
        <li <?php if ($this->_tpl_vars['claid'] == 2): ?>class="tab_on"<?php endif; ?>><a href="user.php?action=user_set&claid=2"><span>个人设置</span></a></li>
        <li <?php if ($this->_tpl_vars['claid'] == 3): ?>class="tab_on"<?php endif; ?>><a href="user.php?action=user_modifypass&claid=3"><span>修改密码</span></a></li>
        <li <?php if ($this->_tpl_vars['claid'] == 4): ?>class="tab_on"<?php endif; ?>><a href="user.php?action=user_online&claid=4"><span>在线人数</span></a></li>
      </ul>
      <div class="search"><form action="user.php?action=chaxun&claid=1" method="post" id="chaxun" name="chaxun" >
        <p><input name="username" id="username"  type="text" value="<?php echo $this->_tpl_vars['user_sqlname']; ?>
" /></p>
        <span><INPUT class="but_sql" type=submit value=" " name="usr_sql_submit" id="usr_sql_submit"></span></form>
      </div>
    </div>
  <!--添加用户b-->
  <div class="contents" <?php if ($this->_tpl_vars['claid'] == 0): ?>style="display:block"<?php endif; ?>>
    <div><form action="user.php?action=do_add_user" method="post" name="user_add" id="user_add" enctype="multipart/form-data">
        <table width="100%" border="0" cellspacing="1" cellpadding="0" style="background:#d5dde0;" class="table_font">

 			<tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">          
		   <td height="32" align="center" width="10%">&nbsp;用 户 名：</td>
            <td align="left" width="90%" >&nbsp;<INPUT class="s_sear" type=text name="user_name" id="user_name">&nbsp;<span class="xspan">*系统登录的用户名</span></td>
			</tr>
			<tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">          
			<td height="32" align="center" width="10%">&nbsp;用户密码：</td>
			<td align="left" width="90%" >&nbsp;<INPUT class="s_sear"  type="password" name="user_password1" id="user_password1">&nbsp;<span class="xspan">*系统登录的密码</span></td>
			</tr>
			<tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">          
			<td height="32" align="center" width="10%">&nbsp;确认密码：</td>
			<td align="left" width="90%" >&nbsp;<INPUT class="s_sear"  type="password" name="user_password2"id="user_password2">&nbsp;<span class="xspan">*再次输入密码</span></td>
			</tr>
			<tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">          
			<td height="32" align="center" width="10%">&nbsp;真实姓名：</td>
			<td align="left" width="90%" >&nbsp;<INPUT class="s_sear" type=text name="user_ture_name" id="user_ture_name">&nbsp;<span class="xspan">*真实姓名不能为空</span></td>
			</tr>
			<tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">          
			<td height="32" align="center" width="10%">&nbsp;用户权限：</td>
			<td align="left" width="90%" >&nbsp;<select id="user_quanxian" name="user_quanxian" >
										<?php $_from = $this->_tpl_vars['quanxian']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['quanxian']):
?>
										<option value="<?php echo $this->_tpl_vars['quanxian']['qx_id']; ?>
"><?php echo $this->_tpl_vars['quanxian']['qx_name']; ?>
</option>
										<?php endforeach; endif; unset($_from); ?>
										</select>&nbsp;<span class="xspan">*用户的使用权限</span></td>
			</tr>
			<tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">          
			<td height="32" align="center" width="10%">&nbsp;所在部门：</td>
			<td align="left" width="90%" >&nbsp;<select id="user_right" name="user_right" >
										<?php $_from = $this->_tpl_vars['department']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['department']):
?>
										<option value="<?php echo $this->_tpl_vars['department']['de_id']; ?>
"><?php echo $this->_tpl_vars['department']['de_name']; ?>
</option>
										<?php endforeach; endif; unset($_from); ?>
										</select>&nbsp;<span class="xspan">*所在部门</span></td>
			</tr>
			<tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">          
			<td height="32" align="center" width="10%">&nbsp;性　　别：</td>
			<td align="left" width="90%" >&nbsp;<label><input name="user_sex" type="radio" id="user_sex" value="男" checked> 男</label><label><input type="radio" name="user_sex" id="user_sex" value="女"> 女</label>&nbsp;</td>
			</tr>
			<tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">          
			<td height="32" align="center" width="10%">&nbsp;联系手机：</td>
			<td align="left" width="90%" >&nbsp;<INPUT class="s_sear" type=text name="user_phone" id="user_phone"></td>
			</tr>
			<tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">          
			<td height="32" align="center" width="10%">&nbsp;常 用 QQ：</td>
			<td align="left" width="90%" >&nbsp;<INPUT class="s_sear" type=text name="user_qq" id="user_qq"></td>
			</tr>
			<tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">          
			<td height="32" align="center" width="10%">&nbsp;常用邮箱：</td>
			<td align="left" width="90%" >&nbsp;<INPUT class="s_sear" type=text name="user_email" id="user_email" value=""></td>
			</tr>
			<tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">          
			<td height="150" align="center" width="10%">&nbsp;用户备注：</td>
			<td align="left" width="90%" >&nbsp;<textarea class="texaare" name="user_remarks" id="user_remarks"></textarea></td>
			</tr>
			<tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">   
			<td height="32" align="center" width="10%">&nbsp;</td>     
			<td align="left" width="90%" colspan="2">&nbsp;<INPUT class="but_add" type=submit value=" " name="usr_addsubmit" id="usr_addsubmit"></td>
			</tr>
		  </table>
		  </form>
	  </div>
  </div>
   <!--添加用户e-->
   <!--用户管理b-->
      <div class="contents" <?php if ($this->_tpl_vars['claid'] == 1): ?>style="display:block"<?php endif; ?>>
	  <form name="usernamelist">
      <div>  <a href="user.php?action=add_user&claid=0" class="s"><img src="common/skin/1/images/add.gif" /></a></div>
      <div>
        <table width="100%" border="0" cellspacing="1" cellpadding="0" style="background:#d5dde0;" class="table_font">
          <tr style="background:url(common/skin/1/images/table_title.gif) repeat-x;">
            <td height="32" align="center"><span>选择</span></td>
            <td align="center" ><span>用户名</span></td>
            <td align="center" ><span>真实姓名</span></td>
            <td align="center" ><span>性    别</span></td>
            <td align="center" ><span>所属部门</span></td>
            <td align="center" ><span>在线状态</span></td>
			<td align="center" >最后登录时间</td>
			<td align="center" >最后登录IP</td>
            <td align="center" ><span>用户权限</span></td>
            <td align="center" ><span>操作</span></td>
          </tr>
          <?php $_from = $this->_tpl_vars['users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['users']):
?>
          <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
            <td height="28" align="center" ><input type="checkbox" name="nid" value="<?php echo $this->_tpl_vars['users']['user_id']; ?>
"> <?php echo $this->_tpl_vars['users']['user_id']; ?>
 <label for="checkbox"></label></td>
            <td align="center" ><?php echo $this->_tpl_vars['users']['user_name']; ?>
</td>
            <td align="center" ><?php echo $this->_tpl_vars['users']['user_ture_name']; ?>
</td>
            <td align="center" ><?php echo $this->_tpl_vars['users']['user_sex']; ?>
</td>
            <td align="center" ><?php echo $this->_tpl_vars['users']['de_name']; ?>
</td>
            <td align="center" ><?php if ($this->_tpl_vars['users']['onlineok']): ?><font color="#006600">当前在线</font><?php else: ?><font color="#CCCCCC">离线</font><?php endif; ?></td>
			<td align="center" ><?php echo $this->_tpl_vars['users']['user_lastsj']; ?>
</td>
			<td align="center" ><?php echo $this->_tpl_vars['users']['user_lastip']; ?>
</td>
            <td align="center" ><?php echo $this->_tpl_vars['users']['qx_name']; ?>
</td>
            <td align="center" ><a href="user.php?action=user_add_quanxian&id=<?php echo $this->_tpl_vars['users']['user_id']; ?>
" class="cz_btn">设置权限</a>&nbsp;&nbsp;&nbsp;<a href="user.php?action=set_user&id=<?php echo $this->_tpl_vars['users']['user_id']; ?>
" class="cz_btn">修改</a>&nbsp;&nbsp;&nbsp;<a onClick="del('<?php echo $this->_tpl_vars['users']['user_id']; ?>
')" href="#" class="cz_btn">删除</a></td>
          </tr>
          <?php endforeach; endif; unset($_from); ?>
        </table>
      </div>
     </form>
    <div class="page">
     <!-- <input name="" type="text" /><a href="#">跳转</a>--><span>第<?php echo $this->_tpl_vars['page_now']; ?>
页/共<?php echo $this->_tpl_vars['page_num']; ?>
页，共<?php echo $this->_tpl_vars['total']; ?>
条</span> <?php echo $this->_tpl_vars['pagelist']; ?>
</div>
	  <?php if ($this->_tpl_vars['qx_id'] == 1): ?>
      <div> <a href="#" class="tabel_btn" onClick="checkAll();"><span></span>全选</a>&nbsp;&nbsp; <a href="#" class="tabel_btn" onClick="delAll();" ><span></span>批量删除</a>&nbsp;&nbsp; </div><?php endif; ?>
	   </div>
   <!--用户管理e-->
   <!--个人设置b-->
  <div class="contents" <?php if ($this->_tpl_vars['claid'] == 2): ?>style="display:block"<?php endif; ?>>
    <form action="user.php?action=do_user_set&id=<?php echo $this->_tpl_vars['user']['user_id']; ?>
" method="post" enctype="multipart/form-data" name="user_set" id="user_set">
     <div>
	  <table width="100%" border="0" cellspacing="1" cellpadding="0" style="background:#d5dde0;" class="table_font">
 		 <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">          
		   <td height="32" align="center" width="10%">&nbsp;真实姓名：</td><input type="hidden" name="url_from" id="url_from" value="index.php?ovoa=ovoa_right">
            <td align="left" width="90%" >&nbsp;<INPUT class="s_sear" type=text name="user_ture_name1" id="user_ture_name1" value="<?php echo $this->_tpl_vars['user']['user_ture_name']; ?>
">&nbsp;<span class="xspan">*真实姓名不能为空</span></td>
			</tr>
		 <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">          
		   <td height="32" align="center" width="10%">&nbsp;性　　别：</td>
            <td align="left" width="90%" >&nbsp;<label><input name="user_sex" type="radio" id="user_sex" value="男" <?php if ($this->_tpl_vars['user']['user_sex'] == '男'): ?>checked<?php endif; ?>> 男</label>
            <label><input type="radio" name="user_sex" id="user_sex" value="女" <?php if ($this->_tpl_vars['user']['user_sex'] == '女'): ?>checked<?php endif; ?>> 女</label>&nbsp;</td>
		</tr>
		<tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">          
		   <td height="32" align="center" width="10%">&nbsp;联系电话：</td>
            <td align="left" width="90%" >&nbsp;<INPUT class="s_sear" type=text style="width:300px;" name="user_phone1" id="user_phone1" value="<?php echo $this->_tpl_vars['user']['user_phone']; ?>
">&nbsp;<span class="xspan">*联系电话不能为空</span></td>
			</tr>
		<tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">          
		   <td height="32" align="center" width="10%">&nbsp;工作邮箱：</td>
            <td align="left" width="90%" >&nbsp;<INPUT class="s_sear" type=text style="width:300px;" name="user_email" id="user_email" value="<?php echo $this->_tpl_vars['user']['user_email']; ?>
">&nbsp;<span class="xspan"></span></td>
			</tr>
			<tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">          
		   <td height="32" align="center" width="10%">&nbsp;工作QQ：</td>
            <td align="left" width="90%" >&nbsp;<INPUT class="s_sear" style="width:300px;" type=text name="user_qq" id="user_qq" value="<?php echo $this->_tpl_vars['user']['user_qq']; ?>
">&nbsp;<span class="xspan"></span></td>
			</tr>
			<tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">          
		   <td height="32" align="center" width="10%">&nbsp;</td>
            <td align="left" width="90%" >&nbsp;<INPUT class="but_modfy" type=submit value=" " name="user_set_submit" id="user_set_submit"></td>
			</tr>
	</table>
	</div>
	</form>
  </div>
  <!--个人设置e-->
  <!--修改密码b-->
  <div class="contents" <?php if ($this->_tpl_vars['claid'] == 3): ?>style="display:block"<?php endif; ?>>
  <form action="user.php?action=do_user_modifypass" method="post" enctype="multipart/form-data">
     <div>
	  <table width="100%" border="0" cellspacing="1" cellpadding="0" style="background:#d5dde0;" class="table_font">
 		 <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">          
		   <td height="32" align="center" width="10%">&nbsp;当前密码：</td>
            <td align="left" width="90%" >&nbsp;<input name="pwd_old"  id="pwd_old" type="password" class="s_sear" />&nbsp;<span class="xspan">*系统原始密码</span></td>
			</tr>
			<tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">          
		   <td height="32" align="center" width="10%">&nbsp;新 密 码：</td>
            <td align="left" width="90%" >&nbsp;<input name="pwd" id="pwd" type="password" class="s_sear" />&nbsp;<span class="xspan">*输入新的密码</span></td>
			</tr>
		    <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">          
		   <td height="32" align="center" width="10%">&nbsp;确认密码：</td>
            <td align="left" width="90%" >&nbsp;<input name="pwd_ack" id="pwd_ack" type="password" class="s_sear" />&nbsp;<span class="xspan">*再次输入新的密码</span></td>
			</tr>
          <tr bgcolor="#FFFFFF" >
            <td colspan="2"  height="45" style="padding-left:200px;"><INPUT class="but_modfy" type=submit value=" " name="modifypass_submit" id="modifypass_submit"></td>
          </tr>
        </table>
		</div>
		</form>
  </div>
  <!--修改密码e-->
  <!--在线人数b-->
  <div class="contents" <?php if ($this->_tpl_vars['claid'] == 4): ?>style="display:block"<?php endif; ?>>
  <div>
  	  <table width="100%" border="0" cellspacing="1" cellpadding="0" style="background:#d5dde0;" class="table_font">
 		 <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">          
                <td height="32" align="center" >ID号</td>
                <td align="center" >用户名</td>
                <td align="center" >真实姓名</td>
				<td align="center" >性    别</td>
				<td align="center" >所属部门</td>
				<td align="center" >在线状态</td>
				<td align="center" >最后登录时间</td>
				<td align="center" >最后登录IP</td>
				<td align="center" >用户权限</td>
                <td align="center" >操作</td>
		 </tr>
		   <?php $_from = $this->_tpl_vars['online_users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['online_users']):
?>
                <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
                    <td align="center"  height="32"><input type="checkbox" name="nid" value="<?php echo $this->_tpl_vars['online_users']['user_id']; ?>
"> <?php echo $this->_tpl_vars['online_users']['user_id']; ?>
</td>
                    <td align="center" ><?php echo $this->_tpl_vars['online_users']['user_name']; ?>
</td>
                    <td align="center" ><?php echo $this->_tpl_vars['online_users']['user_ture_name']; ?>
</td>
					<td align="center" ><?php echo $this->_tpl_vars['online_users']['user_sex']; ?>
</td>
					<td align="center" ><?php echo $this->_tpl_vars['online_users']['de_name']; ?>
</td>
					<td align="center" ><?php if ($this->_tpl_vars['online_users']['inservice']): ?><font color="#006600">当前在线</font><?php else: ?>离线<?php endif; ?></td>
					<td align="center" ><?php echo $this->_tpl_vars['online_users']['user_lastsj']; ?>
</td>
					<td align="center" ><?php echo $this->_tpl_vars['online_users']['user_lastip']; ?>
</td>
					<td align="center" ><?php echo $this->_tpl_vars['online_users']['qx_name']; ?>
</td>
					<td align="center" ><?php if ($this->_tpl_vars['qx_id'] == 1): ?><a href="user.php?action=forceonline&uid=<?php echo $this->_tpl_vars['online_users']['user_id']; ?>
">强制下线</a>&nbsp;&nbsp;<a href="user.php?action=locklogin&uid=<?php echo $this->_tpl_vars['online_users']['user_id']; ?>
">锁定</a>&nbsp;&nbsp;<a href="user.php?action=lockip&uid=<?php echo $this->_tpl_vars['online_users']['user_id']; ?>
">封IP</a>&nbsp;&nbsp;<?php endif; ?><a href="msg.php?action=msg_send&uid=<?php echo $this->_tpl_vars['online_users']['user_id']; ?>
"><font color="#006600">在线聊天</font></a>&nbsp;&nbsp;&nbsp;</td>
                </tr>
            <?php endforeach; endif; unset($_from); ?>
	  </table>
  </div>
	 <div class="page">
	 <span>第<?php echo $this->_tpl_vars['page_now']; ?>
页/共<?php echo $this->_tpl_vars['page_num']; ?>
页，共<?php echo $this->_tpl_vars['total']; ?>
条</span> <?php echo $this->_tpl_vars['pagelist']; ?>
</div>
	 </div>
  </div>
  <!--在线人数e-->
</div>
</div>
</body>
</html>