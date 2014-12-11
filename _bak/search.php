<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Rare-earth Nano-optoelectronic Lab</title>
<?php require("./include/media/css.php");?>
<?php 
require("./db/conn.php");
require("./model/index.php");
require("./util/util.php");
require("./config/index_paper_page.php");
?>
<link rel="stylesheet" type="text/css" href="./media/css/index.css" />
<link rel="stylesheet" type="text/css" href="./media/third_party/slide/slide.css" />
</head>
<body>
<div id="wrapper">
<?php include("./include/header.php");?>
<div id="content">
	<?php include("./include/login.php");?>
	<?php include("./include/nav.php");?>
	<div id="main" class="main_left">
	    <div id="search_result" class="box">
			<!-- Put the following javascript before the closing </head> tag. -->
			<script>
			  (function() {
				var cx = '006606256622441310586:1cpkib8oy7a';
				var gcse = document.createElement('script'); gcse.type = 'text/javascript'; gcse.async = true;
				gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
					'//www.google.com/cse/cse.js?cx=' + cx;
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(gcse, s);
			  })();
			</script>

			<!-- Place this tag where you want the search results to render -->
			<gcse:searchresults-only></gcse:searchresults-only> 
		</div> 
	</div> 
    <div id="sidebar" class="sidebar_right">
	    <?php include("./include/sidebar_index.php");?>
	</div>
</div>
<?php include("./include/footer_index.php");?>
</div>
<?php include("./include/media/js.php");?>
<script type="text/javascript" src="./media/js/search.js"></script>
<!-- <script type="text/javascript" src="https://getfirebug.com/firebug-lite.js"></script> -->
</body>
</html>
