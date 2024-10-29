<?php
include "db.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $role = $_POST['role'];
    $sql = "INSERT INTO services (role, selected_services) VALUES ('$role', '$services')";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?message=Services added successfully!");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
