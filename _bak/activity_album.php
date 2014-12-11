<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<?php include("./include/media/css.php");?>
<link rel="stylesheet" type="text/css" href="./media/css/activity_album.css" />
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
	    <?php include("./include/sidebar_index.php");?>
	</div>
	<div id="main">
	    <div id="area">
		<?php
		    $id=$_GET['id'];
			$result = mysql_query("select ac_name from activity where ac_id=$id");
			if($row = mysql_fetch_array($result)){
		?>
		    <h4><?php echo $row['ac_name'];?></h4>
		<?php
            }		
		    $result = mysql_query("select * from acti_pic where ac_no='$id'");
		    while($row = mysql_fetch_array($result)){
	    ?>
            <div class="item">
		        <a rel="example_group" href="<?php echo "./background".substr($row[pi_path],2)?>" title="<?php echo $row['pi_intro']; ?>">
			        <img alt="" src="<?php echo "./background".substr($row[pi_path],2)?>" />
				</a> 
            </div>
		<?php }?>
		    <div class=clear></div>
		</div>
	
      
	</div> 
</div>
<?php include("./include/footer.php");?>
</div>
<?php include("./include/media/js.php");?>
<script type="text/javascript" src="./media/js/activity_album.js"></script>
<script type="text/javascript" src="./media/third_party/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="./media/third_party/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
</body>
</html>
