<?php
include("./db/conn.php");
function device_data($page, $per) {
    $start = ($page - 1) * $per; 
    $sql="select * from device limit $start, $per";
	$result = mysql_query("$sql");
	return $result;
}
function page_total($per) {
    $sql0="select count(d_id) as count from device";
	$result0 = mysql_query($sql0);
	$row0 = mysql_fetch_array($result0);
	$total = $row0['count'];
	$pageTotal = ceil($total / $per);
	return $pageTotal;
}
?>