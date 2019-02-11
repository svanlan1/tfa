<?php require('../core/config.php'); 
  //if($user->is_logged_in()){ header('Location: home.php'); exit(); }
  $title = 'Tacoma Film Alliance - Film Court';
  require('../layout/commonHead.php');
?>
  <body>
    <?php if($user->is_logged_in()) { 
        require('../layout/postNav.php');
      } else {
        require ('../layout/preNav.php');
      } 
    ?>
    <main>
      <div class="r80">

        <section class="homepage" id="ourMission">
          <h2><img src="../images/gavel.svg" alt="" /> Film Court <span class="instructions">Fiat justitia ruat caelum</span></h2>
          <div class="sectionContent">
            <h3>Most recent reviews</h3>
            <ul></ul>
          </div>
        </section>
      </div>

      <div class="r20">
        <?php
          require('../layout/userNav.php');
        ?>
      </div>

    </main>
    <!-- JS -->
    <?php 
        require('../layout/commonFooter.php');
        require('../includes/commonScripts.php');
    ?>
  </body>
</html>