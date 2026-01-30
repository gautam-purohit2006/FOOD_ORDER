<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
    <link rel="stylesheet" href="./css/style.css">

</head>

<body>
    <?php
    include 'connection.php';
    ?>
    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <?php

            if (isset($_POST['ssubmit'])) {

                // $sql = "SELECT * FROM `food` where `category_id` = $idd";
                $sql = "SELECT * FROM `category` where `Title` LIKE '%$searchTitle%'";
            } else {

                $sql = "SELECT * FROM `category`";
            }
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

            <div class="clearfix"></div>
        </div>
    </section>

    <!-- Categories Section Ends Here -->
</body>

</html>