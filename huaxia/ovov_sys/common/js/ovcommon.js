//关闭弹出层
function windowreload(id){
		var id;
		id==1?window.location.reload():"";//刷新当前页面
		id==2?parent.location.reload():"";//刷新父亲对象（用于框架） 
		id==3?opener.location.reload():"";//刷新父窗口对象（用于单开窗口）
		id==4?top.location.reload():"";//刷新最顶端对象（用于多开窗口）
}
//表格鼠标效果
function listBgOver(obj){
		obj.style.background="#E8F4FF";
}
function listBgOut(obj){
		obj.style.background="#FFFFFF";
}
//通用打开窗口程序
function ovov_open(url,title,width,height){
		art.dialog.open(url,{title:title,width:width,height:height});
}
//关闭弹出层
function ovclose_dialog(id){
		var id;
		var win = art.dialog.open.origin;
		id==1?win.location.reload():"";
		art.dialog.close();
}
//统用ajax设置
function ovajax_set(ajaxurl,postdata,txt){
	$.ajax({type:'get',async:false,url:ajaxurl,data:postdata,
			success:function(responseData){;var Result = eval('('+responseData+')');
			art.dialog({content: Result.infotxt,time:Result.time,lock: true,icon:Result.icon});
			Result.staus==1?setTimeout('windowreload(1)',Result.time*1000):"";
			}
	})
}
//统用ajax确认操作
function ovajax_confirm(ajaxurl,postdata,txt){
	art.dialog({content: txt,
				ok: function () {
						$.ajax({type:'get',async:false,url:ajaxurl,data:postdata,
						success:function(responseData){var Result = eval('('+responseData+')');
						art.dialog({content: Result.infotxt,time:Result.time,lock: true,icon:Result.icon});
						Result.staus==1?setTimeout('windowreload(1)',Result.time*1000):"";
						}
         		});
			},icon: 'question',cancelVal: '取消',cancel: true
	});
}
//全选
function ov_checkAll(formid){
		var formid;
		for (var p=0;p<document.forms[formid].elements.length;p++){
			var m = document.forms[formid].elements[p];
			if (m.checked==false){
				m.checked = true;
			}else{
				m.checked = false;
			}
		}
}
//全部删除
function ov_delall(formid,del_url,del_data,del_txt,bid,eid){
	var formid;
	var del_url;
	var del_data;
	var del_txt
	var string = "";
	var bid;
	var eid;
	bid==""?bid=0:"";
	eid==""?eid=0:"";
	for (var i = bid ; i<document.forms[formid].elements.length-eid; i++){
		if(document.forms[formid].elements[i].checked !=""){
			if(i<(document.forms[formid].elements.length)){
				string = string + document.forms[formid].elements[i].value+",";
			}else{
				string = string + document.forms[formid].elements[i].value;
			}
		}
	} 
	if(string == ""){
			art.dialog({time: 2,lock: false,icon: 'error',content: '请选择内容'});
			return false;
	}else{
			art.dialog({content: del_txt,
				ok: function () {
						$.ajax({type:'get',async:false,url:del_url,data:del_data+string,
						success:function(responseData){var Result = eval('('+responseData+')');
						art.dialog({content: Result.infotxt,time:Result.time,lock: true,icon:Result.icon});
						Result.staus==1?setTimeout('ovclose_dialog(1)',2000):"";}
         		});
				},icon: 'question',cancelVal: '关闭',cancel: true
			});
	}
}
//批量转移
function ovmove_all(formid,url,title,width,bid,eid){
		var formid;
		var url;
		var title;
		var width;
		var bid;
		var eid;
		var string = "";
		bid==""?bid=0:"";
		eid==""?eid=0:"";
		for (var i = bid ; i<document.forms[formid].elements.length-eid; i++){
			if(document.forms[formid].elements[i].type=='checkbox'){
				if(document.forms[formid].elements[i].checked !=""){
					if(i<(document.forms[formid].elements.length)){
						string = string + document.forms[formid].elements[i].value+",";
					}else{
						string = string + document.forms[formid].elements[i].value;
					}
				}
			}
		}
		if(string == ""){
			art.dialog({content: '请勾选转移项？',icon: 'warning',cancelVal: '关闭',cancel: true});
		}else{
			art.dialog.open(url+'&str='+string,{title:title,width:width});
		}
}
//批量复制
function ovcopy_all(formid,url,title,width,bid,eid){
		var formid;
		var url;
		var title;
		var width;
		var bid;
		var eid;
		var string = "";
		bid==""?bid=0:"";
		eid==""?eid=0:"";
		for (var i = bid ; i<document.forms[formid].elements.length-eid; i++){
			if(document.forms[formid].elements[i].type=='checkbox'){
				if(document.forms[formid].elements[i].checked !=""){
					if(i<(document.forms[formid].elements.length)){
						string = string + document.forms[formid].elements[i].value+",";
					}else{
						string = string + document.forms[formid].elements[i].value;
					}
				}
			}
		}
		if(string == ""){
			art.dialog({content: '请勾选复制项？',icon: 'warning',cancelVal: '关闭',cancel: true});
		}else{
			art.dialog.open(url+'&str='+string,{title:title,width:width});
		}
}
//查询跳转
function ovsearch_location(obj,url){
		var searchid=obj.value;
		if(searchid){
			location.href=url+searchid;
		}
}

function ajax_chanel(ajaxurl,title,width,height){
	art.dialog.open(ajaxurl, {title: title,width: width,height:height,lock:true});
}