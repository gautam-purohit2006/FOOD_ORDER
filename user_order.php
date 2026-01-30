<?php
include 'connection.php';

?>

<br>
<h2 style="text-align: center; color: #333;">Your Order </h2>

<table style="width: 80%; margin: 0 auto; border-collapse: collapse; background-color: #fff; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
    <thead>
        <?php

      echo  $UID = $_SESSION['User_id'];
        $sql = "SELECT * FROM `tbl_order` where `UID`=$UID";
        $result = mysqli_query($conn, $sql);
        $numm = mysqli_num_rows($result);

        if ($numm != 0) {
            echo ' <tr style="background-color: #007BFF; color: white;">
                    <th style="padding: 12px; text-align: left;">ID</th>
                    <th style="padding: 12px; text-align: left;">Food</th>
                    <th style="padding: 12px; text-align: left;">Price</th>
                    <th style="padding: 12px; text-align: left;">Qty</th>
                    <th style="padding: 12px; text-align: left;">Total</th>
                    <th style="padding: 12px; text-align: left;">Customer Name</th>
                    <th style="padding: 12px; text-align: left;">Order Date</th>';

            if ($_SESSION['UserName'] == 'admin') {

                echo  '<th style="padding: 12px; text-align: left;">Order Delete</th>';
            }

            echo   '</tr>';
        } else {

            if ($_SESSION['UserName'] != 'admin') {

                echo '    <div style="text-align: center; animation: fadeIn 2s ease-in-out;">
                        <div style="font-size: 80px; color: #ff6f61; margin-bottom: 20px;">🍽️</div>
                        <h1 style="color: #444; margin-bottom: 10px;">No Orders Found</h1>
                        <p style="color: #777; font-size: 18px;">You havent placed any food orders yet.</p>
                    </div>

                    <style>
                        @keyframes fadeIn {
                            0% {
                                opacity: 0;
                                transform: translateY(20px);
                            }
                            100% {
                                opacity: 1;
                                transform: translateY(0);
                            }
                        }
                    </style>';
            }
        }

        ?>

    </thead>
    <tbody>

        <?php
        $UID = $_SESSION['User_id'];

        if ($_SESSION['UserName'] == 'admin') {
            $sql = "SELECT * FROM `tbl_order`";
        } else {
            $sql = "SELECT * FROM `tbl_order` where `UID`=$UID";
        }
        $result = mysqli_query($conn, $sql);
        $i = 1;

        while ($row = mysqli_fetch_array($result)) {
            $id = $row['id'];
            $food_name = $row['food'];
            $price = $row['price'];
            $qty = $row['qty'];
            $total = $row['total'];
            $customer_name = $row['customer_name'];
            $order_date = $row['order_date'];
            echo "<tr>
                    <td style='padding: 12px; border: 1px solid #ddd;'>$i</td>
                    <td style='padding: 12px; border: 1px solid #ddd;'>$food_name</td>
                    <td style='padding: 12px; border: 1px solid #ddd;'>$$price</td>
                    <td style='padding: 12px; border: 1px solid #ddd;'>$qty</td>
                    <td style='padding: 12px; border: 1px solid #ddd;'>$$total</td>
                    <td style='padding: 12px; border: 1px solid #ddd;'>$customer_name</td>
                    <td style='padding: 12px; border: 1px solid #ddd;'>$order_date</td>";

            if ($_SESSION['UserName'] == 'admin') {

                echo  "<td style='padding: 12px; border: 1px solid #ddd;'><a href='delete.php?id=$id'>Delete</a></td>";
            }
            echo "</tr>";
            $i++;
        }

        ?>
    </tbody>
</table>