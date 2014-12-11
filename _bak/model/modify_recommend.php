<?php
	header("Content-Type:text/html;charset=utf-8");
	include("connect.php");
	$id = $_POST['id'];
	$sql="update recommend set re_name='".$_POST['rename']."',re_abstract='".$_POST['content']."',re_link='".$_POST['relink']."' where re_id=".$_POST['id'];
	mysql_query($sql);
	$flag = mysql_affected_rows();
	if($flag == 1){
	    echo "<script>alert('修改成功！');window.location.href='../view/modify_recommend.php?id=$id';</script>";
	} else {
	    echo "<script>alert('修改失败！');window.location.href='../view/modify_recommend.php?id=$id';</script>";
	}
?>