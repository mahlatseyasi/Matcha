
<?php 
    if (session_status() == PHP_SESSION_NONE) { session_start(); }
    require '../settings/functions.php';
    iNotConnected();

    $uploadfile = "";
	if (!empty($_POST))
	{
		if ($_FILES['my_files']['error'] > 0)
			put_flash('danger', "Error : Problem while uploading.", "edit_photo.php");

		if ($_FILES['my_file']['size'] > intval($_POST['MAX_FILE_SIZE']))
			put_flash('danger', "Error : File too big.", "edit_photo.php");

		$extensions_valides = array('jpg');

		$extension_upload = strtolower(substr(strrchr($_FILES['my_files']['name'], '.'), 1));
		if (!(in_array($extension_upload,$extensions_valides)))
			put_flash('danger', "Error : Unwanted image extension.", "edit_photo.php");

		require_once '../settings/functions.php';
		require_once '../settings/database.php';
		$r = rand();

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
			$req = $pdo->prepare('UPDATE users SET profile_img = ? WHERE id = ?');
			$req->execute(["../img/user/" .$_SESSION['auth']->id ."/profile".$r.".jpg", $_SESSION['auth']->id]);
            $_SESSION['auth']->profile_img = "../img/user/" .$_SESSION['auth']->id ."/profile".$r.".jpg";
		}
		else {
			put_flash('danger', "Error : Problem while uploading.", "edit_photo.php");
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>i_log</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">	
        <link rel="icon" type="image/png" href="../resources/images/icons/favicon.ico"/>
        <link rel="stylesheet" type="text/css" href="../resources/vendor/animate/animate.css">
        <link rel="stylesheet" type="text/css" href="../resources/vendor/css-hamburgers/hamburgers.min.css">
        <link rel="stylesheet" type="text/css" href="../resources/vendor/select2/select2.min.css">
        <link rel="stylesheet" type="text/css" href="../resources/vendor/daterangepicker/daterangepicker.css">
        <link rel="stylesheet" type="text/css" href="../resources/css/util.css">
        <link rel="stylesheet" type="text/css" href="../resources/css/main.css">
        <link rel="stylesheet" type="text/css" href="../resources/css/index.css">
        <link rel="stylesheet" type="text/css" href="../resources/css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
        <link href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.min.css" rel="stylesheet" type="text/css" />
        <script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    
	</head>
	<body>
		<div id="header">
  			<div class="logo">
    			<a href="../index.php"> MAT_CHA</a>
  			</div>
    		<div class="button" onclick="location.href='profile_editor.php'">
      			BACK
    		</div>         
		</div>
		<?php require '../extensions/flash.php'; ?>
		<div class="container-login100" style="background-image: url('../images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
				<div style="position: relative; top: 15%; color: whitesmoke; z-index: 2;">
					<?php if(empty($_POST)) { ?>
						<span class="login100-form-title p-b-37">
							Select your image
						</span>
						<form class="login100-form validate-form" method="POST" action="edit_photo.php" enctype="multipart/form-data">
							<label style="color: red;" for="icone">Image (JPG | 5 Mb) :</label> 
							<input type="hidden" name="MAX_FILE_SIZE" value="5242880" />
							<input type="file" class="input100" accept="image/jpg" name="my_files" id="my_files" required /><br><br>
							<a href="edit_photos.php">Add more photos here...</a>
							<input class="btn-commenta" type="submit" name="submit" value="Upload" />
						</form>
					<?php }else{ ?>
						<span class="login100-form-title p-b-37">
							Save image</span>
							<img width="300px" height="300px" src="<?php echo $_SESSION['auth']->profile_img; ?>" width="20%">
							<br><br>
							<a href="edit_photo.php"><input type="submit" class="btn btn-primary" value="Change"></a>
							<a href="profile_editor.php"><input type="submit" class="btn btn-primary" value="Save"></a>
					<?php } ?>
				</div>
			</div>
		</div>
	</body>
</html>
