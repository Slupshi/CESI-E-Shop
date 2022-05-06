<?php

    require_once '/xampp/htdocs/eshop/functions.php';

    if(isset($_GET['id']))
    {
        DeleteUser($_GET['id']);
        header('Location: /users');
    }