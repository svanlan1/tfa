<?php require('../core/config.php'); 
	//if($user->is_logged_in()){ header('Location: home.php'); exit(); }
	$title = '- Tacoma Film Alliance';
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

        <section class="homepage" id="currentStory">
          <h2><img src="../images/newspaper.svg" alt="" /><span></span></h2>
          <div class="sectionContent" style="flex-flow: column;">
            <div class="storyBanner"></div>
            <div class="storySetup">
              <span class="byline"></span>
              <div class="lede"></div>
            </div>
            <div class="storyContent"></div>
            <div class="storyComments">
              <h3>Comments</h3>
              <div class="addComment">
                <?php if($user->is_logged_in()) { 
                    require('../layout/addComments.php');
                  } else {
                    require('../layout/sorryNoComment.php');
                  }
                ?>                
              </div>
              <div class="previousComments"></div>
            </div>
          </div>
        </section>
      </div>

      <div class="r20">
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