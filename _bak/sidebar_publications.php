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
<div id="sidebar_nav_p1" class="sidebar_nav_static">
    <div>
	    <ul class="">
		<?php 
    		$currenttime=getdate();
			$currentyear=$currenttime[year];
			$years = array($currentyear, $currentyear-1, $currentyear-2, $currentyear-3, $currentyear-4, $currentyear-5);
		?>
		    <li id="li_paper-1"><a href="publications.php"><span>Journal Papers</span></a></li>
    		<li id="li_paper<?php echo $years[0];?>"><a class="sec_li_a" href="publications.php?year=<?php echo $years[0];?>"><span>Papers in <?php echo $years[0];?></span></a></li>
			<li id="li_paper<?php echo $years[1];?>"><a class="sec_li_a" href="publications.php?year=<?php echo $years[1];?>"><span>Papers in <?php echo $years[1];?></span></a></li>
			<li id="li_paper<?php echo $years[2];?>"><a class="sec_li_a" href="publications.php?year=<?php echo $years[2];?>"><span>Papers in <?php echo $years[2];?></span></a></li>
			<li id="li_paper<?php echo $years[3];?>"><a class="sec_li_a" href="publications.php?year=<?php echo $years[3];?>"><span>Papers in <?php echo $years[3];?></span></a></li>
			<li id="li_paper<?php echo $years[4];?>"><a class="sec_li_a" href="publications.php?year=<?php echo $years[4];?>"><span>Papers in <?php echo $years[4];?></span></a></li>
			<li id="li_paper<?php echo $years[5];?>"><a class="sec_li_a" href="publications.php?year=<?php echo $years[5];?>"><span>Papers before <?php echo $years[5];?></span></a></li>
			<li id="li_jc"><a href="journalCovers.php"><span>Journal Covers</span></a></li>
			<li id="li_hp"><a href="highlightedPapers.php"><span>Highlighted Papers</span></a></li>
			<li id="li_cp"><a href="citationPapers.php"><span>Citiations</span></a></li>
			<li id="li_patent"><a href="patent.php"><span>Patents</span></a></li>
		</ul>
	</div>
</div>

<div id="back_to_top">
    <a href="#header" onclick="" >TOP</a>
</div>