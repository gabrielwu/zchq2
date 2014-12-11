<?php
header("Content-Type:text/html;charset=utf-8");
require("../../db/conn.php");
$userid =$_POST['account'];
$pwd    =$_POST['password'];
$sql = "select * from dede_admin where userid='$userid'";
$resutl = mysql_query($sql);
$info=mysql_fetch_array($resutl);
mysql_close($link);
if ($info && $info['pwd'] == substr(md5($pwd), 5, 20)) {
	session_start();
	$_SESSION['mark']="login";
	$_SESSION['userid'] = $userid;
	$_SESSION['id'] = $info['id'];
	echo "view/manage.php";
} else {
	echo "fail";
}
?>