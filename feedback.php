<!DOCTYPE html>
<html lang="en">

<head>
    <title>User Feedback | FoodOrder</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include 'connection.php';

    session_start();
    $UserName = $_SESSION['UserName'];
    $Food_Title = $_SESSION['Food_Name'];

    $rating = $_POST['rating'];
    $description = $_POST['description'];

    $sql = "INSERT INTO `user_feedback`(`Name`, `order_name`, `rating`, `description`) VALUES ('$UserName','$Food_Title','$rating','$description')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('Location: index.php');
    }
}

?>

<body style="margin: 0; padding: 0; font-family: 'Segoe UI', sans-serif; background: #fff7ec;">

    <!-- Feedback Form -->
    <div style="max-width: 500px; width: 90%; margin: 40px auto; background: #ffffff; padding: 30px 20px; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); animation: slideInUp 1s ease-in-out;">

        <h2 style="text-align: center; color: #e85d04; margin-bottom: 8px;">🗣️ Share Your Feedback</h2>
        <p style="text-align: center; color: #555; margin-bottom: 20px;">We'd love to hear what you think about our food and service!</p>

        <form action="" method="post">

            <label style="font-weight: bold; color: #333; display: block; margin-bottom: 5px;">⭐ Rating</label>
            <select name="rating" style="width: 100%; padding: 10px; margin-bottom: 15px; border-radius: 8px; border: 1px solid #ccc;">
                <option value="Excellent">5 - Excellent</option>
                <option value="Very_Good">4 - Very_Good</option>
                <option value="Good">3 - Good</option>
                <option value="Average">2 - Average</option>
                <option value="Poor">1 - Poor</option>
            </select>

            <label style="font-weight: bold; color: #333; display: block; margin-bottom: 5px;">💬 Your Feedback</label>
            <textarea name="description" placeholder="Write your experience here..." style="width: 100%; padding: 10px; height: 100px; border-radius: 8px; border: 1px solid #ccc;" required></textarea>

            <button type="submit" style="margin-top: 20px; width: 100%; background-color: #e85d04; color: white; font-weight: bold; padding: 12px; border: none; border-radius: 8px; cursor: pointer;">
                ✅ Submit Feedback
            </button>
        </form>
        <h4>Skip Feedback then Back To Home <a href="index.php">Click here</a></h4>

    </div>

</body>

</html>