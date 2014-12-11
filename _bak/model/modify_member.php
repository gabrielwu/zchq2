<?php
	header("Content-Type:text/html;charset=utf-8");
	include("connect.php");
	$id=$_POST['id'];
	$grade=$_POST['grade'];
	$username=$_POST['username'];
	$cname=$_POST['cname'];
	$ename=$_POST['ename'];
	$permit=$_POST['permit'];
	$title=$_POST['title'];
	$mark=$_POST['mark'];
	$email=$_POST['email'];
	$tel=$_POST['tel'];
	$addr=$_POST['office'];
	$detail=$_POST['details'];
	$photopath=$_POST['old_photo'];
	if(isset($_POST['del_img'])){
		//删除旧的头像，换成新的图像。
		$info = unlink($_POST['del_img']);
		echo $info;
		$uptypes=array('image/jpg','image/png','image/jpeg','image/pjpeg','image/gif','image/bmp','image/x-png');
		$max_file_size=20000000;
		$destination_folder='../picture/people/';
		$info='';
		$photopath='';
		if(is_uploaded_file($_FILES['img']['tmp_name'])){
			$upfile=$_FILES['img'];
			$photopath=time().$FILES['name'];
			$type=$upfile['type'];
			$size=$upfile['size'];
			$tmp_name=$upfile['tmp_name'];
			$error=$upfile['error'];
		
			if($max_file_size<$size){
				$info .= '上传图片太大！不能上传！';
			}
			if(!in_array($type,$uptypes)){
				$info .= $info.' 上传图片类型不符'.$type.'不能上传';
			}
			$type=trim(substr($type,6,12));
			if(move_uploaded_file($_FILES['img']['tmp_name'],$destination_folder.$photopath.'.'.$type)){
				$info .= '上传头像成功！';
				$photopath=$destination_folder.$photopath.'.'.$type;
			} else {
			    $info .= '上传头像失败！';
			}
		}
	}
	$sql="update member set m_username='$username',m_cname='$cname',m_ename='$ename',m_permit='$permit',m_title='$title',m_mark='$mark',m_email='$email',m_tel='$tel',m_addr='$addr',m_photopath='$photopath',m_detail='$detail' where m_id='$id'";
	mysql_query($sql);
	$flag = mysql_affected_rows();
	if($flag == 1){
		$info = $info.' 更新数据库成功！';
	} else {
	    $info = $info.' 更新数据库失败！';
	}
    echo "<script>parent.alert('$info');parent.window.location.href='../view/modify_member.php?id=$id'</script>";
?>