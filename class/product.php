<?php

include "class/connection.php";

class Product extends Connection
{

  public function allProducts()
  {
    $conn = $this->conn;

    $result = mysqli_query($conn, "SELECT * FROM `jewelry_catalog`");

    if (mysqli_num_rows($result) > 0) {
      return $result;
    } else {
      return false;
    }
  }

  public function getProductById($jewelry_id)
  {
    $conn = $this->conn;

    $stmt = $conn->prepare("SELECT * FROM `jewelry_catalog` WHERE `id` = ?");
    $stmt->bind_param("i", $jewelry_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
      return $result;
    } else {
      return false;
    }
  }

  public function insertDataIntoProduct($product_name, $product_price, $product_description, $product_images)
  {
    $conn = $this->conn;

    $insert_query = "INSERT INTO `jewelry_catalog`(`name`, `price`, `description`, `image_url`) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($insert_query);
    $stmt->bind_param("ssss", $product_name, $product_price, $product_description, $product_images);

    if ($stmt->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function updateDataIntoProduct($jewelry_id, $product_name, $product_price, $product_description, $product_images)
  {
    $conn = $this->conn;

    $update_query = "UPDATE `jewelry_catalog` SET `name`=?, `price`=?, `description`=?, `image_url`=? WHERE id=?";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param("ssssi", $product_name, $product_price, $product_description, $product_images, $jewelry_id);

    if ($stmt->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function deleteProduct($jewelry_id)
  {
    $conn = $this->conn;

    $delete_query = "DELETE FROM `jewelry_catalog` WHERE id=?";
    $stmt = $conn->prepare($delete_query);
    $stmt->bind_param("i", $jewelry_id);

    if ($stmt->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function searchJewelry($keyword)
  {
    $conn = $this->conn;

    $query = "SELECT * FROM `jewelry_catalog` WHERE `name` LIKE ?";

    $stmt = $conn->prepare($query);
    $keyword = '%' . $keyword . '%';
    $stmt->bind_param("s", $keyword);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
      return $result;
    } else {
      return false;
    }
  }

}
?>