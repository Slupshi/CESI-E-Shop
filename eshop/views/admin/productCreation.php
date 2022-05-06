<?php 
    session_start();
    require_once '/xampp/htdocs/eshop/functions.php';
    $errorMessage = "";
    if(isset($_GET['message']))
    {
        $errorMessage = $_GET['message'];
    }
?>

<html lang="fr">
    <head>
        <title>Ajout de produit</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="/eshop/style.css">
        <link rel="shortcut icon"href="cart.png">
    </head>
    <body class="smallBody">
        <?php require_once '/xampp/htdocs/eshop/views/includes/header.php' ?>
        <div id="app">
            <div class="blank"></div>
            
            <div class="centralDiv">
                <h1> Nouveau Produit </h1>  

                <div>
                    <form action="/createProduct" method="POST">
                        <div class="form-control">
                            <div class="input">
                                <label for="productName">Nom</label>
                                <input id="productName" name="productName" type="text" placeholder="Camion">
                            </div>                   
                            <div class="input">
                                <label for="productPrice">Prix</label>
                                <input name="productPrice" id="productPrice" type="number" placeholder="20"> 
                            </div>       
                            <div class="input">
                                <label for="productType">Catégorie</label>
                                <input name="productType" id="productType" type="number" placeholder="0"> 
                            </div>    
                            <div class="input">
                                <label for="productDescription">Description</label>
                                <input name="productDescription" id="productDescription" type="text" placeholder="Pouet Pouet"> 
                            </div>    
                            <div class="input">
                                <label for="productImage">ImageURL</label>
                                <input name="productImage" id="productImage" type="text" placeholder=""> 
                            </div>       
                        </div>  
                        <button type="submit" class="validateButton">Ajouter</button>  
                    </form>                  

                </div>
                <div class="errorMessage"> <?php echo $errorMessage ?> </div>
            </div> 
                         
            <div class="blank"></div>    
        </div> 
    </body>
</html>