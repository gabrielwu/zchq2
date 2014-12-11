<?php
    include('include/media_css_table.php');
	include("connect.php");
	$sql="select * from link where l_mark != '2'";
	$result=mysql_query($sql);
?>
<div id='tab'>
<h3>链接列表</h3>
<table id='tb1'>
    <thead>
        <tr>
            <th width="35%">名称</th>
            <th width="35%">链接地址</th>
            <th width="10%">分类</th>
            <th width="20%">操作</th>
        </tr>
    </thead>
	<tbody>
	    <?php
		    while ($row = mysql_fetch_array($result)) {
		?>
	    <tr>
		    <td><input id="<?php echo $row[l_id];?>lname" type="text" value="<?php echo $row[l_name]; ?>" size="50"/></td>
			<td><input id="<?php echo $row[l_id];?>website" type="text" value="<?php echo $row[3];?>" size="50"/></td>
		    <td>
			    <select id="<?php echo $row[l_id];?>lmark" name="mark">
				    <option value="0" <?php if($row[2]=='0') echo 'selected="selected"';?>>学术期刊连接</option>
				    <option value="1" <?php if($row[2]=='1') echo 'selected="selected"';?>>常用链接</option>
			    </select>
		    </td>
			<td><a href="javascript:modifylink('<?php echo $row[l_id];?>')">修改</a>|<a href="javascript:deleteItem('<?php echo $row[0];?>')">删除</a></td>			
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
function modifylink(id)	{
	var lname = document.getElementById(id+'lname').value;
	var lmark = document.getElementById(id+'lmark').value;
	var website = document.getElementById(id+'website').value;
	result = $.ajax({url:"../model/modify_link.php?id="+id+"&lname="+lname+"&lmark="+lmark+"&website="+website,async:false});
	if(result.responseText==1)
    	alert("修改成功！");
	else
		alert("修改失败！"); 
		// alert(result.responseText);			
	linklist();
}
function deleteItem(id){
    if (confirm("确定删除？")) {
		result = $.ajax({url:"../model/delete_link.php?id="+id,async:false});
		if(result.responseText==1)
			alert("删除成功！");
		else
			alert("删除失败！"); 
		//alert(result.responseText);			
		linklist();
	}
}	
</script>

