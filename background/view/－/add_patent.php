<?php 
session_start(); 
if ($_SESSION['mark']!="login") {
    echo "<script>alert('请先登录！');window.location.href='../login.html';</script>";
}
?>
<html>
<head>
<title>增加专利</title>
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
		    <h3>增加专利</h3>
			<form action="../model/add_patent.php" method="post" enctype="multipart/form-data">
			<table width="650px" align="center" >
				<tr>
					<td  align="center">专利名称：</td>
					<td ><input id="paname" name="paname" type="text" size="50"/><font color="red">*</font></td>
				</tr>
				<tr>
					<td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;专利详细内容：</td>
				</tr>
				<tr>
					<td colspan="2">
					<textarea id="editor1" name="content" style="width:650px;height:450px;"></textarea>
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
					<td><input type="submit" onclick="return check();" value="添加新专利"/></td>
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
    //alert($("#editor1").val());
    editor.sync();
	if(document.getElementById('paname').value=="")
	{
		alert("知识产权名空！");
		return false;
	}
	return true;
}
</script>
</body>
</html>