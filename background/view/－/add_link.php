<?php 
session_start(); 
if ($_SESSION['mark']!="login") {
    echo "<script>alert('请先登录！');window.location.href='../login.html';</script>";
}
?>
<html>
<head>
<title>增加链接</title>
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
		    <h3>增加链接</h3>
			<table width="650px" align="center" >
				<tr>
					<td colspan="2">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="2">&nbsp;</td>
				</tr>
				<tr>
					<td  align="center">链接名字：</td>
					<td ><input id="lname" name="lname" type="text" size="50"/><font color="red">*</font></td>
				</tr>
				<tr>
					<td  align="center">链接地址：</td>
					<td ><input id="website" name="website" type="text" size="50" value="http://"  /><font color="red">*</font></td>
				<tr>
				<tr>
					<td  align="center">链接类型：</td>
					<td >
						<select id='mark' name="mark">
							<option value="0">学术期刊链接</option>
							<option value="1">常用链接</option>
						</select>
					</td>
				</tr>
				<tr><td ></td>
					<td><input type="submit" onclick="submit();" value="添加新链接"/></td>
				</tr>
			</table>
		</div>
	</div>
	<?php include('./include/footer.php');?>
</div>
<script type="text/javascript">
function check(){
	if(document.getElementById('lname').value=="")
	{
		alert("链接名空！");
		return false;
	}
	if(document.getElementById('website').value=="")
	{
		alert("链接地址！");
		return false;
	}
	return true;
}
function data() {
    var lname;
	var website;
	var mark;
}
function submit() {
    if (check()) {
		var data1 = new data();
		data1.lname = $("#lname").val();
		data1.website = $("#website").val();
		data1.mark = $("#mark").val();
		$.ajax({
			type: 'POST',
			url: "../model/add_link.php",
			data: data1,
			success: function(res) {
				if (res == "1") {
					alert("succeed!");
					window.location.reload();
				} else {
					alert("failed!");
				}
			}
		});
	}
}
</script>
</body>
</html>