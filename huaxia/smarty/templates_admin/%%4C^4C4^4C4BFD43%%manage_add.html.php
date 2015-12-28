<?php /* Smarty version 2.6.14, created on 2015-12-16 21:05:23
         compiled from position/manage_add.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "ovov_sys/ovoa_header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<body>
<div class="main">
	<div class="contents" style="display:block">
		<!--<?php echo $this->_tpl_vars['post_url']; ?>
-->
		<form action="<?php echo $this->_tpl_vars['post_url']; ?>
"  name= "form_a" id="add_form" method="post" enctype="multipart/form-data">
		<table width="100%" border="0" cellspacing="1" cellpadding="0" style="background:#d5dde0;" class="table_font">
			<tr style="background:url(common/skin/1/images/table_title.gif) repeat-x;">
				<td height=32 align="right" width="100">请输入电话&nbsp;</td>
				<td align="left" bgcolor="#FFFFFF">&nbsp;
					<input class="s_sear" type='text' name="phone" id="phone" value="" placeholder="请输入手机号" blur="blur_phone()"/>&nbsp;&nbsp;<span class="a1"></span>
				</td>
			</tr>			
			<tr style="background:url(common/skin/1/images/table_title.gif) repeat-x;">
				<td height=32 align="right" width="100">请输入邮箱&nbsp;</td>
				<td align="left" bgcolor="#FFFFFF">&nbsp;
					<input class="s_sear" type='text' name="email" id="email" value=""/>&nbsp;&nbsp;<span class="a2"></span>
				</td>
			</tr>
			<tr style="background:url(common/skin/1/images/table_title.gif) repeat-x;">
				<td height=32 align="right" width="100">请输入验证码&nbsp;</td>
				<td align="left" bgcolor="#FFFFFF">&nbsp;
					<div style="width:180px;padding-left:10px;float:left"><input class="s_sear" type=text name="scode" id="scode" value=""/>		</div>
					<div style="width:40px;float:left;background: #FFCC67;border-radius: 5px;text-align: center;padding:4px 6px">9999</div>&nbsp;&nbsp;<span class="a3"></span>
				</td>
			</tr>
			<tr style="background:url(common/skin/1/images/table_title.gif) repeat-x;">
				<td height=32 align="right" width="100">请输入密码&nbsp;</td>
				<td align="left" bgcolor="#FFFFFF">&nbsp;
					<input class="s_sear" type='password' name="password" id="password" value=""/>&nbsp;&nbsp;<span class="a4"></span>
				</td>
			</tr>
			<tr style="background:url(common/skin/1/images/table_title.gif) repeat-x;">
				<td height=32 align="right" width="100">请输入邀请码&nbsp;</td>
				<td align="left" bgcolor="#FFFFFF">&nbsp;
					<div style="width:180px;padding-left:10px;float:left"><input class="s_sear" type=text name="icode" id="icode" value=""/>		</div>
					<div style="width:40px;float:left;background: #FFCC67;border-radius: 5px;text-align: center;padding:4px 6px">9999</div>&nbsp;&nbsp;<span class="a5"></span>
				</td>
			</tr>
			<tr style="background:url(common/skin/1/images/table_title.gif) repeat-x;">
				<td height=32 align="right" width="100">注册类型&nbsp;</td>
				<td align="left" bgcolor="#FFFFFF">&nbsp;
					个人:<input type="radio" checked="checked" name="reg_type" value="1">&nbsp;&nbsp;		
					公司:<input type="radio" name="reg_type" value="2">					
				</td>
			</tr>					
			<tr style="background:url(common/skin/1/images/table_title.gif) repeat-x;">
				<td height=32 align="right" width="100">状态&nbsp;</td>
				<td align="left" bgcolor="#FFFFFF">&nbsp;
					启用:<input type="radio" checked="checked" name="state" value="1">&nbsp;&nbsp;		
					禁用:<input type="radio" name="state" value="2">
				</td>
			</tr>
			<tr style="background:url(common/skin/1/images/table_title.gif) repeat-x;">
				<td height=32 align="right"></td>
				<td height="32" align="left" colspan="2" bgcolor="#FFFFFF">&nbsp;
					<input id="form_submit" class="but_add" name="form_submit" type="submit" onclick="check()" value=" ">
				</td>
			</tr>
		</table>
		</form>
	</div>
</div>
<script>
$(function(){
var ok1=false;
var ok2=false;
var ok3=false;
var ok4=false;
var ok5=false;	

// 验证手机号
$('#phone').focus(function(){
		$('span.a1').text('请输入手机号码');		
		$('span.a1').css({color:"red",border:"1px solid #ddd"});
}).blur(function(){
	//判断是否为空
	// alert($('#phone').val()=="");
	if($('#phone').val()==""){
		$('span.a1').text('号码不能为空');		
		$('span.a1').css({color:"red",border:"1px solid #ddd"});
	}
	
	//判断格式是否正确
	var obj=$('#phone').val();
	$reg=/^1(3|5|7|8)\d{9}$/; 
	if($reg.test(obj)){		
		$('span.a1').text('可以使用');
		$('span.a1').css({color:"green",border:"1px solid #ddd"});
		ok1=true;
	}else{
		$('span.a1').text('手机格式不正确');
		$('span.a1').css({color:"red",border:"1px solid #ddd"});
	}	 
});

// 验证邮箱
$('#email').focus(function(){
	$('span.a2').text('请输入邮箱');		
	$('span.a2').css({color:"red",border:"1px solid #ddd"});
}).blur(function(){
	//判断是否为空
	if($('#email').val()==''){
		$('span.a2').text('邮箱不能为空');
		$('span.a2').css({color:"red",border:"1px solid #ddd"});
	} 
	//判断格式是否正确
    	var obj=$('#email').val();
    	$reg=/^\w{3,}@\w+(\.\w+)+$/;
    	if($reg.test(obj)){
    		$('span.a2').text('可以使用');
		$('span.a2').css({color:"green",border:"1px solid #ddd"});
		ok2=true;
    	}else{
    		$('span.a2').text('邮箱格式不正确');
		$('span.a2').css({color:"red",border:"1px solid #ddd"});
    	}
});

// 验证验证码
$('#scode').focus(function(){
	$('span.a3').text('请输入验证码');		
	$('span.a3').css({color:"red",border:"1px solid #ddd"});
}).blur(function(){
	//判断是否为空
	if($('#scode').val()==''){
		$('span.a3').text('验证码不能为空');
		$('span.a3').css({color:"red",border:"1px solid #ddd"});
	} 
	//判断验证码的长度
	if($('#scode').val().length != 4 ){
		$('span.a3').text('必须4位验码');		
		$('span.a3').css({color:"red",border:"1px solid #ddd"});		
	}else{
		$('span.a3').text('可以使用');
		$('span.a3').css({color:"green",border:"1px solid #ddd"});
		ok3=true;
	}	
});

// 验证密码
$('#password').focus(function(){
	$('span.a4').text('请输入6~12位密码');		
	$('span.a4').css({color:"red",border:"1px solid #ddd"});
}).blur(function(){
	//判断是否为空
	if($('#password').val()==''){
		$('span.a4').text('验证码不能为空');
		$('span.a4').css({color:"red",border:"1px solid #ddd"});
	} 
	//判断密码长度
	if($('#password').val().length >= 6 && $('#password').val().length <=12){
		$('span.a4').text('密码可以使用');
		$('span.a4').css({color:"green",border:"1px solid #ddd"});
		ok4=true;
	}else{
		$('span.a4').text('请输入6~12位密码');		
		$('span.a4').css({color:"red",border:"1px solid #ddd"});
	}

});

// 验证邀请码
$('#icode').focus(function(){
	$('span.a5').text('请输入邀请码');		
	$('span.a5').css({color:"red",border:"1px solid #ddd"});
}).blur(function(){
	//判断是否为空
	if($('#icode').val()==''){
		$('span.a5').text('验证码不能为空');
		$('span.a5').css({color:"red",border:"1px solid #ddd"});
	} 
	//判断邀请码的长度
	if($('#icode').val().length != 4 ){
		$('span.a5').text('必须4位验码');		
		$('span.a5').css({color:"red",border:"1px solid #ddd"});		
	}else{
		$('span.a5').text('可以使用');
		$('span.a5').css({color:"green",border:"1px solid #ddd"});
		ok5=true;
	}	
});

//提交按钮,所有验证通过方可提交
$('#form_submit').click(function(){	
	if( ok1 && ok2 && ok3 && ok4 && ok5 ){
		$('#form_a').submit();
	}else{					
		return false;
	}
});
})
</script>
</body>
</html>