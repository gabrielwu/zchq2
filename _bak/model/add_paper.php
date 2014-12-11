<?php
	header("Content-Type:text/html;charset=utf-8");
	include("connect.php");
	$uptypes=array('image/jpg','image/png','image/jpeg','image/pjpeg','image/gif','image/bmp','image/x-png');
	$max_file_size=20000000;
	$destination_folder='../picture/cover/';
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$info='';
		$name=null;
		if(is_uploaded_file($_FILES['img']['tmp_name'])){
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
		if (isset($_POST['iscover'])) {
		    $iscover = '1';
		} else {
		    $iscover = '0';
		}
		$sql="insert into paper(p_highlighted,p_citation,p_iscover,p_members,p_name,p_abstract,p_journal,p_journal_no,p_date,p_sci_link,p_link,p_coverpath)".
		    "values('$_POST[highlighted]','$_POST[citation]','$iscover','$_POST[pauthors]','$_POST[pname]','$_POST[abstract]','$_POST[journal]','$_POST[journal_no]','$_POST[date]','$_POST[link]','$_POST[dlink]','$name')";
		mysql_query($sql);
		$flag = mysql_affected_rows();
		echo $flag;
		if ($flag == 1) {
		    $info = 'Succeed!';
		} else {
		    $info = 'Failed!';
		}
		echo "<script>parent.alert('$info');parent.window.location.href='../view/add_paper.php';</script>";
	}
?>