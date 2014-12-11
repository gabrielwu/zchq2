<?php //session_start();?>
<div class="header">
	<p>后台管理</p>
	<a href="../controller/logout.php">[安全退出]</a>
	<a href="../../index.php" target="_blank">[前台首页]</a>
	<a href="../view/modifyPassword.php">[修改密码]</a>
	<a>Hi,<?php echo $_SESSION['userid'];?></a>
</div>