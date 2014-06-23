<?php 

// Use PDO for all queries, nothing should be done directly in MySQL or Sequel Pro. 
// Between each step commit your changes to Git. At the end the exercise, push all your commits to GitHub.

// Create a page that lists the national parks from your database. On each page load, 
// it should retrieve all records from the database and display them.

// Modify your page to only load four parks at a time and add links to go the next or previous pages.

// Modify your query to load the appropriate parks given which page the user is on. 
// You should accept one or two parameters from $_GET and use them to load the appropriate parks.

$dbc = new PDO('mysql: host=127.0.0.1; dbname=test', 'codeup', 'password');

// Tell PDO to throw exceptions on error
$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";

$stmt = $dbc->query('SELECT count(*) FROM national_parks;');

$numParks = $stmt->fetchColumn();

echo 'There are ' . $numParks . ' parks in our database.' . PHP_EOL;


$stmt2 = $dbc->query('SELECT * FROM national_parks;');

// while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
//     // print_r($row);
// 	echo "<p>{$row['name']} -- {$row['location']} -- {$row['date_established']} -- {$row['area_in_acres']}</p>";
// }

?>

<html>
<head>
	<title>National Parks</title>
</head>
<body>
  <table>
	<tr>
		<th>Name</th>
		<th>Location</th>
		<th>Date Established</th>
		<th>Area in Acres</th>
	</tr>

	<tr>
		<? while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
			echo "<td>{$row['name']}</td>";
			echo "<td>{$row['location']}</td>";
			echo "<td>{$row['date_established']}</td>";
			echo "<td>{$row['area_in_acres']}</td></tr>";
		}?>
	
  </table>
</body>
</html>