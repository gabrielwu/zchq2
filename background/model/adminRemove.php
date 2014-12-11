<?php
	header("Content-Type:text/html;charset=utf-8");
    require("../../db/conn.php");
	require("../../util/util.php");

	$userid = $_GET['userid'];
	$sql = "delete from dede_admin where userid='$userid'";
	mysql_query($sql); //echo $sql;
	$status = mysql_affected_rows();
	echo $status;
?>
