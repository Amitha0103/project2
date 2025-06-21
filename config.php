<?php
$servername = "localhost";
$username = "root";  // Default username for MySQL
$password = "yourpassword";      // Default password for MySQL (blank)
$dbname = "alumni_platform"; // Your database name

// Create connection
$conn = new mysqli('localhost', 'root', '', 'alumni_platform');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

