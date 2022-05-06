<?php
    session_start();
    require_once '/xampp/htdocs/eshop/functions.php';
    
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
    }
?>


<html lang="fr">
    <head>
        <title>Edit User</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="/eshop/style.css">
        <link rel="shortcut icon"href="cart.png">
    </head>

    <body class="smallBody">  
        <div id="app">
            <div class="blank"></div>
            
            <div class="centralDiv">
                <h1> Edit </h1>  
                <div>
                    <form method="POST" action="">
                        <div class="form-control">
                            <div class="input">
                                <label for="editPseudo">Pseudo</label>
                                <input id="editPseudo" name="username" type="text" placeholder="JeanTitouanDu93" required>
                            </div>     
                            <div class="input">
                                <label for="editMail">Mail</label>
                                <input id="editMail" name="mail" type="text" placeholder="john.doe@outlook.com" required>
                            </div>                 
                            <div class="input">
                                <label for="editMDP">Mot de passe</label>
                                <input class="passwordInput" name="password" id="editMDP" type="password" placeholder="••••••••" required> 
                            </div>    
                            <div class="input">
                                <label for="editConfirmMDP">Confirmation du mot de passe</label>
                                <input class="passwordInput" name="confirmPW" id="editConfirmMDP" type="password" placeholder="••••••••" required> 
                            </div>
                        </div>  
                        <button type="submit" class="validateButton">Valider</button>  
                    </form>                   

                </div>
            </div> 
                         
            <div class="blank"></div>    
        </div> 
    </body>
</html>



