<?php
session_start(); // Start the session
include 'db.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $country = htmlspecialchars(trim($_POST['country']));
    $street = htmlspecialchars(trim($_POST['street']));
    $pincode = htmlspecialchars(trim($_POST['pincode']));
    $password = htmlspecialchars(trim($_POST['password']));
    $dob = htmlspecialchars(trim($_POST['dob']));
    $age = htmlspecialchars(trim($_POST['age']));
    $gender = htmlspecialchars(trim($_POST['gender']));

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert into the database
    $sql = "INSERT INTO users (name, email, phone, country, street, pincode, password, dob, age, gender) 
            VALUES ('$name', '$email', '$phone', '$country', '$street', '$pincode', '$hashed_password', '$dob', '$age', '$gender')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['message'] = "Registration successful!";
        header("Location: index.php"); // Redirect to the main page or success page
        exit();
    } else {
        $_SESSION['message'] = "Error: " . $conn->error; // Store error message in session
    }
}

$conn->close(); // Close the database connection
?>
