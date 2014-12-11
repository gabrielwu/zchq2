<?php   
    session_start();
	$ad_id = $_SESSION['ad_id'];
	$ad_account = $_GET['ad_account'];
	$invite_code = $_GET['invite_code'];
	header("Content-Type:text/html;charset=utf-8");
	include("connect.php");
	$sql="update admin set ad_account='$ad_account',invite_code='$invite_code' where ad_id='$ad_id'";
	mysql_query($sql);
	$flag = mysql_affected_rows();
	if ($flag == 1) {
		echo "修改账号成功！";
	} else {
		echo "修改账号失败！";
	}
 ?>