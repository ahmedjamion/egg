<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";

// Database name to be created
$dbname = "egg_db";

// SQL file path
$sql_file = "egg_db.sql";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
} else {
    echo "Error creating database: " . $conn->error;
}

// Select database
$conn->select_db($dbname);

// Read SQL file
$sql_contents = file_get_contents($sql_file);

// Execute SQL queries
if ($conn->multi_query($sql_contents)) {
} else {
    echo "Error executing SQL file: " . $conn->error;
}

// Close connection
$conn->close();

 ?>