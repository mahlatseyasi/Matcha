<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>i_log</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">	
		<link rel="icon" type="image/png" href="./resources/images/icons/favicon.ico"/>
		<link rel="stylesheet" type="text/css" href="./resources/vendor/animate/animate.css">
		<link rel="stylesheet" type="text/css" href="./resources/vendor/css-hamburgers/hamburgers.min.css">
		<link rel="stylesheet" type="text/css" href="./resources/vendor/select2/select2.min.css">
		<link rel="stylesheet" type="text/css" href="./resources/vendor/daterangepicker/daterangepicker.css">
		<link rel="stylesheet" type="text/css" href="./resources/css/util.css">
		<link rel="stylesheet" type="text/css" href="./resources/css/main.css">
		<link rel="stylesheet" type="text/css" href="./resources/css/index.css">
		<link rel="stylesheet" type="text/css" href="./resources/css/style.css" >
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
			<?php include('extensions/header.php') ?>
			<?php require 'extensions/flash.php'; ?>
			<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
				<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
					<form class="login100-form validate-form" action="processes/forgot.php" method="POST">
						<span class="login100-form-title p-b-37">
							forgot password
						</span>

						<div class="wrap-input100 validate-input m-b-20" data-validate="Enter a valid email">
							<input class="input100" type="email" name="email" placeholder="email">
							<span class="focus-input100"></span>
						</div>
						
						<div class="container-login100-form-btn">
							<button class="login100-form-btn">
								send
							</button>
						</div>

					</form>	
				</div>
			</div>
		<?php include('forms/footer.php') ?>
	</body>
</html>
