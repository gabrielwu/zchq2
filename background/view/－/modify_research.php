<?php 
session_start(); 
if ($_SESSION['mark']!="login") {
    echo "<script>alert('请先登录！');window.location.href='../login.html';</script>";
}
require('connect.php');
$sql="select r_name,r_pic_path,r_content,r_id from research where r_id=".$_GET['id'];
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改研究方向 </title>
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
		    <h3>修改研究方向 </h3>
			<form action="../model/modify_research.php" method="post" enctype="multipart/form-data">
			<table width="650px" align="center" >
				<tr>
					<td colspan="2"><input id="id" name="id" type="text" size="50" value="<?php echo $row[3];?>" style= "visibility:hidden "/></td>
				</tr>
				<tr>
					<td  align="center">研究方向 ：</td>
					<td ><input id="rname" name="rname" type="text" size="50" value="<?php echo $row[0];?>"/><font color="red">*</font></td>
				</tr>
				<tr>
					<td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;内容：</td>
				</tr>
				<tr>
					<td colspan="2">
					<textarea id="editor1" name="content" style="width:650px;height:400px;" ><?php echo $row[2];?></textarea>
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
					<td><input type="submit" onclick="return check();" value="修改研究方向信息"/></td>
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
		alert("研究方向名空！");
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