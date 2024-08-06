<?php

session_start();

if ($_SESSION["admin"] == false) {
    header("Location: login.php");
}

if (isset($_POST['submit'])) {

    $jewelry_id = $_POST['id'];

    $product_name = $_POST['name'];
    $product_price = $_POST['price'];
    $product_description = $_POST['description'];
    $product_images = $_POST['images'];


    require 'class/product.php';

    $product = new Product();

    if ($product->updateDataIntoProduct($jewelry_id, $product_name, $product_price, $product_description, $product_images)) {
        header("Location: adminProducts.php");
    } else {
        echo "<h1>....Failed to update product. ....:(...</h1>";
    }

}



$productId = $_GET['id'];

require 'class/product.php';

$product = new Product();
$result = $product->getProductById($productId);

?>

<form action="" method="post">

    <?php
    if (mysqli_num_rows($result) > 0) {
        $row = $result->fetch_assoc();
        ?>

        <!DOCTYPE html>
        <html>
        <head>
            <title>Edit Product</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
                    text-align: center;
                }

                .form-group {
                    margin-bottom: 20px;
                }

                .form-group label {
                    color: black;
                    font-weight: bold;
                }

                textarea {
                    width: 100%;
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

            <div class="container">
                <h2 class="mt-3">Edit Product</h2>

                <form action="" method="post" class="mt-4">

                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />


                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea name="description"><?php echo $row['description']; ?></textarea><br>
                    </div>
                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="number" name="price" value="<?php echo $row['price']; ?>" step="0.01"
                            class="form-control">
                    </div>



                    <div class="form-group">
                        <label for="images">Images:</label>
                        <input type="text" class="form-control" id="images" name="images"
                            value="<?php echo $row['image_url']; ?>" required>
                    </div>

                    <button type="submit" name="submit" class="btn btn-success">Edit Product</button>
                    <a class="btn btn-secondary ml-3" href="adminProducts.php">Back to Product List</a>
                </form>

            </div>

        </body>

        </html>


        <?php
    }
    ?>
</form>