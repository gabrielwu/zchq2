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
	<div class="rightbox">
	<?php
	    include('include/media_css_table.php');
		include("connect.php");
		include("../../model/index.php");
		$typeid = $_GET['tid'];
		$result = getList2($typeid);
		$type = getOneType($typeid);
		$typename  = $type['typename'];
	?>
<div id='tab'>
<h3><?php echo $typename; ?>列表   <a style="margin-left:70px;" href="add.php?tid=<?php echo $typeid;?>">新增</a></h3>
<table id='tb1'>
    <thead>
        <tr>
            <th width="">标题</th>
            <th>发布日期</th>
            <th>操作</th>
        </tr>
    </thead>
	<tbody>
	    <?php
		    while ($row = mysql_fetch_array($result)) {
		?>
	    <tr>
		    <td><?php echo $row['title'];?></td>
		    <td><?php echo $row['pubdate'];?></td>
		    <td align='center'>
			    <a href="edit.php?aid=<?php echo $row['id']; ?>">修改</a> |
				<a href="javascript:deleteItem('<?php echo $row['id'];?>')">删除</a>
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
function deleteItem(id){
    if (confirm("确定删除？")) {	
		result = $.ajax({url:"../model/delete.php?id="+id,async:false});
		if(result.responseText==1) {
			alert("删除成功！");
			window.location.reload();
		} else {
			alert("删除失败！"); 	
		}
	}
}	
</script>
</body>
</html>