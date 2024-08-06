<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "class/connection.php";

class Order extends Connection
{



  public function getCartItemsForUser($user_id)
  {
    $conn = $this->conn;

    $query = "SELECT cart.id, jewelry_catalog.name, jewelry_catalog.price, cart.quantity 
              FROM cart 
              JOIN jewelry_catalog ON cart.jewelry_id = jewelry_catalog.id 
              WHERE cart.user_id = ? AND cart.status = 'pending'";

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

    $query = "DELETE FROM `cart` WHERE `user_id` = ? AND `status` = 'pending'";

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

    $query = "UPDATE `cart` SET `status`='confirm' WHERE `user_id` = ?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);

    if ($stmt->execute()) {
      return true;
    } else {
      return false;
    }
  }

}
?>