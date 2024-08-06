<?php
// Include database connection
session_start();
$user_id =  $_SESSION["id"];


require 'class/cart.php';

$cart = new Cart();

$cart_items = $cart -> getCartItemsForUser($user_id)


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Jewelry Store - Cart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>



        body {
    background-image: url('images/aboutus_bg.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: black;
}


.navbar {
    background-color: #319056;
}

.container {
    margin-top: 50px;
}

h2{
    background-color: rgba(173, 167, 167, 0.8);
    color: black;
    text-align: center;
    box-shadow: 0px 0px 10px black;

}
.table {
    margin-top: 20px;
    background-color: rgba(173, 167, 167, 0.8);
    box-shadow: 0 0 10px black;
    border-radius: 7px;
    padding: 20px;
    margin-bottom: 20px;
}
.table th{
    background-color: black;
    color: white;
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

.highlight {
            background-color: black;
            font-weight: bold;
            color: white;
            padding: 10px;
        }

@media (min-width: 768px) {
    .container {
        width: 80%;
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
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="product_list.php">Shop</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Aboutus.php">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="ContactUs.php">Contact</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="cartPage.php">Cart<span class="sr-only">(current)</span></a>
            </li>

            <?php
            if(isset($_SESSION["id"])){
              ?>

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
    <?php
    if ($cart_items) {
        ?>
        <h2 class="container">Your Shopping Cart</h2>
        <table class="table">
            <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $total_amount = 0;
            foreach ($cart_items as $cart_item) {
                $total = $cart_item['price'] * $cart_item['quantity'];
                $total_amount += $total;
                ?>
                <tr>
                    <td><?= $cart_item['name']; ?></td>
                    <td>$<?= $cart_item['price']; ?></td>
                    <td><?= $cart_item['quantity']; ?></td>
                    <td>$<?= $total; ?></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <p class="highlight">Total: $<?= $total_amount; ?></p>
        <a href="checkout.php" class="btn btn-dark">Proceed to Checkout</a>
        <a href="product_list.php" class="btn btn-dark">Continue Shopping</a>
        <a href="deleteCartItems.php" class="btn btn-dark">Empty Cart</a>
        <a href="shoppingCartPDF.php" class="btn btn-dark">Download PDF</a>
        <?php
    } else {
        ?>
        <h2>Your Shopping Cart is Empty</h2>
        <a href="product_list.php" class="btn btn-dark">Continue Shopping</a>
        <?php
    }
    ?>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
