<?php
	if (session_status() == PHP_SESSION_NONE) { session_start(); }
    require '../settings/functions.php';
	iNotConnected();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Mat_cha</title>
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
    
		<script>
       		$(document).ready(function(){ 
        		$("#seed_one").autocomplete({source: "../processes/tags.php"}); 
        		$("#seed_two").autocomplete({source: "../processes/tags.php"}); 
        		$("#seed_three").autocomplete({source: "../processes/tags.php"}); 
        	});
			function letterOnly(input)
			{
				var regex = /[^a-z]/gi;
				input.value = input.value.replace(regex, "");
			}
		</script>
	</head>
	<body>
		<div id="header">
  			<div class="logo">
    			<a href="../index.php"> MAT_CHA</a>
  			</div>
    		<div class="button" onclick="location.href='../Matcha/profile.php'">
      			BACK
    		</div>         
		</div>
		<?php require '../extensions/flash.php'; ?>
		<div class="container-login100" style="background-image: url('../images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
				<form class="login100-form validate-form" action="../processes/profile_editor.php" method="POST">
					
					<img src="<?php echo $_SESSION['auth']->profile_img; ?>" width="100%" title="profile_img" alt="profile_img">
						<a href="edit_photo.php">Update profile photo here...</a>
				
					<div class="wrap-input100 validate-input m-b-20" data-validate="Enter your name">
						<input type="text" class="input100" name="name" placeholder="Username" value="<?php echo $_SESSION['auth']->name ?>" onkeyup="letterOnly(this)" required>
						<span class="focus-input100"></span>
					</div>
			
					<div class="wrap-input100 validate-input m-b-20" data-validate="Put in your age">
						<input type="number" class="input100" min="18" max="99" name="age" placeholder="Age" value="<?php echo $_SESSION['auth']->age ?>" required>
						<span class="focus-input100"></span>
					</div>

					<div class="form-group">	
						<label for="gender">Gender : </label>
						<p>
							<?php if ($_SESSION['auth']->gender === "M") { ?>
								<input type="radio" name="gender" value="M" checked>M
							<?php }else{ ?>
								<input type="radio" name="gender" value="M">M
							<?php } ?>

							<?php if ($_SESSION['auth']->gender === "F") { ?>
								<input type="radio" name="gender" value="F" checked>F
							<?php }else{ ?>
								<input type="radio" name="gender" value="F">F
							<?php } ?>
							</p>
					</div>
					
					<div class="form-group">
						<label for="orientation">Your Preference :</label>
						<p>
							<?php if ($_SESSION['auth']->orientation === "M") { ?>
								<input type="radio" name="orientation" value="M" checked>M
							<?php }else{ ?>
								<input type="radio" name="orientation" value="M">M
							<?php } ?>
					
							<?php if ($_SESSION['auth']->orientation === "F") { ?>
								<input type="radio" name="orientation" value="F" checked>F
							<?php }else{ ?>
								<input type="radio" name="orientation" value="F">F
							<?php } ?>

							<?php if ($_SESSION['auth']->orientation === "M-F") { ?>
								<input type="radio" name="orientation" value="M-F" checked>M/F
							<?php }else{ ?>
								<input type="radio" name="orientation" value="M-F">M/F
							<?php } ?>
						</p>
					</div>
					
					<div class="wrap-input100 validate-input m-b-20">
						<input type="textarea" class="input100" name="bio" maxlength="255" placeholder="Write something about yourself..." value="<?php echo $_SESSION['auth']->bio ?>">
						<span class="focus-input100"></span>
					</div>

					<div class="form-group">
						<label>Your interests :  </label><span >e.g Poerty, music</span><br>
						<p style="color: black!important">
							<input minlength="2" type="text" class="wrap-input100 validate-input m-b-20" id="seed_one" name="i1" placeholder="interest 1" value="<?php echo $_SESSION['auth']->i1; ?>" onkeyup="letterOnly(this)">
							<input minlength="2" type="text" class="wrap-input100 validate-input m-b-20" id="seed_two" name="i2" placeholder="interest 2" value="<?php echo $_SESSION['auth']->i2; ?>" onkeyup="letterOnly(this)">
							<input minlength="2" type="text"class="wrap-input100 validate-input m-b-20" id="seed_three" name="i3" placeholder="interest 3" value="<?php echo $_SESSION['auth']->i3; ?>" onkeyup="letterOnly(this)">
							<span class="focus-input100"></span>
						</p>
					</div>
					
		        	<div class="form-group">
		        		<input type="submit" class="btn btn-primary" name="submit" value="Update">
		        	</div>
				</form>
			</div>
		</div>
	</body>
</html>