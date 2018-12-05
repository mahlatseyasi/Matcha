<?php
    if (session_status() == PHP_SESSION_NONE) { session_start(); }
    require '../settings/functions.php';
	iNotConnected();
	$r = rand();

    $uploadfile = "";
	if (!empty($_POST))
	{
		if ($_FILES['my_files']['error'] > 0)
			put_flash('danger', "Error : Problem while uploading.", "../extensions/edit_photos.php");

		if ($_FILES['my_file']['size'] > intval($_POST['MAX_FILE_SIZE']))
			put_flash('danger', "Error : File too big.", "../extensions/edit_photos.php");

		$extensions_valides = array('jpg');

		$extension_upload = strtolower(substr(strrchr($_FILES['my_files']['name'], '.'), 1));
		if (!(in_array($extension_upload,$extensions_valides)))
			put_flash('danger', "Error : Unwanted image extension.", "../extensions/edit_photo.php");

		require_once '../settings/functions.php';
		require_once '../settings/database.php';

		$uploaddir = '../img/user/' .$_SESSION['auth']->id;

		if (!is_dir($uploaddir))
			mkdir($uploaddir, 0777);

		$uploadfile = $uploaddir ."/" .basename($_FILES['my_files']['name']);

		if (file_exists($uploadfile))
			unlink($uploadfile);

		if (move_uploaded_file($_FILES['my_files']['tmp_name'], $uploadfile)) {
		    $path = $uploadfile;
			$type = pathinfo($path, PATHINFO_EXTENSION);
			$data = file_get_contents($path);
			rename($uploadfile, "../img/user/" .$_SESSION['auth']->id ."/profile".$r.".jpg");
			$req = $pdo->prepare('UPDATE users SET img2 = ? WHERE id = ?');
			$req->execute(["../img/user/" .$_SESSION['auth']->id ."/profile".$r.".jpg", $_SESSION['auth']->id]);
            $_SESSION['auth']->img2 = "../img/user/" .$_SESSION['auth']->id ."/profile".$r.".jpg";
            put_flash('success', "image 2: uploaded successful.", "../extensions/edit_photos.php");

		}
		else {
			put_flash('danger', "Error : Problem while uploading.", "../extensions/edit_photos.php");
		}
	}
?>