<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
    <link rel="stylesheet" href="./css/style.css">

</head>

<body>
    <?php

    include 'connection.php';
    session_start();
    ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">

            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" class="order" method="post">
                <fieldset>
                    <legend>Selected Food</legend>

                    <?php

                    if (isset($_GET['cat_id'])) {
                        $category_id = $_GET['cat_id'];

                        // echo $_SESSION['gau'];

                        $sql = "SELECT * FROM `food` where `id` = $category_id";
                        $result = mysqli_query($conn, $sql);

                        while ($row = mysqli_fetch_assoc($result)) {
                            $food_id = $row['id'];
                            $Title = $row['Title'];
                            $description = $row['description'];
                            $price = $row['price'];
                            $Image_Name = $row['Image_Name'];
                            $category_id = $row['category_id'];

                            echo   "<div class='food-menu-img'>
                                        <img src='images/$Image_Name' alt='Chicke Hawain Pizza' class='img-responsive img-curve'>
                                    </div>

                                    <div class='food-menu-desc'>
                                        <h3>$Title</h3>
                                        <p class='food-price'>$$price</p>

                                        <div class='order-label'>Quantity</div>
                                        <input type='number' name='qty' class='input-responsive' value='1' required>

                                    </div>";
                        }
                    }

                    ?>
                </fieldset>

                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full_name" placeholder="E.g. Gautam Purohit" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 91067xxxxx" class="input-responsive" minlength="10" maxlength="10" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. gautam@gmail.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary"><br><br>
                    <h4>Back To Home <a href="index.php">Click here</a></h4>
                </fieldset>

            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
</body>

</html>


<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $category_id = $_GET['cat_id'];
    $UID = $_SESSION['User_id'];
    $qty = $_POST['qty'];
    $full_name = $_POST['full_name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $sql = "SELECT * FROM `food` where `id` = $category_id";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $food_id = $row['id'];
        $Food_Title = $row['Title'];
        $_SESSION['Food_Name']=$Food_Title;
        $price = $row['price'];
        // $Image_Name = $row['Image_Name'];
    }

    $total = $qty * $price;
    $orderDate = date("d/M/Y");

    $sql = "INSERT INTO `tbl_order`(`food`, `price`, `qty`, `total`, `order_date`, `UID`, `customer_name`, `customer_contect`, `customer_email`, `customer_address`, `Food_Id`) VALUES ('$Food_Title','$price','$qty','$total','$orderDate','$UID','$full_name','$contact','$email','$address','$food_id')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>alert('Your $Food_Title Order Success')</script>";
        header('Location: feedback.php');
    } else {
        echo "<script>alert('Your $Food_Title Order Faill ')</script>";
    }
}


?>