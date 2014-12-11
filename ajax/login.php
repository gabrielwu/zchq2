<?php
session_start();
require("../db/conn.php");
$username = $_POST['username'];
$password = $_POST['password'];
$sql = "select m_password, m_id from member where m_username like binary('$username')";
$result = mysql_query("$sql");
if ($row = mysql_fetch_array($result)) {
    if ($row["m_password"] == sha1($password)) {
	    $_SESSION['login'] = true;
	    $_SESSION['username'] = $username;
	    $_SESSION['m_id'] = $row['m_id'];
	    echo "success".$_SESSION['username'].$_SESSION['login'];
	} else {
	    echo "fail";
	}
} else {
    echo "fail";
}
?>