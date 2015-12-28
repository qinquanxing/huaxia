<?php /* Smarty version 2.6.14, created on 2015-05-19 16:16:38
         compiled from article/article_add.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'article/article_add.html', 197, false),)), $this); ?>
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
<script language="javascript" type="text/javascript">

function listBgOver(obj){
	obj.style.background="#E8F4FF";
}
function listBgOut(obj){
	obj.style.background="#FFFFFF";
}
		KindEditor.ready(function(K) {
			var editor1 = K.create('textarea[title="content"]', {
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
		


 function getSortList(){  
 		
		$("#article_sort_div").html("<img src=\"common/js/skins/icons/loading.gif\">");
		$.ajax({
			url:'ajax.php?action=GetchanelList',
			data:"pid="+ document.getElementById("article_channel").value,
			type:'POST',
			success:function(data){
				$("#article_sort_div").html(data);
			}
		});
   }

	jQuery(function($) {
		//标题不能为空
		$("#article_title").focus();
		$("#article_title").blur(function() {
			aa();
		});
		//提交
		$("#article_add").click(function() {
				 if(aa()==false) {
					$("#article_title").focus();
					$("#article_title").addClass("s_sear_red");
					art.dialog({
                    time: 2,
                    lock: true,
                    icon: 'error',
                    content: '文章标题不能为空'
               		});
					 return false;
				}
				//文章分类不能为空
					if($("#article_channel").val()==''){
					$("#article_channel").focus();
					$("#article_channel").css("border-color",'red');
					art.dialog({
                    time: 2,
                    lock: true,
                    icon: 'error',
                    content: '请选择文章分类'
               		});

					return false;
				}
			 });
		});
function aa(){
			if($("#article_title").val()==''){
				$("#article_title").addClass("u_input320_red");
				return false;
			}else{
				$("#article_title").attr("style","");
				return true;
			}	
	
}

function getSortLists(){
	$.ajax({
		url:'ajax.php?action=GetchanelLists',
		data:"pid="+ document.getElementById("article_root_id").value,
		type:'POST',
		success:function(data){
			$("#article_sort_div2").html(data);
		}
	});
}
</script>
<style>
.ke-container{margin:5px 0;}
</style>
<body>
<div class="main">
  <div class="main_title">
		<a href="article.php?cid=9&action=article_view">
			<strong>文章管理</strong>
		</a>
		<strong>添加文章</strong>
		<span></span>
		<p></p>
  </div>
  <div class="main_content">
  <!--文章管理b-->
  <div class="contents" style="display:block">
    <div><form action="article.php?action=do_article_add" name="article_add_form" id="article_add_form" method="post" enctype="multipart/form-data">
        <table width="100%" border="0" cellspacing="1" cellpadding="0" style="background:#d5dde0;" class="table_font">

			<tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">          
			<td height="32" align="center" width="10%">&nbsp;文章分类：</td>
			<td align="left" width="90%" >&nbsp;<span id="article_channel_div"><?php echo $this->_tpl_vars['channel_list']; ?>
</span><span id="article_sort_div"><select name="article_root_id" onChange="getSortList(this.form);" id='article_root_id'><?php $_from = $this->_tpl_vars['article1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['article1']):
?><option <?php if ($this->_tpl_vars['article']['article_sid'] == $this->_tpl_vars['article1']['channel_id']): ?> selected="selected"<?php endif; ?>
 value="<?php echo $this->_tpl_vars['article1']['channel_id']; ?>
"><?php echo $this->_tpl_vars['article1']['channel_name']; ?>
</option><?php endforeach; endif; unset($_from); ?></select></span><span id="article_sort_div2"></span>&nbsp;<span class="xspan">*请选择频道</span></td>
			</tr>
			
 			<tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">          
				<td height="32" align="center" width="10%">&nbsp;文章标题：</td>
	            <td align="left" width="90%" >&nbsp;<INPUT class="u_input320" type=text name="article_title" id="article_title" value="<?php echo $this->_tpl_vars['article']['article_title']; ?>
"> &nbsp;<span class="xspan"> </span></td>
			</tr>

			<tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);"   class="article_sign">          
				<td height="32" align="center" width="10%">&nbsp;文章作者：</td>
				<td align="left" width="90%" >&nbsp;<INPUT class="s_sear" type="text" name="article_author" id="article_author" value="<?php echo $this->_tpl_vars['article']['article_author']; ?>
" ></td>
			</tr>
			
			<tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);"   class="article_sign">          
			  <td height="32" align="center" width="10%">&nbsp;文章来源：</td>
			  <td align="left" width="90%" >&nbsp;<INPUT class="s_sear" type=text name="article_source" id="article_source" value="<?php echo $this->_tpl_vars['article']['article_source']; ?>
" ></td>
		    </tr>
			
			<tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">          
				<td height="32" align="center" width="10%">&nbsp;关 键 词：</td>
				<td align="left" width="90%" >&nbsp;<INPUT class="s_sear" type="text" name="article_keyword" id="article_keyword" value="<?php echo $this->_tpl_vars['article']['article_keyword']; ?>
" ></td>
			</tr>
			
			<tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);" class="skip_link">
			  <td height="32" align="center" width="10%">&nbsp;跳转链接：</td>
			  <td align="left" width="90%" >&nbsp;<input class="u_input320" type="text" name="jump_url" value="<?php echo $this->_tpl_vars['article']['jump_url']; ?>
" size="30" maxlength="255" />(可选填写：添加视频关联链接)</td>
		    </tr>
			
			<tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);" class="skip_link">
				<td height="32" align="center" width="10%">&nbsp;文章摘要：</td>
				<td align="left" width="90%" >
					&nbsp;<textarea style="width:670px;height:120px;margin:5px 0;" class="textarea" type="text" name="summary" size="30" maxlength="1000" ></textarea></td>
			</tr>
		    
			<tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);" class="common">
	            <td height="32" align="center" width="10%">
	            	&nbsp;文章内容(中文)：
				</td>
				<td align="left" width="90%" style="padding-left:7px;">
					<textarea name="article_content" style="width:680px;height:400px;" title="content"><?php echo $this->_tpl_vars['article']['article_content']; ?>
</textarea>
				</td>
			</tr>
			
		
			
			<tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">          
			  <td height="32" align="center" width="10%" class='top_pic'>&nbsp;封面图片：</td>
			  <td align="left" width="90%" >
			  	<table>
			  		<tr>
			  			<td>
						  &nbsp;<INPUT type="text" id="img_add" name="index_flash" class="u_input320" value="<?php echo $this->_tpl_vars['article']['index_flash']; ?>
" />
						</td>
						<td>
						  <iframe name="file_upload" src="upload.php?action=new_ovoafile&isReturn=true&dizhi=img_add&rstform=article_add_form" scrolling="no" frameborder="0" id="upload_file_iframe" style="height:32px; padding-left:0px;"></iframe>
						</td>
			  		</tr>
			  	</table>
			  </td>
		    </tr>
			 
            <tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">          
				<td height="32" align="center" width="10%">&nbsp;添加时间：</td>
				<td align="left" width="90%" >
					&nbsp;<INPUT class="s_sear" type="text" name="add_time" id="kqadd_timeid2" value="<?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d %H:%I:%S') : smarty_modifier_date_format($_tmp, '%Y-%m-%d %H:%I:%S')); ?>
"/>
				</td>
			</tr>

            </tr>
			<tr bgcolor="#FFFFFF" onMouseOver="listBgOver(this);" onMouseOut="listBgOut(this);">   
			<td height="32" align="center" width="10%">&nbsp;</td>       
			<td align="left" width="90%" colspan="2">&nbsp;<INPUT class="but_add" type=submit value=" "  id="article_add"></td>
			</tr>
		  </table>
		  </form>
          </td>
	    </tr>        
	 </table>
    </div>
  </div>
   <!--文章管理e-->
</div>
</div>
</body>
</html>