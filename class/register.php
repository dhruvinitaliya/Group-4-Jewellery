<?php

include "class/connection.php";

class Register extends Connection
{

  public $id;

  public function registration($name, $username, $email, $password, $confirmpassword)
  {

    $conn = $this->conn;

    $duplicateStmt = $conn->prepare("SELECT * FROM customers WHERE username = ? OR email = ?");
    $duplicateStmt->bind_param("ss", $username, $email);
    $duplicateStmt->execute();
    $duplicateResult = $duplicateStmt->get_result();

    if ($duplicateResult->num_rows > 0) {
      return 10;
    } else {
      if ($password == $confirmpassword) {

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $insertStmt = $conn->prepare("INSERT INTO `customers`(`name`, `username`, `email`, `password`) VALUES (?, ?, ?, ?)");
        $insertStmt->bind_param("ssss", $name, $username, $email, $hashedPassword);

        if ($insertStmt->execute()) {
          return 1;
        } else {
          return 0;
        }
      } else {
        return 100;
      }
    }
  }

  public function login($usernameemail, $password)
  {

    if ($usernameemail == "admin" && $password == "admin") {
      $_SESSION["admin"] = true;
      header("Location: adminProducts.php");
      return false;
    }

    $loginStmt = $this->conn->prepare("SELECT id, password FROM `customers` WHERE username = ? OR email = ?");
    $loginStmt->bind_param("ss", $usernameemail, $usernameemail);
    $loginStmt->execute();
    $loginResult = $loginStmt->get_result();

    if ($loginResult->num_rows > 0) {
      $row = $loginResult->fetch_assoc();

      if (password_verify($password, $row['password'])) {
        $this->id = $row["id"];
        return 1; 
      } else {
        return 10; 
      }
    } else {
      return 100; 
    }
  }

  public function idUser()
  {
    return $this->id;
  }

  public function selectUserById($id)
  {
    $result = mysqli_query($this->conn, "SELECT * FROM customers WHERE id = $id");
    return mysqli_fetch_assoc($result);
  }
}
?>