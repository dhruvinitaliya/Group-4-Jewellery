<?php
require 'class/product.php'; 
$product = new Product();

        $jewelry_id = $_GET['id'];
        
        if ($product->deleteProduct($jewelry_id)) {
            header("Location: adminProducts.php"); 
            exit;
        } else {
            echo "Failed to delete product.";
        }

?>