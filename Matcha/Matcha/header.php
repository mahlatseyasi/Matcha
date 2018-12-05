<div id="header">
  <div class="logo">
    <a href="../index.php"> MAT_CHA</a>
  </div>

  <?php if (isset($_SESSION['auth'])) { ?>
    <div class="button" onclick="location.href='../logout.php'">
        logout
    </div>

    <div class="button" onclick="location.href='profile.php'">
      Profile 
    </div>

    <div class="button" onclick="location.href='chat.php'">
      Chat 
    </div>

    <div class="button" onclick="location.href='account.php'">
      Account
    </div>

    <div class="button" onclick="location.href='recommended.php'">
      For you
    </div>

    <div class="button">
      <div class="nav-item dropdown" style=" position: relative; top: 0px">
          <a href="#" class="dropdown-toggle noti" data-toggle="dropdown">
            <span class="label label-pill label-danger count" style="border-radius:10px; color: green"></span> 
            <i class="fa fa-bell" aria-hidden="true" style="color: gold;"></i>  
          </a>
        <ul class="dropdown-menu notil" style="color: #1dd414;"></ul>
      </div>
    </div>
                
  <?php } else { ?>
    <div class="button" onclick="location.href='../index.php'">
      Login
    </div>         
    <?php } ?>
</div>

