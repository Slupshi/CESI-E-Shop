<?php    
    session_start();

    require_once '/xampp/htdocs/eshop/functions.php';
    require_once '/xampp/htdocs/eshop/models/Models.php';

    $productsList = GetProducts();
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
                            <div class="productItemButtons">
                                <button id="<?php echo 'favButton ' . $product->Id; ?>" onclick="OnClick(this.id)"><img src="https://img.icons8.com/ios-glyphs/30/000000/favorite-cart.png"/></button>
                                <button id="<?php echo 'editButton ' . $product->Id; ?>" onclick="OnClick(this.id)"><img src="https://img.icons8.com/external-kiranshastry-lineal-kiranshastry/30/000000/external-pen-interface-kiranshastry-lineal-kiranshastry.png"/></button>
                                <button id="<?php echo 'deleteButton ' . $product->Id; ?>" onclick="OnClick(this.id)"><img src="https://img.icons8.com/ios/30/000000/delete--v1.png"/></button>
                            </div>
                        </div>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>

        <script type="application/javascript">

            function OnClick(id)
            {                
                let splitID = id.split(" ");
                switch(splitID[0])
                {
                    case "favButton":

                        break;
                    case "editButton":

                        break;
                    case "deleteButton":
                        var xmlHttp = new XMLHttpRequest();
                        xmlHttp.open( "GET", "/deleteProduct?id=" + splitID[1] , false );
                        xmlHttp.send();
                        location.reload();
                        break;  
                }
            }                    

        </script>

    </body>
</html>


