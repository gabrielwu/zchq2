<?php
	header("Content-Type:text/html;charset=utf-8");
	include("connect.php");
	$sql="update contact set c_address='".$_POST['caddr']."',c_tel='".$_POST['ctel']."',c_fax='".$_POST['cfax']."',c_email='".$_POST['cemail']."'";
	if(mysql_query($sql)) {
		echo "<script>alert('修改成功！');window.location.href='../view/modify_contact.php';</script>";
	} else {
		echo "<script>alert('修改成功！');window.location.href='../view/modify_contact.php';</script>";
	}
?>


