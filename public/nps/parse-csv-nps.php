<?php
// parse-csv.php

function parseCSV() {
	echo "string";
}


$array = [];

// 1.  Get rows to appear in one table as desired

?>

<!DOCTYPE html>
<html>
<head>
	<title>NPS Report</title>
</head>
<body>

<div class="container">
	<table class="table table-striped table-hover">
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Cohort</th>
			<th>Week</th>
			<th>Score</th>
			<th>Comment</th>
		</tr>

		<tr>
			<? foreach ($array as $key => $value) : ?>
				<td><?= $value ?></td>
			<? endforeach; ?>
		</tr>
	</table>
</div>

</body>
</html>