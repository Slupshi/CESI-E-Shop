<?php
session_start();
require_once 'C:\xampp\htdocs\eshop/functions.php';

if (isset($_POST['username']) && isset($_POST['password'])){

    $usernameGiven = $_POST['username'];
    $passwordGiven = $_POST['password'];
    
    $user = LoginUser($usernameGiven, $passwordGiven);
    
    if ($user){
        $_SESSION['loggedUser'] = $usernameGiven;

        header("Location: /catalogue");
    }
    else {
        header("Location: /login?message=Informations%20incorrectes");
    }
}