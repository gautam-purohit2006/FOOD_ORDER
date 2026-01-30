<?php

if (isset($_GET['id'])) {

    include 'connection.php';

    $id = $_GET['id'];

    $sql = "DELETE FROM `tbl_order` WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header(('Location: index.php'));
    }
}
