<?php
    session_start();

    if(!isset($_SESSION["id"])){
        header("Location: login.php");
    }

if (isset($_POST['submit'])) {

    $jewelry_id = $_POST['jewelry_id'];
    $product_qty = $_POST['quantity'];
    $user_id =  $_SESSION["id"];


    require 'class/cart.php';

    $cart = new Cart();


    if($cart -> insertDataIntoCart($user_id, $jewelry_id, $product_qty)){
        header("Location: cartPage.php");
    }else{
        echo "<h1>....sorry try again ....:(...</h1>";
    }

    }

?>
