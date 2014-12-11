<?php 
session_start(); 
if ($_SESSION['mark']!="login") {
    echo "<script>alert('请先登录！');window.location.href='../login.html';</script>";
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>增加成员</title>
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
		    <h3>添加成员</h3>
			<form  action="../model/add_member.php" method="post" enctype="multipart/form-data">
				<table width="650px" align="center" >
					<tr>
						<td width="80px" align="center">中文名：</td>
						<td width="240px"><input id="cname" name="cname" type="text"/><font color="red">*</font></td>
						<td rowspan="9" >
						    <img width="150" height="220" src='../picture/people/default_avatar_m.jpeg'></br>
							<input name="img" type="file"/>
						</td>
					</tr>
					<tr>
						<td width="80px" align="center">英文名：</td>
						<td width="240px"><input id="ename" name="ename" type="text"/><font color="red">*</font></td>
					</tr>
					<tr>
						<td width="80px" align="center">用户名：</td>
						<td width="240px"><font color="#333">初始同英文名一致</font></td>
					</tr>
					<tr>
						<td width="80px" align="center">密码：</td>
						<td width="240px"><font color="#333">初始123456</font></td>
					</tr>
					<tr>
						<td width="80px" align="center">职称：</td>
						<td width="240px">
							<select name="title">
								<option value="e">硕士研究生</option>
								<option value="d">博士研究生</option>
								<option value="f">博士后</option>
								<option value="c">讲师</option>
								<option value="b">副教授</option>
								<option value="a">教授</option>
							</select>
						</td>
					</tr>
					<tr>
						<td width="80px" align="center">年级</td>
						<td width="240px"><input id="grade" name="grade" type="text"/></td>
					</tr>
					<tr>
						<td width="80px" align="center">状态：</td>
						<td width="240px">
							<select name="mark">
								<option value="1">在职（在读）</option>
								<option value="0">离职（毕业）</option>
							</select>
						</td>
					</tr>
					<tr>
						<td width="80px" align="center">权限：</td>
						<td width="240px">
							<select name="permit">
								<option value="1">查看、发表组内新闻</option>
								<option value="0">查看组内新闻</option>
							</select>
						</td>
					</tr>
					<tr>
						<td width="80px" align="center">电子邮件：</td>
						<td width="240px"><input name="email" type="text"/></td>
					</tr>
					<tr>
						<td width="80px" align="center">电话：</td>
						<td width="240px"><input name="tel" type="text"/></td>
					</tr>
					<tr>
						<td width="80px" align="center">办公室：</td>
						<td width="240px"><input name="office" type="text"/></td>
					</tr>
					<tr>
						<td colspan="3">详细信息(不可为空)：</td>
					</tr>
					<tr>
						<td colspan="3">
						<textarea id="editor1" name="details" style="width:650px;height:260px;"></textarea>
						<script>
							var editor;
							KindEditor.ready(function(K) {
								editor = K.create('#editor1');
							});
						</script>
						</td>
					</tr>
					<tr>
						<td colspan=3>
						    <input type="submit" onclick="return check();" value="添加新成员"/>
							<input type="button" value="附件删除" onclick="showContent()">
							<div id="attachment_manage" title="附件删除"></div>
						</td>
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
	if(document.getElementById('cname').value=="") {
		alert("中文名空！");
		return false;
	}
	if(document.getElementById('ename').value=="") {
		alert("英语名空！");
		return false;
	}
    editor.sync();
	return true;
}
</script>
</body>
</html>