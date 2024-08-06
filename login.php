<?php
require 'class/register.php';
session_start();

$register = new Register();

if(isset($_POST["submit"])){
  $result = $register->login($_POST["usernameemail"], $_POST["password"]);

  if($result == 1){
    $_SESSION["login"] = true;
    $_SESSION["id"] = $register->idUser();
    $_SESSION["user"] = $register -> selectUserById($register->idUser());
    header("Location: index.php");
  }
  elseif($result == 10){
    echo
    "<script> alert('Wrong Password'); </script>";
  }
  elseif($result == 100){
    echo
    "<script> alert('User Not Registered'); </script>";
  }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Jewelry Store</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
          background-image: url('images/login_bg.png');
          background-size: cover;
          background-repeat: no-repeat;
          background-attachment: fixed;
        }
        .login-box {
            opacity: 1;
            max-width: 500px;
            margin: 200px auto;
            padding: 20px;
            background-color: rgba(173, 167, 167, 0.8);
            border: 1px solid #000;
            border-radius: 7px;
            box-shadow: 0 0 10px black;
            font-weight: bold;
        }
        .login-box i {
            font-size: 30px;
            margin-bottom: 30px;
        }
        .new-register {
            text-align: center;
            margin-top: 30px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="login-box">
                <h3 class="text-center">Login</h3>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="usernameemail">Username or Email</label>
                        <input type="text" class="form-control" id="usernameemail" name="usernameemail" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
                </form>
                <div class="new-register">
                    <p>New User <a href="registration.php">Click here to Sign Up </a></p>
                    <a href="index.php">Go To Home Page</a>
                </div>

            </div>
        </div>
    </div>
</div>

</body>
</html>

