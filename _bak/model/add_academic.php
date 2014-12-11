<?php 
	header("Content-Type:text/html;charset=utf-8");
	include("connect.php");
	$a_name = $_POST[a_name];
	$a_type = $_POST[a_type];
	$a_date = $_POST[a_date];
	$a_content = $_POST[a_content];
	$a_isslide = $_POST[a_isslide];
	$a_pic_cover_path = $_POST[a_pic_cover_path];
	$sql="insert into news (a_name,a_type,a_date,a_content,a_isslide,a_pic_cover_path) values('$a_name','$a_type','$a_date','$a_content','$a_isslide','$a_pic_cover_path')";
	mysql_query($sql);
	echo $flag = mysql_affected_rows();
?>