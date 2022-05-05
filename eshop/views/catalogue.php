<?php    
    session_start();

    require_once '/xampp/htdocs/eshop/functions.php';
    require_once '/xampp/htdocs/eshop/models/Models.php';

    $productsList = GetProducts();
    echo 'Votre catalogue ici !'
?>

<html lang="fr">
    <head>
        <title>Catalogue</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="/eshop/style.css">
        <link rel="shortcut icon"href="cart.png">
    </head>
    <body id="Catalogue"> 
        <?php require_once '/xampp/htdocs/eshop/views/includes/header.php' ?>             
        <div class="shop">
            <ul class="productsList">
                <?php foreach($productsList as $product): ?>                    
                    <li>
                        <div class="productItem">
                            <img src="<?php echo $product->ImageURL; ?>" height="150" width="150" alt="<?php echo $product->Name; ?>">
                            <span><b><?php echo $product->Name; ?></b></span>
                            <span class="priceLabel"><?php echo $product->Price . ' €'; ?></span>
                            <span class="typeLabel"><?php echo $product->ProductType->Label(); ?></span>
                            <span class="descriptionLabel"><?php echo $product->Description; ?></span>
                            <button class="addCartButton"><span>Ajouter au panier</span></button>
                        </div>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
    </body>
</html>