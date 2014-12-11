<?php
session_start();
require("../db/conn.php");
$username = $_POST['username'];
$password = sha1($_POST['password']);
$inviteCode = $_POST['inviteCode'];

$sql = "select invite_code from admin";
$result = mysql_query($sql);
$flag = false;
while ($row = mysql_fetch_array($result)) {
    if ($row['invite_code'] == $inviteCode) {
	    $flag = true;
		break;
	}
}
if ($flag) {
    $sql = "insert into member (m_username, m_password) values('$username', '$password')";
	//echo $sql;
	mysql_query($sql);
	//echo mysql_affected_rows();
	if (mysql_affected_rows() == 1) {
	    echo '0';
	} else {
	    echo '1';
	}
} else {
    echo '2';
}
?>