<?php
	
	ob_start();
	if (!session_id()) session_start();  //��������
	$conn=@mysql_connect("localhost","root","");  //����mysql��������Ϣ
	if($conn==null)
	{
		echo "���ݿ��ʧ��";
		exit; //���ݿ��ʧ�ܣ��˳�
	}
	mysql_query("SET NAMES 'utf8'"); //�������ݿ����
	mysql_select_db("bookinfo"); //ѡ�����ݿ�
?>
