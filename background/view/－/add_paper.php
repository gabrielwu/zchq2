<?php 
session_start(); 
if ($_SESSION['mark']!="login") {
    echo "<script>alert('请先登录！');window.location.href='../login.html';</script>";
}
?>
<html>
<head>
<title>增加论文</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include('include/media_css.php');?>
<?php include('include/media_js.php');?>
<script charset="utf-8" src="../kindeditor/kindeditor.js"></script>
<script charset="utf-8" src="../kindeditor/lang/zh_CN.js"></script>
<script type="text/javascript"> 
$(function() {
	$("#date").datepicker({
		changeMonth: true,
		changeYear: true
	});
	$("#date").datepicker( "option", "dateFormat", 'yy-mm-dd' );
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
		    <h3>增加论文</h3>
			<form action="../model/add_paper.php" method="post" target='iframe' enctype="multipart/form-data">
			<table width="650px" align="center" >
				<tr>
					<td  align="center">论文名字：</td>
					<td ><input id="pname" name="pname" type="text" size="50"/><font color="red">*</font></td>
				</tr>
				<tr>
					<td  align="center">论文作者：</td>
					<td ><input id="pauthors" name="pauthors" type="text" size="50"/><font color="red">*多个作者用半角逗号分隔</font></td>
				</tr>
				<tr>
					<td  align="center">发表期刊：</td>
					<td ><input id="journal" name="journal" type="text" size="50"/><font color="red">*</font></td>
				</tr>
				<tr>
					<td  align="center">期刊号（页数）：</td>
					<td ><input id="journal_no" name="journal_no" type="text" size="50"/></td>
				</tr>
				<tr>
					<td  align="center">发表时间：</td>
					<td ><input id="date" name="date" type="text" size="50"/><font color="red">*</font></td>
				</tr>
				<tr>
					<td  align="center">期刊连接：</td>
					<td ><input name="link" type="text" size="50" value="http://"/></td>
				</tr>
				<tr>
					<td  align="center">下载链接：</td>
					<td ><input name="dlink" type="text" size="50" value="http://"/></td>
				</tr>
				<tr>
					<td colspan=2 align="center">上传封面：<input name="img" type="file"/><input value='1' type='checkbox' name='iscover'>是否为封面主题</td>
				</tr>
				<tr>
					<td colspan="2">论文摘要：</td>
				</tr>
				<tr>
					<td colspan="2">
					<textarea id="editor1" name="abstract" style="width:650px;height:400px;"></textarea>
					<script>
						var editor;
						KindEditor.ready(function(K) {
							editor = K.create('#editor1');
						});
					</script>
					</td>
				</tr>
				<tr>
					<td colspan="2">highlighted：</td>
				</tr>
				<tr>
					<td colspan="2">
					<textarea id="editor2" name="highlighted" style="width:650px;height:200px;"></textarea>
					<script>
						var editor2;
						KindEditor.ready(function(K) {
							editor2 = K.create('#editor2');
						});
					</script>
					</td>
				</tr>
				<tr>
					<td colspan="2">citation：</td>
				</tr>
				<tr>
					<td colspan="2">
					<textarea id="editor3" name="citation" style="width:650px;height:200px;"></textarea>
					<script>
						var editor3;
						KindEditor.ready(function(K) {
							editor3 = K.create('#editor3');
						});
					</script>
					</td>
				</tr>
				<!--<tr>
				    <td>
					    <input type="button" value="附件删除" onclick="showContent()">
						<div id="attachment_manage" title="附件删除"></div>
					</td>
				</tr>-->
				<tr><td ></td>
					<td><input type="submit" onclick="return check();" value="添加新论文"/></td>
				</tr>
			</table>
			</form>
		</div>
	</div>
	<?php include('./include/footer.php');?>
</div>
<iframe width='0' height='0' name='iframe'></iframe>
<script type="text/javascript" charset="utf-8" src="../js/attachment.js"></script>
<script type="text/javascript">
function check(){
    editor.sync();
    editor2.sync();
    editor3.sync();
	if(document.getElementById('pid').value=="")
	{
		alert("论文号空！");
		return false;
	}
	if(document.getElementById('pname').value=="")
	{
		alert("论文名空！");
		return false;
	}
	if(document.getElementById('pauthors').value=="")
	{
		alert("论文作者空！");
		return false;
	}
	if(document.getElementById('journal').value=="")
	{
		alert("期刊空！");
		return false;
	}
	if(document.getElementById('date').value=="")
	{
		alert("发表时间空！");
		return false;
	}
	return true;
}
</script>

</body>
</html>