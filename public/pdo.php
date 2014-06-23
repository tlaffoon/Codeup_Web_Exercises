<?php

// PDO Exercise

// Create a new file named php_pdo.php. Commit all changes to GitHub.

// Connect to the codeup_test_db using PDO and test the results.

// Update the code to connect to the employees database and test the results.

// Using the MySQL console, add a new database named codeup_pdo_test_db and connect via PHP. Test the results.

// Get new instance of PDO object
$dbc = new PDO('mysql: host=127.0.0.1; dbname=employees', 'codeup', 'password');

// Tell PDO to throw exceptions on error
$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";