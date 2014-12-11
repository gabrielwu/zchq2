<?php 
session_start(); 
if (!$_SESSION['login']) {
    echo "<script>alert('Sorry, you do not have permission to this page!');window.location.href='index.php'</script>";
}
$m_id = $_SESSION['m_id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Rare-earth Nano-optoelectronic Lab</title>
<?php include("./include/media/css.php");?>
<link rel="stylesheet" type="text/css" href="./media/css/member.css" />
<style type="text/css">
#content{min-height:500px;}
#main{min-height:500px;}
#area{min-height:420px;}
.box {margin: 20px 30px;}
#tb_modifyInfo {margin: 20px ;}
#tb_modifyInfo tr{height: 40px;}
#tb_modifyInfo tr td{padding: 5px 0 5px 10px;color: #333; font-size:14px;}
#tb_modifyInfo span {color: #ff0000; font-size:13px;};
#div_imgPic {padding:8px;border:1px solid #333;};
</style>
<script charset="utf-8" src="./background/kindeditor/kindeditor.js"></script>
<script charset="utf-8" src="./background/kindeditor/lang/zh_CN.js"></script>
</head>
<body>
<?php 
    require("./db/conn.php");
	require("./util/util.php");
	$sql = "select * from member where m_id='$m_id'";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
?>
<div id="wrapper">
<?php include("./include/header.php");?>
<div id="content">
	<?php include("./include/login.php");?>
    <?php include("./include/nav.php");?>
    <div id="sidebar">
	    <?php include("./include/sidebar_member_area.php");?>
	</div>
	<div id="main">
	    <div id="area">
            <h3>Modify Info</h3>
			<div class="box">
			<form action="util/uploadMemberPic.php" target="picIframe" method="post" enctype="multipart/form-data" >
			<table id="tb_modifyInfo" class="">
			    <tr>
				    <td>Username</td>
				    <td><input type="text" id='username' value='<?php echo $row['m_username'];?>'></td>
				    <td rowspan="8">
					    <div style='height:220px;padding:8px;border:1px solid #AAA;width:160px;' id='div_imgPic'>
						    <img id='imgPic' width="160" height="220" style='border:1px solid #AAA;' src='<?php echo "./background".substr($row['m_photopath'],2);?>'>
						</div>
						<input type="file" id="picUpload" name="picUpload" value="" class=""></br>
						<input type="submit" id="picUploadSubmit" style="" value="Upload" class="btn">
						<span id="msgPic"></span>
					</td>
				</tr>
			    <tr>
				    <td>Chinese Name</td>
				    <td><input type="text" id='cname' value='<?php echo $row['m_cname'];?>'></td>
				    <td><span id='msg_cname'></span></td>
				</tr>
			    <tr>
				    <td>English Name</td>
				    <td><input type="text" id='ename' value='<?php echo $row['m_ename'];?>'></td>
				    <td><span id='msg_ename'></span></td>
				</tr>
			    <tr>
				    <td>Grade</td>
				    <td><input type="text" id='grade' value='<?php echo $row['m_grade'];?>'></td>
				    <td><span id='msg_grade'></span></td>
				</tr>
			    <tr>
				    <td>Title</td>
				    <td>
					    <select id='title'>
						    <option value='a' <?php if($row['m_title']=='a') echo "selected";?>>Professor</option>
						    <option value='b' <?php if($row['m_title']=='b') echo "selected";?>>Associate Professor</option>
						    <option value='c' <?php if($row['m_title']=='c') echo "selected";?>>Lecturer</option>
						    <option value='d' <?php if($row['m_title']=='d') echo "selected";?>>Ph.D Student</option>
						    <option value='e' <?php if($row['m_title']=='e') echo "selected";?>>Master Student</option>
						</select>
					</td>
				    <td><span id='msg_title'></span></td>
				</tr>
			    <tr>
				    <td>Email</td>
				    <td><input type="text" id='email' value='<?php echo $row['m_email'];?>'></td>
				    <td><span id='msg_email'></span></td>
				</tr>
			    <tr>
				    <td>Phone</td>
				    <td><input type="text" id='tel' value='<?php echo $row['m_tel'];?>'></td>
				    <td><span id='msg_tel'></span></td>
				</tr>
			    <tr>
				    <td>Address</td>
				    <td><input type="text" id='addr' value='<?php echo $row['m_addr'];?>'></td>
				    <td><span id='msg_addr'></span></td>
				</tr>
			    <tr>
				    <td>Resume</td>
				    <td colspan="2">
					    <textarea id="detail" name="detail" style="width:500px;height:200px;"><?php echo $row['m_detail'];?></textarea>
						<script>
						    var editor;
							KindEditor.ready(function(K) {
								editor = K.create('#detail');
							});
						</script>
						</td>
				    <td><span id='msg_details'></span></td>
				</tr>
				<tr><td align="center" colspan="2"><input value="Submit" type="button" class="btn" id="submit"></td></tr>
			</table>
			</form>
			</div>
        </div>			
    </div>
</div>
<?php include("./include/footer.php");?>
</div>
<?php include("./include/media/js.php");?>
<iframe width='0' height='0' name='picIframe'></iframe>
<script type="text/javascript" src="./media/js/member_info_modify.js"></script>
<script type="text/javascript">
function picUploadResult(flag, pic) {
    switch (flag) {
	    case '1':
    	    $('#imgPic').attr('src', pic);
			alert('Change photo successfully!');
			//$('#msgPic').css('color', '#333');
			//$('#msgPic').html('Change photo successfully!');
			break;
		default:
			alert('Change photo failed!');
			//$('#msgPic').css('color', '#f00');
			//$('#msgPic').html('Failed!');
			break;
	}
}
</script>
</body>
</html>
