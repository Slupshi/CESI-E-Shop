<?php
    require_once 'C:\xampp\htdocs\eshop/functions.php';

    if (isset($_POST['productName']) && isset($_POST['productPrice']) && isset($_POST['productDescription'])){
    
        $productName = $_POST['productName'];
        $productPrice = $_POST['productPrice'];
        $productDescription = $_POST['productDescription'];

        $newProduct = new Product(
            id: 0, 
            name: $productName, 
            price: $productPrice * 100, 
            description: $productDescription,
            productType: isset($_POST['productType']) ? ByteToProducType(intval($_POST['productType'])) : ProductType::Divers,
            imageURL: isset($_POST['productImage']) ? $_POST['productImage'] : "",
        );

        $succes = CreateProduct($newProduct);     
        if($succes)
        {
            header('Location: /addProduct?message=Produit%20Créé');
        }  
        else
        {
            header('Location: /addProduct?message=Creation%20Failed');
        }

    }