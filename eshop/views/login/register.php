<?php
    session_start();
    $errorMessage = "";
?>


<html lang="fr">
    <head>
        <title>Register</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="/eshop/style.css">
        <link rel="shortcut icon"href="cart.png">
    </head>

    <body>  
        <div id="app">
            <div class="blank"></div>

            <div class="centralDiv">
                <h1> Register </h1>                 
                
                <!-- InscriptionForm -->
                <div >
                    <form method="POST" action="/eshop/controllers/RegisterUser.php">
                        <div class="form-control">
                            <div class="input">
                                <label for="inscriptionPseudo">Pseudo</label>
                                <input id="inscriptionPseudo" name="username" type="text" placeholder="JeanTitouanDu93">
                            </div>     
                            <div class="input">
                                <label for="inscriptionMail">Mail</label>
                                <input id="inscriptionMail" name="mail" type="text" placeholder="john.doe@outlook.com">
                            </div>                 
                            <div class="input">
                                <label for="inscriptionMDP">Mot de passe</label>
                                <input class="passwordInput" name="password" id="inscriptionMDP" type="password" placeholder="••••••••"> 
                            </div>    
                            <div class="input">
                                <label for="inscriptionConfirmMDP">Confirmation du mot de passe</label>
                                <input class="passwordInput" name="confirmPW" id="inscriptionConfirmMDP" type="password" placeholder="••••••••"> 
                            </div>
                        </div>  
                        <button type="submit" class="validateButton">Valider</button>  
                    </form>
                    <div class="smallButtonDiv">
                        <button class="smallButton" type="submit" id="stopInscription" onclick="location.href= '/login';">Retour</button>                         
                    </div>                    
                </div>               

                <div> <?php echo $errorMessage ?> </div>
            </div> 
                         
            <div class="blank"></div>    
        </div> 
    </body>
</html>