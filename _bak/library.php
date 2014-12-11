<?php
include("./db/conn.php");
function download($page, $per) {
    $start = ($page - 1) * $per; 
    $sql="select * from download order by time desc limit $start, $per";
	$result = mysql_query("$sql");
	return $result;
}
function download_page($per) {
    $sql0="select count(id) as count from download";
	$result0 = mysql_query($sql0);
	$row0 = mysql_fetch_array($result0);
	$total = $row0['count'];
	$pageTotal = ceil($total / $per);
	return $pageTotal;
}
?>