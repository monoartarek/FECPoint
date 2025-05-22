<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

// echo "Welcome, " . htmlspecialchars($_SESSION['email']) . "! You are now logged in.";
header("Refresh: 2; URL=newsfeed.php");
exit();
?>
