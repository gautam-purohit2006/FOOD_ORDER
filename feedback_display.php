<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <div style="max-width: 600px; width: 90%; margin: 20px auto 60px; animation: slideInUp 1s ease-in-out;">
        <h3 style="color: #e85d04; text-align: center; margin-bottom: 20px;">📝 User Feedbacks</h3>

        <?php

        include 'connection.php';


        $sql = "SELECT * FROM `user_feedback`";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $Name = $row['Name'];
            $Order = $row['order_name'];
            $Rating = $row['rating'];
            $Feedback = $row['description'];


            echo "<div style='background: #fff; padding: 15px 20px; border-radius: 10px; box-shadow: 0 6px 15px rgba(0,0,0,0.08); margin-bottom: 20px;'>
                    <p style='margin: 0;'><strong>👤 Name:</strong> $Name </p>
                    <p style='margin: 0;'><strong>🍔 Order:</strong> $Order </p>
                    <p style='margin: 0;'><strong>⭐ Rating:</strong> $Rating </p>
                    <p style='margin: 10px 0 0;'><strong>💬 Feedback:</strong> $Feedback </p>
                </div>";
        }
        ?>

    </div>
</body>

</html>