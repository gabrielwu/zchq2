<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<?php include("./include/media/css.php");?>
<link rel="stylesheet" type="text/css" href="./media/css/publications.css" />
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
	    <?php include("./include/sidebar_publications.php");?>
	</div>
	<div id="main">
	    <div id="area">
		    <div class="area2" id="area_detail">
			<?php 
			    $paperid=$_GET['pid'];
				$sql1="select * from paper where p_id='$paperid'";
				$result1 = mysql_query("$sql1");
				$row1 = mysql_fetch_array($result1);
			?>
				<h3><?php echo $row1['p_name']?></h3>
				<table id="paper_info_table">
					<tr valign="top">
						<td rowspan="5" class="photo_td" width="35%">
							<img height='150px' src="<?php echo "./background".substr($row1['p_coverpath'],2)?>" />
						</td>
						<td width="15%" class="cn_td">Authors:</td>
						<td width="50%">
						<?php echo $row1['p_members'];?>
						</td>
					</tr>
					<tr valign="top">
						<td class="cn_td">Journal:</td>
						<td><?php echo $row1['p_journal']?></td>
					</tr>
					<tr valign="top">
						<td class="cn_td">Volume:</td>
						<td><?php echo $row1['p_journal_no']?></td>
					</tr>
					<tr valign="top">
						<td class="cn_td">Date:</td>
						<td><?php echo $row1['p_date']?></td>
					</tr>
					<tr>
					    <td id="link_td" colspan="2">
						    <a href="<?php echo $row1['p_sci_link']?>">Link</a> | <a href="<?php echo $row1['p_link']?>">Download</a>
						</td>
					</tr>
				</table>
				<div class="item2" id="paper_abstract">
					<h5>Abstract</h5>
					<div><?php echo $row1['p_abstract']?></div>
				</div>
				<?php 
				    if ($row1['p_highlighted'] != null) {
				?>
				<div class="item2" id="">
					<h5>Highlighted</h5>
					<div><?php echo $row1['p_highlighted']?></div>
				</div>
				<?php				
					}
				?>
				<?php 
				    if ($row1['p_citation'] != null) {
				?>
				<div class="item2" id="">
					<h5>Citation</h5>
					<div><?php echo $row1['p_citation']?></div>
				</div>
				<?php				
					}
				?>
			</div>
		</div>
	</div>
</div>
<?php include("./include/footer.php");?>
</div>
<?php include("./include/media/js.php");?>
<script type="text/javascript" src="./media/js/publications.js"></script>
</body>
</html>
