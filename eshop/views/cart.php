<?php 
    session_start();
    require_once '/xampp/htdocs/eshop/functions.php';
    $cart = GetProductsInCart($_SESSION['loggedUser']);
?>

<html lang="fr">
    <head>
        <title>Mon Panier</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="/eshop/style.css">
        <link rel="shortcut icon" href="cart.png">
    </head>
    <body>
        <div>
            <?php foreach($cart as $product): ?>
                <div class="productItem">

                </div>
            <?php endforeach ?>
        </div>
    </body>
</html>