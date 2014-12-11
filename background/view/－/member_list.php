<?php
    include('include/media_css_table.php');
	include("connect.php");
	$sql="select m_id, m_cname, m_ename, m_tel, m_username, ".
		"case m_title WHEN 'a' THEN 'Professor' ".
		"WHEN 'b' THEN 'Associate Professor' ".
		"WHen 'c' THEN 'Lecturer' ".
		"WHen 'd' THEN 'Ph.D Student' ".
		"WHen 'e' THEN 'Master Student' ".
		"else 'Graduate Student' end as title ". 
		"from member order by m_id asc";
	$result=mysql_query($sql);
?>
<div id='tab'>
<h3>成员列表</h3>
<table id='tb1'>
    <thead>
        <tr>
            <th>姓名</th>
            <th>英文名</th>
            <th>用户名</th>
            <th>职称</th>
            <th>电话</th>
            <th>操作</th>
        </tr>
    </thead>
	<tbody>
	    <?php
		    while ($row = mysql_fetch_array($result)) {
		?>
	    <tr>
		    <td><?php echo $row['m_cname'];?></td>
		    <td><?php echo $row['m_ename'];?></td>
		    <td><?php echo $row['m_username'];?></td>
		    <td><?php echo $row['title'];?></td>
		    <td><?php echo $row['m_tel'];?></td>
		    <td align='center'>
			    <a href="modify_member.php?id=<?php echo $row['m_id']; ?>">修改详细信息</a> | 
				<a href="javascript:deletemember('<?php echo $row['m_id'];?>')">删除</a> | 
				<a href="javascript:resetmemberpwd('<?php echo $row['m_id'];?>')">重置密码</a>
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
function deletemember(id){
    if (confirm("确定删除？")) {
		result = $.ajax({url:"../model/delete_member.php?id="+id,async:false});
		if(result.responseText==1)
			alert("删除成功！");
		else
			alert("删除失败！"); 	
		memberlist();
	}
}
function resetmemberpwd(id){
    if (confirm("确定重置密码？")) {
		result = $.ajax({url:"../model/reset_member_password.php?id="+id,async:false});
		alert(result.responseText);	
		memberlist();
	}
}
</script>