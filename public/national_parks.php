<?php 

// Update your table definition to include the park description. Update your insert statements to use $dbc->prepare() and bound variables. You may still use $dbc->exec() to create the table.

// Update the query(s) in national_parks.php to use prepared statements, in particular for the limit and offset.

// Add a form that allows national parks to be added to your database. Use prepared statements for all queries that contain dynamic data.

// Validate all form inputs to ensure that database entries are not empty.

$dbc = new PDO('mysql: host=127.0.0.1; dbname=test', 'codeup', 'password');

// Tell PDO to throw exceptions on error
$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";

// ------------------------------------------------------------------- //

$limit = 5;

// change to ternary
if (!empty($_GET)) {
	$pageID = $_GET['page'];
}

else {
	$pageID = 0;
}

$query = ("SELECT * FROM national_parks LIMIT " . $limit . " OFFSET " . ($pageID * 4)  . ";");

$stmt = $dbc->query($query);

$count = $dbc->query('SELECT COUNT(*) FROM national_parks;')->fetchColumn();

echo "$count";

$numPages = ceil($count / $limit);
echo "$numPages";
//echo "$count";
//echo "$numPages";

// ------------------------------------------------------------------- //

?>

<html>
<head>
	<title>National Parks</title>
	<link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.css">
	<style type="text/css">
	.nav {
		width: 400px;
	}
	</style>
</head>
<body>

<div class="container">

  <table class="table table-striped">
	<tr>
		<th>Name</th>
		<th>Location</th>
		<th>Date Established</th>
		<th>Acreage</th>
		<th>Comments</th>
	</tr>

	<tr>
		<? while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			echo "<td>{$row['name']}</td>";
			echo "<td>{$row['location']}</td>";
			echo "<td>{$row['date_established']}</td>";
			echo "<td>{$row['acreage']}</td>";
			echo "<td>{$row['comments']}</td></tr>";
		}?>
  </table>

  <? if ($pageID != 0) : ?>
  	<a style="float: left" href="?page=<?= ($pageID - 1) ?>">Previous</a>
  <? endif ?>
  
  <? if ($pageID < $numPages) : ?>
  	<a style="float: right" href="?page=<?= ($pageID + 1) ?>">Next</a>
  <? endif ?>
  
</div>

<div class="container">

<?php

if (!empty($_POST)) {
	try {
			foreach ($_POST as $key => $value) {
				if ($value == '') {
					throw new Exception("Please include a valid " . ucfirst($key) . ".", 1);
				}
			}

		$formData = array();
		$formData[] = $_POST;
	
		var_dump($formData);

		$query = 'INSERT INTO national_parks (name, location, date_established, acreage, comments) 
					VALUES (:name, :location, :date_established, :acreage, :comments)';

		$stmt = $dbc->prepare($query);

		foreach ($formData as $data) {
			$stmt->bindValue(':name', $data['name'], PDO::PARAM_STR);
			$stmt->bindValue(':location',  $data['location'],  PDO::PARAM_STR);
			$stmt->bindValue(':date_established', $data['date'], PDO::PARAM_STR);
			$stmt->bindValue(':acreage',  $data['acreage'],  PDO::PARAM_INT);
			$stmt->bindValue(':comments', $data['comments'], PDO::PARAM_STR);
			$stmt->execute();
			echo "<p>Inserted ID: " . $dbc->lastInsertId() . "</p>";
		}
	} 

	catch (Exception $e) {
		echo $e->getMessage();
	}
}

?>

	<form role="form" method="POST" enctype="multipart/form-data" action="">
	  <h2>Add a Park!</h2>
		<div class="form-group">

			<label for="name">Name:</label>
			<input class="form-control" id="name" name="name" type="text" placeholder="">

			<label for="location">Location</label>
			<input class="form-control" id="location" name="location" type="text" placeholder="">

			<label for="date">Date Established</label>
			<input class="form-control" id="date" name="date" type="date" placeholder="">

			<label for="acreage">Acreage</label>
			<input class="form-control" id="acreage" name="acreage" type="text" placeholder="">

			<label for="comments">Comments</label>
			<input class="form-control" id="comments" name="comments" type="text" placeholder="">

		</div>
		
		<button class="btn btn-default" type="submit" value="submit">Add</button>
	</form>

</div>

</body>
</html>