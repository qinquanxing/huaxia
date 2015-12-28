<?php 
class Pager 
{ 
    var $_perPage; //每一页记录数

    var $_totalItems; //总记录数

    var $_totalPages; //总共页数

    var $_currentPage; // 当前页序号

    var $_listStart; //当前头条记录ID

    var $_listEnd; //当前最后条记录ID

    var $_pageStart; //第一页

    var $_pageEnd; //最后页

    var $_listPage; //循环显示当前分页列表

    var $_pageData; //当前要显示的记录

    var $_linkData; //页面传递的变量

    var $_startId; //从数据库读出的启始id

    function pager($_totalItems, $_perPage, $_linkData) 
    { 
        $this->_currentPage = max((int)@$_GET['pageId'], 1); //当前的页序号

        $this->_perPage = $_perPage; //每一页记录数

        $this->_totalItems = $_totalItems; //总记录数

        $this->_totalPages = ceil($this->_totalItems / $this->_perPage); //总页数

        $this->_linkData = $_linkData; //传递的变量

        $this->_listStart = ($this->_currentPage - 1) * $this->_perPage ; //当前头条记录ID

        $this->_listEnd = ($this->_currentPage != $this->_totalPages) ? $this->_currentPage * $this->_perPage : $this->_totalItems; //当前最后条记录ID

        $this->_startId = $this->_listStart -1; //从数据库读出的启始id

    } 
    function startId() // 从数据库读出的启始id

    { 
        return $this->_startId; 
    } 
    function totalItems() // 总记录数

    { 
        return $this->_totalItems; 
    } 
    function totalPages() // 总页数

    { 
        return $this->_totalPages; 
    } 
    function listStart() // 当前头条记录ID

    { 
        return $this->_listStart; 
    } 
    function listEnd() // 当前最后条记录ID

    { 
        return $this->_listEnd; 
    } 
    function currentPage() // 当前页

    { 
        return $this->_currentPage; 
    } 
    function pageStart() // 第一页

    { 
        return $this->_pageStart = "<a href=" .  ($this->_linkData) . "&pageId=1><FONT title=首页 face=webdings>9</FONT></a>"; 
    } 
    function pageEnd() // 最后页

    { 
        return $this->_pageEnd = "<a href=" .  ($this->_linkData) . "&pageId=" . $this->_totalPages . "><span><FONT title=尾页 face=webdings>:</FONT></span></a>"; 
    } 
    function upPage() // 上一页

    { 
        if ($this->_currentPage > 1 and $this->_currentPage <= $this->_totalPages) 
        { 
            $up = $this->_currentPage-1; 
            return $this->_upPage = "<a href=" .  ($this->_linkData) . "&pageId=" . $up . "><FONT title=上页 face=webdings>7</FONT></a>"; 
        } 
    } 
    function downPage() // 下一页

    { 
        $down = $this->_currentPage + 1; 
        if ($this->_currentPage < $this->_totalPages) 
            return $this->_downPage = "<a href=" .  ($this->_linkData) . "&pageId=" . $down . " ><FONT title=下页 face=webdings>8</FONT></a>"; 
    } 
    function listPage() // 循环显示当前分页列表

    { 
        if ($this->_currentPage <= 5 and $this->_currentPage != "") 
        { 
            $start = 1; 
            if ($this->_totalPages < 10) $end = $this->_totalPages; 
            else $end = 10; 
        } elseif (($this->_currentPage + 5) > $this->_totalPages) 
        { 
            $start = $this->_currentPage - 5; 
            $end = $this->_totalPages; 
        } 
        else 
        { 
            $start = $this->_currentPage - 4; 
            $end = $this->_currentPage + 5; 
        } 
        for($i = $start; $i <= $end; $i++) 
        { if($_GET['pageId']==$i){
            $this->_listPage .= "<a href=" .  ($this->_linkData) . "&pageId=" . $i . "><span class=curent>" . $i ."</span></a> "; }else{$this->_listPage .= "<a href=" .  ($this->_linkData) . "&pageId=" . $i . "><span >" . $i . "</span></a> ";}
        } 
        return $this->_listPage; 
    } 
    function jumpPage() // 跳转

    { 
        $this->_jumpPage = "<table border=0 width=100% class='fonts'><tr><td>跳转 <select name='pageId' style='height=14px' onchange=\"location='" .  ($this->_linkData) . "&pageId='+this.value;\">"; //页面跳转

        for($i = 1; $i <= $this->_totalPages; $i++) 
        { 
            if ($i == $this->_currentPage) $selected = "selected"; 
            $this->_jumpPage .= "<option value='$i' $selected>$i</option>"; 
            unset($selected); 
        } 
        return $this->_jumpPage .= "</select> 页</td></tr></table>"; 
    } 
} 

?> 
