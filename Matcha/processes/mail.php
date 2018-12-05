<?php

function send_verification_email($toAddr, $toUsername, $token, $ip) {
  $subject = "[Mat_cha] - Email verification";

  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
  $headers .= 'From: <mkhoza@student.wethinkcode.co.za>' . "\r\n";

  $message = '
  <html>
    <head>
      <title>' . $subject . '</title>
    </head>
    <body>
      Hello ' . htmlspecialchars($toUsername) . ' </br>
      Finish your registration by clicking the link below </br>
      <a href="http://' . $ip . '/processes/confirm.php?token=' . $token . '">Verify my email</a>
    </body>
  </html>
  ';

  mail($toAddr, $subject, $message, $headers);
}

function send_forget_mail($toAddr, $toUsername, $password) {
  $subject = "[Mat_cha] - Reset your password";

  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
  $headers .= 'From: <mkhoza@student.wethinkcode.co.za>' . "\r\n";

  $message = '
  <html>
    <head>
      <title>' . $subject . '</title>
    </head>
    <body>
      Hello ' . htmlspecialchars($toUsername) . ' </br>
      There is your new password : ' . $password . ' </br>
    </body>
  </html>
  ';

  mail($toAddr, $subject, $message, $headers);
}

function send_comment_mail($toAddr, $toUsername, $comment, $fromUsername, $img, $ip) {
  $subject = "[Mat_cha] - New comment";

  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
  $headers .= 'From: <mkhoza@student.wethinkcode.co.za>' . "\r\n";

  $message = '
  <html>
    <head>
      <title>' . $subject . '</title>
    </head>
    <body>
      Hello ' . htmlspecialchars($toUsername) . ' </br>
      A user just commented one of your camagru</br>
      <span>' . htmlspecialchars($fromUsername) . ': ' . htmlspecialchars($comment) . '</span>
      Login to see whats happening 
    </body>
  </html>
  ';

  mail($toAddr, $subject, $message, $headers);
}
?>
