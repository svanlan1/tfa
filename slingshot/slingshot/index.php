<?php require('../../core/config.php'); 
  //if($user->is_logged_in()){ header('Location: home.php'); exit(); }
  $title = 'Tacoma Film Alliance - Slingshot';
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
          <h2><img src="../../images/slingshot.svg" alt="" /> Slingshot</h2>
          <div class="sectionContent">

          </div>
        </section>
      </div>

      <div class="r20">
        <article id="slingshot_actions">
          <h3><i class="material-icons red" style="vertical-align: sub;">error_outline</i> Actions</h3>
          <div class="full">
            <button class="addScript">
              <i class="material-icons">
                publish
              </i>
              Upload a script
            </button>
          </div>          
        </article>
        <?php require('../../layout/userNav.php'); ?>
      </div>

    </main>
    <!-- JS -->
    <?php 
        require('../../layout/commonFooter.php');
        require('../../includes/commonScripts.php');
    ?>
  </body>
</html>