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
                function load_unseen_notification(view = '')
                {
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
        <?php include('header.php') ?>
        <?php require '../extensions/flash.php'; ?>
        <div class="banner-home" style="background-image: url('../images/bg-01.jpg');">
            <div class="left-container">
                <div class="MainPhoto">
                    <img src="<?php echo $_SESSION['auth']->profile_img; ?>" width="80%" hieght="70%" title="profile_img" alt="profile_img">
                </div>
                <div class="OtherPhotos">
                    <?php if ($_SESSION['auth']->img1 != "../img/profile.png") {?>
                        <img src="<?php echo $_SESSION['auth']->img1; ?>" width="50%" title="img1" alt="img1">
                    <?php }?>
                    <?php if ($_SESSION['auth']->img2 != "../img/profile.png") {?>
                        <img src="<?php echo $_SESSION['auth']->img2; ?>" width="50%" title="img2" alt="img2">
                    <?php }?>
                    <?php if ($_SESSION['auth']->img3 != "../img/profile.png") {?>
                        <img src="<?php echo $_SESSION['auth']->img3; ?>" width="50%" title="img3" alt="img3">
                    <?php }?>
                    <?php if ($_SESSION['auth']->img4 != "../img/profile.png") {?>
                        <img src="<?php echo $_SESSION['auth']->img4; ?>" width="50%" title="img4" alt="img4">
                    <?php }?>
                </div>

            </div>

            <div class="middle-container">
                <h1>Profile of <?php echo $_SESSION['auth']->name ." - " .$_SESSION['auth']->age; ?>
                    <span style="font-size: 2vw; color: gold"><i class="fa fa-star" aria-hidden="true"></i><?php echo $_SESSION['auth']->popscore; ?></span>
                </h1>
                <div class="infos-container">
                    <?php if ($_SESSION['auth']->gender === "M") { ?>
                        <h4>
                            <span class="class">
                                Gender :
                            </span>
                            <span style="color: green;">
                                <?php echo $_SESSION['auth']->gender; ?>
                            </span>
                        </h4>
                    <?php }else{ ?>
                        <h4>
                            <span class="class">
                                Gender :
                            </span>
                            <span style="color: green;">
                                <?php echo $_SESSION['auth']->gender; ?>
                            </span>
                        </h4>
                    <?php } ?>

                    <?php if ($_SESSION['auth']->orientation === "F") { ?>
                        <h4>
                            <span class="class">
                                Interested in :
                            </span>
                            <span style="color: green;">
                                <?php echo $_SESSION['auth']->orientation; ?>
                            </span>
                        </h4>
                    <?php }else{ ?>
                        <h4>
                            <span class="class">
                                Interested in :
                            </span>
                            <span style="color: green;">
                                <?php echo $_SESSION['auth']->orientation; ?>
                            </span>
                        </h4>
                    <?php } ?>
                    <div class="wrap-input100 validate-input m-b-20">
                        <textarea class="input100" placeholder="Tell us something about you..." disabled><?php echo $_SESSION['auth']->bio ?></textarea>
                        <span class="focus-input100"></span>
                    </div>
                    <h4>
                        <span class="class">
                            Interest :
                        </span>
                        <span class="htag">
                            #
                        </span>
                        <span>
                            <?php echo $_SESSION['auth']->i1; ?>
                        </span>
                        <span class="htag">
                            #
                        </span>
                        <span>
                            <?php echo $_SESSION['auth']->i2; ?>
                        </span>
                        <span class="htag">
                            #
                        </span>
                        <span>
                            <?php echo $_SESSION['auth']->i3; ?>
                        </span>
                    </h4>
                    <a href="../extensions/profile_editor.php">
                        <input  type="submit2" class="btn btn-primary" name="EditPhoto" value="Edit Profile" >
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>