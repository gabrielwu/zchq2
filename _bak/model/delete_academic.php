<?php
    $id = $_GET['id'];
	include("connect.php");
	$sql="select pi_path from acade_pic where acade_no=".$id;
	$result=mysql_query($sql);
	while($row=mysql_fetch_row($result))
	{
		$rowset[]=$row;
	}
	if(!empty($rowset)){
		foreach($rowset as $path)
		{
			unlink($path[0]);
		}
	}
	//ษพณýผวยผ
	$sql="delete from news where a_id=".$id;
	//echo $sql;
	echo mysql_query($sql);
?>