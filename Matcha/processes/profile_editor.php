<?php
	
	if (session_status() == PHP_SESSION_NONE) { session_start(); }
	require '../settings/functions.php';
	iNotConnected();

	if (empty($_POST))
		put_flash('danger', "Error : You cannot acces this page.", '../index.php');

	$name = $_POST['name'];
	$gender = $_POST['gender'];
	$orientation = $_POST['orientation'];
	$bio = $_POST['bio'];
	$i1 = $_POST['i1'];
	$i2 = $_POST['i2'];
	$i3 = $_POST['i3'];
	$age = $_POST['age'];


	require '../settings/database.php';
	$req = $pdo->prepare('UPDATE users SET name = ?, age = ?, gender = ?, orientation = ?, bio = ?, i1 = ?, i2 = ?, i3 = ? WHERE id = ?');
	$req->execute([$name, $age, $gender, $orientation, $bio, $i1, $i2, $i3, $_SESSION['auth']->id]);
	$_SESSION['auth']->name = $name;
	$_SESSION['auth']->age = $age;
	$_SESSION['auth']->gender = $gender;
	$_SESSION['auth']->orientation = $orientation;
	$_SESSION['auth']->bio = $bio;
	$_SESSION['auth']->i1 = $i1;
	$_SESSION['auth']->i2 = $i2;
	$_SESSION['auth']->i3 = $i3;
	put_flash('success', "Success : Account modified.", "../Matcha/profile.php");
