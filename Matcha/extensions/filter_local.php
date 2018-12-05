<?php
	if (session_status() == PHP_SESSION_NONE) { session_start(); }
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
		<?php require '../settings/functions.php'; iNotConnected(); 
    		if ($_SESSION['auth']->name === "Unknown" || $_SESSION['auth']->age == 0 || $_SESSION['auth']->profile_img === "../img_/profile.jpg")
        		put_flash('info', "Please set your profile first.", "../Matcha/profile.php");
		?>
		<div id="header">
  			<div class="logo">
    			<a href="../index.php"> MAT_CHA</a>
  			</div>
    		<div class="button" onclick="location.href='../index.php'">
      			BACK
    		</div>         
		</div>
		<div class="banner-home" style="background-image: url('../images/bg-01.jpg');"> 
			<div class="container" style="position: relative; top: 1%; height: 80%; color: whitesmoke; z-index: 2; overflow-y: scroll;">
				<?php
					require '../settings/database.php';
					$ulati = floatval($_SESSION['auth']->lati);
					$ulongi = floatval($_SESSION['auth']->longi);
					if ($_SESSION['auth']->orientation !== "M" && $_SESSION['auth']->orientation !== "F")
					{
						$req = $pdo->query("SELECT * FROM users WHERE reported = 0
						ORDER BY ((lati-$ulati)*(lati-$ulati)) + ((longi - $ulongi)*(longi - $ulongi)) ASC, popscore DESC");	
					}
					else
					{
						$req = $pdo->prepare("SELECT * FROM users WHERE gender = ? AND reported = 0  
						ORDER BY ((lati-$ulati)*(lati-$ulati)) + ((longi - $ulongi)*(longi - $ulongi)) ASC, popscore DESC");
						$req->execute([$_SESSION['auth']->orientation]);
					}
					$res = $req->fetchall();
					foreach ($res as $currentUser) {
						$number = getDistance($currentUser->lati, $currentUser->longi);
						$number = number_format($number, 2, ',', ' ');
						if ($number < 1.00)
							$local = "In your city";
						else if ($number < 10.00)
							$local = $number ." km away.";
						else
							$local = "Far Away.";
						$blocked = 0;
						if (is_blocked($_SESSION['auth']->id, $currentUser->id))
							$blocked = 1;
						if ($_SESSION['auth']->id != $currentUser->id && !$blocked && ($currentUser->orientation === $_SESSION['auth']->gender || $currentUser->orientation === "M-F")){ ?>
							<a href="../Matcha/uprofile.php?id=<?php echo $currentUser->id; ?>"  style="color: whitesmoke;">
								<div class="profile-box">
									<h1 class="profile-box-h1"><?php echo $currentUser->name; ?> - <span><?php echo $currentUser->age; ?></span></h1>
									<h2 class="profile-box-h2"><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo $local; ?></h2>
									<h2 class="profile-box-h2-pts" style="color: gold;"><i class="fa fa-star" aria-hidden="true"></i><?php echo $currentUser->popscore; ?></h2>
									<img width="150px" src="<?php echo $currentUser->profile_img; ?>" height="80%">
								</div>
								<br>
							</a>
						<?php 
						} 
					}
				?>
			</div>
    	</div>
	</body>
</html>