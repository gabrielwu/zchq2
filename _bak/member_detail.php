<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Rare-earth Nano-optoelectronic Lab</title>
<?php include("./include/media/css.php");?>
<link rel="stylesheet" type="text/css" href="./media/css/member.css" />
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
	    <?php include("./include/sidebar_member.php");?>
	</div>
	<div id="main">
	    <div id="area">
		    <div class="area2" id="area_detail">
			    <h4 class="">Details</h4>
				<?php
					$memberid=$_GET['id'];
					$sql = "SELECT *, ".
					    "case m_title WHEN 'a' THEN 'Professor' ".
						"WHEN 'b' THEN 'Associate Professor' ".
						"WHen 'c' THEN 'Lecturer' ".
						"WHen 'd' THEN 'Ph.D Student' ".
						"WHen 'e' THEN 'Master Student' ".
						"else 'Graduate Student' end as title ".
						"FROM member where m_id='$memberid'";
					$result = mysql_query($sql);
					$row = mysql_fetch_array($result);
				?>
				<table id="member_info">
					<tr valign="top">
					    <td rowspan="5" class="photo_td" width="35%">
						    <img alt="View Detail" src="<?php echo "./background".substr($row['m_photopath'],2);?>"></img> 
						</td>
					    <td width="25%">Name:</td>
						<td width="40%"><?php echo $row['m_cname']?></td>
					</tr>
					<tr valign="top">
					    <td>Professional Title:</td>
						<td><?php echo $row['title']?></td>
					</tr>
					<tr valign="top">
					    <td>Email:</td>
						<td><?php echo $row['m_email']?></td>
					</tr>
					<tr valign="top">
					    <td>Phone:</td>
						<td><?php echo $row['m_tel']?></td>
					</tr>
					<tr valign="top">
					    <td>Address:</td>
						<td><?php echo $row['m_addr']?></td>
					</tr>
				</table>
				<h4 class="">Resume</h4>
			    <div id="member_brief"><?php echo $row['m_detail']; ?></div>
		    </div>
        </div>			
    </div>
</div>
<?php include("./include/footer.php");?>
</div>
<?php include("./include/media/js.php");?>
<script type="text/javascript" src="./media/js/member.js"></script>
</body>
</html>
