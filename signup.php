<?php

include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $Email = $_POST['email'];
    $UserName = $_POST['username'];
    $Pass = $_POST['password'];
    $CPass = $_POST['cpassword'];

    if ($Pass == $CPass) {

        $sql = "SELECT * FROM `admin` WHERE `email`='$Email'";
        $result = mysqli_query($conn, $sql);
        $numm = mysqli_num_rows($result);
        $mRow = mysqli_fetch_array($result);

        // $User_id = $mRow['id'];

        if ($numm == 0) {

            $sql = "INSERT INTO `admin` (`email`, `username`, `password`) VALUES ('$Email', '$UserName', '$Pass')";
            $result = mysqli_query($conn, $sql);

            if ($result) {

                session_start();
                $_SESSION['Email'] = $Email;
                $_SESSION['UserName'] = $UserName;


                $sql = "SELECT * FROM `admin` WHERE `email`='$Email'";
                $result = mysqli_query($conn, $sql);
                $numm = mysqli_num_rows($result);
                $mRow = mysqli_fetch_array($result);
                $_SESSION['User_id'] = $mRow['id'];

                header('Location: index.php');
            }
        } else {
             header('Location: index.php?userExits=true');
        }
    } else {
         header('Location: index.php?passmathing=true');
    }
}
?>