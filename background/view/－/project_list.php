<?php
    include('include/media_css_table.php');
	include("connect.php");
	$sql="select * from project";
	$result=mysql_query($sql);
?>
<div id='tab'>
<h3>项目列表</h3>
<table id='tb1'>
    <thead>
        <tr>
            <th width="">编号</th>
            <th>名称</th>
            <th>性质</th>
            <th>负责人</th>
            <th>开始时间</th>
            <th>结束时间</th>
            <th>费用</th>
            <th>操作</th>
        </tr>
    </thead>
	<tbody>
	    <?php
		    while ($row = mysql_fetch_array($result)) {
		?>
	    <tr>
		    <td><?php echo $row['pr_num'];?></td>
		    <td><?php echo $row['pr_name'];?></td>
		    <td><?php echo $row['pr_type'];?></td>
		    <td><?php echo $row['pr_leader'];?></td>
		    <td><?php echo $row['pr_date1'];?></td>
		    <td><?php echo $row['pr_date2'];?></td>
		    <td><?php echo $row['pr_cost'];?></td>
		    <td align='center'>
			    <a href="modify_project.php?id=<?php echo $row['pr_id']; ?>">修改详细信息</a> | 
				<a href="javascript:deleteItem('<?php echo $row['pr_id'];?>')">删除</a>
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
		result = $.ajax({url:"../model/delete_project.php?id="+id,async:false});
		if(result.responseText==1)
			alert("删除成功！");
		else
			alert("删除失败！"); 		
		projectlist();
	}
}	
</script>

