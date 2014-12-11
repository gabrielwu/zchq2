<?php
	header("Content-Type:text/html;charset=utf-8");
	include("connect.php");
	$id=$_POST['id'];
	$rname=$_POST['rname'];
	$content=$_POST['content'];	
	$sql="update device set d_name='$rname',d_content='$content',d_pic_path='' where d_id='$id'";
	mysql_query($sql);
	$flag = mysql_affected_rows();
	if ($flag == 1) {
		echo "<script>alert('修改成功！');window.location.href='../view/modify_device.php?id=$id';</script>";
	} else {
	    echo "<script>alert('修改失败！');window.location.href='../view/modify_device.php?id=$id';</script>";
	}
?>