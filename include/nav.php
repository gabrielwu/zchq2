
<?php //require_once("./db/conn.php");?>
<div class="nav">
    <ul class="first_ul">
	    <li id="nav0_li"><a href="index.php">首页</a></li>
	    <li id="nav1_li"><a href="view.php?aid=5678">机构设置</a></li>
	    <li id="nav2_li"><a href="list.php?tid=106">规章制度</a></li>
	    <li id="nav3_li"><a href="list.php?tid=107">工作流程</a></li>
	    <li id="nav4_li"><a href="view.php?aid=5604">通讯名录</a></li>
	    <li id="nav5_li"><a href="list.php?tid=103">相关下载</a></li>
	</ul>
</div>


<div id="second_nav">
    <div id="nav2_li_sec">
    	<?php
			$result = mysql_query("select id, typename from dede_arctype where reid=106");
			while($row = mysql_fetch_array($result)){
				$id       = $row["id"];
				$typename = $row["typename"];
				echo "<p><a href=list.php?tid=$id>$typename</a></p>";
    	    }
    	?>
	</div>
    <div id="nav3_li_sec">
    	<?php
			$result = mysql_query("select id, typename from dede_arctype where reid=107");
			while($row = mysql_fetch_array($result)){
				$id       = $row["id"];
				$typename = $row["typename"];
				echo "<p><a href=list.php?tid=$id>$typename</a></p>";
    	    }
    	?>
	</div>
</div>