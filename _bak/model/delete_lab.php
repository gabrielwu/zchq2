<?php
	include("connect.php");
	$sql = "delete from lab where id=$_GET[id]";
	mysql_query($sql);
	$flag = mysql_affected_rows();
	echo $flag;
?>