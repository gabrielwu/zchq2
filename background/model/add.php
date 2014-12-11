<?php
	header("Content-Type:text/html;charset=utf-8");
    require("../../db/conn.php");
	require("../../util/util.php");

	$softlinks = "";
	$typeid    = $_POST['typeid'];
	$title     = $_POST['title'];
	$body      = $_POST['body'];
	$flag      = $_POST['flag'];
	$litpic    = $_POST['litpic'];
	$body      = $_POST['body'];
	$introduce = $_POST['body'];
	$pubdate   = time();
	$status = 1;
	if ($typeid == 103) { 
		require("./upload.php");
	}

    $sql = "select max(id) as maxId from dede_archives";
    $result = mysql_query($sql);
    $data = mysql_fetch_array($result);
    $id = $data['maxId'] + 1;


	

	if ($status == 1) {	//echo "uu";
		$sql = "insert into dede_archives(id, typeid, title, flag, litpic, pubdate) ";
		$sql.= "values('$id', '$typeid', '$title', '$flag', '$litpic', $pubdate)";//echo $sql;
		mysql_query($sql);
		$status = mysql_affected_rows();
		if ($status == 1) { //echo "66";
			if ($typeid == 103) { 
				$sql = "insert into dede_addonsoft(aid, introduce, softlinks) values($id, '$introduce', '$softlinks')";//echo $sql;
			} else {
				$sql = "insert into dede_addonarticle(aid, typeid, body) values($id, $typeid, '$body')";//echo $sql;
			}
			mysql_query($sql);
			$status = mysql_affected_rows();//echo $status;
		} else {
			$status = 0;	//echo "inser";
		}
	}
	if ($status == 1) { 
		echo "<script>alert('操作成功!');window.location.href='../view/list.php?tid=$typeid'</script>";
	} else {
		echo "<script>alert('操作失败!');window.location.href='../view/view.php?tid=$typeid'</script>";
	}
?>