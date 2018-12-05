<?php
	
	if (session_status() == PHP_SESSION_NONE) { session_start(); }
	require '../settings/functions.php';
	iNotConnected();


	require '../settings/database.php';

	$req = $pdo->prepare("SELECT * FROM users WHERE username = ?");
	$req->execute([$_POST['username']]);
	$exi = $req->fetch();

	if ($exi){
		put_flash('danger', "Username already taken.. Failed to modify account", "../Matcha/account.php");
	}
	else{
		$password = password_hash($_POST['psw'], PASSWORD_BCRYPT);
		$req = $pdo->prepare("UPDATE users SET username = ?, password = ? WHERE id = ?");
		$req->execute([$_POST['username'], $password, $_SESSION['auth']->id]);
		$_SESSION['auth']->username = $_POST['username'];
		put_flash('success', "Account modified.", "../Matcha/account.php");
	}
?>
