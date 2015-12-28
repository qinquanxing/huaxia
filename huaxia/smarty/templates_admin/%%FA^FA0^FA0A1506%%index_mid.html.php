<?php /* Smarty version 2.6.14, created on 2015-05-19 14:31:29
         compiled from ovov_sys/index_mid.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "ovov_sys/ovoa_header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" language="JavaScript">
var pic = new Image();
pic.src="common/skin/1/images/jt_btn.gif";
function toggleMenu()
{
  frmBody = parent.document.getElementById('frame-body');
  imgArrow = document.getElementById('img');
  if (frmBody.cols == "0, 10, *")
  {
    frmBody.cols="163, 10, *";
    imgArrow.src = "common/skin/1/images/jt_btn.gif";
  }
  else
  {
    frmBody.cols="0, 10, *";
    imgArrow.src = "common/skin/1/images/jt_btn2.gif";
  }
}
var orgX = 0;
document.onmousedown = function(e)
{
  var evt = Utils.fixEvent(e);
  orgX = evt.clientX;

  if (Browser.isIE) document.getElementById('tbl').setCapture();
}
document.onmouseup = function(e)
{
  var evt = Utils.fixEvent(e);
  frmBody = parent.document.getElementById('frame-body');
  frmWidth = frmBody.cols.substr(0, frmBody.cols.indexOf(','));
  frmWidth = (parseInt(frmWidth) + (evt.clientX - orgX));
  frmBody.cols = frmWidth + ", 10, *";
  if (Browser.isIE) document.releaseCapture();
}
var Browser = new Object();
Browser.isMozilla = (typeof document.implementation != 'undefined') && (typeof document.implementation.createDocument != 'undefined') && (typeof HTMLDocument != 'undefined');
Browser.isIE = window.ActiveXObject ? true : false;
Browser.isFirefox = (navigator.userAgent.toLowerCase().indexOf("firefox") != - 1);
Browser.isSafari = (navigator.userAgent.toLowerCase().indexOf("safari") != - 1);
Browser.isOpera = (navigator.userAgent.toLowerCase().indexOf("opera") != - 1);
var Utils = new Object();
Utils.fixEvent = function(e)
{
  var evt = (typeof e == "undefined") ? window.event : e;
  return evt;
}
</script>
<body onselect="return false;">
<div class="jt" id="tbl"><a href="javascript:toggleMenu();"><img src="common/skin/1/images/jt_btn.gif"  id="img" /></a></div>
<div class="zhezhao" style="position:fixed; top:0; left:0; z-index:2; width:100%;height:100%; background:#000; filter:alpha(opacity=70); opacity:0.7;display:none;"></div>
</body>
</html>