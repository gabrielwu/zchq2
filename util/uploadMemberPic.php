<?php
session_start();
$m_id = $_SESSION['m_id'];
include ('../db/conn.php');
if ($_FILES["picUpload"]["error"] > 0){
    echo "Error: " . $_FILES["picUpload"]["error"] . "<br />";
} else {
    echo "Upload: " . $_FILES["picUpload"]["name"] . "<br />";
	echo "Type: " . $_FILES["picUpload"]["type"] . "<br />";
	echo "Size: " . ($_FILES["picUpload"]["size"] / 1024) . " Kb<br />";
	echo "Stored in: " . $_FILES["picUpload"]["tmp_name"];
	$dir = "../background/picture/people/";
	if (file_exists($dir. $_FILES["picUpload"]["name"])) {
    	echo $_FILES["picUpload"]["name"] . " already exists. ";
    } else {
		$pos = strrpos($_FILES["picUpload"]["name"], "."); 
		$ext = substr($_FILES["picUpload"]["name"], $pos);
		$file_new_name = sha1(time()). $ext;
		
	    move_uploaded_file($_FILES["picUpload"]["tmp_name"], $dir. $file_new_name);		
		$sql = "update member set m_photopath='../picture/people/$file_new_name' where m_id='$m_id'";
		mysql_query($sql);
		$flag = mysql_affected_rows();
		if ($flag == 1) {
		    echo 'success!';
		} else {
		    unlink($dir. $file_new_name);
		    echo 'failed!';
		}
        echo "Stored in: " . $dir. $_FILES["picUpload"]["name"];
		$picPath = "./background/picture/people/$file_new_name";
		echo "<script>parent.picUploadResult('$flag', '$picPath');</script>";
    }
}
?>