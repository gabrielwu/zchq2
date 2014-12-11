<?php
    $id = $_GET['id'];
	include("connect.php");;
	echo mysql_query($sql);	
	$sql="select l_content from link where l_id=".$id;
	$result=mysql_query($sql);
	$row=mysql_fetch_row($result); 
	$file = '..'.substr($row[0],13);
	if(file_exists($file)){
		unlink($file);
	}
	//删除记录
	$sql="delete from link where l_id=$id";
	echo mysql_query($sql);
?>