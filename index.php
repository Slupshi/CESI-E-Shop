<?php

	session_start();
	require_once 'eshop/controllers/LoginController.php';
	require_once 'eshop/models/Models.php';
	require_once 'eshop/enums/Enums.php';


	$url = parse_url(urldecode($_SERVER['REQUEST_URI']));

	switch($url['path']){
		case"/":
			header("Location: /login");
			break;
		case"/login":
			LoginController::ShowLoginPage();
			break;
		case"/register":
			LoginController::ShowRegisterPage();
			break;
		case"/forgotPW":
			LoginController::ShowForgotPWPage();
			break;
		case"/catalogue":
			require_once 'eshop/views/catalogue.php';
			break;
		case"/logout":
			require_once 'eshop/controllers/LogoutUser.php';
			break;
		case"/cart":
			require_once 'eshop/views/cart.php';
			break;
		default:
			http_response_code(404);
			require_once 'eshop/views/404.php';
	}
?>
