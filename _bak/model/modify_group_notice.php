<?php
	header("Content-Type:text/html;charset=utf-8");
	include("connect.php");
	$id=$_POST['id'];
	$name=$_POST['name'];
	$content=$_POST['content'];	
	$sql="update group_notice set name='$name', content='$content' where id='$id'";
	mysql_query($sql);
	$flag = mysql_affected_rows();
	if ($flag == 1) {
		echo "<script>alert('Succeed!');window.location.href='../view/modify_group_notice.php?id=$id';</script>";
	} else {
	    echo "<script>alert('Failed!');window.location.href='../view/modify_group_notice.php?id=$id';</script>";
	}
?>