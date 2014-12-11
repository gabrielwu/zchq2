<?php
	header("Content-Type:text/html;charset=utf-8");
    require("../../db/conn.php");
	require("../../util/util.php");

	$aid    = $_POST['aid'];
	$typeid    = $_POST['typeid'];
	$title     = $_POST['title'];
	$body      = $_POST['body'];
	$flag      = $_POST['flag'];
	$litpic    = $_POST['litpic'];
	$body      = $_POST['body'];
	$introduce = $_POST['body'];
	$pubdate   = time();
	$softlinks = "";
	require("./upload.php");

	

	if ($status == 1) {	//echo "uu";
		$sql = "update dede_archives set typeid='$typeid', title='$title', flag='$flag', litpic='$litpic', pubdate='$pubdate' where id='$aid' ";
		mysql_query($sql);
		$status = mysql_affected_rows();
		if ($status == 1) { //echo "66";
			if ($typeid == 103) { 
				$sql = "update dede_addonsoft set introduce='$introduce', softlinks='$softlinks' where aid='$aid' ";//echo $sql;
			} else {
				$sql = "update dede_addonarticle set typeid='typeid', body='$body' where aid='$aid' ";//echo $sql;
			}
			mysql_query($sql);
			$status = mysql_affected_rows();//echo $status;
		} else {
			$status = 0;	//echo "inser";
		}
	}
	if ($status == 1) { 
		echo "<script>alert('操作成功!');window.location.href='../list.php?tid=$typeid'</script>";
	} else {
		echo "<script>alert('操作失败!');//window.location.href='../view.php?tid=$typeid'</script>";
	}
?>