<?php
    $id = $_GET['id'];
    require("../../db/conn.php");
	$sql="delete from dede_archives where id=$id";
	mysql_query($sql);
	echo mysql_affected_rows();
?>