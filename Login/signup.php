<?php
require_once 'dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = isset($_POST['role']) ? $_POST['role'] : 'guest'; // Fetch role from request

    // Prevent destructive SQL commands in input
    $forbidden_words = ['DELETE', 'DROP', 'TRUNCATE', 'RENAME', 'SET'];
    foreach ($forbidden_words as $word) {
        if (stripos($username, $word) !== false || stripos($password, $word) !== false) {
            die("SQL Error: Forbidden keyword detected!"); // Simple error message
        }
    }
    // Intentionally vulnerable SQL query (for SQLi testing)
    $sql = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')";

    if ($conn->query($sql) === TRUE) {
        echo "Account created successfully";
        header("Location: login.html"); // Redirect to login page after signup
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
