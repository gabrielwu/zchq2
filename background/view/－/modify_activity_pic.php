<?php session_start(); if ($_SESSION['mark']!="login") {    echo "<script>alert('请先登录！');window.location.href='../login.html';</script>";}require('connect.php');$ac_id = $_GET['id'];$sql1="select ac_name from activity where ac_id=".$ac_id;$result1=mysql_query($sql1);$row1=mysql_fetch_row($result1);$sql="select pi_path,pi_intro,pi_id from acti_pic where ac_no=".$ac_id;$result=mysql_query($sql);$amount=mysql_numrows($result);while($row=mysql_fetch_row($result)){	$rowset[]=$row;}?><html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>修改活动照片</title><?php include('include/media_css.php');?><?php include('include/media_js.php');?><script charset="utf-8" src="../kindeditor/kindeditor.js"></script><script charset="utf-8" src="../kindeditor/lang/zh_CN.js"></script><style>#tb_imgs {width: 80%; margin: 10px auto;}#tb_imgs td{width: 210px; height: 150px; overflow: hidden; text-align: center;}#tb_imgs img{width: 200px;}</style></head><body><div class="wrapper">	<?php include('./include/header.php'); ?>	<div class="leftbox">	<?php include('./include/leftbar.php');?>	</div>		<div class="rightbox">		<div id="tab" class="box1">		    <h3>修改活动照片:<?php echo $row1[0];?></h3>			<table id='tb_imgs'>			<?php			    for ($i = -1; $i < $amount; ) {			?>			    <tr>				    <td>					    <?php if(++$i < $amount) {?>						<img id="pic_<?php echo $rowset[$i][2];?>" title="<?php echo $rowset[$i][1]?>" src="<?php if($rowset[$i][0]) echo $rowset[$i][0];?>"></br>						<a href="javascript:modifypic('<?php echo $rowset[$i][2];?>','<?php echo $rowset[$i][1];?>')">修改说明</a>|<a href="javascript:setcover('<?php echo $rowset[$i][0];?>')">设置封面</a>|<a href="javascript:deletepic('<?php echo $_GET['id'];?>','<?php echo $rowset[$i][0];?>')">删除</a>					    <?php } ?>					</td>				    <td>					    <?php if(++$i < $amount) {?>						<img id="pic_<?php echo $rowset[$i][2];?>" title="<?php echo $rowset[$i][1]?>" src="<?php if($rowset[$i][0]) echo $rowset[$i][0];?>"></br>						<a href="javascript:modifypic('<?php echo $rowset[$i][2];?>','<?php echo $rowset[$i][1];?>')">修改说明</a>|<a href="javascript:setcover('<?php echo $rowset[$i][0];?>')">设置封面</a>|<a href="javascript:deletepic('<?php echo $_GET['id'];?>','<?php echo $rowset[$i][0];?>')">删除</a>					    <?php } ?>					</td>				    <td>					    <?php if(++$i < $amount) {?>						<img id="pic_<?php echo $rowset[$i][2];?>" title="<?php echo $rowset[$i][1]?>" src="<?php if($rowset[$i][0]) echo $rowset[$i][0];?>"></br>						<a href="javascript:modifypic('<?php echo $rowset[$i][2];?>','<?php echo $rowset[$i][1];?>')">修改说明</a>|<a href="javascript:setcover('<?php echo $rowset[$i][0];?>')">设置封面</a>|<a href="javascript:deletepic('<?php echo $_GET['id'];?>','<?php echo $rowset[$i][0];?>')">删除</a>					    <?php } ?>					</td>				</tr>			<?php } ?>			</table>		</div>	</div>	<div id="modify_intro" title="修改说明"></div></div><script>$(function(){    $('#modify_intro').dialog({		autoOpen: false,		width: 350,		buttons: {    		"Ok": function() {         			modify_intro();	    			$(this).dialog("close"); 				},			"Cancel": function() { 						$(this).dialog("close"); 					} 			},		modal: true	});})function data() {	var id;	var intro;}function activity() {    var ac_id;	var ac_pic_cover_path;}function modify_intro() {    var id = $("#ac_id").val();    var intro = $("#pic_intro").val();	var data1 = new data;	data1['id']=id;	data1['intro'] = intro;		$.ajax({		    type: 'POST',			url: "../model/modify_activity_intro.php",			data: data1,			success: function(res) {			            if (res.indexOf("1") != -1) {						    alert("修改成功!");							$("#pic_"+id).attr("title", intro);						} else {    						alert("修改失败！");						}					}	});}function setcover(ac_pic_cover_path) {    var ac_id = $("#ac_id").val();	var data1 = new activity();	data1['ac_id'] = ac_id;	data1['ac_pic_cover_path'] = ac_pic_cover_path;	$.ajax({		    type: 'POST',			url: "../model/modify_activity_cover.php",			data: data1,			success: function(res) {			            if (res.indexOf("1") != -1) {						    alert("修改成功!");						} else {    						alert("修改失败！");						}					}		});}function modifypic(id,intro) {	$('#modify_intro').dialog('open');	intro = $("#pic_"+id).attr("title");	var html = "<textarea cols='40' rows='10' id='pic_intro'>"+intro+"</textarea>"	html += "<input type='hidden' id='pic_id' value='"+id+"'>"	$('#modify_intro').html(html);}function deletepic(id,path) {    if (confirm("确定删除？")) {		result = $.ajax({url:"../model/delete_acti_pic.php?id="+id+"&pi_path="+path,async:false});				if(result.responseText==1)			alert("删除成功！");		else			alert("删除失败！"); 				actiPiclist(id);	}}</script>