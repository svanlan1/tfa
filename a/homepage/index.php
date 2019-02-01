<?php require('../../core/config.php'); 
  if(!$user->is_logged_in()){ header('Location: index.php'); exit(); }
  if(!$user->isAdmin($_SESSION['admin']) ) { header('Location: ../index.php'); exit(); };
  $title = 'Tacoma Film Alliance - Administration - Homepage';
  require('../../layout/commonHead.php');
?>
  <body>
    <?php require('../../layout/adminNav.php'); ?>
    <main>
      <div class="r80">
        <section class="homepage" id="filmSpotlight">
          <h2><img src="../../images/content.svg" alt="" /> Homepage posts</h2>
          <div class="sectionContent">
            <div class="clone_me">
              <div class="post_title">
                <h3></h3>
              </div>
              <div class="post_info">
                <div class="byline"></div>
                <div class="postinfostuff">
                <span></span>  
                <div></div>
                </div>
              </div>
              <div class="post_actions">
                <button class="button view">View</button>
                <button class="button cancel">Remove</button>
              </div>
              <div class="background_banner"></div>
            </div>
          </div>
        </section>

      </div>
      <div class="r20">
        <?php require('../../layout/adminUserNav.php'); ?>
      </div>
    </main>






    <!-- JS -->
    <?php 
        require('../../layout/commonFooter.php');
        require('../../includes/commonScripts.php');
    ?>
  </body>
</html>
