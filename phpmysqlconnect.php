<?php
$servername = "localhost";
$username = "root";
$dbname = "demo";

// Create connection
$conn = new mysqli($servername, $username, "", $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to create table
$sql = "ALTER TABLE Data ADD col VARCHAR(255) NOT NULL";

if ($conn->query($sql) === TRUE) {
    echo "Table Data created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>