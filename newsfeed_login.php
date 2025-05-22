<?php
session_start();
include('db.php');  // Include database connection

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    // Query to check if email and password match
    $sql = "SELECT id, full_name, password FROM users WHERE email = '$email'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Verify password (assuming bcrypt)
        if (password_verify($password, $user['password'])) {
            // Store user id in session
            $_SESSION['user_id'] = $user['id'];
            
            // Redirect to newsfeed page (newsfeed)
            header("Location: newsfeed.php");
            exit();
        } else {
            echo "Incorrect password!";
        }
    } else {
        echo "User not found!";
    }
}
?>
