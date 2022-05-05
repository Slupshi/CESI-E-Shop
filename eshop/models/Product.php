<?php

    class Product
    {

        public int $Id;
        public string $Name;
        public float $Price;
        public string $Description;
        public ?ProductType $ProductType;
        public ?string $ImageURL;

        public function __construct(int $id, string $name, float $price, string $description, ?ProductType $productType = ProductType::Divers, ?string $imageURL = "")
        {
            $this->Id = $id;
            $this->Name = $name;
            $this->Price = $price;
            $this->Description = $description;
            $this->ProductType = $productType;            
            $this->ImageURL = $imageURL;
        }

        
    }