<ul class="nav nav-tabs">
	<li><a href="index.php">Home</a></li>
	<li><a href="index.php?page=userlist.php">Users</a></li>
	<li><a href="index.php?page=login.php">Login</a></li>
<?php
	if (isLoggedIn()) {
?>
		<li><a href="index.php?page=logout.php">Logout</a></li>
<?php
	}
?>
</ul>
