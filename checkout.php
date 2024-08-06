<?php
session_start();

require 'class/validation.php';
require 'class/cart.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $validation = new Validation();
    $cart = new Cart();

    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone_number = $_POST['phone'];
    $user_id =  $_SESSION["id"];

    $errors = $validation->validateCheckoutForm($name, $email, $address, $phone_number);

    if (empty($errors)) {
        if($cart -> updateForTheStatusConfirm($user_id) && $cart->insertDataIntoOrder($user_id,$name,$address,$phone_number, $email)){
            header("Location: thank_you.php");
        }else{
            echo "<h1>....sorry try again ....:(...</h1>";
        }
    }else{
    foreach ($errors as $error) {
        echo "<script> alert('$error'); </script>";
    }
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
    margin-bottom: 20px;
    font-weight:bold;                    
}
h2{
    text-align: center;
}

.form-group {
    margin-bottom: 20px;
}

.btn{
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

@media (min-width: 768px) {
    .container {
        width: 50%;
    }
}


</style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">Jewelry Store</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="product_list.php">Shop</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Aboutus.php">About </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="ContactUs.php">Contact <span class="sr-only">(current)</span>  </a>
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

<div class="container mt-5">
    <h2>Checkout</h2>
    <form action="" method="post">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <textarea class="form-control" id="address" name="address" rows="4" required></textarea>
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="tel" class="form-control" id="phone" name="phone" required>
        </div>
        <button type="submit" class="btn btn-primary">Place Order</button>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
