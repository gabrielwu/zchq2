<?php
	header("Content-Type:text/html;charset=utf-8");		
	include("connect.php");
	$sql="insert into research (r_name,r_content) values ('$_POST[rname]','$_POST[details]')";
	mysql_query($sql);
	$flag = mysql_affected_rows();
	if($flag == 1){
	    echo "<script>alert('Succeed!');window.location.href='../view/add_research.php';</script>";
	} else {
    	echo "<script>alert('Failed!');window.location.href='../view/add_research.php';</script>";
	}
?>