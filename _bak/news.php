<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<?php include("./include/media/css.php");?>
<link rel="stylesheet" type="text/css" href="./media/css/news.css" />
</head>
<body>

<?php require("./db/conn.php");?>
<?php require("./util/util.php");?>
<?php require("./config/news.php");?>
<div id="wrapper">
<?php include("./include/header.php");?>
<div id="content">
	<?php include("./include/login.php");?>
    <?php include("./include/nav.php");?>
    <div id="sidebar">
	    <?php include("./include/sidebar_news.php");?>
	</div>
	<div id="main" class="main_right">
	    <div id="area">
		<?php
		    $a_type = "0";
			$a_typeCondition =  "";
			if (isset($_GET['a_type'])) {
    			$a_type = $_GET['a_type'];
				$a_typeCondition = "and a_type='$a_type' ";
			}
			switch ($a_type) {
			    case "0":
				    $title = "Recent News";
					$current_li = "a_li_0";
					break;
				case "a":
				    $title = "Publication News";
					$current_li = "a_li_a";
					break;
				case "b":
				    $title = "Student News";
					$current_li = "a_li_b";
					break;
				case "c":
				    $title = "Conference News";
					$current_li = "a_li_c";
					break;
				case "d":
				    $title = "Other News";
					$current_li = "a_li_d";
					break;
				default:
				    $title = "Recent News";
					$current_li = "a_li_0";
					break;
			}
		?>
		<input type="hidden" id="a_type" value="<?php echo $a_type;?>" />
		    <h4><?php echo $title;?></h4>
			<div id="news_items">
			    <table id="news_table">
				<?php 
				    $sql2 = "SELECT * FROM `news` where 1=1 ". $a_typeCondition. "ORDER BY a_date desc, a_type limit 0, $per";
				    $result2 = mysql_query($sql2);
					while($row2 = mysql_fetch_array($result2)){
				?>
				    <tr>
					    <td width="20%">
						    [<?php  if($row2['a_type']=='a'){ ?>
							    <a class="news_type_a" href="news.php?a_type=a"><?php echo "Publication News";?></a>
						    <?php } else if($row2['a_type']=='b') {?>
							    <a class="news_type_a" href="news.php?a_type=b"><?php echo "Student News";?></a>
						    <?php } else if($row2['a_type']=='c'){ ?>
							    <a class="news_type_a" href="news.php?a_type=c"><?php echo "Conference News";?></a>
						    <?php } else { ?>
							    <a class="news_type_a" href="news.php?a_type=d"><?php echo "Other News";?></a>
						    <?php } ?>]
						</td>
						<td width="65%">
						    <a href="news_detail.php?nid=<?php echo $row2['a_id']?>" title="<?php echo $row2['a_name']?>">
						        <?php 
								    echo GBsubstr($row2['a_name'], 0, 60);
								?>
							</a>
						</td>
						<td><?php echo $row2['a_date']?></td>
					</tr>
				<?php $j++ ;} ?>
				</table>
				<?php 
					$sql0="select count(a_id) as count from news where 1=1 ". $a_typeCondition;
					$result0 = mysql_query($sql0);
					$row0 = mysql_fetch_array($result0);
					$totalCount = $row0['count'];
					$num = 1;
                    $pageCount = ceil($totalCount / $per);
				?>
			</div>
			<div id="page">
				<?php
				    echo "<a class='num_page current_page' >1</a>";
				    if ($pageCount <= $page_nums) {
					    for ($pi = 2; $pi <= $pageCount; $pi++) {
			                echo "<a class='num_page' href='javascript:page($pi)'>$pi</a>";	    
						}
					} else {
					    for ($pi = 2; $pi <= $page_nums; $pi++) {
				            echo "<a class='num_page' href='javascript:page($pi)'>$pi</a>";
						}
						echo "...";
						echo "<a class='num_page' href='javascript:page($pageCount)'>$pageCount</a>";
					}
				?>
			    <a id="pre" class="pre_next pre_next_disable"><em></em>pre</a>
				<?php 
				    if ($pageCount >= 2) {
				?>
				<a id="next" class="pre_next" href="javascript:page(2)"><em></em>next</a>
				<?php
					} else {
				?>
				<a id="next" class="pre_next pre_next_disable" ><em></em>next</a>
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
<script type="text/javascript" src="./media/js/news.js"></script>
<script type="text/javascript">
    $("#a_li_<?php echo $a_type;?> a").addClass("current");
</script>
</body>
</html>
