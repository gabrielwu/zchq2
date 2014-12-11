<?php
session_start();
require("../db/conn.php");
$oldPwd = $_POST['oldPwd'];
$newPwd = $_POST['newPwd'];
$m_id = $_SESSION["m_id"];
$sql = "select m_password, m_id from member where m_id='$m_id'";
$result = mysql_query("$sql");
if ($row = mysql_fetch_array($result)) {
    if ($row["m_password"] == sha1($oldPwd)) {
        $sha1_newPwd = sha1($newPwd);
		$sqlUpdate = "update member set m_password='$sha1_newPwd' where m_id='$m_id'";
		mysql_query($sqlUpdate);
		if (mysql_affected_rows() == 1) {
		    echo "0";
		} else {
		    echo "3";
		}
	} else {
	    echo "1";
	}
} else {
    echo "2";
}
?>