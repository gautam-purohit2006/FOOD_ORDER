<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sort_food</title>
    <link rel="stylesheet" href="./css/style.css">

</head>

<body>


    <?php

    include 'connection.php';

    ?>

    <div class="container">
        <h2 class="text-center">Explore Foods</h2>

        <?php

        $sql = "SELECT * FROM `category` LIMIT 3";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $cat_id = $row['id'];
            $Title = $row['Title'];
            $Image_Name = $row['Image_Name'];


            echo  "<a href='?catg_id=$cat_id'>
                        <div class='box-3 float-container'>
                            <img src='images/$Image_Name' alt='Pizza' class='img-responsive img-curve'>

                            <h3 class='float-text text-white'>$Title</h3>
                        </div>
                    </a>";
        }
        ?>
        <!-- <a href="category-foods.html">
            <div class="box-3 float-container">
                <img src="images/pizza.jpg" alt="Pizza" class="img-responsive img-curve">

                <h3 class="float-text text-white">Pizza</h3>
            </div>
        </a> -->

        <!-- <a href="#">
            <div class="box-3 float-container">
                <img src="images/burger.jpg" alt="Burger" class="img-responsive img-curve">

                <h3 class="float-text text-white">Burger</h3>
            </div>
        </a> -->

        <!-- <a href="#">
            <div class="box-3 float-container">
                <img src="images/momo.jpg" alt="Momo" class="img-responsive img-curve">

                <h3 class="float-text text-white">Momo</h3>
            </div>
        </a> -->
    </div>
</body>

</html>