<?php
    require_once 'C:\xampp\htdocs\eshop/functions.php';

    $username = $_POST['username'];
    $mail = $_POST['mail'];
    //$password = hash( "sha256",($_POST['password']));
    $password = $_POST['password'];
    $confirmPW = $_POST['confirmPW'];

    if(RegisterUser($username, $mail, $password, $confirmPW))
    {
        header('Location: /login?message=Compte%20Créé');
    }
    else
    {
        header('Location: /login?message=Erreur');
    }
