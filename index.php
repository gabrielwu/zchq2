<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<?php require("./include/media/css.php");?>
<?php 
require("./db/conn.php");
require("./model/index.php");
require("./util/util.php");
?>
<link rel="stylesheet" type="text/css" href="./media/css/index.css" />
<link rel="stylesheet" type="text/css" href="./media/third_party/slide/slide.css" />
</head>
<body>
<div id="wrapper">
<?php include("./include/header.php");?>
<div id="content" >
	<?php include("./include/nav.php");?>
	<div id="main" class="main_index">
	    <div class="box area" style="" >

		    <div id="slide_box" class="slide_box">
			    <ul class="list">    
				<?php 
					$slide_count = 0;
    				$list = getSlides();
    				while($row = mysql_fetch_array($list)){
    					$slide_count++;
				?>
				    <li>
					    <a href='view.php?aid=<?php echo $row["id"];?>' target="_blank">
						    <img src='http://zchq.jlu.edu.cn/<?php echo $row["litpic"];?>' alt='<?php echo GBsubstr($row["title"], 0, 66);?>' width="370" height="260"/>
						</a>
					</li>
				<?php } ?>
				</ul>
				<ul class="count">
				<?php
				    for ($i = 1; $i <= $slide_count; $i++) {
				?>
				    <li class=""><?php echo $i;?></li>
				<?php } ?>
			    </ul>
				<div> </div>
			</div>

			<div id="intro_content" class="">
				<span class="box_title"><a href="list.php?tid=109">最新公告</a></span>
				<a class="more_a" href="list.php?tid=109&p=1">+more</a>
				<table class="list_table" style="width:550px">
					<?php 
						$list = getList("109");
						while($row = mysql_fetch_array($list)){
					?>
						<tr>
							<td width="80%">
								<a href="view.php?aid=<?php echo $row['id']?>" title="<?php echo $row['title']?>">
									<?php 
										echo GBsubstr($row['title'], 0, 60);
									?>
								</a>
							</td>
							<td><?php echo $row['pubdate']?></td>
						</tr>
					<?php } ?>
				</table>                      
            </div>
		</div>

	    <div class="box area area2">
			<div id="" class="">
				<span class="box_title"><a href="list.php?tid=102&p=1">关于我们</a></span>
				<a class="more_a" href="list.php?tid=102&p=1">+more</a>
				<table class="list_table">
					<?php 
						$list = getList("102");
						while($row = mysql_fetch_array($list)){
					?>
						<tr>
							<td width="70%">
								<a href="view.php?aid=<?php echo $row['id']?>" title="<?php echo $row['title']?>">
									<?php 
										echo GBsubstr($row['title'], 0, 32);
									?>
								</a>
							</td>
						</tr>
					<?php } ?>
				</table>  
			</div>
		</div>
	    <div class="box area area2 area3">
			<div id="" class="">
				<span class="box_title"><a href="list.php?tid=102&p=1">工作职责</a></span>
				<a class="more_a" href="list.php?tid=102&p=1">+more</a>
				<table class="list_table">
					<?php
						$list = getList("102", true);
						while($row = mysql_fetch_array($list)){
					?>
						<tr>
							<td width="50%">
								<a href="view.php?aid=<?php echo $row['id']?>" title="<?php echo $row['title']?>">
									<?php 
										echo GBsubstr($row['title'], 0, 32);
									?>
								</a>&nbsp;&nbsp;&nbsp;&nbsp;
							</td>
							<?php 
							if ($row = mysql_fetch_array($list)) {
							?>
							<td width="50%" align="">
								<a href="view.php?aid=<?php echo $row['id']?>" title="<?php echo $row['title']?>">
									<?php 
										echo GBsubstr($row['title'], 0, 35);
									?>
								</a>
							</td>
							<?php
						    }
							?>
						</tr>
					<?php } ?>
				</table>  
			</div>
		</div>
	    <div class="box area area2 area3">
				<span class="box_title"><a href="list.php?tid=94&p=1">工作动态</a></span>
				<a class="more_a" href="list.php?tid=94&p=1">+more</a>
				<table class="list_table">
					<?php 
						$list = getList("94");
						while($row = mysql_fetch_array($list)){
					?>
						<tr>
							<td width="70%">
								<a href="view.php?aid=<?php echo $row['id']?>" title="<?php echo $row['title']?>">
									<?php 
										echo GBsubstr($row['title'], 0, 35);
									?>
								</a>
							</td>
							<td width="30%" align="right"><?php echo $row['pubdate']?></td>
						</tr>
					<?php } ?>
				</table>  
		</div>

	    <div class="box area area2" style="height: 150px;">
			<div>
				<span class="box_title"><a href="">其他链接</a></span>
				<a class="more_a" href="">+more</a>
				<table class="list_table">
					<tr><td><a href="view.php?aid=5600" title="">处长信箱</a></td></tr>
					<tr><td><a href="http://10.60.16.64" title="">国有资产管理</a></td></tr>
					<tr><td><a href="http://10.60.16.157:8006" title="">节能管理</a></td></tr>
					<tr><td><a href="background/login.html" title="">管理员入口</a></td></tr>
				</table>  
			</div>
		</div>
	    <div class="box area2 area4">
			<div>
				<span class="box_title"><a href="">服务指南</a></span>
				<a class="more_a" href="news.php">+more</a>
				<a href="view.php?aid=5600" title=""><img alt="" src="http://zchq.jlu.edu.cn/uploads/allimg/130605/1-130605101PWN.png"></a>  
			</div>
		</div>
		<p style="clear:both"></p>
	</div> 
<?php include("./include/footer.php");?>
</div>
</div>
<?php include("./include/media/js.php");?>
<script type="text/javascript" src="./media/js/index.js"></script>
<script type="text/javascript" >
$(function () {

	var oBox = $("#slide_box");
	var aUl = $("#slide_box .list");
	var aImg = $("#slide_box ul:nth-child(1) li");
	var aNum = $("#slide_box ul:nth-child(2) li");
	$("#slide_box ul:nth-child(1) li:nth-child(1)").addClass("current");
	$("#slide_box ul:nth-child(2) li:nth-child(1)").addClass("current");
	var timer = play = null;
	var i = index = 0;	
	//切换按钮
	for (i = 0; i < aNum.length; i++) {
		aNum[i].index = i;
		aNum[i].onmouseover = function () {
			show(this.index)
		}
	}
	//鼠标划过关闭定时器
	oBox.onmouseover = function () {
		clearInterval(play)	
	};
	
	//鼠标离开启动自动播放
	oBox.onmouseout = function () {
		autoPlay()
	};	
	
	//自动播放函数
	function autoPlay () {
		play = setInterval(function () {
			index++;
			index >= aImg.length && (index = 0);
			show(index);		
		},3000);	
	}
	autoPlay();//应用
	//图片切换, 淡入淡出效果
	function show (a) {
		index = a;
		var alpha = 0;
		for (i = 0; i < aNum.length; i++)aNum[i].className = "";
		aNum[index].className = "current";
		clearInterval(timer);			
		var nth = index + 1;
        var title = $("#slide_box .list li:nth-child("+nth+") a img").attr("alt");	
		$("#slide_box div").text(title);
		for (i = 0; i < aImg.length; i++) {
			aImg[i].style.opacity = 0;
			aImg[i].style.filter = "alpha(opacity=0)";	
		}
		timer = setInterval(function () {
			alpha += 2;
			alpha > 100 && (alpha =100);
			aImg[index].style.opacity = alpha / 100;
			aImg[index].style.filter = "alpha(opacity = " + alpha + ")";
			alpha == 100 && clearInterval(timer)
		},20);
	}
});
</script>
</body>
</html>
