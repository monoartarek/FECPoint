<?php
// Include the database connection file
include('db.php');

// Start the session
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Check if the email exists in the database using a prepared statement
    $stmt = $conn->prepare("SELECT id, full_name, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Fetch the user's hashed password and details
        $stmt->bind_result($user_id, $full_name, $hashed_password);
        $stmt->fetch();

        // Verify the password
        if (password_verify($password, $hashed_password)) {
            // Store user information in session variables
            $_SESSION['user_id'] = $user_id;
            $_SESSION['full_name'] = $full_name;
            $_SESSION['email'] = $email;

            // Redirect to the dashboard or main page
            header("Location: main.php");
            exit();
        } else {
            // Invalid password
            header("Location: login.html?error=Invalid password");
            exit();
        }
    } else {
        // Email not found
        header("Location: login.html?error=Email not found");
        exit();
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
