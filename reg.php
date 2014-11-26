<?php
include("config.php");
?>
<html xmlns=" http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>青春在线图书管理系统</title>
<link rel="stylesheet" href="style.css" type="text/css">
</head>
<script language="javascript"> 
    function checkreg()
    { 			
		if (form1.name.value=="")
		{
			// 如果真实姓名为空，则显示警告信息
	        alert("真实姓名不能为空！");
			form1.name.focus();
			return false;
	    }
		if (form1.password.value=="" )
		{
			// 如果密码为空，则显示警告信息
	        alert("密码不能为空！");
			form1.password.focus();
			return false;
	    }
		if (form1.pwd.value=="" )
		{
			// 如果密码为空，则显示警告信息
	        alert("确认密码不能为空！");
			form1.pwd.focus();
			return false;
	    }
		// 检验两次密码一致
		if (form1.password.value!=form1.pwd.value && form1.password.value!="")
		{
			alert("两次密码不一样，请确认！");
			form1.password.focus();
			return false;
		}
		//为降低申请帐号的email要求，注释掉了
		/*if (form1.email.value=="")
		{
			// 如果Email为空，则显示警告信息
	        alert("Email不能为空！");
			form1.email.focus();
			return false;
	    }
			// 检查email格式是否正确
		else if (form1.email.value.charAt(0)=="." ||
			form1.email.value.charAt(0)=="@"||
			form1.email.value.indexOf('@', 0) == -1 ||
			form1.email.value.indexOf('.', 0) == -1 ||
			form1.email.value.lastIndexOf("@")==form1.email.value.length-1 ||
			form1.email.value.lastIndexOf(".")==form1.email.value.length-1)
		{
			alert("Email的格式不正确！");
			form1.email.select();
			return false;
		}*/
		if (form1.tel.value=="" )
		{
			// 如果电话为空，则显示警告信息
	        alert("电话不能为空！");
			form1.tel.focus();
			return false;
	    }
		return true;

    }	
</script>

<?php 
if(isset($_POST['submit'])){
// 取得网页的参数
$name=$_POST['name'];
$password=$_POST['password'];
$email=$_POST['email'];
$tel=$_POST['tel'];
$department=$_POST['department'];
$grade=$_POST['grade'];
// 加密密码
$password=md5($password);
// 连接数据库，注册用户
$sql="insert into user(name, password, email, tel, department, grade) values('$name','$password','$email', '$tel','$department','$grade')";
mysql_query($sql,$conn) or die ("注册用户失败: ".mysql_error());

// 获得注册用户的自动id，以后使用此id才可登录
$result=mysql_query("select last_insert_id()",$conn);
$re_arr=mysql_fetch_array($result);
$id=$re_arr[0];

//注册成功，自动登录，注册session变量

$user=$id;
echo "<script language=javascript>alert('注册成功,请重新登录!');window.location='landing.php'</script>";
	}
?>
<body>
<?php include("head.php");?>
<form name="form1" method="post" action="" enctype='multipart/form-data' onSubmit="return checkreg()" >
  <table width="782" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
    <tr> 
      <th colspan="2" bgcolor="#FFFFFF"><font size="5">用 户 注 册 界 面</font></th>
    </tr>    
    <tr> 
      <td width="364" align="right" bgcolor="#FFFFFF">姓   名：</td>
      <td width="403" bgcolor="#FFFFFF"> 
        <input type="text" name="name"><font color="#FF0000">*</font>
    </tr>
    <tr> 
      <td align="right" bgcolor="#FFFFFF">密   码：</td><font color="#FF0000">*</font>
      <td bgcolor="#FFFFFF"> 
        <input type="password" name="password"><font color="#FF0000">*尽量用学号以免遗忘</font>       
    </tr>
	<tr> 
      <td align="right" bgcolor="#FFFFFF">确认密码：</td><font color="#FF0000">*</font>
      <td bgcolor="#FFFFFF"> 
        <input type="password" name="pwd"><font color="#FF0000">*</font>        
    </tr>
	<tr> 
      <td align="right" bgcolor="#FFFFFF">Email：</td>
      <td bgcolor="#FFFFFF"> 
        <input type="text" name="email">        
    </tr>
	 <tr> 
      <td align="right" bgcolor="#FFFFFF">电   话：</td>
      <td bgcolor="#FFFFFF"> 
        <input type="text" name="tel"><font color="#FF0000">*</font>
    </tr>
	<tr> 
      <td align="right" bgcolor="#FFFFFF">部   门：</td>
      <td bgcolor="#FFFFFF"> 
       <select name="department">
       		<option value="程序">程序</option>
            <option value="美工">美工</option>
            <option value="综合">综合</option>
            <option value="采编">采编</option>
            <option value="品牌">品牌</option>
            <option value="闪客">闪客</option>
       </select>
       <script type="text/javascript">
                var now = new Date();
                var year=now.getFullYear()-5;
				document.write("<select name='grade'>");
		for(var a=1;a<=10;a++){
			document.write("<option>"+year+"</option>");
			year=year+1; 
    	}
		document.write("</select>");
        </script>级
      
    </tr>    
    <tr> 
      <td  align=right bgcolor="#FFFFFF" > 
        <input type="submit" name="submit" id="submit" value="注 册">
      </td>
      <td align=left bgcolor="#FFFFFF"> 
        <input type="reset" name="submit" id="submit" value="重 写">
      </td>
    </tr>
  </table>
</form>
</body>
</html>