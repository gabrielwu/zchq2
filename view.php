<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<?php include("./include/media/css.php");?>
<?php include("./include/media/js.php");?>
</head>
<body>
<?php 
require("./db/conn.php");
require("./util/util.php");
require("./model/index.php");
?>
<div id="wrapper">
<?php include("./include/header.php");?>
<div id="content">
    <?php include("./include/nav.php");?>
	<div id="main">
		<table>
			<tr>
				<td>
					<?php include("./include/sidebar.php");?>
				</td>
				<td>
					<div class="box area area5">
						<div>
						<?php
							$aid       = $_GET['aid'];
							$archive = getOneArchive($aid);
							$typeid    = $archive['typeid'];
							$isDownloadType = isDownloadType($typeid);
							if ($isDownloadType) {
								$data = array_merge($archive, getOneDownload($aid));
							} else {
								$data = array_merge($archive, getOneArticle($aid));
							}
//var_dump($data);
							$type      = getOneType($typeid);
							$typename  = $type['typename'];
			    		?>
							<span class="box_title"><a href="list.php?tid=<?php echo $typeid;?>"><?php echo $typename;?></a></span>

							<table class="list_table" >
								<tr>
									<td style="text-align: center; font-size: 20px;"><?php echo $data["title"];?></td>
								</tr>
								<tr>
									<td style="text-align: center;"><?php echo $data["pubdate"];?></td>
								</tr>
								<tr>
									<td>
										<?php 
									        if ($isDownloadType) {
									        	echo $data["introduce"]. "<br>";
									        	echo "<a href='". softlinksSolve($data["softlinks"]). "'>下载</a>";
									        } else {
									        	echo $data["body"];
									        }
									    ?></td>
								</tr>
							</table>  
						</div>

					</div>
				</td>
			</tr>
		</table>

<script type="text/javascript" >
$("#page a").each(function () {
	if ($(this).text() == <?php echo "'$pageReq'"; ?>) {
		$(this).addClass("current_page");
	}
}) 
</script>
	    
			
	</div> 
</div>
<?php include("./include/footer.php");?>
</div>                                    
<script type="text/javascript" src="./media/js/lab.js"></script>
<script type="text/javascript">
$(function (){   
});
</script>
</body>
</html>
