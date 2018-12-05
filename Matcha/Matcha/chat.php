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
    
		<script>

			$(document).ready(function(){ 
            	$("#search").autocomplete({source: "../extensions/search.php"});
			});	

			$(document).ready(function(){
				function load_unseen_notification(view = ''){
					$.ajax({
						url:"../extensions/fetch_noti.php",
						method:"POST",
						data:{view:view},
						dataType:"json",
						success:function(data){
							$('.notil').html(data.notification);
							if(data.unseen_notification > 0){
								$('.count').html(data.unseen_notification);
							}
						}
					});
				}
				load_unseen_notification('yes');
				$(document).on('click', '.noti', function(){
					$('.count').html(''); 
					load_unseen_notification('seen'); 
				});
				setInterval(function(){
					$('.count').html('');
					load_unseen_notification('yes');
				}, 2000);
			});
		</script>

	</head>
    <body>
		<?php include('header.php'); require '../settings/functions.php'; iNotConnected(); 
		 if ($_SESSION['auth']->name === "Unknown" || $_SESSION['auth']->age == 0 || $_SESSION['auth']->profile_img === "../img_/profile.jpg")
			 put_flash('info', "Please set your profile first.", "profile.php");
		 ?>
		<?php
			if (empty($_POST) && !isset($_POST['id']))
				$idu = 0;
			else
				$idu = $_POST['id'];
		?>
		<div class="banner-home" style="background-image: url('../images/bg-01.jpg');">
			<div class="container" style="position: relative; top: 5%; color: whitesmoke; z-index: 2; height: 70%; font-family: Arial">
				<div class="chatbox">
					<div class="contact_list">
						<?php include "../processes/contact.php"; ?>
					</div>
					<?php if (!empty($_POST)) { ?>
						<div class="chat_message_list">
							<div id="msg"></div><br>
						</div>
						<div class="chat_message_box">
							<input id="text" type="text" name="message" class="form-control" minlength="5" maxlength="70" placeholder="Type a message">
							<input id="send" type="submit" class="btn btn-primary" name="send" value="Send">
							<input id="cid" type="text" name="cid" style="display: hidden; border: 0; width: 0; height: 0; border-radius: 0; background-color: blue;" value="<?php echo $idu; ?>">
						</div>
					<?php } ?>
				</div>
			</div>
			<script>
	 			$(document).ready(function(){
	 				Load_external_content();
        			$("#send").click(function(){
        				var text = $("#text").val();
        				var cid = $("#cid").val();
						$.ajax({
                			url: '../processes/put_msg.php',
                			type: 'POST',
                			data: { id: cid, text:text },
                			success: function(data) {
                    			$("#text").val('');
                			}
            			});
        			});
				});
				function Load_external_content(){
					$.ajax({
						url: '../processes/messages.php',
						type: 'POST',
						data: { id: <?php echo $idu; ?> },
						success: function(data) {
							$("#msg").html(data);
						}
					});
				}
				setInterval('Load_external_content()', 1000);
			</script>
		</div>
	</body>
</html>