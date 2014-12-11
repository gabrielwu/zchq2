<?php
	header("Content-Type:text/html;charset=utf-8");
	include("connect.php");
	$sql="insert into project (pr_name,pr_type,pr_cost,pr_mark,pr_date1,pr_date2, pr_num, pr_leader) ".
	    "values('".$_POST['pname']."','".$_POST['type']."','".$_POST['cost']."','".$_POST['mark']."','".$_POST['date1']."','".$_POST['date2']."','".$_POST[pnum]."','".$_POST[pauthors]."')";
	mysql_query($sql);
	$flag = mysql_affected_rows();
	if($flag == 1){
	    echo "<script>alert('添加成功！');window.location.href='../view/add_project.php';</script>";
	} else {
	    echo "<script>alert('添加失败！');window.location.href='../view/add_project.php';</script>";
	}
?>