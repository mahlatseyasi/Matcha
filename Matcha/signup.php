<!DOCTYPE html>
<html lang="en">
	<head>
		<title>i_reg</title>
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
		
		<script type="text/javascript">
			function val(){
				var a = document.getElementById("password").value;
				var b = document.getElementById("passwordr").value;
				var c = document.reg.email.value;
				if(a.length < 8)
				{
					document.getElementById("span_1").innerHTML="Minimum value password is 8";
					return false;
				}
				if(!a.match(/[a-zA-Z0-9][%$@!#^*()]+/))
				{
					document.getElementById("span_1").innerHTML="Your password should include atleast one special character, one lowercase or uppercase";
					return false;
				}
				if (a != b)
				{
					document.getElementById("span_1").innerHTML="Passwords don't match";
					return false;
				}
				if (c.indexOf('@') <= 0){
					document.getElementById("span_1").innerHTML="Invalid email";
					return false;
				}
				if ((c.charAt(c.length-4) != '.') && (c.charAt(c.length-3) != '.')){
					document.getElementById("span_1").innerHTML="Invalid email";
					return false;
				}
				return true;
			}
			function letterOnly(input)
			{
				var regex = /[^a-z]/gi;
				input.value = input.value.replace(regex, "");
			}
		</script>
	</head>
	<body>
		<?php include('extensions/header.php') ?>
		<?php require 'extensions/flash.php'; ?>
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
				<form name ="reg" class="login100-form validate-form" action="processes/register_user.php" method="POST" autocomplete="on">
					<span class="login100-form-title p-b-37">
						Sign Up
					</span>

					<div class="wrap-input100 validate-input m-b-20" data-validate="Enter username">
						<input class="input100" type="text" name="username" id="username" placeholder="username" onkeyup="letterOnly(this)"/>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-20" data-validate="Enter a valid email">
						<input class="input100" type="email" name="email" id="Email" placeholder="email">
						<span class="focus-input100"></span>
					</div>


					<div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password">
						<input class="input100" type="password" id="password" name="password"  placeholder="password">
						<span class="focus-input100"></span>
					</div>					

					<div class="wrap-input100 validate-input m-b-20" data-validate="Repeat password">
						<input class="input100" type="password" name="passwordr" id="passwordr" placeholder="repeat password">                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						<input type="submit" value="Submit" class="login100-form-btn" onclick=" return val()">
					</div>

					<div class="text-center p-t-57 p-b-20">
         			<span class="txt1" style="color:red" id="span_1">
           				
            		
					</span>
				</div>

				</form>
			</div>
		</div>
		<?php include('extensions/footer.php') ?>

	</body>
</html>