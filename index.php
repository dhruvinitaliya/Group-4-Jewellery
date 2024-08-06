<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Jewelry Store</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-image: url('images/home_bg.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: black;
            font-family: 'Your Preferred Font', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .overlay {
            background-color: rgba(173, 167, 167, 0.8);
            padding: 150px 0;
        }

        .jumbotron {
            background-color: transparent;
        }

        .discover {
            color: #ffffff;
            text-transform: uppercase;
            background: #000;
            padding: 10px;
            border: 2px solid #000;
            border-radius: 10px;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease 0s;
        }

        .discover:hover {
            color: #000;
            border-radius: 15px;
            border-color: #000;
            background: #ffffff;
            transition: all 0.6s ease 0s;
        }
    </style>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Jewelry Store</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="product_list.php">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Aboutus.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ContactUs.php">Contact</a>
                </li>

                <?php
                if (isset($_SESSION["id"])) {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="cartPage.php">Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php"> <i class="fas fa-sign-out-alt"></i> Logout</a>
                    </li>
                    <?php
                } else {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php"> <i class="fas fa-sign-in-alt"></i> Login</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </nav>

    <div class="jumbotron jumbotron-fluid">
        <div class="container overlay text-center">
            <h1 class="display-4">Adorn Yourself with Elegance</h1>
            <p class="lead">Discover an exquisite collection of timeless and sophisticated jewelry.</p>
            <a href="product_list.php" class="btn discover">Discover jewelry</a>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>