<?php
session_start();
require_once 'dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prevent destructive SQL commands in input
    $forbidden_words = ['DELETE', 'DROP', 'INSERT', 'UPDATE', 'ALTER', 'TRUNCATE', 'CREATE', 'RENAME', 'REPLACE', 'SET'];
    foreach ($forbidden_words as $word) {
        if (stripos($username, $word) !== false || stripos($password, $word) !== false) {
            die("SQL Error: Forbidden keyword detected!");
        }
    }
    // Intentionally vulnerable SQL query (for SQLi testing)
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Invalid credentials";
    }
}
?>
