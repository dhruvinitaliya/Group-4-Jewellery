<?php

session_start();

if($_SESSION["admin"]==false){
    header("Location: login.php");
  }
  
  require 'class/product.php';
  $product = new Product();
  
  $result = $product->allProducts();
  
  if (mysqli_num_rows($result) > 0) {
  ?>
  
  <!DOCTYPE html>
  <html>
  <head>
      <title>Admin Product Page</title>
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
    margin-top: 50px;
    background-color: rgba(173, 167, 167, 0.8);
    box-shadow: 0 0 10px black;
    border-radius: 7px;
    padding: 20px;
}

.table {
    margin-top: 20px;
}

.btn {
    margin-right: 5px;
}

.table thead th {
    background-color: black;
    color: white;
}



 .btn-danger:hover {
    background:red;
}

.btn{
    color: #ffffff;
    text-transform: uppercase;
    background: #000;
    padding: 5px;
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

@media (min-width: 768px) {
    .container {
        width: 80%;
    }
}
</style>
  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">jewelry Store</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="adminProducts.php">Products <span class="sr-only">(current)</span></a>
            </li>
            

            <?php

            if($_SESSION["admin"]==true){
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
      <h2 class="mt-3">Admin Product Page</h2>
  
      <table class="table mt-4">
          <thead>
              <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Price</th>
                  <th>Actions</th>
              </tr>
          </thead>
          <tbody>
              <?php while ($row = $result->fetch_assoc()) { ?>
                  <tr>
                      <td><?php echo $row['id']; ?></td>
                      <td><?php echo $row['name']; ?></td>
                      <td><?php echo $row['description']; ?></td>
                      <td>$<?php echo $row['price']; ?></td>
                      <td>
                          <a class="btn btn-primary btn-sm" href="edit_product.php?id=<?php echo $row['id']; ?>">Edit</a>
                          <a class="btn btn-danger btn-sm" href="delete_product.php?id=<?php echo $row['id']; ?>">Delete</a>
                      </td>
                  </tr>
              <?php } ?>
          </tbody>
      </table>
      <a class="btn btn-primary" href="add_product.php">Add New Product</a>
  </div>
  </body>
  </html>
  
  <?php
  } else {
      echo "No jewelry_catalog available.";
  }
  ?>
  