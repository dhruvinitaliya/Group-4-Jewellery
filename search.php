<?php

require 'class/product.php';

$product = new Product();

if(isset($_POST['keyword'])){
  $keyword = $_POST['keyword'];

  if (strlen($keyword) > 1) {
    $result = $product->searchJewelry($keyword);

    if($result !== false){
      $count = 0;
      while ($row = $result->fetch_assoc()) {
       
        echo '<div class="product-card card">';
        echo '<img src="images/' . $row['image_url'] . '" alt="' . $row['name'] . '" class="product-image card-img-top">';
        echo '<div class="card-body">';
        echo '<h4 class="card-title">' . $row['name'] . '</h4>';
        echo '<p class="card-text">$' . $row['price'] . '</p>';
        echo '<p class="card-text">' . $row['description'] . '</p>';

        ?>

        <form action="addToCart.php" method="POST">
          <input type="hidden" name="jewelry_id" value="<?php echo $row['id'] ?>">
          <lable>Quantity</lable>
          <input type="number" name="quantity" value="1" />
          <br/>
          <br/>
          <input type="submit" name="submit" class="btn btn-primary" value="Add to Cart"/>
        </form>

        <?php

        echo '</div>';
        echo '</div>';
        $count++;
      }
    } else {
      echo "No matching jewelry found.";
    }
  } else {
    echo "Please enter at least 2 characters for a meaningful search.";
  }
} else {
  echo "Invalid request.";
}

?>
