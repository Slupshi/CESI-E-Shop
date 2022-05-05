<?php
    require_once '/xampp/htdocs/eshop/models/Models.php';


    function GetDb(): PDO
    {
        return new PDO(
            'mysql:host=127.0.0.1:3307;dbname=eshop;charset=utf8',
            'root',
            'toor',
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    }

    function RegisterUser($username, $mail, $password, $confirmPW) : void
    {
        if($username != null && $mail != null && $password != null && $confirmPW != null)
        {
            if($password != $confirmPW){
                return;
            }
            try
            {
                $db = GetDb();
                $stmt = $db->prepare("
                INSERT INTO user (User_Name, User_Password, User_Mail)
                VALUES(:username, :password, :mail )");
                $stmt->execute(['username' => $username, 'password' => $password, 'mail' => $mail]);
            }
            catch(PDOException $e)
            {
                
            }
            
        }
        else
        {
            return;
        }
        
    }

    function LoginUser (string $username, string $password): ?User 
    {
        $db = getDb();
        $stmt = $db->prepare('SELECT * FROM user WHERE User_Name = :username AND User_Password = :password');
        $stmt->execute([
            'username' => $username,
            'password' => $password,
        ]);
    
        $user = $stmt->fetch();
    
        if ($user) {
            return new User (
                $user['User_Id'],
                $user['User_Name'],
                $user['User_Password'],
                $user['User_Mail'],
            );
        }
    
        return null;
    }

    function GetProducts(): array
    {
        $db = GetDb();
        $stmt = $db->prepare("SELECT * FROM product");
        $stmt->execute();

        $products = $stmt->fetchAll();
        foreach($products as $product)
        {
            $productsList[] = new Product(
                $product['Pdct_Id'],
                $product['Pdct_Name'],
                $product['Pdct_Price']/100,
                $product['Pdct_Description'],
                ByteToProducType($product['Pdct_Type']),
                $product['Pdct_Image'],
            );
        }
        return $productsList;
    }

    function ByteToProducType(?int $byte = 0): ProductType
    {
        switch($byte)
        {
            case'0':
                return ProductType::Divers;
            case'1':
                return ProductType::Accessoire;
            case'2':
                return ProductType::Vetement;
            default:
                return ProductType::Divers;
        }
    }

    function GetUserByName(string $username): ?User
    {
        $db = GetDb();
        $stmt = $db->prepare('SELECT * FROM user WHERE User_Name = :$username');
        $stmt->execute([
            'username' => $username,            
        ]);
    
        $user = $stmt->fetch();
    
        if ($user) {
            return new User (
                $user['User_Id'],
                $user['User_Name'],
                $user['User_Password'],
                $user['User_Mail'],
            );
        }

        return null;
    }

    function GetProductsInCart(): array
    {
        $db = GetDb();
        $userId = GetUserByName($_SESSION['loggedUser']);
        $stmt = $db->prepare('SELECT * FROM panier WHERE User_Id = :userId');
        $stmt->execute(['userId' => $userId]);

        $products = $stmt->fetchAll();

        foreach($products as $product)
        {
            $productsInCart = new Product(
                $product['Pdct_Id'],
                $product['Pdct_Name'],
                $product['Pdct_Price']/100,
                $product['Pdct_Description'],
                ByteToProducType($product['Pdct_Type']),
                $product['Pdct_Image'],
            );
        }
        return $productsInCart;        
    }