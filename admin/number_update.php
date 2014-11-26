<?php
include("../config.php");
require_once('ly_check.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>青春在线图书管理系统v1.0</title>
<link rel="stylesheet" href="images/css.css" type="text/css">
<script language="javascript"> 
    function myform_Validator(theForm)
    { 			
		if (myform.name.value=="")
		{
			// 如果真实姓名为空，则显示警告信息
	        alert("真实姓名不能为空！");
			myform.name.focus();
			return false;
	    }
		if (myform.password.value=="" )
		{
			// 如果密码为空，则显示警告信息
	        alert("密码不能为空！");
			myform.password.focus();
			return false;
	    }
		//为降低申请帐号的email要求，注释掉了
		/*if (myform.email.value=="")
		{
			// 如果Email为空，则显示警告信息
	        alert("Email不能为空！");
			myform.email.focus();
			return false;
	    }
			// 检查email格式是否正确
		else if (myform.email.value.charAt(0)=="." ||
			myform.email.value.charAt(0)=="@"||
			myform.email.value.indexOf('@', 0) == -1 ||
			myform.email.value.indexOf('.', 0) == -1 ||
			myform.email.value.lastIndexOf("@")==form1.email.value.length-1 ||
			myform.email.value.lastIndexOf(".")==form1.email.value.length-1)
		{
			alert("Email的格式不正确！");
			myform.email.select();
			return false;
		}*/
		if (myform.tel.value=="" )
		{
			// 如果电话为空，则显示警告信息
	        alert("电话不能为空！");
			myform.tel.focus();
			return false;
	    }
		return true;

    }	
</script>

</head>
<?php
$sql="select * from user where id=".$_GET['id'];
$arr=mysql_query($sql,$conn);
$rows=mysql_fetch_row($arr);
?>
<?php 
if(isset($_POST['action'])=="modify"){
$sqlstr = "update user set name = '".$_POST['name']."', password = '".$_POST['password']."', email = '".$_POST['email']."', tel = '".$_POST['tel']."', department = '".$_POST['department']."',grade='".$_POST['grade']."' where id = ".$_GET['id'];
$arry=mysql_query($sqlstr,$conn);
if ($arry){
				echo "<script> alert('修改成功');location='number.php';</script>";
			}
			else{
				echo "<script>alert('修改失败');history.go(-1);</script>";
				}

		}
?>
<body>
<form id="myform" name="myform" method="post" action="" onSubmit="return myform_Validator(this)" language="JavaScript" >
      <table width="100%" height="173" border="0" align="center" cellpadding="2" cellspacing="1" class="table">
        <tr>
          <td colspan="2" align="left" class="bg_tr">&nbsp;后台管理&nbsp;&gt;&gt;&nbsp;用户修改</td>
        </tr>
        <tr>
          <td width="31%" align="right" class="td_bg">姓 名：</td>
          <td width="69%" class="td_bg">
            <input name="name" type="text" id="name" value="<?php echo $rows[1] ?>" size="15" maxlength="30" /><font color="#FF0000">*</font>          </td>
        </tr>
        <tr>
          <td align="right" class="td_bg">密 码：</td>
          <td class="td_bg">
            <input name="password" type="text" id="password" size="15" maxlength="15" /><font color="#FF0000">*尽量用学号以免遗忘</font>          </td>
        </tr>
        <tr>
          <td align="right" class="td_bg">邮 箱：</td>
          <td class="td_bg">
            <input name="email" type="text" id="email" value="<?php echo $rows[3] ; ?>" size="15" />
                      </td>
        </tr>
        <tr>
          <td align="right" class="td_bg">电 话：</td>
          <td class="td_bg"><label>
            <input name="tel" type="text" id="tel" value="<?php echo $rows[4]; ?>" size="15" maxlength="11" />
          </label><font color="#FF0000">*</font></td>
        </tr>
        <tr>
          <td align="right" class="td_bg">部 门：</td>
          <td class="td_bg"><select name="department" id="department">
       		<option value="程序" <?php if($rows[5]=="程序"){ echo "selected"; }?>>程序</option>
            <option value="美工" <?php if($rows[5]=="美工"){ echo "selected"; }?>>美工</option>
            <option value="综合" <?php if($rows[5]=="综合"){ echo "selected"; }?>>综合</option>
            <option value="采编" <?php if($rows[5]=="采编"){ echo "selected"; }?>>采编</option>
            <option value="品牌" <?php if($rows[5]=="品牌"){ echo "selected"; }?>>品牌</option>
            <option value="闪客" <?php if($rows[5]=="闪客"){ echo "selected"; }?>>闪客</option>
       </select>
      <?php   $now=date("Y");
              $year=$now-5;
				 echo" <script type='text/javascript'>
                 var year=".$year.";
				document.write(\"<select name='grade' id='grade'>\");
		for(var a=1;a<=10;a++){
			if(year==".$rows[6]."){
				document.write(\"<option selected>\"+year+\"</option>\");
			}
			else{
				 document.write(\"<option>\"+year+\"</option>\");
			}
			year=year+1; 
    	}
		document.write(\"</select>\");
        </script>级 "; ?>
          </td>
        </tr>
          <tr>
          <td align="right" class="td_bg">
          <input type="hidden" name="action" value="modify">
            <input type="submit" name="button" id="button" value="提交"/></td>
          <td class="td_bg">　　
            <input type="reset" name="button2" id="button2" value="重置"/></td>
        </tr>
      </table>
</form>
</body>
</html>