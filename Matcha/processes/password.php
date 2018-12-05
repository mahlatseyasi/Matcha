<?php

function reset_password($userMail) {
  include_once 'mail.php';

  try {
      $dbh = new PDO("mysql:host=localhost;dbname="."matcha", "root", "Mahlat73");
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $query= $dbh->prepare("SELECT id, username FROM users WHERE mail= ? AND `active status`= 1");
      $userMail = strtolower($userMail);
      $query->execute(array($userMail));

      $val = $query->fetch();
      if ($val == null) {
          $query->closeCursor();
          return (-1);
      }
      $query->closeCursor();

      $pass = uniqid('');
      $passEncrypt = password_hash($pass, PASSWORD_BCRYPT);

      $query= $dbh->prepare("UPDATE users SET password= ? WHERE mail= ?");
      $query->execute(array($passEncrypt, $userMail));
      $query->closeCursor();

      send_forget_mail($userMail, $val['username'], $pass);
      return (0);
    } catch (PDOException $e) {
      return ($e->getMessage());
    }
}

?>

