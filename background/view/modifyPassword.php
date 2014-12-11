<?php 
session_start(); 
if ($_SESSION['mark']!="login") {
    echo "<script>alert('请先登录！');window.location.href='../login.html';</script>";
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type='text/css'>
table {margin: 20px auto;}
td { padding: 0; line-height: 1.5;}
input {width: 150px; height: 20px;}
#btn_submit {width: 150px; background: #06c; height: 30px; color: #fff;}
</style>
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
	<div class="rightbox">
		<div id='tab' class="box1">
			<h3>修改密码</h3>

			<table class="tb_invisible" style="font-size:20px;" >
    	    	<tr>
    	    		<td><span class="">原密码</span></td>
    	    		<td>
    	    			<input class="inputEdit inputL" id="passwordOld" type="password" />
    	    		</td>
				</tr>
    	    	<tr>
    	    		<td><span class="">新密码</span></td>
    	    		<td>
    	    			<input class="inputEdit inputL" id="passwordNew" type="password" />
    	    		</td>
				</tr>
    	    	<tr>
    	    		<td><span class="">再次输入密码</span></td>
    	    		<td>
    	    			<input class="inputEdit inputL" id="passwordRe" type="password" />
    	    		</td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<input id="btn_submit" type="button" class="btn" value="提交"  /><span id="tip"></span>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<?php include('./include/footer.php');?>
</div>

<script type="text/javascript">

function model() {
    var passwordRe;
	var passwordNew;
	var passwordOld;
}
$(function (){
    $("#btn_submit").click(function (){
	    var m = new model();
		m.passwordRe  = $("#passwordRe").val();
		m.passwordNew = $("#passwordNew").val();
		m.passwordOld = $("#passwordOld").val();
		$.ajax({
				url: "../model/modifyPassword.php",
				type: 'POST',
				data: m,
				success: function(result){
							switch (result) { 
								case '-1':
									$("#tip").text("不能为空！");
									$("#passwordNew").focus();
									break;	
								case '0':
									$("#tip").text("两次密码不一致！");
									$("#passwordRe").focus();
									break;	
								case '1':
									$("#tip").text("修改成功！");
									break;
								case '2':
									$("#tip").text("修改失败");
									break;
								case '3':
									$("#tip").text("原密码不正确！");
									$("#passwordOld").focus();
									break;									
							 }
						 }
				});
	})
})
</script>



