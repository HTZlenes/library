<?php include("config.php");?>
<html>
<body>
<?php
// ���ͼ����û��д����ʾ�û�
		$book_id=$_GET['book_id'];
		$lend_sql="select * from yx_books where id='$book_id' ";
		$jies=mysql_query($lend_sql,$conn);
		$jieshu=mysql_fetch_array($jies);
		if ($book_id==""){
			echo "<script language=javascript>alert('��Ų���ȷ');window.location='index.php'</script>";
			exit();
		}
		else {
		?>
	<?php
	// ����
		// �鿴�û��Ƿ��¼
		if (!isset($_SESSION['id'])){
			echo "<script language=javascript>alert('����û�е�½');window.location='landing.php'</script>";
			exit();
		}else{
		// �����������飬��¼֮
		// ��õ�ǰ����
		$now = date("Y-m-d");
		$lendsql="insert into lend(book_id, book_name, lend_time, user_id) values('$book_id','".$jieshu['name']."','$now','".$_SESSION['id']."')";
		mysql_query($lendsql,$conn) or die ("����ʧ�ܣ�".mysql_error());
		
		// �������Ҫ�ڸ����¼�п��ʣ������һ
		mysql_query("update yx_books set leave_number=leave_number-1 where id='$book_id'",$conn);
		echo "<script language=javascript>alert('�������');window.location='index.php'</script>";
		?>
<?php
}
	}
?>
</body>
</html>