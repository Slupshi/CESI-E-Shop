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

    function RegisterUser($username, $mail, $password, $confirmPW) : bool
    {
        if($username != null && $mail != null && $password != null && $confirmPW != null)
        {
            if($password != $confirmPW){
                return false;
            }
            try
            {
                $db = GetDb();
                $stmt = $db->prepare("
                INSERT INTO user (User_Name, User_Password, User_Mail)
                VALUES(:username, :password, :mail )");
                $stmt->execute(['username' => $username, 'password' => $password, 'mail' => $mail]);
                return true;
            }
            catch(PDOException $e)
            {
                return false;
            }
            
        }
        else
        {
            return false;
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
                ByteToUserType($user['User_Type']),
            );
        }
    
        return null;
    }

    function DeleteUser(int $id)
    {
        GetDb()->prepare('DELETE FROM user WHERE User_Id = :id ')->execute(['id' => $id]);
    }

    function GetUsers():array 
    {
        $db = GetDb();
        $stmt = $db->prepare('SELECT * FROM user');
        $stmt->execute();

        $users = $stmt->fetchAll();
        foreach($users as $user){
            $validUsers[] = new User (
                $user['User_Id'],
                $user['User_Name'],
                $user['User_Password'],
                $user['User_Mail'],
                ByteToUserType($user['User_Type']),
            );
        }
        return $validUsers;
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

    function ByteToUserType(?int $byte = 0): Role
    {
        switch($byte)
        {
            case'0':
                return Role::Customer;
            case'1':
                return Role::Administrator;
            case'2':
                return Role::Vendor;
            default:
                return Role::Customer;
        }
    }

    function GetUserByName(string $username): ?User
    {
        $db = GetDb();
        $stmt = $db->prepare('SELECT * FROM user WHERE User_Name = :username');
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
                ByteToUserType($user['User_Type']),
            );
        }

        return null;
    }

    function GetProductsInCart($loggedUsername): array
    {
        $db = GetDb();
        $userId = GetUserByName($loggedUsername);
        $stmt = $db->prepare('SELECT * FROM panier WHERE User_Id = :userId');
        $stmt->execute(['userId' => $userId]);

        $products = $stmt->fetchAll();

        foreach($products as $product)
        {
            $productsInCart[] = new Product(
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

    function CreateProduct(Product $product): bool
    {
        try
        {
            $db = GetDb();
            $stmt = $db->prepare('INSERT INTO product (Pdct_Name, Pdct_Price, Pdct_Type, Pdct_Description, Pdct_Image) VALUES (:name , :price , :type , :description , :img );');
            $stmt->execute([
                'name' => $product->Name,
                'price' => $product->Price,
                'description' => $product->Description,
                'type' => $product->ProductType->value,
                'img' => $product->ImageURL,
            ]);
            return true;
        }
        catch(PDOException $e)
        {
            return false;
        }
        
    }

    function DeleteProduct(int $id)
    {
        $db = GetDb();
        $stmt = $db->prepare('DELETE FROM product WHERE Pdct_Id = :id ');
        $stmt->execute(['id' => $_GET['id'],]);
    }

    function UpdateProduct(Product $product)
    {
        try
        {
            $db = GetDb();
            $stmt = $db->prepare('UPDATE product SET Pdct_Name = :name , Pdct_Price = :price , Pdct_Type = :type , Pdct_Description = :description, Pdct_Image = :img ;');
            $stmt->execute([
                'name' => $product->Name,
                'price' => $product->Price,
                'description' => $product->Description,
                'type' => $product->ProductType->value,
                'img' => $product->ImageURL,
            ]);

        }
        catch(PDOException $e)
        {

        }
    }