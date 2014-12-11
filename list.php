<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<?php include("./include/media/css.php");?>
<?php include("./include/media/js.php");?>
<link rel="stylesheet" type="text/css" href="./media/css/introduction.css" />
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
				<td style="vertical-align: top">
					<div class="box area area5">
						<div>
						<?php
						    $per       = 20;
							$tid       = $_GET['tid'];
							$pageReq   = isset($_GET['p']) ? ($_GET['p']) : 1;
							$data      = getOneType($tid);
							$typename  = $data['typename'];
							$pageData  = getPager($per, $tid);
							$num       = $pageData["num"];
							$pageCount = $pageData["pageCount"];
		    				$list      = getList2($tid, ($pageReq - 1) * $per, $per );
		    				$pre  = $pageReq == 1 ? 1 : $pageReq - 1;
		    				$next = $pageReq == $pageCount ? $pageReq : $pageReq + 1;
			    		?>
							<span class="box_title"><a><?php echo $typename;?></a></span>
							<table class="list_table" >
								<?php
									
				    				while($row = mysql_fetch_array($list)){
								?>
									<tr>
										<td>
											<a href="view.php?aid=<?php echo $row['id'];?>" title=""><?php echo GBsubstr($row['title'], 0, 52);?></a>
										</td>										
										<td>
											<?php echo $row["pubdate"];?>
										</td>
									</tr>
								<?php } ?>
							</table>  
						</div>


				<div id="page">
				    <?php
				        echo "共 $num 条记录 ";
					    echo "<a class='num_page' href='list.php?tid=$tid&p=1' >1</a>";
					    if ($pageCount <= $num) {
						    for ($pi = 2; $pi <= $pageCount; $pi++) {
				                echo "<a class='num_page' href='list.php?tid=$tid&p=$pi'>$pi</a>";	    
							}
						} else {
						    for ($pi = 2; $pi <= $num; $pi++) {
					            echo "<a class='num_page' href='list.php?tid=$tid&p=$pi'>$pi</a>";
							}
							echo "...";
							echo "<a class='num_page' href='list.php?tid=$tid&p=$pageCount'>$pageCount</a>";
						}
					?>
				    <a id="pre" class="pre_next " href=<?php echo "'list.php?tid=$tid&p=$pre'"; ?> ><em></em>上一页</a>
				    <a id="next" class="pre_next" href=<?php echo "'list.php?tid=$tid&p=$next'";?> ><em></em>下一页</a>
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
    $("#i_nav_li a").addClass("current");    
});
</script>
</body>
</html>
