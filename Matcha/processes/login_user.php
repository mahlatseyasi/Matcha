<?php
	
	if (session_status() == PHP_SESSION_NONE) { session_start(); }
	require '../settings/functions.php';
	iConnected();

	if (empty($_POST) || isset($_SESSION['auth']))
		put_flash('danger', "Error : You cannot acces this page.", '../index.php');

	
	$username = $_POST['username'];
	$psw = $_POST['password'];

	require '../settings/database.php';
	$req = $pdo->prepare('SELECT * FROM users WHERE username = ? AND `active status`= 1');
	$req->execute([$username]);
	$userExi = $req->fetch();

	if ($userExi)
	{
		if (password_verify($psw, $userExi->password))
		{
			if ($userExi->reported)
				put_flash('danger', "You've been reported, your account is blocked", "../index.php");
			$_SESSION['auth'] = $userExi;
			$json = file_get_contents('http://ip-api.com/json');
			$obj = json_decode($json);
			$_SESSION['auth']->location = $obj->regionName;
			$req = $pdo->query("UPDATE users SET location ='" .addslashes($obj->regionName) ."', lastonline = NOW() WHERE id =" .intval($_SESSION['auth']->id));
			put_flash('success', "Welcome back !", "../index.php");
		}
		else
			put_flash('danger', "Error : Invalid username or password.", "../index.php");
	}
	else
	{
		put_flash('danger', "Error : User not allowed to login.", "../index.php");
	}
	