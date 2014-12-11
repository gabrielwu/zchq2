<?php
function group_notice($page, $per) {
    $start = ($page - 1) * $per; 
    $sql="select * from group_notice limit $start, $per";
	$result = mysql_query("$sql");
	return $result;
}
function group_notice_page_total($per) {
    $sql0="select count(id) as count from group_notice";
	$result0 = mysql_query($sql0);
	$row0 = mysql_fetch_array($result0);
	$total = $row0['count'];
	$pageTotal = ceil($total / $per);
	return $pageTotal;
}
?>