<?php
include("../config.php");
require_once('ly_check.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>青春在线图书管理系统v1.0</title>
<link rel="stylesheet" href="images/css.css" type="text/css">
</head>
<body>
<?php
	$pagesize=10;
	$sql="select * from user";
	$rs=mysql_query($sql);
	$recordcount=mysql_num_rows($rs);
	$pagecount=($recordcount-1)/$pagesize+1;
	$pagecount=(int)$pagecount;
	if(!isset($_GET['pageno']))
	{
		$pageno=1;
	}else{
		$pageno=$_GET["pageno"];
	}
	if($pageno>$pagecount)
	{
		$pageno=$pagecount;
	}
	$startno=($pageno-1)*$pagesize;
	$sql="select * from user order by id asc limit $startno,$pagesize";
	$rs=mysql_query($sql);
?>
<table width="799" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC" class="table">
      <tr>
        <td height="27" colspan="7" align="left" bgcolor="#FFFFFF" class="bg_tr">&nbsp;后台管理&nbsp;&gt;&gt;&nbsp;会员统计</td>
      </tr>
      <tr>
        <td width="6%" height="35" align="center" bgcolor="#FFFFFF">ID</td>
        <td width="25%" align="center" bgcolor="#FFFFFF">姓名</td>
        <td width="11%" align="center" bgcolor="#FFFFFF">部门</td>
        <td width="16%" align="center" bgcolor="#FFFFFF">邮箱</td>
        <td width="11%" align="center" bgcolor="#FFFFFF">电话</td>
        <td width="11%" align="center" bgcolor="#FFFFFF">年级</td>
        <td width="20%" align="center" bgcolor="#FFFFFF">操作</td>
      </tr>
     <?php
	while($rows=mysql_fetch_assoc($rs))
	{
	?>
<tr align="center">
<td class="td_bg" width="6%"><?php echo $rows["id"]?></td>
<td class="td_bg" width="25%" height="26"><?php echo $rows["name"]?></td>
<td class="td_bg" width="11%" height="26"><?php echo $rows["department"]?></td>
<td class="td_bg" width="16%" height="26"><?php echo $rows["email"]?></td>
<td width="11%" height="26" class="td_bg"><?php echo $rows["tel"]?></td>
<td width="11%" height="26" class="td_bg"><?php echo $rows["grade"]?></td>
<td class="td_bg" width="20%">
<a href="number_update.php?id=<?php echo $rows['id'] ?>" class="trlink">修改</a>&nbsp;&nbsp;<a href="number_del.php?id=<?php echo $rows['id'] ?>" class="trlink">删除</a></td>
</tr>
	<?php
	}
?>
	    <tr>
      <th height="25" colspan="7" align="center" class="bg_tr">
    <?php
	if($pageno==1)
	{
	?>
	首页 | 上一页 | <a href="?pageno=<?php echo $pageno+1?>&id=<?php echo $pageno?>">下一页</a> | <a href="?pageno=<?php echo $pagecount?>&id=<?php echo $pageno?>">末页</a>
	<?php
	}
	else if($pageno==$pagecount)
	{
	?>
	<a href="?pageno=1&id=<?php echo $pageno?>">首页</a> | <a href="?pageno=<?php echo $pageno-1?>&id=<?php echo $pageno?>">上一页</a> | 下一页 | 末页
	<?php
	}
	else
	{
	?>
	<a href="?pageno=1&id=<?php echo $pageno?>">首页</a> | <a href="?pageno=<?php echo $pageno-1?>&id=<?php echo $pageno?>">上一页</a> | <a href="?pageno=<?php echo $pageno+1?>&id=<?php echo $pageno?>" class="forumRowHighlight">下一页</a> | <a href="?pageno=<?php echo $pagecount?>&id=<?php echo $pageno?>">末页</a>
	<?php
	}
?>
	&nbsp;页次：<?php echo $pageno ?>/<?php echo $pagecount ?>页&nbsp;共有<?php echo $recordcount?>个用户 </th>
	  </tr>
</table>
</body>
</html>