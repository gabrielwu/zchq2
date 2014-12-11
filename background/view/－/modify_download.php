<?php 
session_start(); 
if ($_SESSION['mark']!="login") {
    echo "<script>alert('请先登录！');window.location.href='../login.html';</script>";
}
$id = $_GET['id'];
require('connect.php');
$sql="select * from download where id=$id";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
$path = str_replace("./background", "..", $row["path"]);
?>
<html>
<head>
<title>修改下载</title>
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
		    <h3>修改下载</h3>
			<form action="../model/modify_download.php" method="post" enctype="multipart/form-data">
			<table width="650px" align="center" >
				<tr>
					<td colspan="2">&nbsp;<input type="hidden" name='id' value="<?php echo $id; ?>" /><td>
				</tr>
				<tr>
					<td width="100px" align="center">资料名字：</td>
					<td width="520px"><input id="name" name="name" value="<?php echo $row['name']?>" type="text" size="50"/><font color="red">*</font></td>
				</tr>
                <tr>
                    <td width="100px" align="center">已上传资料：</td>
                    <td width="520px">
                        <input type="hidden" name='oldPath' value="<?php echo $row['path']; ?>" />
                        <a href="<?php echo $path;?>" target="_blank">预览</a> |
                        <a href="../util/download.php?path=<?php echo $path;?>" />下载</a>
                    </td>
                </tr>
                <tr>
                    <td width="100px" align="center">替换上传资料：</td>
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
	return true;
}
</script>  
</body>
</html>