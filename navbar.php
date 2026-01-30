<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Navbar with Signup Modal</title>
    <link rel="stylesheet" href="./css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <style>
        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.6);
        }

        .modal-content {
            background-color: #fff;
            margin: 10% auto;
            padding: 30px;
            border-radius: 10px;
            width: 300px;
            position: relative;
        }

        .close {
            color: #aaa;
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 24px;
            cursor: pointer;
        }

        .modal-content h2 {
            margin-bottom: 20px;
            font-size: 22px;
            text-align: center;
        }

        .modal-content input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .modal-content button {
            width: 100%;
            padding: 10px;
            background-color: #27ae60;
            color: white;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
        }

        .modal-content button:hover {
            background-color: #219150;
        }
    </style>
</head>

<?php

include 'connection.php';

?>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="index.php" title="Logo">
                    <img src="images/logo.png" alt="Restaurant Logo" class="img-responsive" />
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="?cat=true">Categories</a></li>
                    <li><a href="?foodmenu=true">Foods</a></li>
                    <li><a href="?contect=true">Contact</a></li>

                    <?php
                    session_start();

                    if (isset($_SESSION['UserName'])) {
                        $User = $_SESSION['UserName'];
                        echo "<li><a href='?logout=true'>Logout($User)</a></li>";
                        echo "<li><a href='?order=true'><i class='ri-shopping-cart-2-line'></i></a></li>";
                    } else {
                        echo '<li><a href="?Login=true" id="loginBtn">Login</a></li>
                              <li><a href="?Signup=true" id="signupBtn"><i class="ri-user-line"></i></a></li>';
                    }

                    ?>

                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->

    <!-- Signup Modal -->
    <div id="signupModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Signup</h2>

            <form action="signup.php" method="post">
                <input type="text" name="username" placeholder="Username" />
                <input type="email" name="email" placeholder="Email" />
                <input type="password" name="password" placeholder="Password" />
                <input type="password" name="cpassword" placeholder="Conform Password" />
                <input type="submit" style="background-color: #00ff4cff;" name="Signup">
            </form>
        </div>
    </div>

    <!-- Login Modal -->
    <div id="loginModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeLogin">&times;</span>
            <h2>Login</h2>

            <form action="login.php" method="post">
                <input type="email" name="email" placeholder="Email" />
                <input type="password" name="password" placeholder="Password" />
                <input type="submit" style="background-color: #00ff4cff;" name="Login" value="Login" />
            </form>
        </div>
    </div>

    <!-- Modal Script -->
    <!-- <script>
        const modal = document.getElementById("signupModal");
        const btn = document.getElementById("signupBtn");
        const span = document.getElementsByClassName("close")[0];

        btn.onclick = function(e) {
            e.preventDefault(); // Prevent default anchor behavior
            modal.style.display = "block";
        };

        span.onclick = function() {
            modal.style.display = "none";
        };

        window.onclick = function(event) {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        };
    </script> -->

    <script>
        const signupModal = document.getElementById("signupModal");
        const loginModal = document.getElementById("loginModal");

        const signupBtn = document.getElementById("signupBtn");
        const loginBtn = document.getElementById("loginBtn");

        const closeSignup = document.getElementById("closeSignup");
        const closeLogin = document.getElementById("closeLogin");

        signupBtn.onclick = function(e) {
            e.preventDefault();
            signupModal.style.display = "block";
            loginModal.style.display = "none";
        };

        loginBtn.onclick = function(e) {
            e.preventDefault();
            loginModal.style.display = "block";
            signupModal.style.display = "none";
        };

        closeSignup.onclick = function() {
            signupModal.style.display = "none";
        };

        closeLogin.onclick = function() {
            loginModal.style.display = "none";
        };

        window.onclick = function(event) {
            if (event.target === signupModal) {
                signupModal.style.display = "none";
            }
            if (event.target === loginModal) {
                loginModal.style.display = "none";
            }
        };
    </script>
</body>

</html>