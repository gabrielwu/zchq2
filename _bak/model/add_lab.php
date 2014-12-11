<?php
	header("Content-Type:text/html;charset=utf-8");
	include("connect.php");
	$name = $_POST[name];
	$slide_pic = $_POST[slide_pic];
	$content = $_POST[content];
	$sql="insert into lab (name,content,slide_pic) values('$name','$content','$slide_pic');";
	mysql_query($sql);
	echo $flag = mysql_affected_rows();
?>