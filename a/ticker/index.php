<?php require('../../core/config.php'); 
	//if($user->is_logged_in()){ header('Location: home.php'); exit(); }
	$title = 'Tacoma Film Alliance - Update ticker';
	require('../../layout/commonHead.php');
?>
  <body>
    <?php require('../../layout/adminNav.php'); ?>
    <link rel="stylesheet" href="aboutus.css" />
    <main>
      <div class="r75">

        <section class="homepage" id="ourMission">
          <h2><img src="../../images/ticker.svg" alt="" /> Update ticker</h2>
          <div class="sectionContent" style="flex-flow: column;">
            <div class="container">
              <p>
                The text that you enter here will display on both the pre and post login homepage.  Please double check that the text you enter is <strong>exactly</strong> what you want it to say.
              </p>
              <p>As you type, watch the ticker at the top of the screen.  It will be a live preview of what everyone will see once you click "Update".</p>
              <div class="row">
                <label for="ticker">New ticker text</label>
                <textarea id="ticker" maxlength="78" placeholder="This exact text will display in the ticker"></textarea>
              </div>
              <div class="row">
                <button class="add" id="updateTicker">
                  <i class="material-icons">send</i>
                  Update
                </button>
              </div>
              <div class="row">
                <h3>Previous tickers</h3>
                <ul id="prevticks"></ul>
              </div>
            </div>
          </div>
        </section>
      </div>

      <div class="r25">
        <?php
          if($user->is_logged_in()) {
            require('../../layout/adminUserNav.php');
          } else {
            require('../../layout/genericArticle.php');
          }
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