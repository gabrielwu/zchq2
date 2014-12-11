<?php
	header("Content-Type:text/html;charset=utf-8");
	include("connect.php");
	$id = $_POST[id];
	$name = $_POST[name];
	$slide_pic = $_POST[slide_pic];
	$content = $_POST[content];
	$sql="update lab set name='$name', content='$content', slide_pic='$slide_pic' where id='$id'";
	mysql_query($sql);
	echo $flag = mysql_affected_rows();
?>