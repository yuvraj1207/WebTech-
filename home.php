<?php
session_start(); // Start the session
include 'db.php'; 
// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle service form submission (POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize role input
    $role = htmlspecialchars($_POST['role']);

    // Get selected services
    if (!empty($_POST['services'])) {
        $services = implode(", ", array_map('htmlspecialchars', $_POST['services']));
    } else {
        $services = "No services selected.";
    }

    // Store the services in the session to display on the home page
    $_SESSION['role'] = $role;
    $_SESSION['services'] = $services;

    // Redirect to the same page to avoid form re-submission
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Fetch users from the database (GET)
$sql = "SELECT * FROM events";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Eco Challenge</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <header class="header">
        <h1>Eco Challenge</h1>
        <nav>
            <a href="#">About Us</a>
            <a href="index.html">Sign Up</a>
            <a href="services.html">Services</a>
        </nav>
    </header>

    <!-- Display selected services (from session) -->
    <section class="services-section">
        <h2>Services Selected</h2>
        <?php
        if (isset($_SESSION['role']) && isset($_SESSION['services'])) {
            echo "<p><strong>Role:</strong> " . $_SESSION['role'] . "</p>";
            echo "<p><strong>Services:</strong> " . $_SESSION['services'] . "</p>";
        } else {
            echo "<p>No services selected yet.</p>";
        }
        ?>
    </section>

    <!-- Display user data from the database -->
    <section class="user-data-section">
        <h2>User Data</h2>
        <?php
        if ($result && $result->num_rows > 0) {
            echo "<table border='1'>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Country</th>
                        <th>Street</th>
                        <th>Pincode</th>
                        <th>DOB</th>
                        <th>Age</th>
                        <th>Gender</th>
                    </tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . htmlspecialchars($row['name']) . "</td>
                        <td>" . htmlspecialchars($row['email']) . "</td>
                        <td>" . htmlspecialchars($row['phone']) . "</td>
                        <td>" . htmlspecialchars($row['country']) . "</td>
                        <td>" . htmlspecialchars($row['street']) . "</td>
                        <td>" . htmlspecialchars($row['pincode']) . "</td>
                        <td>" . htmlspecialchars($row['dob']) . "</td>
                        <td>" . htmlspecialchars($row['age']) . "</td>
                        <td>" . htmlspecialchars($row['gender']) . "</td>
                    </tr>";
            }
            echo "</table>";
        } else {
            echo "No users found.";
        }
        $conn->close(); // Close the database connection
        ?>
    </section>

    <footer>
        <p>&copy; 2024 Eco Challenge. All rights reserved.</p>
    </footer>
</body>
</html>
