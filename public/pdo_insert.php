<?php

//PDO Insert Exercise
$dbc = new PDO('mysql: host=127.0.0.1; dbname=test', 'codeup', 'password');

// Tell PDO to throw exceptions on error
$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";

//  national_parks | CREATE TABLE `national_parks` (
//   `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
//   `name` varchar(99) DEFAULT NULL,
//   `location` varchar(99) DEFAULT NULL,
//   `date_established` date DEFAULT NULL,
//   `acreage` int(10) DEFAULT NULL,
//   `comments` text
//   PRIMARY KEY (`id`)
// ) ENGINE=InnoDB DEFAULT CHARSET=latin1

// Open parks.csv and populate entries array with contents.
$rows = array_map('str_getcsv', file('parks.csv'));
$header = array_shift($rows);
$entries = array();
	foreach ($rows as $row) {
		$entries[] = array_combine($header, $row);
	}

$query = 'INSERT INTO national_parks (name, location, date_established, acreage, comments) 
		VALUES (:name, :location, :date_established, :acreage, :comments)';

$stmt = $dbc->prepare($query);

var_dump($entries);

// // Iterate through data entries and bind values.
foreach ($entries as $entry) {
	$stmt->bindValue(':name', $entry['name'], PDO::PARAM_STR);
	$stmt->bindValue(':location',  $entry['location'],  PDO::PARAM_STR);
	$stmt->bindValue(':date_established', $entry['date'], PDO::PARAM_STR);
	$stmt->bindValue(':acreage',  $entry['acreage'],  PDO::PARAM_INT);
	$stmt->bindValue(':comments', $entry['comments'], PDO::PARAM_STR);
	$stmt->execute();
	echo "Inserted ID: " . $dbc->lastInsertId() . PHP_EOL;
}