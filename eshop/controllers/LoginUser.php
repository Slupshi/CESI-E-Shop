<?php
require_once 'C:\xampp\htdocs\eshop/functions.php';

$usernameGiven = $_POST['username'];
$passwordGiven = $_POST['password'];


if (isset($_POST['username']) && isset($_POST['password'])){

    $usernameGiven = $_POST['username'];
    $passwordGiven = $_POST['password'];
    
    $user = LoginUser($usernameGiven, $passwordGiven);
    
    if ($user){
        $_SESSION['loggedUser'] = $usernameGiven;
        $_SESSION['message'] = "Félicitations ! Vous vous êtes bien connecté.";

        header("Location: /catalogue");
    }
    else {
        header("Location: /login?message=Informations%20incorrectes");
    }
}