<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Jewelry Store</title>
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
            margin-top: 20px;
            background-color: rgba(173, 167, 167, 0.8);
            box-shadow: 0 0 10px black;
            border-radius: 7px;
            padding: 20px;
        }

        h2 {
            color: black;
            font: bold;
        }

        .col-md-6 {
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn {
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

        .btn:hover {
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
                <li class="nav-item">
                    <a class="nav-link" href="Aboutus.php">About </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="ContactUs.php">Contact <span class="sr-only">(current)</span> </a>
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

    <div class="container mt-4">
        <h2>Contact Us</h2>
        <p>If you have any questions or inquiries, please feel free to reach out to us. We're here to assist you!</p>

        <div class="row">
            <div class="col-md-6">
                <h4>Contact Information</h4>
                <p><strong>Address:</strong> 123 Conestoga college, Waterloo</p>
                <p><strong>Email:</strong> info@jewelrystore.com</p>
                <p><strong>Phone:</strong> (123) 456-7890</p>
            </div>
            <div class="col-md-6">
                <h4>Contact Form</h4>
                <form action="contact_process.php" method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>