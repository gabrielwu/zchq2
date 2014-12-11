<?php
    include('include/media_css_table.php');
	include("connect.php");
	$sql="select * from activity";
	$result=mysql_query($sql);
?>
<div id='tab'>
<h3>实验室活动列表</h3>
<table id='tb1'>
    <thead>
        <tr>
            <th width="80%">名称</th>
            <th>操作</th>
        </tr>
    </thead>
	<tbody>
	    <?php
		    while ($row = mysql_fetch_array($result)) {
		?>
	    <tr>
		    <td><?php echo $row['ac_name'];?></td>
		    <td align='center'>
			    <a href="modify_activity.php?ac_id=<?php echo $row['ac_id']; ?>">修改详细信息</a> | 
				<a href="modify_activity_pic.php?id=<?php echo $row['ac_id'];?>">查看照片</a>| 
				<a href="javascript:deleteItem('<?php echo $row['ac_id'];?>')">删除</a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
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
		result = $.ajax({url:"../model/delete_activity.php?id="+id,async:false});
		if(result.responseText==1)
			alert("删除成功！");
		else
			alert("删除失败！"); 		
		activitylist();
	}
}	
</script>

