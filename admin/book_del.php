<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("../config.php");
require_once('ly_check.php');
$sql="delete from yx_books where id=".$_GET['id'];
$arry=mysql_query($sql,$conn);
if($arry){
echo "<script> alert('删除成功');location='list.php';</script>";
}
else
echo "删除失败";
?>