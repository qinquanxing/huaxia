<?php /* Smarty version 2.6.14, created on 2015-05-19 14:33:55
         compiled from manage_ad/manage_ad_addad.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "ovov_sys/ovoa_header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" src="../common/js/jquery.js"></script>
<script type="text/javascript" src="../common/js/calendar.js"></script>
<script language="javascript" type="text/javascript" src="../common/rili/WdatePicker.js"></script>
<script language="javascript" type="text/javascript">
	function listBgOver(obj){
		obj.style.background="#E8F4FF";
	}
	function listBgOut(obj){
		obj.style.background="#FFFFFF";
	}
jQuery(function($) {
		//提交
		$("#submit").click(function() {
				//广告名称不能为空
				if($("#name").val()==''){
					$("#name").focus();
					$("#name").attr("style","border:#F00 solid 1px;");
					//alert("真实姓名不能为空");
					art.dialog({
                    time: 2,
                    lock: true,
                    icon: 'error',
                    content: '广告名称不能为空'
               		});
					return false;
				}
				//广告尺寸宽度是否为空
				if($("#width").val()==''){
					$("#width").focus();
					$("#width").attr("style","border:#F00 solid 1px;");
					art.dialog({
                    time: 2,
                    lock: true,
                    icon: 'error',
                    content: '广告尺寸宽度不能为空'
               		});
					return false;
				}
				//广告尺寸宽度是否为空
				if($("#height").val()==''){
					$("#height").focus();
					$("#height").attr("style","border:#F00 solid 1px;");
					//alert("密码不能为空");
					art.dialog({
                    time: 2,
                    lock: true,
                    icon: 'error',
                    content: '广告尺寸宽度不能为空'
               		});
					return false;
				}
				//广告售价不能为空
				if($("#price").val()==''){
					$("#price").focus();
					$("#price").attr("style","border:#F00 solid 1px;");
					//alert("真实姓名不能为空");
					art.dialog({
                    time: 2,
                    lock: true,
                    icon: 'error',
                    content: '广告售价不能为空'
               		});
					return false;
				}
			});
		});
</script>
<body>
<div class="main">
  <div class="main_title"><strong>添加广告位</strong></div>
  <div class="main_content">
  <!--添加用户b-->
  <div class="contents" style="display:block" >
  <div>
	    <form id="form1" name="form1" method="post" action="manage_ad.php?action=addad">
	     <table width="100%" border="0" cellspacing="1" cellpadding="0" class="table_font">
		<tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">          
			<td height="32" align="center" width="10%">&nbsp;广告位名称：</td>
			<td align="left" width="90%" >&nbsp;<input name="name" type="text" id="name" class="s_sear" size="30" />&nbsp;<span class="xspan">*广告位名称</span></td>
		</tr>
		<tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">          
			<td height="32" align="center" width="10%">&nbsp;广告尺寸：</td>
			<td align="left" width="90%" >&nbsp;<input name="width" type="text" class="s_sear" maxlength="4" id="width" size="6" />&nbsp;宽X高&nbsp;<input name="height" class="s_sear" type="text" id="height" maxlength="4" size="6" />（单位：像素）&nbsp;<span class="xspan">*广告尺寸</span></td>
		</tr>
		<tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">          
			<td height="32" align="center" width="10%">&nbsp;广告售价：</td>
			<td align="left" width="90%" >&nbsp;<input name="price" type="text" maxlength="6" id="price" size="10" class="s_sear" />&nbsp;元/周<span class="xspan">广告售价</span></td>
		</tr>
		<tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">   
			<td height="32" align="center" width="10%">&nbsp;</td>       
			<td align="left" width="90%" colspan="2">&nbsp;<INPUT class="but_add" type=submit value=" " name="submit" id="submit"></td>
		</tr>
	</table>
	</form>
	</div>
  </div>
   <!--添加用户e-->

  <div class="fd zx"></div>
  <div class="fd yx"></div>
</div>
</div>
</body>
</html>