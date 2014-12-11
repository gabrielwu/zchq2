<?php
    $id = $_GET['id'];
	include("connect.php");
    $sql="select path from download where id=".$id;
    $result=mysql_query($sql);
    $row=mysql_fetch_row($result);
    $path = str_replace("./background", "..", $row[0]); 
    if(file_exists($path)) {                                           
        unlink($path);
    }
	$sql="delete from download where id=$id";
	mysql_query($sql);
	echo mysql_affected_rows();
?>