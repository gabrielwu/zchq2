<?php
session_start();   
require("../../db/conn.php");
$userid = $_SESSION['userid'];
$passwordOld = $_POST["passwordOld"];
$passwordNew = $_POST["passwordNew"];
$passwordRe  = $_POST["passwordRe"];
if ($passwordRe != $passwordNew) {
	echo "0";
    return ;
}
if ($passwordNew == "") {
    echo "-1";
    return ;
}
$sql = "select * from dede_admin where userid='$userid'";
$resutl = mysql_query($sql);
$info = mysql_fetch_array($resutl);
if ($info && $info['pwd'] == substr(md5($passwordOld), 5, 20)) {
	$password = substr(md5($passwordNew), 5, 20);
	$sql = "update dede_admin set pwd='$password' where userid='$userid'";
	mysql_query($sql);
	echo mysql_affected_rows();
} else {
	echo "3";
}
?>