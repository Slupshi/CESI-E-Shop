<?php 
    session_start();
    require_once '/xampp/htdocs/eshop/functions.php';

    $users = GetUsers();
?>

<html lang="fr">
    <head>
        <title>Panel Utilisateur</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="/eshop/style.css">
        <link rel="shortcut icon"href="cart.png">
    </head>
    <body>
        <?php require_once '/xampp/htdocs/eshop/views/includes/header.php' ?>
        <div class="userPanel">
            <table>
                <tr>
                    <th>Nom</th>
                    <th>Mail</th>
                    <th>Role</th>
                    <th>Gestion de l'Utilisateur</th>
                </tr>
                <?php foreach($users as $user): ?>
                    <tr>
                        <td><?php echo $user->Username ?></td>
                        <td><?php echo $user->Mail ?></td>
                        <td><?php echo $user->Role->Label() ?></td>
                        <td>
                            <div class="productItemButtons">
                                <button id="<?php echo 'editButton ' . $user->Id; ?>" onclick="UserOnClick(this.id)"><img src="https://img.icons8.com/external-kiranshastry-lineal-kiranshastry/30/000000/external-pen-interface-kiranshastry-lineal-kiranshastry.png"/></button>
                                <button id="<?php echo 'deleteButton ' . $user->Id; ?>" onclick="UserOnClick(this.id)"><img src="https://img.icons8.com/ios/30/000000/delete--v1.png"/></button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>      
        
        <script type="application/javascript">

            function UserOnClick(id)
            {
                let splitID = id.split(" ");
                switch(splitID[0])
                {
                    case "editButton":
                        var xmlHttp = new XMLHttpRequest();
                        xmlHttp.open( "GET", "/editUser?id=" + splitID[1] , false );
                        xmlHttp.send();
                        break;
                    case "deleteButton":
                        var xmlHttp = new XMLHttpRequest();
                        xmlHttp.open( "GET", "/deleteUser?id=" + splitID[1] , false );
                        xmlHttp.send();
                        location.reload();
                        break;  
                }
            }

        </script>

    </body>
</html>