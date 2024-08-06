<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce jewelry Store - Shop</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <style>
        body {
background-image: url('images/shop_bg.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
    color: black;
    font-family: 'Your Preferred Font', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

h2{
    text-align: center;
}

.product-card {
    border: 1px solid black;
    border-radius: 7px;
    padding: 20px;
    margin: 20px;
    background-color: rgba(173, 167, 167, 0.8);
    box-shadow: 0 0 10px black
}

.product-card:hover {
        transform: scale(1.05);

}

.product-image {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-radius: 7px;
}

.card-body {
    text-align: center;
}

.card-title {
    font-size: 2rem;
    margin-top: 20px;
}

.card-text {
    font-size: 1.5rem;
}

.btn-primary{
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

.btn-primary:hover {
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
    <a class="navbar-brand" href="index.php">jewelry Store</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="product_list.php">Shop <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Aboutus.php">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="ContactUs.php">Contact</a>
            </li>

            <?php
            if(isset($_SESSION["id"])) {
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

            <?php
            }
            ?>
        </ul>
    </div>
</nav>

<div class="container mt-4">
    <h2>Welcome to Product Page</h2>

    <div class="container mt-4">
        <h2>Search</h2>
        <div class="form-group">
            <input type="text" class="form-control" id="searchInput" placeholder="Search for jewelry">
        </div>
    </div>

    <div id="searchResults" class="container "></div>

    <div class="row">
        <?php
        require 'class/product.php';
        $product = new Product();
        $result = $product->allProducts();
        $numProducts = mysqli_num_rows($result);

        if ($numProducts > 0):
            $count = 0;
            echo '<div class="card-columns">';
            while ($row = $result->fetch_assoc()):
                if ($count % 3 === 0 && $count !== 0):
                    echo '</div><div class="card-columns">';
                endif;
        ?>

        <div class="product-card card">
            <img src="images/<?php echo $row['image_url']; ?>" alt="<?php echo $row['name']; ?>" class="product-image card-img-top">
            <div class="card-body">
                <h4 class="card-title"><?php echo $row['name']; ?></h4>
                <p class="card-text">$<?php echo $row['price']; ?></p>
                <p class="card-text"><?php echo $row['description']; ?></p>

                <form action="addToCart.php" method="POST">
                    <input type="hidden" name="jewelry_id" value="<?php echo $row['id']; ?>">
                    <label>Quantity</label>
                    <input type="number" name="quantity" value="1" />
                    <br/><br/>
                    <input type="submit" name="submit" class="btn btn-primary" value="Add to Cart"/>
                </form>
            </div>
        </div>

        <?php
            $count++;
            endwhile;
            echo '</div>';
        else:
            echo '<p>No jewelry available.</p>';
        endif;
        ?>
    </div>
</div>

<script>
    $(document).ready(function(){
        $("#searchInput").on("input", function(){
            var keyword = $(this).val();
            if (keyword.length > 1) {
                $.ajax({
                    url: "search.php",
                    type: "POST",
                    data: { keyword: keyword },
                    success: function(response){
                        $("#searchResults").html(response);
                    },
                    error: function(){
                        alert("Error processing the request.");
                    }
                });
            }
        });
    });
</script>

</body>
</html>