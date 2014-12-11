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
<?php 
$result = mysql_query("SELECT * FROM contact where C_id=1");
$row = mysql_fetch_array($result);
?>
<div id="sidebar_nav_1" class="sidebar_nav">
	<h3><a href="#">Contact</a></h3>
	<div>
		<ul>
		    <li><span class="title">Prof. </span><p>Tong Zhang</p></li>
		    <li>
			    <span class="title">Addr. </span>
				<p>State Key Laboratory on Integrated Optoelectronics, College of Electronic Science and Engineering, Jilin University, 2699 Qianjin Street, Changchun 130012, China</p>
			</li>
			<li><span class="title">Tel. </span><p><?php echo $row[2] ?></p></li>
			<li><span class="title">Fax. </span><p><?php echo $row[3] ?></p></li>
			<li><span class="title">Email. </span><p><?php echo $row[4] ?></p></li>
		</ul>
	</div>
</div>

