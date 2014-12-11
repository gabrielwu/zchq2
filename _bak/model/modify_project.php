<?php
	header("Content-Type:text/html;charset=utf-8");
	include("connect.php");	
	$id = $_POST['pid'];
	$sql="update project set pr_leader='$_POST[leader]',pr_name='".$_POST['pname']."',pr_type='".$_POST['type']."',pr_cost='".$_POST['cost']."',pr_mark='".$_POST['mark']."',pr_date1='".$_POST['date1']."',pr_date1='".$_POST['date1']."', pr_num='".$_POST['pnum']."' where pr_id=".$_POST['pid'];
	mysql_query($sql);
	$flag = mysql_affected_rows();
	if($flag == 1){
	    echo "<script>alert('修改成功！');window.location.href='../view/modify_project.php?id=$id';</script>";
	} else {
	    echo "<script>alert('修改失败！');window.location.href='../view/modify_project.php?id=$id';</script>";
	}
?>


