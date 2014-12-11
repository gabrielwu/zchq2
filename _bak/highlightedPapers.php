<?php
header('Content-Type:text/html;charset=utf-8');
	require("../config/publications.php");
    require("../db/conn.php");
	require("../util/util.php");
    $index = $_POST["index"];
	$currentDisplayYear = $_POST["currentDisplayYear"];
	$currenttime=getdate();
	$currentyear=$currenttime[year];
	$nextyear=$currentyear+1;
	$nextyear_newyearsdate=$nextyear."-01-01";
	$sqlC = "select count(p_id) as count from paper where p_highlighted is not null ";
	$sql1 = "select * from paper where p_highlighted is not null order by p_date desc limit $index, $per_highlighted";

	$resultC = mysql_query($sqlC);
	$rowC = mysql_fetch_array($resultC);
	$paperCount = $rowC["count"];
	$num = $paperCount - $index;
	$result1 = mysql_query("$sql1");
	while ($row1 = mysql_fetch_array($result1)) {
    	if (substr($row1['p_date'],0,4) < $currentDisplayYear) {
		    $currentDisplayYear = substr($row1['p_date'],0,4);
		    echo "<h4>Papers in $currentDisplayYear</h4>";
		}
?>
	<div class="item">
    <?php 
	    ++$index;
		echo $num--. ". ";
   		$paperid=$row1['p_id'];
		$sql2="select m_name ,m_no from paper,paper_member where paper.p_id=paper_member.p_no and p_id='$paperid'";
		$result2=mysql_query("$sql2");
		while ($row2 = mysql_fetch_array($result2)) { 
    		if($row2['m_no']!=null){
	?>
    	<a href="member_detail.php?id=<?php echo $row2['m_no']; ?>">
    		<?php echo $row2['m_name'];?>
		</a>
	<?php
                echo ", ";
 			} else {
    			echo $row2['m_name']." ".",";
			}
		}
	?>
    	<a class="paper_name" href="paper_detail.php?pid=<?php echo $paperid ?>"><?php echo $row1['p_name'];?></a>, 
			<span class="bold"><?php echo $row1['p_journal']; ?></span>
			<?php 
			    if($row1["p_sci_link"]!=null){ 
			?>
                <a href="<?php echo $row1['p_sci_link']?>" >
            <?php 
				    if($row1["p_journal_no"]!=null){ 
					    echo $row1["p_journal_no"]; 
				    }
			?>
                </a>
            <?php 
			    }
			    echo '('.substr($row1['p_date'],0,4).').' ; 
   			    if($row1['p_link']!=null){ 
			?>
  				    <a href="<?php echo $row1[p_link]?>">Download</a>
            <?php }?>
			<div class="rich_text"><?php echo $row1[p_highlighted]?></div>
	</div>
	<?php
	    }
		$sql = "select count(p_id) as count from paper where p_highlighted is not null ";
		$result = mysql_query($sql);
		if ($row = mysql_fetch_array($result)) {
   			if ($row["count"] > $index) {
	?>
	        <div id="more" class="more"><a href="javascript:more_highlighted(<?php echo $index.",".$currentDisplayYear;?>)">more<em></em></a></div>
	<?php
            } else {
	?>
                <div id="more" class="no_more">all is shown</div>
	<?php
	        }
		}
?>