<?php
// Include database connection
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $conn->real_escape_string($_POST['full_name']);
    $email = $conn->real_escape_string($_POST['email']);
    $dept = $conn->real_escape_string($_POST['dept']);
    $reg = $conn->real_escape_string($_POST['reg']);
    $password = $conn->real_escape_string($_POST['password']);
    $confirm_password = $conn->real_escape_string($_POST['confirm_password']);

    // Check if passwords match
    if ($password !== $confirm_password) {
        header("Location: signup.html?error=Passwords do not match.");
        exit;
    }

    // Check if the Registration Number or Email already exists
    $checkQuery = "SELECT * FROM users WHERE reg = ? OR email = ?";
    $stmt = $conn->prepare($checkQuery);
    $stmt->bind_param("ss", $reg, $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Redirect to signup with error message
        header("Location: signup.html?error=The Registration Number or Email is already registered. Please try again.");
        exit;
    }

    // Proceed with insertion if no duplicate found
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    $sql = "INSERT INTO users (full_name, email, dept, reg, password) VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $full_name, $email, $dept, $reg, $hashed_password);

    if ($stmt->execute()) {
        header("Location: login.html?success=Sign-up successful! Please log in.");
        exit;
    } else {
        header("Location: signup.html?error=An error occurred while saving your data. Please try again.");
        exit;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>



            
            