<?php /* Smarty version 2.6.14, created on 2015-05-19 14:31:29
         compiled from ovov_sys/footer.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "ovov_sys/ovoa_header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script language="JavaScript">  
		function GetRTime(qishu,cid){
			 $.ajax({
                type: "GET",
                url: "ajax.php",
                data: "action=onlinenums&Rand=" + Math.random(),
                success: function (msg) {
				//alert(msg);
                    $("#onlinenums").html(msg);
                }
            });
			setTimeout("GetRTime()",5000);
		}
		window.onload=GetRTime;
</script>
<body>
<div class="footer">
	<div class="copyright">当前在线人数：<a href="user.php?action=user_online&claid=4" target="right"><b><font color="#FF3300" id="onlinenums"><?php echo $this->_tpl_vars['onlinenums']; ?>
人</font></b> </a>    <?php echo $this->_tpl_vars['ovovweb']['web_copyright']; ?>
</div>
</div>
</body>
</html>