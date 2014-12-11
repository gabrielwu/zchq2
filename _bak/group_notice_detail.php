<?php 
session_start(); 
if (!$_SESSION['login']) {
    echo "<script>alert('Sorry, you do not have permission to this page!');window.location.href='index.php'</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<?php include("./include/media/css.php");?>
<link rel="stylesheet" type="text/css" href="./media/third_party/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
</head>
<body>
<?php require("./db/conn.php");?>
<?php require("./util/util.php");?>
<div id="wrapper">
<?php include("./include/header.php");?>
<div id="content">
	<?php include("./include/login.php");?>
    <?php include("./include/nav.php");?>
    <div id="sidebar">
	    <?php include("./include/sidebar_member_area.php");?>
	</div>
	<div id="main">
	    <div id="area">
		    <div class="item" id="item">
			    <?php
				    $id = $_GET["id"];
					$sql = "SELECT * FROM group_notice where id='$id'";
					$result = mysql_query($sql);
					$row = mysql_fetch_array($result);
				?>
				<h3>
				    <?php echo $row["name"];?><br/>
					<span><?php echo substr($row['date'], 0, 10);?></span>
				</h3>
				<div id="a_content"><?php echo $row["content"];?></div>
			</div>
		</div>
	</div>
</div>
<?php include("./include/footer.php");?>
</div>
<?php include("./include/media/js.php");?>
<script type="text/javascript" src="./media/js/member_area.js"></script>
<script type="text/javascript" src="./media/third_party/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="./media/third_party/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript">
$(function(){
    $("#g_nav_li a").addClass("current");
});
</script>
</body>
</html>
