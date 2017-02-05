<?php
/**
 * User Controller
 */

namespace App\Controllers;
use \App\Models\ModelUser;
use \Core\View;

class User extends \Core\Controller {
	
	public function registerFormAction() {
		View::render('User/registerForm.php',
			[
				'title' => 'Registration',
			], FALSE);
	}
	
	public function registerAction() {
		if ($_POST['send'] == 'register') {
			foreach ($_POST AS $key => $value) {
				$_POST[$key] = \Core\Controller::validate($value);
			}
			
			$formData = TRUE;
			$errorMessage = '';
			if (empty($_POST['user'])) {
				$formData = FALSE;
				$errorMessage = "Username is empty!";
			} else if (empty($_POST['pass1']) || empty($_POST['pass2'])) {
				$formData = FALSE;
				$errorMessage = "Password fields cannot be empty!";
			} else if ($_POST['pass1'] !== $_POST['pass2']) {
				$formData = FALSE;
				$errorMessage = "Passwords must be identical";
			} else if (empty($_POST['email'])) {
				$formData = FALSE;
				$errorMessage = "Email field cannot be blank!";
			}
		} else {
			$formData = FALSE;
			$errorMessage = 'Unknown mistake!';
		}
		
		if ($formData === FALSE) {
			View::render('User/registerForm.php',
				[
					'title' => "Registration",
					'user' => $_POST['user'],
					'email' => $_POST['email'],
					'errorMessage' => $errorMessage
				], FALSE);
		}else if ($formData === TRUE) {
			$data =
				[
					'user' => $_POST['user'],
					'email' => $_POST['email'],
					'pass' => md5($_POST['pass1'])
				];
			$errorMessage = ModelUser::checkUserName($data);
			$errorMessage .= ModelUser::checkUserEmail($data);
			
			if (!empty($errorMessage)) {
				View::render('User/registerForm.php',
					[
						'title' => "Registration",
						'user' => $_POST['user'],
						'email' => $_POST['email'],
						'errorMessage' => $errorMessage
					], FALSE);
			} else {
				$userAddStatus = ModelUser::userRegistration($data);
				if ($userAddStatus === TRUE) {
					header("Location: /user/login-form");
				} else {
					View::render('User/registerForm.php',
						[
							'title' => "Registration",
							'user' => $_POST['user'],
							'email' => $_POST['email'],
							'errorMessage' => 'User was not registered because of unknown reasons!'
						], FALSE);
				}
			}
		}
	}
	
	public function loginFormAction()
	{
		View::render('User/loginForm.php',
			[
				'title' => "login"
			], FALSE);
	}
	
	public function loginAction()
	{
		
	}
}