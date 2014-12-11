<?php
include("./db/conn.php");
function research() {
    $sql="select * from research";
	$result = mysql_query("$sql");
	return $result;
}
?>