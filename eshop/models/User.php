<?php

    require_once '/xampp/htdocs/eshop/enums/Enums.php';

    class User
    {
        public int $Id;
        public string $Username;
        private string $_password;
        public string $Mail;
        public Role $Role;
        

        function __construct(int $id, string $username, string $password, string $mail , Role $role = Role::Customer)
        {
            $this->Id = $id;
            $this->Username = $username;
            $this->_password = $password;
            $this->Mail = $mail;
            $this->Role = $role;
        }

        public function CheckUserPassword(int $id): string
        {
            return $this->_password;
        }

    }