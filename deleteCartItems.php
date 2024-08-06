<?php
    session_start();

    $user_id =  $_SESSION["id"];


 

    require 'class/cart.php';

    $cart = new Cart();


    if($cart -> deleteCartItems($user_id)){
        header("Location: product_list.php");
    }else{
        echo "<h1>....sorry try again ....:(...</h1>";
    }

?>
