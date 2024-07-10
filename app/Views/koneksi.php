<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rumahmakan";

// Connection
$connection = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($connection->connect_error) {
    die("Error connecting to database: " . $connection->connect_error);
}
