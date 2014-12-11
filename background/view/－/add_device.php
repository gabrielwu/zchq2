<?php 
session_start(); 
if ($_SESSION['mark']!="login") {
    echo "<script>alert('请先登录！');window.location.href='../login.html';</script>";
}
?>
<html>
<head>
<title>增加仪器设备</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include('include/media_css.php');?>
<?php include('include/media_js.php');?>
<script charset="utf-8" src="../kindeditor/kindeditor.js"></script>
<script charset="utf-8" src="../kindeditor/lang/zh_CN.js"></script>
</head>
<body>
<div class="wrapper">
	<?php include('./include/header.php'); ?>
	<div class="leftbox">
		<?php include('./include/leftbar.php');?>
	</div>
	<div class="rightbox">
		<div id="tab" class="box1">
		    <h3>增加仪器设备</h3>
			<form action="../model/add_device.php" method="post" enctype="multipart/form-data">
			<table width="650px" align="center" >
				<tr>
					<td colspan="2">&nbsp;</td>
				</tr>
				<tr>
					<td width="80px" align="center">设备名称：</td>
					<td width="520px"><input id="rname" name="rname" type="text"/><font color="red">*</font></td>
				<tr>
				<tr>
					<td colspan="2">具体内容(不可为空)：</td>
				<tr>
				<tr>
					<td colspan="2">
					<textarea id="editor1" name="details" style="width:650px;height:450px;"></textarea>
					<script>
						var editor;
						KindEditor.ready(function(K) {
							editor = K.create('#editor1');
						});
					</script>
					</td>
				</tr>
				<tr>
				    <td>
					    <input type="button" value="附件删除" onclick="showContent()">
						<div id="attachment_manage" title="附件删除"></div>
					</td>
				</tr>
				<tr>
					<td align="center">上传图片：</td>
					<td><input name="img" type="file"/><font color="red">*</font></td>
				</tr>
				<tr><td ></td>
					<td><input type="submit" onclick="return check();" value="添加新设备"/></td>
				</tr>
			</table>
				
			</form>
		</div>
	</div>
	<?php include('./include/footer.php');?>
</div>
<script type="text/javascript" charset="utf-8" src="../js/attachment.js"></script>
<script type="text/javascript">
function check(){
    editor.sync();
	if(document.getElementById('rname').value=="")
	{
		alert("设备名空！");
		return false;
	}
	if(document.getElementById('editor1').value=="")
	{
		alert("具体内容空！");
		return false;
	}
	return true;
}
</script>
</body>
</html>