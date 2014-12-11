<?php
    $id = $_GET['id'];
	include("connect.php");
	$sql="delete from recommend where re_id=$id";
	mysql_query($sql);
	echo mysql_affected_rows();
?>