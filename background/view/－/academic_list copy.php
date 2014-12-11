<?php
    include('include/media_css_table.php');
	include("connect.php");
	$sql="select a_id,a_name,case a_isslide when 1 then 'yes' when 0 then 'no' end as isslide, case a_type when 'a' then 'Publication' when 'b' then 'Student' when 'c' then 'Conference' when 'd' then 'Other' end as type from news";
	$result=mysql_query($sql);
?>
<div id='tab'>
<h3>新闻列表</h3>
<table id='tb1'>
    <thead>
        <tr>
            <th width="">标题</th>
            <th>分类</th>
            <th>幻灯片</th>
            <th>操作</th>
        </tr>
    </thead>
	<tbody>
	    <?php
		    while ($row = mysql_fetch_array($result)) {
		?>
	    <tr>
		    <td><?php echo $row['a_name'];?></td>
		    <td><?php echo $row['type'];?></td>
		    <td><?php echo $row['isslide'];?></td>
		    <td align='center'>
			    <a href="modify_academic2.php?id=<?php echo $row['a_id']; ?>">修改详细信息</a> |
			    <a href="javascript:deleteSlide('<?php echo $row['a_id'];?>')">取消幻灯片</a> | 
				<a href="javascript:deleteItem('<?php echo $row['a_id'];?>')">删除</a>
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
		result = $.ajax({url:"../model/delete_academic.php?id="+id,async:false});
		if(result.responseText==1)
			alert("删除成功！");
		else
			alert("删除失败！"); 		
		academiclist();
	}
}	
function deleteSlide(id) {
    if (confirm("确定取消？")) {	
		result = $.ajax({url:"../model/delete_academic_slide.php?id="+id,async:false});
		if(result.responseText==1)
			alert("删除成功！");
		else
			alert("删除失败！"); 		
		academiclist();
	} 
}
</script>

