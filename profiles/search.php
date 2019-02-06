<?php require('../core/config.php'); 
	$title = 'Tacoma Film Alliance - Members';
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
      <div class="r75">

        <section class="homepage" id="ourMission">
          <h2><img src="../images/avatar.svg" alt="" /> Member profiles</h2>
          <div class="sectionContent">
            <div class="container">
                yada yada yada
            </div>
          </div>
        </section>
      </div>

      <div class="r25">
        <?php if($user->is_logged_in()) { 
            require('../layout/userNav.php');
          } else {
            require('../layout/genericArticle.php');
          }
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