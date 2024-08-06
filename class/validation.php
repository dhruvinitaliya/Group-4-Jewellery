<?php

class Validation
{
    public function validateRegistrationForm($name, $username, $email, $password, $confirmpassword)
    {
        $errors = [];

        
        if (empty($name)) {
            $errors['name'] = 'Name is required.';
        } elseif (!preg_match("/^[a-zA-Z\s]+$/", $name)) {
            $errors['name'] = 'Name should contain only alphabetic characters and whitespace.';
        }

        
        if (empty($username)) {
            $errors['username'] = 'Username is required.';
        }

        
        if (empty($email)) {
            $errors['email'] = 'Email is required.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Invalid email format.';
        }

        
        if (empty($password)) {
            $errors['password'] = 'Password is required.';
        } elseif (strlen($password) < 6) {
            $errors['password'] = 'Password should be at least 6 characters long.';
        }

        
        if (empty($confirmpassword)) {
            $errors['confirmpassword'] = 'Confirm Password is required.';
        } elseif ($password !== $confirmpassword) {
            $errors['confirmpassword'] = 'Passwords do not match.';
        }

        return $errors;
    }

    public function validateCheckoutForm($name, $email, $address, $phone)
    {
        $errors = [];

        
        if (empty($name)) {
            $errors['name'] = 'Name is required.';
        } elseif (!preg_match("/^[a-zA-Z\s]+$/", $name)) {
            $errors['name'] = 'Name should contain only alphabetic characters and whitespace.';
        }

        
        if (empty($email)) {
            $errors['email'] = 'Email is required.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Invalid email format.';
        }

       
        if (empty($address)) {
            $errors['address'] = 'Address is required.';
        }

        
        if (empty($phone)) {
            $errors['phone'] = 'Phone is required.';
        } elseif (!preg_match("/^\d{10}$/", $phone)) {
            $errors['phone'] = 'Invalid phone number format.';
        }

        return $errors;
    }
}

?>