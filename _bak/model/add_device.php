<?php
	header("Content-Type:text/html;charset=utf-8");
	include("connect.php");
	$sql="insert into device (d_name,d_content) values ('".$_POST['rname']."','".$_POST['details']."')";
	mysql_query($sql);
	$flag = mysql_affected_rows();
	if ($flag == 1) {
		echo "<script>alert('添加成功！');window.location.href='../view/add_device.php';</script>";
	} else {
	    echo "<script>alert('添加失败！');window.location.href='../view/add_device.php';</script>";
	}
?>