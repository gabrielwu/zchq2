<?php
	header("Content-Type:text/html;charset=utf-8");
	include("connect.php");
	$id=$_POST['id'];
	$pname=$_POST['pname'];
	$authors=$_POST['pauthors'];
	$journal=$_POST['journal'];
	$journal_no=$_POST['journal_no'];
	$date=$_POST['date'];
	$plink=$_POST['plink'];
	$dlink=$_POST['dlink'];
	$abstract=$_POST['abstract'];
	$citation=$_POST['citation'];
	$highlighted=$_POST['highlighted'];
	$old_pic=$_POST['old_pic'];
	if (isset($_POST[iscover])) {
		$iscover = '1';
	} else {
		$iscover = '0';
	}
	if(file_exists($old_pic)){
	    unlink($old_pic);
	}
	$info='';
	$name=null;
	if(is_uploaded_file($_FILES['img']['tmp_name'])){
	    $uptypes=array('image/jpg','image/png','image/jpeg','image/pjpeg','image/gif','image/bmp','image/x-png');
		$max_file_size=20000000;
		$destination_folder='../picture/cover/';
		$upfile=$_FILES['img'];
		$name=time().$FILES['name'];
		$type=$upfile['type'];
		$size=$upfile['size'];
		$tmp_name=$upfile['tmp_name'];
		$error=$upfile['error'];
		if($max_file_size<$size) {
    		$info='上传图片太大！不能上传！';
		}
		if(!in_array($type,$uptypes)){
			$info=$info.' 上传图片类型不符'.$type.'不能上传';
		}
		$type=trim(substr($type,6,12));
		if($info==''){
			//echo $destination_folder.$name.'.'.$type;
			if(move_uploaded_file($_FILES['img']['tmp_name'],$destination_folder.$name.'.'.$type)){
				$info='上传图片成功！';
				$name=$destination_folder.$name.'.'.$type;
			}else{
				$name=null;
			}
		}	
	}
	$sql="update paper set p_coverpath='$name',p_highlighted='$highlighted',p_citation='$citation',p_iscover='$iscover',p_members='$authors',p_name='$pname',p_abstract='$abstract',p_journal='$journal',p_journal_no='$journal_no',p_date='$date',p_sci_link='$plink',p_link='$dlink' where p_id='$id'";
	mysql_query($sql);
	$flag = mysql_affected_rows();
	echo $info;
	echo $sql;
	if ($flag == 1) {
	    $info = 'Succeed!';
	} else {
	    $info = 'Failed!';
	}
	echo "<script>parent.alert('$info');parent.window.location.href='../view/modify_paper.php?id=$id';</script>";
?>