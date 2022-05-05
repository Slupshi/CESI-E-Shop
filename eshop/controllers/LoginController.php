<?php

    class LoginController{
        public static function ShowLoginPage()
        {            
            require_once 'eshop/views/login/login.php';
        }

        public static function ShowRegisterPage()
        {
            require_once 'eshop/views/login/register.php';
        }

        public static function ShowForgotPWPage()
        {
            require_once 'eshop/views/login/forgotPW.php';
        }

    }