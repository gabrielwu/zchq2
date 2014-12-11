<?php
header('Content-Type:text/html;charset=utf-8');
	require("../config/index_paper_page.php");
    require("../db/conn.php");
	require("../util/util.php");
    $request_page = $_POST["request_page"];
	$start = ($request_page - 1) * $per;
	$request_page_pre = $request_page - 1;
	$request_page_next = $request_page + 1;

	$sql="select * from paper order by p_date desc limit $start,$per";
	$result = mysql_query("$sql");
	$k=0;
	$currenttime=getdate();
	$currentyear=$currenttime[year];
	$nextyear=$currentyear+1;
	$nextyear_newyearsdate=$nextyear."-01-01";
	
	$sql0="select count(p_id) as count from paper ";
	$result0 = mysql_query("$sql0");
	$row0 = mysql_fetch_array($result0);
	$paperCount = $row0['count'];
	$pageCount = ceil($paperCount / $per);
	$num = $paperCount - $start;
	$paper_page_html = "<div id='paper_page'>";
	
	$req_left_nums = floor($page_nums / 2);
	$req_right_nums = floor($page_nums / 2);
	$left_ori = ($request_page - $req_left_nums);
	$right_ori = ($request_page + $req_right_nums);
	if ($left_ori <= 1) {
	    $left_ori = 1;
		$right_ori = $page_nums;
		if ($pageCount > $page_nums) {
		    for ($i = 1; $i <= $page_nums; $i++) {
			    if ($i != $request_page) {
				    $paper_page_html .= "<a class='num_page' href='javascript:paper_page($i)'>$i</a>";
				} else {
				    $paper_page_html .= "<a class='num_page current_page' >$request_page</a>";
				}
			}
			$paper_page_html .= " ... ";
			$paper_page_html .= "<a class='num_page' href='javascript:paper_page($pageCount)'>$pageCount</a>";
		} else {
		    for ($i = 1; $i <= $pageCount; $i++) {
			    if ($i != $request_page) {
				    $paper_page_html .= "<a class='num_page' href='javascript:paper_page($i)'>$i</a>";
				} else {
				    $paper_page_html .= "<a class='num_page current_page' >$request_page</a>";
				}
			}
		}
	} else if ($right_ori >= $pageCount) {
		$right_ori = $pageCount;
		$left_ori = $pageCount + 1 - $page_nums;
		if ($left_ori > 1) {
		    $paper_page_html .= "<a class='num_page' href='javascript:paper_page(1)'>1</a>";
		    $paper_page_html .= " ... ";
		} else {
		    $left_ori = 1;
		}
		for ($i = $left_ori; $i <= $pageCount; $i++) {
		    if ($i != $request_page) {
			    $paper_page_html .= "<a class='num_page' href='javascript:paper_page($i)'>$i</a>";
			} else {
			    $paper_page_html .= "<a class='num_page current_page' >$request_page</a>";
			}
		}
	} else { // $right_ori < $pageCount && $left_ori > 1
	    $paper_page_html .= "<a class='num_page' href='javascript:paper_page(1)'>1</a>";
		$paper_page_html .= " ... ";
		for ($i = $left_ori; $i <= $right_ori; $i++) {
		    if ($i != $request_page) {
			    $paper_page_html .= "<a class='num_page' href='javascript:paper_page($i)'>$i</a>";
			} else {
			    $paper_page_html .= "<a class='num_page current_page' >$request_page</a>";
			}
		}
		$paper_page_html .= " ... ";
		$paper_page_html .= "<a class='num_page' href='javascript:paper_page($pageCount)'>$pageCount</a>";
	}
	

	
	if ($request_page_pre > 0 && $request_page_next <= $pageCount) { // pre,next
	    $paper_page_html .= "<a id='pre' class='pre_next' href='javascript:paper_page($request_page_pre)'><em></em>pre</a>";
		$paper_page_html .= "<a id='next' class='pre_next' href='javascript:paper_page($request_page_next)'><em></em>next</a>";
	} else if ($request_page_pre <= 0 && $request_page_next <= $pageCount) { // next
	    $paper_page_html .= "<a id='pre' class='pre_next pre_next_disable' >pre</a>";
		$paper_page_html .= "<a id='next' class='pre_next' href='javascript:paper_page($request_page_next)'><em></em>next</a>";
	} else if ($request_page_pre > 0 && $request_page_next > $pageCount) { // pre
	    $paper_page_html .= "<a id='pre' class='pre_next' href='javascript:paper_page($request_page_pre)'><em></em>pre</a>";
		$paper_page_html .= "<a id='next' class='pre_next pre_next_disable' ><em></em>next</a>";
	} else if ($request_page_pre <= 0 && $request_page_next > $pageCount) { // pre
	    $paper_page_html .= "<a id='pre' class='pre_next pre_next_disable'><em></em>pre</a>";
		$paper_page_html .= "<a id='next' class='pre_next pre_next_disable'><em></em>next</a>";
	}
	$paper_page_html .= "</div>";
?>
<table id="paper_table">
<?php
	while($row = mysql_fetch_array($result)){
?>
    <tr>
    	<td width="22%" align="center">
    		<a href="paper_detail.php?pid=<?php echo $row['p_id']?>" target="_blank">
    			<img alt="Latest Papers" src="<?php echo "./background".substr($row['p_coverpath'],2) ?>" height=90>
			</a>
		</td>
		<td width="">
			<table>
				<tr>
					<td colspan="2">
						<a href="paper_detail.php?pid=<?php echo $row['p_id']?>" target="_blank" title="<?php echo $row['p_name'];?>"> 
						<?php		
							echo $num--.".".$row['p_name'];
						?>
						</a>
					</td>
				</tr>
				<tr>
					<td>Author(s):</td><td><?php echo $row['p_members']?></td>     
				</tr>
				<tr>
                    <td>Journal:</td><td><?php echo $row['p_journal']?>, <?php echo $row['p_journal_no']?></td>
                </tr>
                <tr>
                    <td>Date:</td><td><?php echo $row['p_date']?></td>
                </tr>
			</table>
	    </td>
	</tr>
<?php
	}    
?>
</table>
<?php
echo $paper_page_html;
?>