<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<div class="navbar-collapse collapse">
		<form class="navbar-form navbar-right" role="form" action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
			<div class="form-group">
				<input name="search_term" type="text" placeholder="Search term" class="form-control" value="<?= isset($_REQUEST['search_term']) ? $_REQUEST['search_term'] : '' ?>">
			</div>
			<button type="submit" class="btn btn-success">Search</button>
		</form>
	</div>

	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>
						Full name
					</th>
					<th>
						E-mail address
					</th>
				</tr>
			</thead>
			<tbody>

<?php
$databaseConnection = getDatabaseConnection();
if ($_REQUEST['search_term']) {
	$searchTerm = $_REQUEST['search_term'];
	$where = 'WHERE name LIKE "%' . $searchTerm . '%" OR email LIKE "%' . $searchTerm . '%"';
} else {
	$where = '';
}
$result = $databaseConnection->query('SELECT * FROM insecurity_users ' . $where);

/** @var $user string[] */
while (($user = $result->fetch_assoc())) {
?>
		<tr>
			<td><?= $user['name'] ?></td>
			<td><?= $user['email'] ?></td>
		</tr>
<?php
}
?>
			</tbody>
		</table>
	</div>
</div>