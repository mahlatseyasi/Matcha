<?php
session_start();

include 'password.php';
require '../settings/functions.php';


// retreive values
$mail = $_POST['email'];
echo $mail;

if (($res = reset_password($mail)) !== 0) {
  echo $mail;

  if ($res == -1) {
		put_flash('danger', "Email not found", "../forgot.php");
  } else {
		put_flash('danger', "Internal error", "../forgot.php");
  }
} else {
  put_flash('success', "Password sent to mail.", "../forgot.php");
}
put_flash('success', "Password sent to mail.", "../forgot.php");

?>
