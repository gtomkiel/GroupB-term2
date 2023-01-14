<header>
   <div class="nav-wrapper">
      <div>
         <a href="/"><img src="/src/img/logo.png" title="logo" alt="logo"></a>
      </div>
      
      <div class="navigation">
         <a href="/aboutUs.php" class="style">About us</a>
         <a href="/events.php" class="style">Events</a>
         <?php

         if(isset($_SESSION)) {
            echo '<a href="/" id="button" class="style">Logout</a>';
         } else {
            echo '<a href="/login/" id="button" class="style">Login</a>';
         }

         ?>
      </div>
   </div>
</header>
