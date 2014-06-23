<?php 

// Populate array with data from csv, using the first row as the key in the associative array.

$rows = array_map('str_getcsv', file('parks.csv'));
$header = array_shift($rows);
$csv = array();
foreach ($rows as $row) {
  $csv[] = array_combine($header, $row);
}

// var_dump($csv);

?>