<?php
include("./db/conn.php");
function project($page, $per) {
    $start = ($page - 1) * $per; 
    $sql="select * from project order by pr_date1 desc limit $start, $per";
	$result = mysql_query("$sql");
	return $result;
}
function project_page($per) {
    $sql0="select count(pr_id) as count from project";
	$result0 = mysql_query($sql0);
	$row0 = mysql_fetch_array($result0);
	$total = $row0['count'];
	$pageTotal = ceil($total / $per);
	return $pageTotal;
}
?>