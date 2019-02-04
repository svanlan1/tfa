<?php require('../../core/config.php'); 
  //if($user->is_logged_in()){ header('Location: home.php'); exit(); }
  $title = 'Tacoma Film Alliance - Wait A Minute!';
  require('../../layout/commonHead.php');
?>
  <body>
    <?php if($user->is_logged_in()) { 
        require('../../layout/postNav.php');
      } else {
        require ('../../layout/preNav.php');
      } 
    ?>
    <link rel="stylesheet" href="aboutus.css" />
    <main>
      <div class="r80">

        <section class="homepage" id="ourMission">
          <h2 class="header"><img src="../../images/wam_winners_header.png" alt="" /></h2>
          <div class="sectionContent">
            <div class="half">
              Judges Award
            </div>
            <div class="half">
              Audience Award
            </div>
          </div>
        </section>
      </div>

      <div class="r20">
        <?php
          require('../../layout/userNav.php');
        ?> 
      </div>

    </main>
    <!-- JS -->
    <?php 
        require('../../layout/commonFooter.php');
        require('../../includes/commonScripts.php');
    ?>
  </body>
</html>