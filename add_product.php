<?php
session_start();

if($_SESSION["admin"]==false){
    header("Location: login.php");
  }


if (isset($_POST['submit'])) {

    $product_name = $_POST['name'];
    $product_price = $_POST['price'];
    $product_description = $_POST['description'];
    $product_images = $_POST['images'];

    require 'class/product.php';

    $product = new Product();


    if($product -> insertDataIntoProduct($product_name, $product_price, $product_description,$product_images)){
        header("Location: adminProducts.php");
    }else{
        echo "<h1>....sorry try again ....:(...</h1>";
    }

    }

?>

<!DOCTYPE html>
<html>
<head>
    <title>Add New Product</title>
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

.navbar {
    background-color: #319056;
}

.container {
    margin-top: 60px;
        background-color: rgba(173, 167, 167, 0.8);
    box-shadow: 0 0 10px black;
    border-radius: 7px;
    padding: 20px;
    margin-bottom: 20px;
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
    <a class="navbar-brand" href="#">Jewelry Store</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="adminProducts.php">Products <span class="sr-only">(current)</span></a>
            </li>
            <?php

            if(($_SESSION["admin"]==true)){
              ?>

            <li class="nav-item">
            <a class="nav-link" href="logout.php"> <i class="fas fa-sign-out-alt"></i> Logout</a>
            </li>

              <?php
            }
?>   
        </ul>
    </div>
</nav>


<div class="container">
    <h2 class="mt-3">Add New Product</h2>

    <form action="" method="post" class="mt-4">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" name="price" step="0.01" class="form-control">
        </div>
        <div class="form-group">
            <label for="images">Images:</label>
            <input type="text" name="images" class="form-control">
        </div>
        <button type="submit" name="submit" class="btn btn-success">Add Product</button>
        <a class="btn btn-secondary ml-3" href=adminProducts.php>Back to Product List</a>
    </form>
</div>
</body>
</html>

