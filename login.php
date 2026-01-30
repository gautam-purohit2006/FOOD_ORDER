<?php

include 'connection.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST')
//if(isset($_post['r]))
{

    $Email = $_POST['email'];
    $Pass = $_POST['password'];

    $sql = "SELECT * FROM `admin` WHERE `email`='$Email' AND `password`='$Pass'";
    $result = mysqli_query($conn, $sql);
    $numm = mysqli_num_rows($result);
    $mRow = mysqli_fetch_array($result);

    if ($numm == 1) {

        $_SESSION['User_id'] = $mRow['id'];
        $_SESSION['Email'] = $Email;
        $_SESSION['UserName'] =  $mRow['username'];

        header('Location: index.php?gv=true');
    } else {
        echo "Can Not login";
        header('Location: index.php?gvs=true');
    }
}
