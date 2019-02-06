<?php require('../../core/config.php'); 
	if(!$user->is_logged_in()){ header('Location: /sandbox/'); exit(); }
	$title = 'Tacoma Film Alliance - Messages';
	require('../../layout/commonHead.php');
?>
  <body>
    <?php if($user->is_logged_in()) { 
        require('../../layout/postNav.php');
      } else {
        require ('../../layout/preNav.php');
      } 
    ?>
    <main>
      <div class="r75">
        <section class="homepage" id="ourMission">
          <h2><img src="../../images/mail-white.svg" alt="" /> Messages</h2>
          <div class="sectionContent" style="flex-flow: columns;">
            <div class="container">
              User messages
            </div>
          </div>
        </section>
      </div>

      <div class="r25">
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