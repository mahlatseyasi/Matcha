<?php
	if (session_status() == PHP_SESSION_NONE) { session_start(); }
	require '../required_/functions.php';
	iNotConnected();

	if (empty($_POST))
		put_flash('danger', "Invalid action.", "../index.php");

	require '../required_/database.php';

	$req = $pdo->prepare("INSERT INTO blocked SET blocker = ?, blocked = ?");
	if($req->execute([$_SESSION['auth']->id, $_POST['id']]))
		put_flash('info', "User blocked.", "../index.php");