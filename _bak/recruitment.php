<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Rare-earth Nano-optoelectronic Lab</title>
<?php include("./include/media/css.php");?>
<link rel="stylesheet" type="text/css" href="./media/css/introduction.css" />
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
	    <?php include("./include/sidebar_recruitment.php");?>
	</div>
	<div id="main">
	    <div id="area">
            <h4>
            <?php
                $type = $_GET['type'];
                if ($type == 't') {
                    echo "Teacher Recruitment";
                } else if ($type == 's') {
                    echo "Student Recruitment";         
                }
            ?>
            </h4>
		    <div class="intro_area">
		    <?php  
			if ($type == 't') {
			    include("./background/attachments/html/recruitment_t.html");
			} else if ($type == 's') {
			    include("./background/attachments/html/recruitment_s.html");
			}
			?>
			</div>
		</div>
	</div> 
</div>
<?php include("./include/footer.php");?>
</div>
<?php include("./include/media/js.php");?>
<script type="text/javascript">
$(function (){
    $("#<?php echo $type;?>_nav_li a").addClass("current");
    $("#recruitment_li").addClass("current_head_nav");
});
</script>
</body>
</html>
