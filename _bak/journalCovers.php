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
<?php require("./config/publications.php");?>
<?php require("./model/publications.php");?>
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
		    <h4>Journal Covers</h4>
			<div id="paper_items">
			    <table id="paper_table">
				<?php 
				    $paper_data = journal_covers();
					$paper_page_data = paper_page($per_journalCovers);
					$num = $paper_page_data["num"];
					$pageCount = $paper_page_data["pageCount"];
					$num = $paper_page_data["num"];
				    $index = 0;
					while($paper_data_row = mysql_fetch_array($paper_data)){
					    $index++;
				?>
				    <tr class="paper_tr">
					    <td width="22%" align="left">
							<a href="paper_detail.php?pid=<?php echo $paper_data_row['p_id']?> "target=_blank>
							    <img alt="Latest Papers" src="<?php echo "./background".substr($paper_data_row['p_coverpath'],2) ?>" width=120 height=160>
							</a>
						</td>
						<td width="">
							<table>
							    <tr>
								    <td colspan="2">
								        <a href="paper_detail.php?pid=<?php echo $paper_data_row['p_id']?>" title="<?php echo $paper_data_row['p_name'];?>" target="_blank"> 
									    <?php				
										    echo $num--.".".$paper_data_row['p_name'];
									    ?>
								        </a>
								    </td>
								</tr>
								<tr>
								    <td width="16%">Author(s)：</td>
									<td>
								    <?php 
									    $paper_author_data = paper_author($paper_data_row['p_id']);
										$m_names = "";
										while($row4 = mysql_fetch_array($paper_author_data)){
											$m_names .= $row4['m_name'].",";
										}
										$m_names_length = strlen($m_names);
										$m_names = substr($m_names, 0, $m_names_length - 1);
										echo $m_names;
									?>
								    </td>
								</tr>
								<tr><td>Journal：</td><td><?php echo $paper_data_row['p_journal']?></td></tr>
								<tr><td>Volume：</td><td><?php echo $paper_data_row['p_journal_no']?></td></tr>
								<tr><td>Date：</td><td><?php echo $paper_data_row['p_date']?></td></tr>
							</table>
						</td>
					</tr>
				<?php } ?>
				</table>
			</div>
		</div>
	</div> 
</div>
<?php include("./include/footer.php");?>
</div>
<?php include("./include/media/js.php");?>
<script type="text/javascript" src="./media/js/publications.js"></script>
<script type="text/javascript">
$(function(){
    $("#li_jc a").addClass("current");	
});
</script>
</body>
</html>