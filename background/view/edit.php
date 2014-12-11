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
<?php include('include/media_css.php');?>
<?php include('include/media_js.php');?>
<script charset="utf-8" src="../kindeditor/kindeditor.js"></script>
<script charset="utf-8" src="../kindeditor/lang/zh_CN.js"></script>
<script charset="utf-8" type="text/javascript">
$(function() {
	$(".date").datepicker({
		changeMonth: true,
		changeYear: true
	});
	$(".date").datepicker( "option", "dateFormat", 'yy-mm-dd' );
});
$(function(){
    $('#attachment_manage').dialog({
		autoOpen: false,
		width: 800,
		buttons: {
    		"Ok": function() { 
        			$(this).dialog("close"); 
				}, 
			"Cancel": function() { 
    	    		$(this).dialog("close"); 
				} 
		},
		modal: true
	});
})
function showContent() {
    $('#attachment_manage').dialog('open');
    editor.sync();
	var i = 0;
	var html = "<div id='attach_items'>";
	$('iframe').contents().find("img").each(function(i) {
	    var src = $(this).attr("src");
		var index = src.lastIndexOf("/") + 1;
	    var fileName = src.substr(index);
		var id = "attach" + i;
	    html = html + "<div class='attach_item' id='"+id+"' style='float:left;margin:10px'>";
		html = html + "<a href='" + src + "' target='_blank'>" + "<img title='"+fileName+"' height='140px' src='" + src + "'>" + "</img></a>";
		html = html + "<br/><a href='javascript:setSlide(\"" + src + "\",\""+id+"\")'>设置为首页幻灯片</a>";
		html = html + "</div>";
		i++;
	});
	var html = html +  "<div stlye='clear:both'></div>";
	var html = html +  "</div>";
	var html = html +  "</table>";
	$('#attachment_manage').html(html);
}
function attachment() {
    var url;
}
function setSlide(oriUrl, id) {
    var index = oriUrl.indexOf('/uploads');
	url = oriUrl.substr(index);
	$("#a_pic_cover_path_img").attr('src', url);
	$("#a_pic_cover_path").val(url);
	$("#a_isslide").attr("checked", 'checked');
}

function check(){
    editor.sync();
	if(document.getElementById('title').value==""){
		alert("标题空！");
		return false;
	}
	return true;
}
function submit(){
	if ($("#a_isslide").attr("checked")=='checked') {
	    $("#flag").val('p,f');
	} 
	if(check()){
		$("#form").submit();
	}
}
function data() {
	var title;
	var typeid;
	var body;
	var a_isslide;
	var a_pic_cover_path;
}
</script>
<style type="text/css">
.rightbox,input  {font-size: 16px;}
tr, td {padding: 7 7px;}
</style>
</head>
<body>
<div class="wrapper">
	<?php include('./include/header.php'); ?>
	<div class="leftbox">
	<?php include('./include/leftbar.php');?>
	</div>	
	<?php
	    //include('include/media_css_table.php');
		include("../../db/conn.php");
		require("../../util/util.php");
		include("../../model/index.php");
		$aid       = $_GET['aid'];
		$archive = getOneArchive($aid);
		$typeid    = $archive['typeid'];
		$isDownloadType = isDownloadType($typeid);
		if ($isDownloadType) {
			$data = array_merge($archive, getOneDownload($aid));
		} else {
			$data = array_merge($archive, getOneArticle($aid));
		}
//var_dump($data);
		$type      = getOneType($typeid);
		$typeid     = $type['id']; 
		$typename  = $type['typename'];
	?>
	<div class="rightbox">
		<div id="tab" class="box1">
		    <h3>编辑<?php echo $typename; ?></h3>
		    <form action="../model/edit.php" id="form" method="post" enctype="multipart/form-data" >
				<input id="typeid" name="typeid" type="hidden" value="<?php echo $typeid;?>"/>
				<input id="aid" name="aid" type="hidden" value="<?php echo $aid;?>"/>
				<table width="850px" align="center" >
					<tr>
						<td width="100px" align="right">标题：</td>
						<td width="520px"><input id="title" value="<?php echo $data['title'];?>" name="title" type="text" size="50" value=""/><font color="red">*</font></td>
					</tr>
					<tr>
						<td width="100px" align="right">内容：</td>
						<td colspan="2">
						<textarea id="editor1" name="body" style="width:650px;height:350px;" >
						<?php 
						if ($typeid == 103) {
							echo $data['introduce'];
						} else {
							echo $data['body'];
						}
						?>
						</textarea>
						<script>
							var editor;
							KindEditor.ready(function(K) {
								editor = K.create('#editor1');
							});
						</script>
						</td>
					</tr>
					<tr><td ></td>
					    <td>
					    	<input type='hidden' id='flag' name='flag' value="<?php echo $data['flag'];?>" />
							<input type='hidden' id='a_pic_cover_path' name="litpic" value="<?php echo $data['litpic'];?>" name="litpic">
							<?php 
							if ($typeid != 103) {
							?>
						    	<input type="button" value="幻灯片设置" onclick="showContent()">
								<div id="attachment_manage" title="幻灯片设置"></div>
								首页幻灯片图片
							    <input type='checkbox' id='a_isslide' name='a_isslide'>
								</br>
							    <img width='220' src="" id='a_pic_cover_path_img'>
							<?php
							}
							?>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<?php 
							if ($typeid == 103) {
							?>
								<input type="file" name="file">
								<?php echo "<a href='". softlinksSolve($data["softlinks"]). "'>下载</a>";?>
							<?php
							}
							?>
						</td>
					</tr>
					<tr>
						<td></td>
						<td><a href="javascript:submit()" class="btn_submit">提 交</a></td>					
					</tr>
				</table>
			</from>
		</div>
	</div>
	<?php include('./include/footer.php');?>
</div>

</body>
</html>