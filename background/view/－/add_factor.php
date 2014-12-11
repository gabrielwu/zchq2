<?php 
session_start(); 
if ($_SESSION['mark']!="login") {
    echo "<script>alert('请先登录！');window.location.href='../login.html';</script>";
}
?>
<html>
<head>
<title>增加影响因子</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include('include/media_css.php');?>
<?php include('include/media_js.php');?>
<script charset="utf-8" src="../kindeditor/kindeditor.js"></script>
<script charset="utf-8" src="../kindeditor/lang/zh_CN.js"></script>
<script type="text/javascript"> 
$(function() {
	$(".date").datepicker({
		changeMonth: true,
		changeYear: true
	});
	$(".date").datepicker( "option", "dateFormat", 'yy-mm-dd' );
});
</script>
</head>
<body>
<div class="wrapper">
	<?php include('./include/header.php'); ?>
	<div class="leftbox">
		<?php include('./include/leftbar.php');?>
	</div>
	<div class="rightbox">
		<div id="tab" class="box1">
		    <h3>增加影响因子</h3>
			<form action="../model/add_factor.php" target='iframe' method="post" enctype="multipart/form-data">
			<table width="650px" align="center" >
				<tr>
					<td colspan="2">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="2">&nbsp;</td>
				</tr>
				<tr>
					<td  align="center">标题：</td>
					<td ><input id="l_name" name="l_name" type="text" size="50"/><font color="red">*</font></td>
				</tr>
				<tr>
					<td  align="center">上传影响因子文件：</td>
					<td ><input id="l_content" name="l_content" type="file" size="50" /></td>
				<tr>
				<tr><td ></td>
					<td><input type="submit" onclick="submit();" value="提交"/></td>
				</tr>
			</table>
			</form>
		</div>
	</div>
	<?php include('./include/footer.php');?>
</div>
<iframe width='0' height='0' name='iframe'></iframe>
<script type="text/javascript">
function check(){
	if(document.getElementById('l_name').value=="")
	{
		alert("标题空！");
		return false;
	}
	if(document.getElementById('l_content').value=="")
	{
		alert("选择文件！");
		return false;
	}
	return true;
}
</script>
</body>
</html>