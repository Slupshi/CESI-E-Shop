<?php

    enum Role : int
    {
        case Customer = 0;
        case Administrator = 1;
        case Vendor = 2;


        public function Label(): string
        {
            return match($this)
            {
                static::Customer => "Client",
                static::Administrator => "Administrateur",
                static::Vendor => "Vendeur",
            };
        }

    }