<?php
session_start();
include('db.php');

if (!isset($_SESSION['user_id'])) {
    echo "You must be logged in to comment.";
    exit();
}

$user_id = $_SESSION['user_id'];
$post_id = $_POST['post_id'];
$comment = mysqli_real_escape_string($conn, $_POST['comment']);

$sql = "INSERT INTO comments (user_id, post_id, comment) VALUES ('$user_id', '$post_id', '$comment')";

if ($conn->query($sql)) {
    echo "success";
} else {
    echo "error";
}
?>
