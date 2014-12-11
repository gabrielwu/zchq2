<?php
    header("Content-Type:text/html;charset='utf-8'");
	include("connect.php");

	$cover='../picture/life/'.$_GET['cover'];
	$acname = $_GET['acname'];
	$content = $_GET['content'];
	$date = $_GET['date'];
	$ac_id = $_GET['ac_id'];
	
	if (isset($_GET['cover'])) {
	    $sql="update activity set ac_name='$acname',ac_content='$content',ac_date='$date' where ac_id='$ac_id'";	
	} else {
	    $sql="update activity set ac_name='$acname',ac_content='$content',ac_date='$date',ac_pic_cover_path='$cover' where ac_id='$ac_id'";
	}
	echo $sql;
	if(mysql_query($sql)){
		$index = 0;
		foreach($_GET['fileNames'] as $life_pic){
			$life_pic='../picture/life/'.$life_pic;
			$sql="insert into acti_pic (ac_no,pi_path,pi_intro) values('".$ac_id."','".$life_pic."','".$_GET['picIntros'][$index++]."')";
			mysql_query($sql);
		} 
		$info="Succeed!";
	}else{
		$info="Failed!";
	}
	echo $info;
?>