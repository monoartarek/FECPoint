<?php
session_start();
include 'db_connection.php'; // Include database connection

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}

// Get the logged-in user's ID from the session
$user_id = $_SESSION['user_id'];

// Fetch the user's data from the database
$sql = "SELECT full_name, email, dept, reg FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc(); // Fetch user data
} else {
    echo "User not found!";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="responsive.css">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:rgb(255, 255, 255);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .profile-container {
            
            background: rgb(110, 12, 12);
            padding: 20px;
            border: 3px solid white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }
        h1 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }
        .profile-details p {
            margin: 10px 0;
            font-size: 16px;
            color: rgb(255, 255, 255);
        }
        /* .logout-btn {
            margin-top: 20px;
            padding: 10px 20px;
            background-color:rgb(160, 0, 0);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        } */
        /* .logout-btn:hover {
            background-color: #ff1a1a;
        } */
    </style>
</head>

         <!-- Include Header -->
         <?php include 'header.php'; ?>

<body>




    <div class="profile-container">
        <h1 style="color:white">Profile details</h1>
        <div class="profile-details">
            <p><strong>Name:</strong> <?php echo htmlspecialchars($user['full_name']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
            <p><strong>Department:</strong> <?php echo htmlspecialchars($user['dept']); ?></p>
            <p><strong>Registration:</strong> <?php echo htmlspecialchars($user['reg']); ?></p>
        <!-- </div>
        <a href="logout.php" class="logout-btn">Log Out</a>
    </div> -->




</body>

    <!-- Include Footer-->
    <?php include 'footer.php'; ?>

</html>
