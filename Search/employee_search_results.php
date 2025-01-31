<?php
// Include the search-specific database connection
require_once 'dbconnection.php';

// Fetch the search query
$search = isset($_POST['search']) ? $_POST['search'] : '';

if (!empty($search)) {
    // Prevent destructive queries
    $forbidden = ['DELETE', 'DROP','INSERT','UPDATE','ALTER','TRUNCATE','CREATE','RENAME','REPLACE','SET'];
    foreach ($forbidden as $word) {
        if (stripos($search, $word) !== false) {
            echo "<div class='no-results'>Invalid query. Destructive / Insertion Queries are Not Allowed.</div>";
            exit;
        }
    }

    // SQLi vulnerable query
    $sql = "SELECT emp_no, first_name, last_name, gender, hire_date 
        FROM employee 
        WHERE first_name = '$search'";


    // echo "<pre>$sql</pre>";   // remove comment for debugging


    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
        // Display results in a table
        echo "<table>
                <tr>
                    <th>Employee No</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Hire Date</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['emp_no']}</td>
                    <td>{$row['first_name']}</td>
                    <td>{$row['last_name']}</td>
                    <td>{$row['gender']}</td>
                    <td>{$row['hire_date']}</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "<div class='no-results'>No results found.</div>";
    }
} else {
    echo "<div class='no-results'>Please enter a search term.</div>";
}

$conn->close();
?>
