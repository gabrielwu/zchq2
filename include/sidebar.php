
	    			<div class="box area2" style="">
						<div>
							<span class="box_title"><a>其他链接</a></span>
							<table class="list_table">
								<tr><td><a href="view.php?aid=5600" title="">处长信箱</a></td></tr>
								<tr><td><a href="http://10.60.16.64" title="">国有资产管理</a></td></tr>
								<tr><td><a href="http://10.60.16.157:8006" title="">节能管理</a></td></tr>
								<tr><td><a href="background/login.html" title="">管理员入口</a></td></tr>
							</table>  
						</div>
					</div>
				    <div class="box area2" style="">
						<div>
							<span class="box_title"><a>工作职责</a></span>
							<table class="list_table">
								<?php
			    				$list = getList2(102);
			    				while($row = mysql_fetch_array($list)){
								?>
									<tr><td>
										<a href="view.php?aid=<?php echo $row['id'];?>" title=""><?php echo $row["title"];?></a>
									</td></tr>
								<?php } ?>
							</table>  
						</div>
					</div>