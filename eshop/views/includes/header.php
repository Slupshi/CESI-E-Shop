<?php 
    session_start();
    require_once '/xampp/htdocs/eshop/functions.php';
    if(isset($_SESSION['loggedUser']))
    {
        $user = GetUserByName($_SESSION['loggedUser']);
    }
?>

<html>
    <head>
        <link rel="stylesheet" href="/eshop/style.css">
    </head>
    <body>
        <div class="header">            
            <nav class="navbar">    
                <span><b>E-Shop - <?php echo $user->Role->Label(); ?></b></span>            
                <a href="/catalogue"><b>Catalogue</b></a>  
                <?php if($user->Role == Role::Vendor || $user->Role == Role::Administrator): ?>              
                    <a href="/addProduct"><b>Ajouter un produit</b></a>
                <?php endif ?>
                <?php if($user->Role == Role::Administrator): ?>     
                    <a href="/users"><b>Utilisateurs</b></a>
                <?php endif ?>
                <a href="/cart"><b>Panier</b></a>
                <a href="/logout"><b>Logout</b></a>
            </nav>
        </div>
    </body>
</html>

