<div style="width:94%; margin:0 auto;">
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
<!-- Place this tag where you want the search box to render -->
<gcse:searchbox-only></gcse:searchbox-only>
</div>
<?php 
$result = mysql_query("SELECT * FROM contact where C_id=1");
$row = mysql_fetch_array($result);
?>
<div id="sidebar_nav_1" class="sidebar_nav">
	<h3><a href="#">Contact us</a></h3>
	<div>
		<ul>
		    <li><span>Addr:</span><p><?php echo $row[1] ?></p></li>
			<li><span>Phone:</span><p><?php echo $row[2] ?></p></li>
			<li><span>Fax:</span><p><?php echo $row[3] ?></p></li>
			<li><span>Email:</span><p><?php echo $row[4] ?></p></li>
		</ul>
	</div>
</div>
<div id="sidebar_nav_4" class="sidebar_nav bold_a">
	<h3><a href="#">Useful Link </a></h3>
	<div>
		<ul>
		<?php
		    $result = mysql_query("SELECT * FROM link where l_mark=1");
			while($row = mysql_fetch_array($result)){
		?>
		    <li><a href="<?php echo $row['l_content']?>" target="_blank" ><?php echo $row['l_name']?></a></li>
		<?php
		    }
		?>
		</ul>
	</div>
</div>
<div id="sidebar_nav_2" class="sidebar_nav">
	<h3><a href="#">Journal Link</a></h3>
	<div>
	    <ul id="journal_link">
		<?php  
	        $result = mysql_query("SELECT l_name,l_content FROM link where l_mark=0");
			$count = 1;
	        while($row = mysql_fetch_array($result)){
		?>
            <li><a href="<?php echo $row['l_content']?>" target="_blank" ><?php echo $row['l_name']?></a></li>
		<?php 
		    } 
	    ?>
		</ul>
	</div>
</div>
<div id="sidebar_nav_3" class="sidebar_nav bold_a">
	<h3><a href="#">Impact Factor</a></h3>
	<div>
		<ul>
		    <?php
			    $result7 = mysql_query("SELECT l_name,l_content FROM link where l_mark=2");
				while ($row7 = mysql_fetch_array($result7)) {
			?>
			    <li><a href="<?php echo $row7['l_content']?>"><?php echo $row7['l_name']?></a></li>
			<?php } ?>
	    </ul>
	</div>
</div>
<div id="back_to_top">
    <a href="#header" onclick="" >TOP</a>
</div>