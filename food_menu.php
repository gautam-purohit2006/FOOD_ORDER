<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <?php

    include 'connection.php';

    ?>
    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">

            <?php

            if (isset($_GET['catg_id'])) {
                $idd = $_GET['catg_id'];

                // $_SESSION['gau'] = $UID;

                $sql = "SELECT * FROM `food` where `category_id` = $idd";
                $s = "SELECT * FROM `category` where `id` = $idd";
                $r = mysqli_query($conn, $s);
                $mRow = mysqli_fetch_array($r);
                $Food_Title = $mRow['Title'];
                echo "<h2 class='text-center'>$Food_Title Menu</h2>";
            } elseif (isset($_POST['ssubmit'])) {

                // $sql = "SELECT * FROM `food` where `category_id` = $idd";
                $sql = "SELECT * FROM `food` where `Title` LIKE '%$searchTitle%'";
            } else {
                echo '<h2 class="text-center">Food Menu</h2>';

                $sql = "SELECT * FROM `food`";
            }
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
                $food_id = $row['id'];
                $Title = $row['Title'];
                $description = $row['description'];
                $price = $row['price'];
                $Image_Name = $row['Image_Name'];
                $category_id = $row['category_id'];

                echo "<div class='food-menu-box'>
                        <div class='food-menu-img'>
                            <img src='images/$Image_Name' alt='Chicke Hawain Pizza' class='img-responsive img-curve'>
                        </div>

                        <div class='food-menu-desc'>
                            <h4>$Title</h4>
                            <p class='food-price'>$$price</p>
                            <p class='food-detail'>
                               $description
                            </p>
                            <br>";

                if (isset($_SESSION['UserName'])) {
                    echo  "<a href='order.php?cat_id=$food_id' class='btn btn-primary'>Order Now</a>";
                } else {
                    echo  "<a href='index.php?val=true' class='btn btn-primary'>Order Now</a>";
                }
                echo  "</div>
                         </div>";
            }
            ?>
            <!-- 
            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-burger.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Smoky Burger</h4>
                    <p class="food-price">$2.3</p>
                    <p class="food-detail">
                        Made with Italian Sauce, Chicken, and organice vegetables.
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-burger.jpg" alt="Chicke Hawain Burger" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Nice Burger</h4>
                    <p class="food-price">$2.3</p>
                    <p class="food-detail">
                        Made with Italian Sauce, Chicken, and organice vegetables.
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-pizza.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Food Title</h4>
                    <p class="food-price">$2.3</p>
                    <p class="food-detail">
                        Made with Italian Sauce, Chicken, and organice vegetables.
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-pizza.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Food Title</h4>
                    <p class="food-price">$2.3</p>
                    <p class="food-detail">
                        Made with Italian Sauce, Chicken, and organice vegetables.
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-momo.jpg" alt="Chicke Hawain Momo" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Chicken Steam Momo</h4>
                    <p class="food-price">$2.3</p>
                    <p class="food-detail">
                        Made with Italian Sauce, Chicken, and organice vegetables.
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div> -->


            <div class="clearfix"></div>



        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->



</body>

</html>