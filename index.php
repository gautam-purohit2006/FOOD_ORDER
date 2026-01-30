<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GV Restorenr</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous"> -->
    <!-- <link rel="stylesheet" href="./css/style.css"> -->
</head>

<body>

    <?php

    include 'navbar.php';
    include 'search.php';

    if (isset($_GET['gv'])) {
        echo "<script>alert('Login Success')</script>";
    }
    if (isset($_GET['gvs'])) {
        echo "<script>alert('User Can Not Login')</script>";
    }
    if (isset($_GET['userExits'])) {
        echo "<script>alert('User Already exits')</script>";
    }
    if (isset($_GET['passmathing'])) {
        echo "<script>alert('Can Not Math Password And Conform Pasword')</script>";
    }
    if (isset($_GET['val'])) {
        echo "<script>alert('Your are can Not Login')</script>";
    }

    if (isset($_GET['cat'])) {
        include 'category.php';
    } elseif (isset($_GET['catg_id'])) {
        $catg_id = $_GET['catg_id'];
        // include 'category.php';
        include 'sort_food.php';
        include 'food_menu.php';
    } elseif (isset($_GET['foodmenu'])) {

        include 'food_menu.php';
    } elseif (isset($_POST['Login'])) {
        include 'login.php';
        include 'sort_food.php';
        include 'food_menu.php';
    } elseif (isset($_POST['Signup'])) {
        include 'signup.php';
        include 'sort_food.php';
        include 'food_menu.php';
    } elseif (isset($_GET['order'])) {
        include 'user_order.php';
    } elseif (isset($_GET['contect'])) {
        include 'contect.php';
    } elseif (isset($_POST['ssubmit'])) {
        $searchTitle = $_POST['search_name'];
        // echo $searchTitle;
        include 'category.php';
        include 'food_menu.php';
    } elseif (isset($_GET['logout'])) {
        session_unset();
        session_destroy();
        include 'sort_food.php';
        include 'food_menu.php';
        header("Location: index.php");
        exit();
    } else {
        include 'sort_food.php';
        include 'food_menu.php';
    }

    include 'feedback_display.php';
    include 'social.php';
    include 'footer.php';



    ?>


</body>

</html>