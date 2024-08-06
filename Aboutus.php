<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Jewelry Store</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-image: url('images/aboutus_bg.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: black;

        }

        .container {
            background-color: rgba(173, 167, 167, 0.8);
            box-shadow: 0 0 10px black;
            border-radius: 7px;
            padding: 20px;
        }

        h2 {
            text-align: center;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Jewelry Store</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="product_list.php">Shop</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="Aboutus.php">About <span class="sr-only">(current)</span> </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ContactUs.php">Contact</a>
                </li>

                <?php

            if(isset($_SESSION["id"])){
              ?>

                <li class="nav-item">
                    <a class="nav-link" href="cartPage.php">Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php"> <i class="fas fa-sign-out-alt"></i> Logout</a>
                </li>


                <?php
            }else{
?>

                <li class="nav-item">
                    <a class="nav-link" href="login.php"> <i class="fas fa-sign-in-alt"></i> Login</a>
                </li>

                <?php    }   ?>


            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <h2>About Us</h2>
        <p>Discover the world of Jewelry Store, your premier destination for high-quality jewelry. Our commitment
            revolves around providing a diverse selection of exquisite pieces that cater to various styles and
            preferences.</p>
        <p>Founded in 2005, we've earned a solid reputation for delivering jewelry that seamlessly blends elegance,
            precision, and durability. Guided by a team of skilled jewelers and designers, our mission is to present
            pieces that not only serve a functional purpose but also make a stylish statement.</p>
        <p>At Jewelry Store, our focus extends beyond selling jewelry; it's about delivering exceptional customer
            service. We firmly believe that jewelry is more than a mere accessory; it's an expression of personal style.
            Whether you seek a timeless classic or a contemporary design, we have something to captivate every jewelry
            enthusiast.</p>
        <p>Thank you for choosing Jewelry Store for your jewelry needs. We eagerly anticipate the opportunity to serve
            you and assist you in finding the perfect piece that complements your lifestyle.

        </p>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>