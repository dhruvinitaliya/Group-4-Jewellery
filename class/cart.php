<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "class/connection.php";

class Cart extends Connection
{

  public function insertDataIntoCart($user_id, $jewelry_id, $product_qty)
  {
    $conn = $this->conn;

    $check_query = "SELECT quantity FROM shopping_cart WHERE user_id = ? AND jewelry_id = ? AND status = 'pending'";
    $stmt = $conn->prepare($check_query);
    $stmt->bind_param("ii", $user_id, $jewelry_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {

      $row = $result->fetch_assoc();
      $new_qty = $row['quantity'] + $product_qty;

      $update_query = "UPDATE shopping_cart SET quantity = ? WHERE user_id = ? AND jewelry_id = ? AND status = 'pending'";
      $stmt = $conn->prepare($update_query);
      $stmt->bind_param("iii", $new_qty, $user_id, $jewelry_id);

      if ($stmt->execute()) {
        return true;
      } else {
        return false;
      }
    } else {

      $insert_query = "INSERT INTO shopping_cart (user_id, jewelry_id, quantity) VALUES (?, ?, ?)";
      $stmt = $conn->prepare($insert_query);
      $stmt->bind_param("iii", $user_id, $jewelry_id, $product_qty);

      if ($stmt->execute()) {
        return true;
      } else {
        return false;
      }
    }
  }




  public function getCartItemsForUser($user_id)
  {

    $conn = $this->conn;

    $query = "SELECT shopping_cart.id, jewelry_catalog.name, jewelry_catalog.price, shopping_cart.quantity 
            FROM shopping_cart 
            JOIN jewelry_catalog ON shopping_cart.jewelry_id = jewelry_catalog.id 
            WHERE shopping_cart.user_id = ? AND shopping_cart.status = 'pending'";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
      return $result;
    } else {
      return false;
    }

  }



  public function deleteCartItems($user_id)
  {

    $conn = $this->conn;

    $query = "DELETE FROM `shopping_cart` WHERE `user_id` = ? AND `status` = 'pending'";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);

    if ($stmt->execute()) {
      return true;
    } else {
      return false;
    }

  }


  public function updateForTheStatusConfirm($user_id)
  {

    $conn = $this->conn;

    $query = "UPDATE `shopping_cart` SET `status`='confirm' WHERE `user_id` = ?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);

    if ($stmt->execute()) {
      return true;
    } else {
      return false;
    }

  }


  public function insertDataIntoOrder($user_id, $name, $address, $phone_number, $email)
  {


    $conn = $this->conn;

    $insert_query = "INSERT INTO `jewelry_orders`(`user_id`, `customer_name`, `shipping_address`, `order_date`, `phone_number`, `email`) 
                 VALUES (?, ?, ?, NOW(), ?, ?)";

    $stmt = $conn->prepare($insert_query);
    $stmt->bind_param("issss", $user_id, $name, $address, $phone_number, $email);

    if ($stmt->execute()) {
      return true;
    } else {
      return false;
    }

  }

}
?>