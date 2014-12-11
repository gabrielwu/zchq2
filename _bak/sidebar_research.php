<div style="width:94%; margin:0 auto;">
<!-- Put the following javascript before the closing </head> tag. -->
<script>
  (function() {
    var cx = '006606256622441310586:1cpkib8oy7a';
    var gcse = document.createElement('script'); gcse.type = 'text/javascript'; gcse.async = true;
    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
        '//www.google.com.hk/cse/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(gcse, s);
  })();
</script>
<!-- Place this tag where you want the search box to render -->
<gcse:searchbox-only></gcse:searchbox-only>
</div>
<div id="" class="sidebar_nav_1">
	<div>
		<ul>
		<?php
			$data = research();
			while ($row = mysql_fetch_array($data)) {
		?>
		    <li><a href='#r_<?php echo $row["r_id"]; ?>'><span><?php echo $row["r_name"];?></span></a></li>
		<?php } ?>
		</ul>
	</div>
</div>
<div id="back_to_top">
    <a href="#header" onclick="" >TOP</a>
</div>
