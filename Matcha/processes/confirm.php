<?php 
	if (session_status() == PHP_SESSION_NONE) { session_start(); }
	require_once '../settings/functions.php';
	require_once '../settings/database.php';
	
	$req= $pdo->prepare("UPDATE users SET `active status`= 1 WHERE `activation-code`= ?");
	$req->execute([$_GET['token']]);
	put_flash('success', "Account verified !", "../index.php");

	$query->closeCursor();

?>
