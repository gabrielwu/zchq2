<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
<?php include("./include/media/css.php");?>
<link rel="stylesheet" type="text/css" href="./media/css/library.css" />
<link rel="stylesheet" type="text/css" href="./media/third_party/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
</head>
<body>
<?php require("./db/conn.php");?>
<?php require("./util/util.php");?>
<?php require("./config/library.php");?>
<?php require("./model/library.php");?>
<div id="wrapper">
<?php include("./include/header.php");?>
<div id="content">
	<?php include("./include/login.php");?>
    <?php include("./include/nav.php");?>
    <div id="sidebar">
	    <?php include("./include/sidebar_library.php");?>
	</div>
	<div id="main">
	    <div id="area">
		<h3>Download</h3>
	    <div class="item2">
		    <table id="news_table">
			<?php 
		        $page = 1;
		        if (isset($_GET["page"])) {
			        $page = $_GET["page"];
			    }
			    $data = download($page, $perDownload);
				$index = $perDownload * ($page - 1) + 1;
				while($row = mysql_fetch_array($data)){
			?>
			    <tr>
				    <td width="10%" align="center"><?php echo $index++;?></td>
					<td width="75%"><?php echo $row['name']?></td>
					<td><a href="./util/download.php?path=<?php echo $row['path']?>">download</a></td>
				</tr>
			<?php } ?>
			</table>
		</div>
		<?php 
            $pageTotal = download_page($perDownload);
		?>
			<div id="page">
		    <?php
			    echo $page_html = page($page, $pageTotal, $pageNums, "download.php?page=");
			?>
		    </div>
		</div>
	</div> 
</div>
<?php include("./include/footer.php");?>
</div>
<?php include("./include/media/js.php");?>
<script type="text/javascript" src="./media/js/library.js"></script>
<script type="text/javascript" src="./media/third_party/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="./media/third_party/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript">
$(function(){
    $("#d_nav_li a").addClass("current");	
});
</script>
</body>
</html>
