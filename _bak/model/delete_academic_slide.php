<?php
    $id = $_GET['id'];
	include("connect.php");
	$sql="update news set a_isslide=0 where a_id=".$id;
	mysql_query($sql);
	echo mysql_affected_rows();
?>