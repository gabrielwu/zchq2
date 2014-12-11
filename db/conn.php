<?php
    $server = "localhost";
    $username = "root";
	$password = "root";
	$database = "zchq";
	$link=mysql_connect($server, $username, $password) or die("Could not connect:".mysql_error());
	mysql_select_db($database, $link);
    mysql_query("set names 'utf8'");
?>