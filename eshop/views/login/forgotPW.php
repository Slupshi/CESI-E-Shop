<?php
    session_start();
    $errorMessage = "";
?>


<html lang="fr">
    <head>
        <title>Forgot Password</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="/eshop/style.css">
        <link rel="shortcut icon"href="cart.png">
    </head>

    <body>  
        <div id="app">
            <div class="blank"></div>

            <div class="centralDiv">
                <h1> Forgot Password </h1>  
                

                <!-- ForgotPasswordForm -->           
                <div >
                    <form action="" method="POST">
                        <div class="form-control">
                            <div class="input">
                                <label for="forgotPWMail">Mail</label>
                                <input id="forgotPWMail" type="text" placeholder="john.doe@outlook.com">
                            </div>    
                        </div>  
                        <button type="submit" class="validateButton">Envoyer</button>
                    </form>
                    <div class="SmallButtonDiv">
                        <button class="smallButton" type="submit" id="stopForgotPW" onclick="location.href= '/login';">Retour</button>                         
                    </div>                    
                </div>   

                <div> <?php echo $errorMessage ?> </div>
            </div> 
                         
            <div class="blank"></div>    
        </div> 
    </body>
</html>