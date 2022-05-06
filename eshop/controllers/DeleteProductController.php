<?php

require_once '/xampp/htdocs/eshop/functions.php';

if(isset($_GET['id']))
{
    DeleteProduct($id);
}

header('Location: /catalogue');