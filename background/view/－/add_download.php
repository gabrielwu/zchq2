<?php 
session_start(); 
if ($_SESSION['mark']!="login") {
    echo "<script>alert('请先登录！');window.location.href='../login.html';</script>";
}
?>
<html>
<head>
<title>增加新下载</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include('include/media_css.php');?>
<?php include('include/media_js.php');?>
</head>
<body>
<div class="wrapper">
	<?php include('./include/header.php'); ?>
	<div class="leftbox">
		<?php include('./include/leftbar.php');?>
	</div>
	<div class="rightbox">
		<div id="tab" class='box1'>
		    <h3>增加新下载</h3>
			<form action="../model/add_download.php" method="post" enctype="multipart/form-data">
			<table width="650px" align="center" >
				<tr>
					<td colspan="2">&nbsp;<td>
				</tr>
				<tr>
					<td width="100px" align="center">资料名字：</td>
					<td width="520px"><input id="name" name="name" type="text" size="50"/><font color="red">*</font></td>
				</tr>
				<tr>
					<td width="100px" align="center">上传资料：</td>
					<td width="520px"><input id="path" name="path" size="50" type="file"><font color="red">*</font></td>
				</tr>
				<tr><td></td>
					<td><input type="submit" onclick="return check();" value="提交"/></td>
				</tr>
			</table>
			</form>			
		</div>
	</div>
	<?php include('./include/footer.php');?>
</div>                                                                             
<script type="text/javascript">
function check(){  
	if(document.getElementById('name').value=="") {
		alert("资料名字空！");
		return false;
	}
	if(document.getElementById('path').value=="") {
		alert("未上传文件！");
		return false;
	}   
	return true;
}
</script>  
</body>
</html>