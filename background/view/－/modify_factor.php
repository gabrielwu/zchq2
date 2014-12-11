<?php 
session_start(); 
if ($_SESSION['mark']!="login") {
    echo "<script>alert('请先登录！');window.location.href='../login.html';</script>";
}
include("connect.php");
$id = $_GET[id];
$sql="select * from link where l_id=$id";
$result=mysql_query($sql);
$row = mysql_fetch_array($result);
?>
<html>
<head>
<title>修改影响因子</title>
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
		    <h3>修改影响因子</h3>
			<form action="../model/modify_factor.php" target='iframe' method="post" enctype="multipart/form-data">
			<input type='hidden' name='l_id' value='<?php echo $id;?>' id='l_id'/>
			<table width="650px" align="center" >
				<tr>
					<td colspan="2">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="2">&nbsp;</td>
				</tr>
				<tr>
					<td  align="center">标题：</td>
					<td ><input id="l_name" name="l_name" type="text" size="50" value="<?php echo $row['l_name'];?>"/><font color="red">*</font></td>
				</tr>
				<tr>
					<td align="center">影响因子文件：</td>
					<td ><a href="<?php echo '../'.$row[l_content];?>" target='_blank'>download</a></td>
				<tr>
				<tr>
					<td  align="center">更换影响因子文件：</td>
					<td ><input id="l_content" name="l_content" value="<?php echo $row['l_content'];?>" type="file" size="50" /></td>
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