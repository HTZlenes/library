<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	require_once("../config.php");
	if($_SESSION["admin"]=="")
	{
 	echo "<script language=javascript>alert('请重新登陆！');window.location='login.php'</script>";
	}
?>