<?php
    include('include/media_css_table.php');
	include("connect.php");
	$sql="select * from patent";
	$result=mysql_query($sql);
?>
<div id='tab'>
<h3>专利列表</h3>
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
		    <td><?php echo $row['pa_name'];?></td>
		    <td align='center'>
			    <a href="modify_patent.php?id=<?php echo $row['pa_id']; ?>">修改详细信息</a> | 
				<a href="javascript:deleteItem('<?php echo $row['pa_id'];?>')">删除</a>
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
		result = $.ajax({url:"../model/delete_patent.php?id="+id,async:false});
		if(result.responseText==1)
			alert("删除成功！");
		else
			alert("删除失败！"); 		
		patentlist();
	}
}	
</script>

