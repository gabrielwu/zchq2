<?php
	$dir = '../../uploads/soft/';
	$status = 1;//echo isset($_FILES['file'])."string";
	if (isset($_FILES['file'])) {//echo 324;
		$upfile = $_FILES['file'];//echo "33";var_dump($_FILES);
		if(($upfile["error"] <= 0)){  //echo "44";
			$upfile = $_FILES['file'];
			$name   = time(). $upfile['name'];
			$type   = $upfile['type'];
			$size   = $upfile['size'];
			if(move_uploaded_file($upfile['tmp_name'], $dir. $name)){ //echo "55";
				$softlinks = softlinkPreInsert($dir. $name);//echo $softlinks;
			} else {
				$status = 0;
			}
		}
	}
?>