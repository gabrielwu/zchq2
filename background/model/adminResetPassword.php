<?php
	header("Content-Type:text/html;charset=utf-8");
    require("../../db/conn.php");
	require("../../util/util.php");

	$userid = $_GET['userid'];
	$pwd = substr(md5($userid), 5, 20);
	$sql = "update dede_admin set pwd='$pwd' where userid='$userid' "; //echo $sql;
	mysql_query($sql);
	$status = mysql_affected_rows();
	echo $status;
?>