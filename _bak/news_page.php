<?php
header('Content-Type:text/html;charset=utf-8');	
	require("../config/news.php");
    require("../db/conn.php");
	require("../util/util.php");
	$a_typeCondition = "";
	$a_type = $_POST['a_type'];
	if ($a_type != "0") {
	    $a_typeCondition = "and a_type='$a_type' ";
	}
	$sql0="select count(a_id) as count from news where 1=1 ". $a_typeCondition;
	include("../util/page_html.php");
?>
<div id="news_items">
<table id="news_table">
<?php 
    $sql2 = "SELECT * FROM `news` where 1=1 ".
	        $a_typeCondition.
			"ORDER BY a_date desc, a_type limit $start, $per";
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
	        <?php echo GBsubstr($row2['a_name'], 0, 80);?>
			</a>
		</td>
		<td><?php echo $row2['a_date']?></td>
	</tr>
	<?php } ?>
</table>
</div>
<?php
echo $page_html;
?>