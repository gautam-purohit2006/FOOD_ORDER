<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>



    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">

            <form action="" method="post">
                <input type="search" name="search_name" placeholder="Search for Food.." required>
                <input type="submit" name="ssubmit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <?php

    if (isset($_GET['ssubmit'])) {

        $Title = $_GET['search_name'];
        echo " <section class='food-search text-center'>
                <div class='container'>

                    <h2>Foods on Your Search <a href='#' class='text-white'>$Title</a></h2>

                </div>
            </section>";
    }
    ?>


</html>