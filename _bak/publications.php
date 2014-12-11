<?php
include("./db/conn.php");
function journal_covers() {
    $sql="select * from paper where p_iscover='1' order by p_date desc";
	$result = mysql_query("$sql");
	return $result;
}
function paper_page($per) {
	$sql0="select count(p_id) as count from paper where p_iscover='1' order by p_date desc";
	$result0 = mysql_query("$sql0");
	$row0 = mysql_fetch_array($result0);
	$paperCount=$row0['count'];
	$num = $paperCount;
	$pageCount = ceil($paperCount / $per);
	$result = array("paperCount" => $paperCount, "num" => $num, "pageCount" => $pageCount);
	return $result;
}
function paper_author($id) {
	$sql="select m_name from paper,paper_member where paper.p_id=paper_member.p_no and p_id='$id'";
	$result=mysql_query("$sql");
	return $result;
}
?>