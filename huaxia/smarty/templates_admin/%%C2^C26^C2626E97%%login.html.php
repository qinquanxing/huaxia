<?php /* Smarty version 2.6.14, created on 2015-05-19 14:31:18
         compiled from ovov_sys/login.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "ovov_sys/ovoa_header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script language="javascript" type="text/javascript">
      	function reloadImage(imgurl){
          var getimagecode=document.getElementById("codeimg");
          getimagecode.src= imgurl + "?id=" + Math.random();
      }
</script>
<script type="text/javascript"> 
	jQuery(function($) {
		//登录用户名
		$("#user_name").focus();
		$("#user_name").blur(function() {
			aa();
		});
		//提交
		$("#submit").click(function() {
				if(aa()==false) {
					//alert("用户名不能为空！");
					art.dialog({
                    time: 2,
                    lock: true,
                    icon: 'error',
                    content: '用户名不能为空'
               		});
					$("#user_name").focus();
					return false;
				}
				
				if($("#user_password").val()==''){
					$("#user_password").focus();
					$("#user_name").addClass("s_sear_red");
					$("#user_password").attr("style","width:115px;border:#F00 solid 1px;");
					art.dialog({
                    time: 2,
                    lock: true,
                    icon: 'error',
                    content: '密码不能为空'
               		});
					return false;
				}

 				//验证码是否为空
				if($("#user_verify").val()==''){
					$("#user_verify").focus();
					$("#user_password").attr("style","width:115px;border:#FFF solid 1px;");
					$("#user_verify").attr("style","border:#F00 solid 1px;");
					//alert("验证码不能为空");
					art.dialog({
                    time: 2,
                    lock: true,
                    icon: 'error',
                    content: '验证码不能为空'
               		});
					return false;
				}
				//验证码验证b
				if($("#user_verify").val()!=''){
				var bol=false;
				 $.ajax({
                type:'post',
                async:false,
                url:'checkCode.php?action=yzm',
                data:'code='+$("#user_verify").val(),
				success:function(responseData){  
         			var Result = eval('('+responseData+')');  
           			 if(Result.verifycode=='Y'){bol=true;}
            		else {bol=false;$("#user_verify").focus();
					$("#user_verify").attr("style","border:#F00 solid 1px;");
					//alert("验证码不正确");
					art.dialog({
                    time: 2,
                    lock: true,
                    icon: 'error',
                    content: '验证码不正确'
               		 });				
					}  
           			}
         		});
         		return bol;
				}
				//验证码验证e
				
			});
		});
function aa(){
			if($("#user_name").val()==''){
				$("#user_name").addClass("s_sear_red");
				$("#user_name").focus();
				return false;
			}else{
				$("#user_name").attr("style","");
				return true;
			}
}
</script>
<body>
<style type="text/css">
body{background:#7bbde2  no-repeat right top;}
</style><form action="login.php?action=dologin" method="post" enctype="multipart/form-data">
<div class="login">
	<div class="login_con">
        <div><span>用户名:</span><input name="user_name" id="user_name"  type="text" class="inp" /></div>
        <div><span>密&nbsp;&nbsp;码:</span><input name="user_password" id="user_password" type="password" class="inp" /></div>
        <div><span>验证码:</span><input name="user_verify" id="user_verify" type="text" class="inp_s" /> <img style="cursor:pointer" onClick="reloadImage('include/function/randcode.php')" id="codeimg" alt="看不清点击验证码刷新" title="看不清点击验证码刷新" src="include/function/randcode.php" /></div>
          <div><span>&nbsp;</span><input type="submit" value="" name="submit" id="submit" class="loginbut" /></div>
    </div>
</div></form>
<div class="login_bot"></div>
</body>
</html>