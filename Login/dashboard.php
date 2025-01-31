<?php
session_start();
require_once 'dbconnection.php';

// Redirect to login if not logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}

// Check if user is an admin
$is_admin = false;
$sql = "SELECT role FROM users WHERE username = '" . $_SESSION['username'] . "'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($row['role'] == 'admin') {
        $is_admin = true;
    }
}

// Handle role change request
if ($_SERVER["REQUEST_METHOD"] == "POST" && $is_admin) {
    foreach ($_POST['roles'] as $user_id => $new_role) {
        // Update user role
        $update_sql = "UPDATE users SET role = '$new_role' WHERE id = $user_id";
        $conn->query($update_sql);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
        <p>You are now logged in.</p>

        <?php if ($is_admin): ?>
            <h3>Manage User Roles</h3>
            <form method="POST">
                <table>
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Username</th>
                            <th>Current Role</th>
                            <th>New Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Fetch all guest users
                        $sql = "SELECT id, username, role FROM users WHERE role = 'guest'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['username'] . "</td>";
                                echo "<td>" . $row['role'] . "</td>";
                                echo "<td>
                                    <select name='roles[" . $row['id'] . "]'>
                                        <option value='guest'" . ($row['role'] == 'guest' ? ' selected' : '') . ">Guest</option>
                                        <option value='admin'" . ($row['role'] == 'admin' ? ' selected' : '') . ">Admin</option>
                                    </select>
                                </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>No guest users found.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <button type="submit">Update Roles</button>
            </form>
        <?php endif; ?>

        <div class="dashboard-buttons">
            <a href="logout.php" class="btn logout-btn">Logout</a>
        </div>
    </div>
    
    <footer>
    <div class="footer-content">
        <a href="https://github.com/Piyush-1723" target="_blank">
            <img src="images/github_logo.png" class="social-icon">
        </a>
        <a href="https://www.linkedin.com/in/piyush-singh1723/" target="_blank">
            <img src="images/linkedin_logo.png" class="social-icon">
        </a>
    </div>
</footer>


</body>
</html>
