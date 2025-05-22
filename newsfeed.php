<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('db.php');  // Include database connection

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: newsfeed_login.php");
    exit();
}

// Get the logged-in user's id from the session
$user_id = $_SESSION['user_id'];

// Fetch the full_name of the logged-in user from the users table
$sql = "SELECT full_name FROM users WHERE id = '$user_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $creator_name = $user['full_name'];  // Store the full name of the user
} else {
    $creator_name = "Unknown";  // In case no user is found, but this shouldn't happen
}

// Handle form submission for creating a post
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize input
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);
    
    // Insert post into the database
    $sql = "INSERT INTO posts (creator_name, title, content) VALUES ('$creator_name', '$title', '$content')";
    if ($conn->query($sql) === TRUE) {
        // Redirect to prevent form resubmission
        header("Location: newsfeed.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fetch all posts
$sql = "SELECT * FROM posts ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newsfeed</title>
    <link rel="stylesheet" href="responsive.css"> <!-- External CSS file for responsiveness -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        /* Base styles for larger screens (PC) */
        body {
            font-family: Arial, sans-serif;
            padding-top: 100px;
            /* margin: 20px; */
        }

        h1 {
            text-align: center;
        }

        #postForm {
            width: 50%;
            margin: 0 auto;
            display: none; /* Hide the form initially */
            flex-direction: column;
            align-items: center;
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            font-size: 16px;
        }

        button {
            padding: 10px 20px;
            background-color: rgb(105, 13, 13);
            color: white;
            border: none;
            cursor: pointer;
            margin: 5px; /* Add margin to buttons */
        }

        button:hover {
            background-color: rgb(24, 146, 30);
        }

        .po {
            padding: 20px;
            text-align: center;
        }

        .post {
            background-color: #f9f9f9;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        h3 {
            margin-top: 0;
        }

        small {
            color: gray;
        }
        .newPost{
            background-color: green;
        }
        .publish{
            background-color: green;
        }
        /* Responsive styles for smaller screens (mobile) */
        @media (max-width: 768px) {
            body {
                padding-top: 50px; /* Reduce top padding for mobile */
            }

            #postForm {
                width: 90%; /* Make form wider on mobile */
            }

            input[type="text"], textarea {
                font-size: 14px; /* Smaller font size for mobile */
            }

            button {
                padding: 8px 15px; /* Adjust button size for mobile */
            }

            .post {
                padding: 10px; /* Reduce padding on mobile */
                margin-bottom: 15px; /* Reduce margin on mobile */
                border: 2px solid black;
            }
            h1{
                margin:20px;
            }

            h1, h2 {
                font-size: 22px; /* Adjust heading sizes */
            }

            h3 {
                font-size: 18px; /* Adjust title size */
            }

            small {
                font-size: 12px; /* Adjust the small text size */
            }
        }

        /* Extra small screens (portrait mobile devices) */
        @media (max-width: 480px) {
            h1 {
                font-size: 20px; /* Make the heading smaller on very small devices */
            }

            #postForm {
                width: 95%; /* Ensure form is almost full width on very small screens */
            }

            .post {
                padding: 8px; /* Reduce padding even more for tiny screens */
            }
        }

    .comment-section {
    margin: 10px auto 30px auto;
    padding: 10px;
    background: #f8f8f8;
    border-radius: 5px;
}

.comment-box {
    padding: 8px;
    margin: 5px 0;
    border-radius: 5px;
    box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1); /* Optional for shadow effect */
    background: red; /* Remove background color */
    border: 2px solid green; /* Optional: Remove border if present */
}


.comment-box p {
    margin: 0;
    color: Black; /* White text color */
}


.comment-box strong {
    color: #2c3e50;
}

.comment-box small {
    color: gray;
}

    </style>
</head>
<body>

    <!-- Include Header -->
    <?php include 'header.php'; ?>

    <h1>NEWSFEED OF FEC</h1>

    <!-- Button to show the form -->
    <div style="text-align: center;">
        <button onclick="toggleForm()" class="newPost">New Post</button>
    </div>

    <!-- Form to create a new post -->
    <form id="postForm" action="newsfeed.php" method="POST">
        <input type="text" name="title" placeholder="Title" required><br><br>
        <textarea name="content" placeholder="Write something..." required></textarea><br><br>

         <!-- Add Image Section -->
    <label for="image_url">Add Image:</label>
    <input type="text" name="image_url" placeholder="Paste Image URL (optional)"><br><br>
     
        <!-- end image sec -->


        <button type="submit" class="publish">Publish</button>
        <button type="button" onclick="toggleForm()">Not Now</button>
    </form>

    <div class="po"><h2>Posts</h2></div>

    <?php
    // Display all posts
    // <?php
    $sql = "SELECT posts.*, 
           (SELECT COUNT(*) FROM likes WHERE likes.post_id = posts.id) AS like_count,
           (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) AS comment_count
           FROM posts ORDER BY created_at DESC";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='post'>";
            echo "<p><strong>Author:</strong> " . htmlspecialchars($row['creator_name']) . "</p>";
            echo "<h3>" . htmlspecialchars($row['title']) . "</h3>";
            echo "<p>" . nl2br(htmlspecialchars($row['content'])) . "</p>";
            echo "<p><small>Published on: " . $row['created_at'] . "</small></p>";
    
// Like button with icon
echo "<button onclick='likePost(" . $row['id'] . ")' style='border: none; background: none; color: #c0392b; font-size: 16px; cursor: pointer;'>";
echo "<i class='fa-solid fa-thumbs-up'></i> (" . $row['like_count'] . ")";
echo "</button>";

// Comment button with icon
// Comment button with icon
echo "<button onclick='toggleCommentBox(" . $row['id'] . ")' style='border: none; background: none; color: #c0392b; font-size: 16px; cursor: pointer;'>";
echo "<i class='fa-solid fa-comment'></i> (" . $row['comment_count'] . ")";
echo "</button>";


    
            // Comment box
            echo "<div id='commentBox_" . $row['id'] . "' style='display:none;'>";
            echo "<input type='text' id='commentInput_" . $row['id'] . "' placeholder='Write a comment...'>";
            echo "<button onclick='submitComment(" . $row['id'] . ")'>Submit</button>";
            echo "</div>";
    
            echo "</div><hr>";


            // Comment button and input box
echo "<button onclick='toggleCommentInput(" . $row['id'] . ")'>See All Comments (" . $row['comment_count'] . ")</button>";


echo "<div id='commentBox_" . $row['id'] . "' style='display:none;'>";
echo "<input type='text' id='commentInput_" . $row['id'] . "' placeholder='Write a comment...'>";
echo "<button onclick='submitComment(" . $row['id'] . ")'>Submit</button>";
echo "</div>";

// Fetch and display existing comments for this post
// Fetch and display existing comments for this post
$comment_sql = "SELECT comments.*, users.full_name 
                FROM comments 
                JOIN users ON comments.user_id = users.id 
                WHERE post_id = '" . $row['id'] . "' 
                ORDER BY created_at DESC";
$comment_result = $conn->query($comment_sql);

echo "<div id='comments_" . $row['id'] . "' style='display: none; margin-top: 10px; padding: 10px; background: #f8f8f8; border-radius: 5px;'>";
if ($comment_result->num_rows > 0) {
    while ($comment = $comment_result->fetch_assoc()) {
        echo "<div class='comment-box' style='padding: 8px; margin: 5px 0; background: #ffffff; border-radius: 5px; box-shadow: 2px 2px 5px rgba(0,0,0,0.1);'>";
        echo "<p style='margin: 0;'><strong style='color: #2c3e50;'>" . htmlspecialchars($comment['full_name']) . ":</strong> " . htmlspecialchars($comment['comment']) . "</p>";
        echo "<small style='color: gray;'>" . $comment['created_at'] . "</small>";
        echo "</div>";
    }
} else {
    echo "<p style='color: gray;'>No comments yet.</p>";
}
echo "</div>";





        }
    }
    ?>
    

    // Close the database connection
    $conn->close();
    ?>

    <script>
        // JavaScript function to toggle the form visibility
        function toggleForm() {
            const form = document.getElementById('postForm');
            if (form.style.display === 'none' || form.style.display === '') {
                form.style.display = 'flex'; // Show the form
            } else {
                form.style.display = 'none'; // Hide the form
            }
        }
    </script>
    // for likes and comment 
    <script>
    function likePost(postId) {
        let formData = new FormData();
        formData.append("post_id", postId);

        fetch("like.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            if (data.trim() === "success") {
                location.reload(); // Refresh to update like count
            }
        });
    }

    function toggleCommentBox(postId) {
        let commentBox = document.getElementById("commentBox_" + postId);
        commentBox.style.display = (commentBox.style.display === "none") ? "block" : "none";
    }

    function submitComment(postId) {
        let commentInput = document.getElementById("commentInput_" + postId);
        let commentText = commentInput.value.trim();

        if (commentText === "") {
            alert("Comment cannot be empty!");
            return;
        }

        let formData = new FormData();
        formData.append("post_id", postId);
        formData.append("comment", commentText);

        fetch("comment.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            if (data.trim() === "success") {
                location.reload(); // Refresh to update comment count
            }
        });
    }
</script>
<script>
// Renamed function to toggle the comment input visibility
function toggleCommentInput(postId) {
    const commentBox = document.getElementById(`commentBox_${postId}`);
    if (commentBox.style.display === "none" || commentBox.style.display === "") {
        commentBox.style.display = "block"; // Show comment input box
    } else {
        commentBox.style.display = "none"; // Hide comment input box
    }

    // Optionally, toggle the visibility of comments below the input
    const commentSection = document.getElementById(`comments_${postId}`);
    if (commentSection.style.display === "none" || commentSection.style.display === "") {
        commentSection.style.display = "block"; // Show comments
    } else {
        commentSection.style.display = "none"; // Hide comments
    }
}

</script>

</body>
</html>