<?php

    enum ProductType : int
    {
        case Divers = 0;
        case Accessoire = 1;
        case Vetement = 2;
        
        public function Label(): string
        {
            return match($this)
            {
                static::Divers=> "Divers",
                static::Accessoire=> "Accessoire",
                static::Vetement=> "Vetement",
            };
        }


    }