<?php
$host = 'localhost'; // Database host
$username = 'root';  // Database username
$password = '';      // Database password
$dbname = 'fecpoint'; // Database name

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
