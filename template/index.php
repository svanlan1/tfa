<?php require('../core/config.php'); 
	//if($user->is_logged_in()){ header('Location: home.php'); exit(); }
	$title = 'Tacoma Film Alliance - [PAGENAME]';
	require('../layout/commonHead.php');
?>
  <body>
    <?php if($user->is_logged_in()) { 
        require('../layout/postNav.php');
      } else {
        require ('../layout/preNav.php');
      } 
    ?>
    <link rel="stylesheet" href="aboutus.css" />
    <main>
      <div class="r75">

        <section class="homepage" id="ourMission">
          <h2><img src="../../images/mail.svg" alt="" /> [MAIN HEAD]</h2>
          <div class="sectionContent" style="flex-flow: column;">
            <div class="container">

            </div>
          </div>
        </section>
      </div>

      <div class="r25">
        <?php
          if($user->is_logged_in()) {
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