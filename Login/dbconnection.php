<?php
$servername = "localhost";  // Host name, usually 'localhost'
$username = "root";         // Default XAMPP MySQL username
$password = "";             // Default XAMPP MySQL password (empty)
$dbname = "employee";       // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
