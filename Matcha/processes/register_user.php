<?php
	
	if (session_status() == PHP_SESSION_NONE) { session_start(); }
	require '../settings/functions.php';
	iConnected();

	include_once 'mail.php';
	if (empty($_POST) || isset($_SESSION['auth']))
		put_flash('danger', "Error : You cannot acces this page.", '../index.php');
	else{
		$username = $_POST['username'];
		$email = $_POST['email'];
		$psw = $_POST['password'];
		$pswr = $_POST['passwordr'];
		$acti_code = rand();
		$url = $_SERVER['HTTP_HOST']. str_replace("/processes/register_user.php", "", $_SERVER['REQUEST_URI']);


		require_once '../settings/database.php';
		$req = $pdo->prepare('SELECT username FROM users WHERE username = ?');
		$req->execute([$username]);
		$usernameExi = $req->fetch();

		if ($usernameExi)
			put_flash('danger', "Error : Username already taken.", "../signup.php");
		else{
			$req = $pdo->prepare('SELECT mail FROM users WHERE mail = ?');
			$req->execute([$email]);
			$emailExi = $req->fetch();

			if ($emailExi)
				put_flash('danger', "Error : Email already taken.", "../signup.php");
			else{
				$password = password_hash($psw, PASSWORD_BCRYPT);
				$req = $pdo->prepare('INSERT INTO users SET username = ?, mail = ?, password = ?, `activation-code`= ?');
				
				if ($req->execute([$username, $email, $password, $acti_code])){
				send_verification_email($email, $username, $acti_code, $url);
					put_flash('success', "Success : Account created, please login on your email to finish registration.", "../index.php");
				}
				else
					put_flash('danger', "Error : Can't signup user.", "../signup.php");
			}
		}
	}
?>
