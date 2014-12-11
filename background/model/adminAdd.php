<?php
	header("Content-Type:text/html;charset=utf-8");
    require("../../db/conn.php");
	require("../../util/util.php");

	$sql = "select max(id) as maxId from dede_admin";
    $result = mysql_query($sql);
    $data = mysql_fetch_array($result);
    $id = $data['maxId'] + 1;

	$userid = $_GET['userid'];
	$pwd = substr(md5($userid), 5, 20);
	//INSERT INTO `dede_admin`(`id`, `userid`, `pwd`, uname, tname, email, loginip) VALUES ('5', '123', '962ac59075b964b07152', 'uan', 'tname', 'email', '1', )
	$sql = "insert into `dede_admin`(`id`, `userid`, `pwd`, `uname`, `tname`, `email`, `loginip`) values('$id', '$userid', '$pwd', '', '', '', '')";//echo $sql;
	mysql_query($sql);
	echo mysql_affected_rows();
?>