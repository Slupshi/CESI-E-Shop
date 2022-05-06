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
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
    </body>
</html>