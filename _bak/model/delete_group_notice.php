<?php
    $id = $_GET['id'];
	include("connect.php");
	$sql="delete from group_notice where id=".$id;
	mysql_query($sql);
	$flag = mysql_affected_rows();
	echo $flag;
?>