<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
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
$result = $databaseConnection->query('SELECT * FROM insecurity_users');

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