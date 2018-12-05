
<?php 
    if (session_status() == PHP_SESSION_NONE) { session_start(); }
    require '../settings/functions.php';
    iNotConnected();

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
    		<div class="button" onclick="location.href='edit_photos.php'">
      			BACK
    		</div>         
		</div>
		<?php require '../extensions/flash.php'; ?>
		<div class="container-login100" style="background-image: url('../images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
				<div style="position: relative; top: 15%; color: whitesmoke; z-index: 2;">
                    <?php if ($_GET['img'] == 1 ){?>
                        <span class="login100-form-title p-b-37">
                            Change image 1
                        </span>
                        <form class="login100-form validate-form" method="POST" action="../processes/edit_profile1.php" enctype="multipart/form-data">
                            <label style="color: red;" for="icone">Image (JPG | 5 Mb) :</label> 
                            <input type="hidden" name="MAX_FILE_SIZE" value="5242880" />
                            <input type="file" class="input100" accept="image/jpg" name="my_files" id="my_files" required /><br><br>
                            <input class="btn-commenta" type="submit" name="submit" value="Upload" />
                        </form>
                    <?php } if ($_GET['img'] == 2 ){?>
                        <span class="login100-form-title p-b-37">
                            Change image 2
                        </span>
                        <form class="login100-form validate-form" method="POST" action="../processes/edit_profile2.php" enctype="multipart/form-data">
                            <label style="color: red;" for="icone">Image (JPG | 5 Mb) :</label> 
                            <input type="hidden" name="MAX_FILE_SIZE" value="5242880" />
                            <input type="file" class="input100" accept="image/jpg" name="my_files" id="my_files" required /><br><br>
                            <input class="btn-commenta" type="submit" name="submit" value="Upload" />
                        </form>
                    <?php } if ($_GET['img'] == 3 ){?>
                        <span class="login100-form-title p-b-37">
                            Change image 3
                        </span>
                        <form class="login100-form validate-form" method="POST" action="../processes/edit_profile3.php" enctype="multipart/form-data">
                            <label style="color: red;" for="icone">Image (JPG | 5 Mb) :</label> 
                            <input type="hidden" name="MAX_FILE_SIZE" value="5242880" />
                            <input type="file" class="input100" accept="image/jpg" name="my_files" id="my_files" required /><br><br>
                            <input class="btn-commenta" type="submit" name="submit" value="Upload" />
                        </form>
                    <?php } if ($_GET['img'] == 4 ){?>
                        <span class="login100-form-title p-b-37">
                            Change image 4
                        </span>
                        <form class="login100-form validate-form" method="POST" action="../processes/edit_profile4.php" enctype="multipart/form-data">
                            <label style="color: red;" for="icone">Image (JPG | 5 Mb) :</label> 
                            <input type="hidden" name="MAX_FILE_SIZE" value="5242880" />
                            <input type="file" class="input100" accept="image/jpg" name="my_files" id="my_files" required /><br><br>
                            <input class="btn-commenta" type="submit" name="submit" value="Upload" />
                        </form>
                    <?php }?>
				</div>
			</div>
		</div>
	</body>
</html>
