<?php
	header("Content-Type:text/html;charset=utf-8");
	include("connect.php");
	$name=$_POST['name'];
	$content=$_POST['content'];	
	$sql="insert into group_notice (name,content) values('$name', '$content')";
	mysql_query($sql);
	$flag = mysql_affected_rows();
	if ($flag == 1) {
		echo "<script>alert('Succeed!');window.location.href='../view/add_group_notice.php';</script>";
	} else {
	    echo "<script>alert('Failed!');window.location.href='../view/add_group_notice.php';</script>";
	}
?>