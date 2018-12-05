<div id="header">
<div class="logo">
  <?php if (!isset($_SESSION['auth'])) { ?>
    
      <a href="index.php"> MAT_CHA</a>
    
  <?php }?>

  <?php if (isset($_SESSION['auth'])) { ?>
      <div class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Search by
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="extensions/filter_age.php">Age</a>
          <a class="dropdown-item" href="extensions/filter_local.php">Location</a>
          <a class="dropdown-item" href="extensions/filter_popu.php">Popularity</a>
          <a class="dropdown-item" href="extensions/filter_tags.php">Interest</a>
        </div>
      </div>
    <?php }?>
  </div>

  <?php if (isset($_SESSION['auth'])) { ?>
    <div class="button" onclick="location.href='logout.php'">
      logout
    </div>
    <div class="button" onclick="location.href='Matcha/profile.php'">
      Profile 
    </div>

    <div class="button" onclick="location.href='Matcha/chat.php'">
      Chat 
    </div>

    <div class="button" onclick="location.href='Matcha/account.php'">
      Account
    </div>

    <div class="button" onclick="location.href='Matcha/recommended.php'">
    For you
    </div>

    <div class="button">
      <div class="nav-item dropdown" style=" position: relative; top: 0px">
          <a href="Matcha/notifications.php" class="dropdown-toggle noti" data-toggle="dropdown">
            <span class="label label-pill label-danger count" style="border-radius:10px; color: green"></span> 
            <i class="fa fa-bell" aria-hidden="true" style="color: gold;"></i>  
          </a>
          <ul class="dropdown-menu notil" style="color: #1dd414;"></ul>
      </div>
    </div>
              
  <?php } else { ?>
    <div class="button" onclick="location.href='index.php'">
      Login
    </div>         
  <?php } ?>
</div>

