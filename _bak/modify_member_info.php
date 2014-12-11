<?php
session_start();
require("../db/conn.php");
$m_id = $_SESSION["m_id"];
$username = $_POST['username'];
$cname = $_POST['cname'];
$ename = $_POST['ename'];
$title = $_POST['title'];
$grade = $_POST['grade'];
$addr = $_POST['addr'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$detail = $_POST['detail'];
$sql = "update member set m_username='$username' where m_id='$m_id'";
mysql_query("$sql");
$flag = mysql_affected_rows();
if ($flag == -1) {
    echo '1'; // failed, username existed 
} else {
    $_SESSION['username'] = $_POST['username'];
    $sql2 = "update member set ".
	    "m_cname='$cname', ".
		"m_ename='$ename', ".
		"m_title='$title', ".
		"m_grade='$grade', ".
		"m_addr='$addr', ".
		"m_tel='$tel', ".
		"m_email='$email', ".
		"m_detail='$detail' ".
		"where m_id='$m_id'";
	mysql_query("$sql2");
	//echo $sql2;
	$flag2 = mysql_affected_rows();
    if ($flag2 == 1) {
	    echo '0'; // succeed	
	} else {
	    echo '2'; // failed, username succeed, other failed
	}	
}
?>