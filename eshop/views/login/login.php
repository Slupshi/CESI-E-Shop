<?php
    session_start();
    $errorMessage = "";
    if(isset($_GET['message']))
    {
        $errorMessage = $_GET['message'];
    }
?>


<html lang="fr">
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="/eshop/style.css">
        <link rel="shortcut icon"href="cart.png">
    </head>

    <body class="smallBody">  
        <div id="app">
            <div class="blank"></div>
            
            <div class="centralDiv">
                <h1> Login </h1>  
                
                <!-- LoginForm -->
                <div>
                    <form action="/eshop/controllers/LoginUser.php" method="POST">
                        <div class="form-control">
                            <div class="input">
                                <label for="loginID">Pseudo</label>
                                <input id="loginID" name="username" type="text" placeholder="JuanCarlos69" required>
                            </div>                   
                            <div class="input">
                                <label for="loginMDP">Mot de passe</label>
                                <input class="passwordInput" name="password" id="loginMDP" type="password" placeholder="••••••••" required> 
                            </div>          
                        </div>  
                        <button type="submit" class="validateButton">Connexion</button>  
                    </form>
                    <div class="smallButtonDiv">
                        
                        <button class="smallButton" type="submit" id="forgotPWButton" onclick="location.href= '/forgotPW';">Mot de passe oublié ?</button>                         
                        <button class="smallButton">|</button>
                        <button class="smallButton" type="submit" id="createAccountButton" onclick="location.href= '/register';">Créer un compte</button> 
                        
                    </div>
                    

                </div>

                <div class="errorMessage"> <?php echo $errorMessage ?> </div>
            </div> 
                         
            <div class="blank"></div>    
        </div> 
    </body>
</html>



