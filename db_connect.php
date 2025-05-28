<?php
$servername = "192.168.0.100";
$username = "suzanneb_gallery";
$password = "YemFgwwH8LBxfMwf27W9";
$database = "suzanneb_gallery";

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>