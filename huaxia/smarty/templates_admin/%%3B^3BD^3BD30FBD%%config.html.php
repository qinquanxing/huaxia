<?php /* Smarty version 2.6.14, created on 2015-05-19 14:33:10
         compiled from ovoa/config.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "ovov_sys/ovoa_header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<body>
<link rel="stylesheet" href="../e/themes/default/default.css" />
<script charset="utf-8" src="../e/kindeditor-min.js"></script>
<script charset="utf-8" src="../e/lang/zh_CN.js"></script>
<script>
KindEditor.ready(function(K) {
	K.create('#contents', {
		themeType : 'default',
		afterBlur: function () { this.sync(); }
	});
	
	$("#but_update").click(function(){
		//var content = $("#contents").val();
		var content = $("form").serialize(); 
		//serialize())
		$.ajax({
			url:'content.php?action=saveData&file=<?php echo $this->_tpl_vars['file']; ?>
',
			data:content,
			type:'POST',
			success:function(data){
				if(data){
					art.dialog({
						content: "更新成功！",
						icon:'succeed',
						cancelVal: '知道了',
						cancel: true,
						id:'udel',
						time:2,
						close: function () {
					    	location.reload();
					    }
					});
				}
			}
		});
	})
})
</script>
<style>.ke-container{margin:5px 12px;}</style>
	<div class="main">
		<div class="main_title"><strong>系统管理</strong></div>
			<div class="main_content">
				<!--选项卡B-->
			    <div class="sub_title">
			      <ul>
			      	<li class="tab_on"><span><?php echo $this->_tpl_vars['tabName']; ?>
</span></li>
			      </ul>
			    </div>
			<div class="contents" style="display:block;">
			  <form>
				<table width="100%" border="0" cellspacing="1" cellpadding="0" style="background:#d5dde0;" class="table_font">
	            
		            <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
		              	<td height="32" align="center">&nbsp;内容：</td> 
		              	<td align="left">
		              		<textarea style="width:800px;height:380px;" name="data[contents]" id="contents"><?php echo $this->_tpl_vars['contents']; ?>
</textarea>
						</td>
		            </tr>
		            

		            <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">
		              <td height="32" align="center">&nbsp;</td>
		              <td align="left" colspan="2">&nbsp;
		              	<input class="but_update" type="button" id="but_update">
		              </td>
		            </tr>
          		</table>
          	   </form>
			</div>
		</div>
	</div>
</body>
</html>