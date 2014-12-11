<?php 
session_start(); 
if ($_SESSION['mark']!="login") {
    echo "<script>alert('请先登录！');window.location.href='../login.html';</script>";
}
require('connect.php');
$sql = "SELECT * from member where m_id='$_GET[id]'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改成员</title>
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
		    <h3>修改成员</h3>
			<form  action="../model/modify_member.php" target='iframe' method="post" enctype="multipart/form-data">
			<input type='hidden' type='hidden' name='id' value='<?php echo $_GET[id];?>'/>
				<table width="650px" align="center" >
					<tr>
						<td width="80px" align="center">中文名：</td>
						<td width="240px"><input id="cname" name="cname" value='<?php echo $row['m_cname'];?>' type="text"/><font color="red">*</font></td>
						<td rowspan="11" >
						    <img width="150" height="220" src='<?php echo $row['m_photopath'];?>'></br>
							<input name="old_photo" type="hidden" value="<?php echo $row['m_photopath'];?>" />
							删除原头像:<input name="del_img" type="checkbox" value="<?php echo $row['m_photopath'];?>" /></br>
					        上传（替换）头像：<input name="img" type="file"/>
					</tr>
					<tr>
						<td width="80px" align="center">英文名：</td>
						<td width="240px"><input id="ename" name="ename" value='<?php echo $row['m_ename'];?>' type="text"/><font color="red">*</font></td>
					</tr>
					<tr>
						<td width="80px" align="center">用户名：</td>
						<td width="240px"><input id="username" name="username" value='<?php echo $row['m_username'];?>' type="text"/><font color="red"></font></td>
					</tr>
					<tr>
						<td width="80px" align="center">职称：</td>
						<td width="240px">
							<select name="title">
								<option value="e" <?php if ($row['m_title'] == 'e') echo 'selected';?>>硕士研究生</option>
								<option value="d" <?php if ($row['m_title'] == 'd') echo 'selected';?>>博士研究生</option>
								<option value="f" <?php if ($row['m_title'] == 'f') echo 'selected';?>>博士后</option>
								<option value="c" <?php if ($row['m_title'] == 'c') echo 'selected';?>>讲师</option>
								<option value="b" <?php if ($row['m_title'] == 'b') echo 'selected';?>>副教授</option>
								<option value="a" <?php if ($row['m_title'] == 'a') echo 'selected';?>>教授</option>
							</select>
						</td>
					</tr>
					<tr>
						<td width="80px" align="center">年级</td>
						<td width="240px"><input id="grade" name="grade" value='<?php echo $row['m_grade'];?>' type="text"/></td>
					</tr>
					<tr>
						<td width="80px" align="center">状态：</td>
						<td width="240px">
							<select name="mark">
								<option value="1" <?php if ($row['m_mark'] == '1') echo 'selected';?>>在职（在读）</option>
								<option value="0" <?php if ($row['m_mark'] == '0') echo 'selected';?>>离职（毕业）</option>
							</select>
						</td>
					</tr>
					<tr>
						<td width="80px" align="center">权限：</td>
						<td width="240px">
							<select name="permit">
								<option value="1" <?php if ($row['m_permit'] == '1') echo 'selected';?>>查看、发表组内新闻</option>
								<option value="0" <?php if ($row['m_permit'] == '0') echo 'selected';?>>查看组内新闻</option>
							</select>
						</td>
					</tr>
					<tr>
						<td width="80px" align="center">电子邮件：</td>
						<td width="240px"><input name="email" value='<?php echo $row['m_email'];?>' type="text"/></td>
					</tr>
					<tr>
						<td width="80px" align="center">电话：</td>
						<td width="240px"><input name="tel" value='<?php echo $row['m_tel'];?>' type="text"/></td>
					</tr>
					<tr>
						<td width="80px" align="center">办公室：</td>
						<td width="240px"><input name="office" value='<?php echo $row['m_addr'];?>' type="text"/></td>
					</tr>
					<tr>
						<td colspan="3">详细信息(不可为空)：</td>
					</tr>
					<tr>
						<td colspan="3">
						<textarea id="editor1" name="details" style="width:650px;height:260px;"><?php echo $row['m_detail'];?></textarea>
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
						    <input type="submit" onclick="return check();" value="修改成员"/>
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
<iframe width='0' height='0' name='iframe'></iframe>
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