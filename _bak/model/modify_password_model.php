<?php
    session_start();   
	header("Content-Type:text/html;charset=utf-8");
	include('connect.php');
	$password = sha1($_GET[password]);
	$sql = "update admin set ad_password='$password' where ad_id=$_SESSION[ad_id]";
	mysql_query($sql);
	$flag = mysql_affected_rows();
	if($flag == 1)
		echo "修改密码成功！";
	else
		echo "修改密码失败！";
 ?>