<?php
require 'class/register.php';
require 'class/validation.php';

if (!empty($_SESSION["id"])) {
    header("Location: index.php");
}

$register = new Register();
$validation = new Validation();

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];

    $errors = $validation->validateRegistrationForm($name, $username, $email, $password, $confirmpassword);

    if (empty($errors)) {
        $result = $register->registration($name, $username, $email, $password, $confirmpassword);

        if ($result == 1) {
            echo "<script> alert('Registration Successful'); </script>";
            header("Location: login.php");
        } elseif ($result == 10) {
            echo "<script> alert('Username or Email Has Already Taken'); </script>";
        } elseif ($result == 100) {
            echo "<script> alert('Password Does Not Match'); </script>";
        }
    } else {
        foreach ($errors as $error) {
            echo "<script> alert('$error'); </script>";
        }
    }
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Jewelry Store</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-image: url('images/login_bg.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;

        }

        .signup-box {
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

        .signup-box i {
            font-size: 40px;
            margin-bottom: 20px;
        }

        .already-member {
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="signup-box">
                    <h3 class="text-center">Sign Up</h3>
                    <form action="" method="post">

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="confirmpassword">Confirm Password</label>
                            <input type="password" class="form-control" id="confirmpassword" name="confirmpassword"
                                required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary btn-block">Sign Up</button>
                    </form>
                    <div class="already-member">
                        <p>Already a member? <a href="login.php">Click here to log in</a></p>
                        <a href="index.php">Go To Home Page</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>