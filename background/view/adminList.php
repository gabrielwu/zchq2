<?php 
session_start(); 
if ($_SESSION['mark']!="login") {
    echo "<script>alert('请先登录！');window.location.href='../login.html';</script>";
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<?php 
    include('include/media_css.php');
    include('include/media_js.php');
?>
<script charset="utf-8" type="text/javascript">
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
	<div class="rightbox" style="height:600px;">
	<?php
	    include('include/media_css_table.php');
		include("connect.php");
		include("../../model/index.php");
		$result = getAdminList();
	?>
<div id="tab" >
<h3>管理员列表</h3>
<table id='tb1'>
    <thead>
        <tr>
            <th>用户名</th>
            <th>操作</th>
        </tr>
    </thead>
	<tbody>
		<tr>
			<td><input type="input" id="user_id"  /></td>
			<td align='center'><a href="javascript:add()">新增</a></td>
		</tr>
	    <?php
		    while ($row = mysql_fetch_array($result)) {
		?>
	    <tr>
		    <td><?php echo $row['userid'];?></td>
		    <td align='center'>
			    <a href="javascript:resetPassword('<?php echo $row['userid'];?>')">重置密码</a> |
				<a href="javascript:remove('<?php echo $row['userid'];?>')">删除</a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</div>

	</div>
	<?php include('./include/footer.php');?>
</div>

<script>
$(function () {
    $('#tb1').dataTable({	    
        "bJQueryUI": true,
		"sPaginationType": "full_numbers",
		"iDisplayLength": 25
	});
});
function remove(userid){
    if (confirm("确定删除？")) {	
		result = $.ajax({url:"../model/adminRemove.php?userid=" + userid,async:false});
		if(result.responseText==1) {
			alert("删除成功！");
			window.location.reload();
		} else {
			alert("删除失败！"); 	
		}
	}
}	
function add(){
	var userId = $("#user_id").val(); 
	result = $.ajax({url:"../model/adminAdd.php?userid=" + userId,async:false});
	if(result.responseText==1) {
		alert("添加管理员" + userId +"成功，密码初始为用户名！");
		window.location.reload();
	} else {
		alert("添加失败！"); 	
	}
}	
function resetPassword(userid){
    if (confirm("密码将重置为用户名，确认操作？")) {	
		result = $.ajax({url:"../model/adminResetPassword.php?userid=" + userid, async:false});
		if(result.responseText == 1) {
			alert("重置成功！");
			window.location.reload();
		} else {
			alert("重置失败！"); 	
		}
	}
}	
</script>
</body>
</html>