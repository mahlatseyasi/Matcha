<?php
    session_start();
    require '../settings/functions.php'; iNotConnected();
    
    if (empty($_GET))
        put_flash('danger', "Error : Invalid values.", "../index.php");
    if (!isset($_GET['id']))
        put_flash('danger', "Error : Invalid values.", "../index.php");
    if (!is_numeric($_GET['id']))
        put_flash('danger', "Error : Invalid values.", "../index.php");

    require '../settings/database.php';
    $req = $pdo->prepare('SELECT * FROM users WHERE id = ?');
    $req->execute([intval($_GET['id'])]);

    if (!$userinfo = $req->fetch())
        put_flash('danger', "Invalid user.", "../index.php");

    if (is_blocked($_SESSION['auth']->id, $userinfo->id))
      put_flash('danger', "You've blocked this user.", "../index.php");

    if ($userinfo->id != $_SESSION['auth']->id)
    {
        if ($userinfo->reported)
            put_flash('danger', "Can't access reported user info.", "../index.php");
        $req = $pdo->query('UPDATE users SET popscore = popscore + 1 WHERE id =' .intval($userinfo->id));

      if (!is_blocked($userinfo->id, $_SESSION['auth']->id))
            $req = $pdo->prepare("INSERT INTO notifications SET emitter = ?, receiver = ?, text = ?");
        $req->execute([$_SESSION['auth']->id, $userinfo->id,"visited your profile."]);
    }

    $req = $pdo->prepare("SELECT * FROM likes WHERE emitter = ? AND receiver = ?");
    $req->execute([$_SESSION['auth']->id, $userinfo->id]);

    $clike = 1;
    if ($req->rowCount() > 0)
        $clike = 0;

    $req = $pdo->prepare("SELECT * FROM likes WHERE receiver = ? AND emitter = ?");
    $req->execute([$_SESSION['auth']->id, $userinfo->id]);

    $likedu = 0;
    if ($req->rowCount() > 0)
        $likedu = 1;

    $to_time = strtotime(date("Y-m-d H:i:s"));
    $from_time = strtotime($userinfo->lastonline);
    $elapsed = round(abs($to_time - $from_time) / 60,2);
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
    
        <script type="text/javascript">
            $(document).ready(function(){
                $("#btnlike").click(function(){
                    $.ajax({
                        url: '../processes/like.php',
                        type: 'POST',
                        data: { like: <?php echo $userinfo->id; ?> },
                        success: function(data) {
                            $("#btnlike").hide();
                        }
                    });
                });
                $("#btnunlike").click(function(){
                    $.ajax({
                        url: '../processes/unlike.php',
                        type: 'POST',
                        data: { like: <?php echo $userinfo->id; ?> },
                        success: function(data) {
                            location.reload();
                        }
                    });
                });
                $("#blockbtn").click(function(){
                    $.ajax({
                        url: '../processes/block.php',
                        type: 'POST',
                        data: { id: <?php echo $userinfo->id; ?> },
                        success: function(data) {
                            $("#blockbtn").hide();
                            document.location.href = '../index.php';
                        }
                    });
                });
                $("#reportbtn").click(function(){
                    $.ajax({
                        url: '../processes/report.php',
                        type: 'POST',
                        data: { id: <?php echo $userinfo->id; ?> },
                        success: function(data) {
                            $("#reportbtn").hide();
                        }
                    });
                });
            });
        </script>
    </head>
    <body>
        <?php require 'header.php';?> 
        <div class="banner-home" style="background-image: url('../images/bg-01.jpg');">
            <div class="left-container">
                <div class="MainPhoto">
                    <?php if ($userinfo->id != $_SESSION['auth']->id && $likedu && $clike && $userinfo->profile_img !== "../img_/profile.jpg") { ?>
                        <div class="container-login100-form-btn">
					        <button id="btnlike" class="login100-form-btn" type="submit" name="like" value="<?php echo $userinfo->id; ?>"  >
						        Like back
					        </button>
				        </div>
                    <?php } ?>

                    <?php if ($userinfo->id != $_SESSION['auth']->id && $clike && !$likedu && $userinfo->profile_img !== "../img_/profile.jpg") { ?>
                        <button id="btnlike" class="login100-form-btn" type="submit" name="like" value="<?php echo $userinfo->id; ?>"  >
						    Like
					    </button>
                    <?php } ?>

                    <?php if ($userinfo->id != $_SESSION['auth']->id && !$clike && $userinfo->profile_img !== "../img_/profile.jpg") { ?>
                        <button id="btnunlike" class="login100-form-btn" type="submit" name="btnunlike" value="<?php echo $userinfo->id; ?>"  >
						    unlike
					    </button>
                    <?php } ?>
                    
                    <img src="<?php echo $userinfo->profile_img; ?>" width="100%" title="profile_img" alt="profile_img">

                    <div class="OtherPhotos">
                        <?php if ($userinfo->img1 != "../img/profile.png") {?>
                            <img src="<?php echo $userinfo->img1; ?>" width="50%" title="img1" alt="img1">
                        <?php }?>
                        <?php if ($userinfo->img2 != "../img/profile.png") {?>
                            <img src="<?php echo $userinfo->img2; ?>" width="50%" title="img2" alt="img2">
                        <?php }?>
                        <?php if ($userinfo->img3 != "../img/profile.png") {?>
                            <img src="<?php echo $userinfo->img3; ?>" width="50%" title="img3" alt="img3">
                        <?php }?>
                        <?php if ($userinfo->img4 != "../img/profile.png") {?>
                            <img src="<?php echo $userinfo->img4; ?>" width="50%" title="img4" alt="img4">
                        <?php }?>
                    </div>
         
                    <?php if ($userinfo->id != $_SESSION['auth']->id) { ?>
                        <button id="blockbtn" class="login100-form-btn" type="submit" name="blockbtn" value="<?php echo $userinfo->id; ?>"  >
						    block
					    </button>
                        <button id="reportbtn" class="login100-form-btn" type="submit" name="blockbtn" value="<?php echo $userinfo->id; ?>"  >
						    report
					    </button>
                    <?php } ?>

                    <?php if ($elapsed > 15){ ?>
                        <small><em>Last online : <?php echo $userinfo->lastonline; ?></em></small>
                    <?php }else{ ?>    
                        <small><em>Online</em></small>
                     <?php } ?>
                </div>
            </div>
            <br><br><br>
            <div class="middle-container">
                <h1>Profile of <?php echo $userinfo->name ." - " .$userinfo->age; ?>
                    <span style="font-size: 2vw; color: gold">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <?php echo $userinfo->popscore; ?>
                    </span>
                </h1>
                <div class="infos-container">
                    <?php if ($userinfo->gender === "M") { ?>
                        <h4>
                            <span class="class">
                                Gender :
                            </span>
                            <span style="color: green;">
                                <?php echo $userinfo->gender; ?>
                            </span>
                        </h4>
                    <?php }else{ ?>
                        <h4>
                            <span class="class">
                                Gender :
                            </span> 
                            <span style="color: green;">
                                <?php echo $userinfo->gender; ?>
                                </span>
                            </h4>
                    <?php } ?>
                    <br>
                    <?php if ($userinfo->orientation === "F") { ?>
                        <h4>
                            <span class="class">
                                Interested by :
                            </span> 
                            <span style="color: green;">
                                <?php echo $userinfo->orientation; ?>
                            </span>
                        </h4>
                    <?php }else{ ?>
                        <h4>
                            <span class="class">
                                Interested by :
                            </span> 
                            <span style="color: green;">
                                <?php echo $userinfo->orientation; ?>
                            </span>
                        </h4>
                    <?php } ?>
                    <br>
                    <h4><span class="class">Bio :</span></h4>
                    <div class="wrap-input100 validate-input m-b-20">
                        <textarea class="input100" disabled><?php echo $userinfo->bio ?></textarea>
                        <span class="focus-input100"></span>
                    </div>
                    <br>
                    <h4>
                        <span class="class">
                            Interest :
                        </span>
                        <span class="htag">
                            #
                        </span>
                        <span>
                            <?php echo $userinfo->i1; ?>
                        </span>
                        <span class="htag">
                            #
                        </span>
                        <span>
                            <?php echo $userinfo->i2; ?>
                        </span>
                        <span class="htag">
                            #
                        </span>
                        <span>
                            <?php echo $userinfo->i3; ?>
                        </span>
                    </h4>
                </div>
            </div>
        </div>
    </body>
</html>