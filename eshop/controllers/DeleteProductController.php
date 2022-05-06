<?php

require_once '/xampp/htdocs/eshop/functions.php';

if(isset($_GET['id']))
{
    $db = GetDb();
    $stmt = $db->prepare('DELETE FROM product WHERE Pdct_Id = :id ');
    $stmt->execute(['id' => $_GET['id'],]);
}

header('Location: /catalogue');