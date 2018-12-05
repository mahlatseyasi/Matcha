<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }
	require '../settings/functions.php';
	iNotConnected();

	if (empty($_POST))
		put_flash('danger', "Invalid action.", "../index.php");

	require '../settings/database.php';

	$req = $pdo->prepare("DELETE FROM likes WHERE emitter = ? AND receiver = ?");
	$req->execute([$_SESSION['auth']->id, $_POST['like']]);

	$req = $pdo->prepare("DELETE FROM matches WHERE A = ? AND B = ? OR B = ? AND A = ?");
	$req->execute([$_SESSION['auth']->id, $_POST['like'], $_SESSION['auth']->id, $_POST['like']]);