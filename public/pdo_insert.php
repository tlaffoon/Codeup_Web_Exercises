<?php

//PDO Insert Exercise
$dbc = new PDO('mysql: host=127.0.0.1; dbname=test', 'codeup', 'password');

// Tell PDO to throw exceptions on error
$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";
// Create a new file called pdo_insert.php and migrate your connection code 
// from php_pdo.php to it. Use PDO for all queries, nothing should be done 
// directly in MySQL or Sequel Pro. Between each step commit your changes to Git. 
// At the end the exercise, push all your commits to GitHub.

// For these exercises, we will be creating a database that contains national parks 
// from this list: http://en.wikipedia.org/wiki/List_of_national_parks_of_the_United_States

// Create a new table named national_parks with the following fields:

// id (primary key, auto increment)
// name
// location
// date_established
// area_in_acres

//  national_parks | CREATE TABLE `national_parks` (
//   `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
//   `name` varchar(99) DEFAULT NULL,
//   `location` varchar(99) DEFAULT NULL,
//   `date_established` date DEFAULT NULL,
//   `area_in_acres` int(10) DEFAULT NULL,
//   PRIMARY KEY (`id`)
// ) ENGINE=InnoDB DEFAULT CHARSET=latin1

// For each field, determine the best data type and length. Do not worry about the park description at this time.

// Insert the name, location, date established, and area in acres for 10 parks listed on the Wikipedia page linked above. 
// Using an array is a good idea.

// Acadia
// Maine
// 44.35°N 68.21°W	
// February 26, 1919	
// 47,389.67 acres (191.8 km2)	


// Open parks.csv and populate data array with contents.

$rows = array_map('str_getcsv', file('parks.csv'));
$header = array_shift($rows);
$data = array();
foreach ($rows as $row) {
  $data[] = array_combine($header, $row);
}

var_dump($data);

// Iterate through data entries and insert into mysql database.

foreach ($data as $entry) {
	$string = '';
	foreach ($entry as $key => $value) {	
		// Drop comma on last value for correct sql syntax.
		if ($key == 'Acreage') {
			$string .= "\"$value\"";
		}

		else {
		$string .= "\"$value\", ";
		}
	}
	//echo "<p>INSERT INTO national_parks (name, location, date_established, area_in_acres) VALUES ($string);</p>";
	$query = "INSERT INTO national_parks (name, location, date_established, area_in_acres) VALUES ($string)";
	$dbc->exec($query);
}
