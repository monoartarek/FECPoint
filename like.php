<?php
session_start();
include('db.php');

if (!isset($_SESSION['user_id'])) {
    echo "You must be logged in to like a post.";
    exit();
}

$user_id = $_SESSION['user_id'];
$post_id = $_POST['post_id'];

// Check if the user has already liked the post
$check_sql = "SELECT * FROM likes WHERE user_id = '$user_id' AND post_id = '$post_id'";
$check_result = $conn->query($check_sql);

if ($check_result->num_rows > 0) {
    // Unlike the post
    $sql = "DELETE FROM likes WHERE user_id = '$user_id' AND post_id = '$post_id'";
} else {
    // Like the post
    $sql = "INSERT INTO likes (user_id, post_id) VALUES ('$user_id', '$post_id')";
}

if ($conn->query($sql)) {
    echo "success";
} else {
    echo "error";
}
?>
