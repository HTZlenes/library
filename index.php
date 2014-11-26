<?php
include("config.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>青春在线图书管理系统</title>
<link rel="stylesheet" href="style.css" type="text/css">

</head>
<body>
<!--左侧登录，个人信息-->
<div style="width:1024px; height:562px; margin:auto;">
	<div style="width:240px; height:560; background-color:#3CF; float:left; margin:auto;">
		<div style="width:239px; height:149px; border:1px #ccc solid;  margin:auto; background-color: #0FC;">
		<?php 
        if(!isset($_SESSION['id'])){
            echo 
            "<a href='landing.php'  title='登陆注册'>登陆注册</a>";
        }else if(isset($_SESSION['id'])){
            echo "<a href='landing.php?tj=out'  title='注销'>注销</a>";	
            echo "&nbsp;";
			echo"欢迎借阅！";
        }
        ?>
		<a href="admin/login.php"  title="管理图书" style="float:right;">管理图书</a>
		</div>
		<div style="width:239px; border:1px #ccc solid;  height:409px; margin:auto; background-color: #FFF; vertical-align: middle">
		<?php
		if(isset($_SESSION['id']))
		{
			$sql="select * from user where id = '$_SESSION[id]'";
			$res=mysql_query($sql,$conn);
			$result=mysql_fetch_array($res);
		?>
                <div style='background-color:#ffc; padding-top:5px; background-repeat:repeat-x; height:25px; border-bottom:2px #ccc solid;'><p style='margin:0;' align='center'>用户信息</p></div>
                <table>
                <tr>
                <td>姓名：</td><td><?php echo $result['name'];?></td>
                </tr>
                <tr>
                <td>电话：</td><td><?php echo $result['tel'];?></td>
                </tr>
                <tr>
                <td>邮箱：</td><td><?php echo $result['email'];?></td>
                </tr>
                <tr>
                <td>部门：</td><td><?php echo $result['department'];?></td>
                </tr>
                <tr>
                <td>年级：</td><td><?php echo $result['grade'];?></td>
                </tr>
                </table>
        <?php
		}
		?>
        </div>
  </div>     

<!---->
<div style="float:left; margin:auto; width:782px; height:562px;">
<?php include("head.php"); ?>
		<table width="782" border="0" align="left" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="22">
	<?php
	$pagesize=10;
	if(!isset($_GET['proid'])){
		$sql="select * from yx_books order by id asc";
	}else{
		$sql='select * from yx_books where type="'.urldecode($_GET['proid']).'"';
	}
	$rs=mysql_query($sql);
	$recordcount=mysql_num_rows($rs);
	$pagecount=($recordcount-1)/$pagesize+1;    //计算页数
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
	if(!isset($_GET['proid'])){
	$sql="select * from yx_books order by id asc limit $startno,$pagesize";
	}else{
	$sql="select * from yx_books where type='".urldecode($_GET['proid'])."' order by id asc limit $startno,$pagesize";
	}
	$rs=mysql_query($sql,$conn);
?>
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
      <td width="88" height="30" align="center" bgcolor="#FFFFFF" class="line2">ID</td>
	    <td width="103" align="center" bgcolor="#FFFFFF" class="line2">书名</td>
	    <td width="77" align="center" bgcolor="#FFFFFF" class="line2">价格</td>
	    <td width="152" align="center" bgcolor="#FFFFFF" class="line2">出版时间</td>
	    <td width="107" align="center" bgcolor="#FFFFFF" class="line2">类别</td>
	    <td width="126" align="center" bgcolor="#FFFFFF" class="line2">数量(剩|总)</td>
	    <td width="121" align="center" bgcolor="#FFFFFF" class="line2">操作</td>
	    </tr>
    <?php
		while($rows=mysql_fetch_assoc($rs))
	{
	?>
	<tr>
	  <td height="30" align="center" bgcolor="#FFFFFF"><?php echo $rows["id"];?></td>
	  <td align="center" bgcolor="#FFFFFF"><?php echo $rows["name"];?></td>
	  <td align="center" bgcolor="#FFFFFF"><?php echo $rows["price"];?></td>
	  <td align="center" bgcolor="#FFFFFF"><?php echo $rows["uploadtime"];?></td>
	  <td align="center" bgcolor="#FFFFFF"><?php echo $rows["type"];?></td>
	  <td align="center" bgcolor="#FFFFFF"><?php echo $rows["leave_number"]."|".$rows["total"]; ?></td>
	  <td align="center" bgcolor="#FFFFFF" class="line2">
	  <?php
	  if(!isset($_SESSION['id']))
	  {
		  echo "登录才能借阅！";
	  }else{
		  $rs2=mysql_query('select * from lend where book_id='.$rows["id"].' and user_id='.$_SESSION["id"].'');
		  $rows2=mysql_fetch_assoc($rs2);
	  	  if($rows2['book_id']){
	  	  	  echo "<font color='red'>您已借阅</font>&nbsp;&nbsp;<a href=huanshu.php?book_id=$rows[id]>我要还书</a>";
	      }else{
	  	      if($rows["leave_number"]==0){
				echo "<font color='#cccc00'>该书已借完</font>";
		}else{
	  echo "<a href=jieshu.php?book_id=$rows[id]>我要借书</a>";
	  }
	  	}
		}
	  ?>	  </td>
	</tr>
    
	<?php
	}

?>
</table>
<table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
  <td height="35" align="center" bgcolor="#FFFFFF">
 <?php
 	if(!isset($_GET['proid'])){
			if($pageno==1)
	{
	?>
    	首页| 上一页 | 
    	<a href="index.php?pageno=<?php echo $pageno+1?>">下一页</a> | 
    	<a href="index.php?pageno=<?php echo $pagecount?>">末页</a>
    <?php
	}
	else if($pageno==$pagecount)
	{
	?>
    <a href="index.php?pageno=1">首页</a> | <a href="index.php?pageno=<?php echo $pageno-1?>">上一页</a> | 下一页 | 末页
    <?php
	}
	else
	{
	?>
    <a href="index.php?pageno=1">首页</a> | <a href="index.php?pageno=<?php echo $pageno-1?>">上一页</a> | <a href="index.php?pageno=<?php echo $pageno+1?>" class="forumRowHighlight">下一页</a> | <a href="?pageno=<?php echo $pagecount?>">末页</a>
    <?php
	}
	
?>
<?php	}
	else{
	if($pageno==1)
	{
	?>
    	首页| 上一页 | 
    	<a href="index.php?proid=<?php echo urlencode($_GET['proid']);?>&pageno=<?php echo $pageno+1?>">下一页</a> | 
    	<a href="index.php?proid=<?php echo urlencode($_GET['proid']);?>&pageno=<?php echo $pagecount?>">末页</a>
    <?php
	}
	else if($pageno==$pagecount)
	{
	?>
    <a href="index.php?proid=<?php echo urlencode($_GET['proid']);?>&pageno=1">首页</a> | <a href="index.php?proid=<?php echo urlencode($_GET['proid']);?>&pageno=<?php echo $pageno-1?>">上一页</a> | 下一页 | 末页
    <?php
	}
	else
	{
	?>
    <a href="index.php?proid=<?php echo urlencode($_GET[proid]);?>&pageno=1">首页</a> | <a href="index.php?proid=<?php echo urlencode($_GET[proid]);?>&pageno=<?php echo $pageno-1?>">上一页</a> | <a href="index.php?proid=<?php echo urlencode($_GET[proid]);?>&pageno=<?php echo $pageno+1?>" class="forumRowHighlight">下一页</a> | <a href="?pageno=<?php echo $pagecount?>">末页</a>
    <?php
	}
	
?>
 <?php
	}
	
?>
    &nbsp;页次：<?php echo $pageno ?>/<?php echo $pagecount ?>页&nbsp;共有<?php echo $recordcount?>条信息
    </td>
  </tr>
</table></td></tr>
</table>
	</div>

</div>

</body>
</html>