<!DOCTYPE html>
<html lang="en">

<head>
    <title>Contact | FoodOrder</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<?php

include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $Name = $_POST['name'];
    $Email = $_POST['email'];
    $Msg = $_POST['msg'];
    $sql = "INSERT INTO `contect` (`Name`, `Email`, `Message`) VALUES ('$Name', '$Email', '$Msg')";
    $result = mysqli_query($conn, $sql);

}

?>

<body style="margin: 0; padding: 0; font-family: 'Segoe UI', sans-serif; background: #fff5e6;">

    <div style="max-width: 480px; width: 90%; margin: 60px auto; background: #fff; padding: 30px 20px; border-radius: 12px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); animation: fadeInUp 1s ease-in-out;">

        <h2 style="text-align: center; color: #e85d04; margin-bottom: 10px;">📞 Contact Us</h2>
        <p style="text-align: center; color: #666; margin-bottom: 25px;">Questions about your food order? We're here to help!</p>

        <form action="" method="post">
            <label style="font-weight: bold; color: #333; display: block; margin-bottom: 5px;">👤 Your Name</label>
            <input type="text" name="name" placeholder="Full Name" style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc; margin-bottom: 15px;" required>

            <label style="font-weight: bold; color: #333; display: block; margin-bottom: 5px;">📧 Email</label>
            <input type="email" name="email" placeholder="you@example.com" style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc; margin-bottom: 15px;" required>

            <label style="font-weight: bold; color: #333; display: block; margin-bottom: 5px;">📝 Message</label>
            <textarea name="msg" placeholder="Describe your issue or feedback..." style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc; height: 100px;" required></textarea>

            <button type="submit" style="margin-top: 20px; width: 100%; background-color: #e85d04; color: white; font-weight: bold; padding: 12px; border: none; border-radius: 8px; cursor: pointer;">
                📬 Send Message
            </button>
        </form>
    </div>

</body>

</html>
