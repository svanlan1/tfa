<?php require('../../core/config.php'); 
	//if($user->is_logged_in()){ header('Location: home.php'); exit(); }
	$title = 'Tacoma Film Alliance - Newsfeed';
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
          <h2><img src="../../images/rss-symbol.svg" alt="" /> Newsfeed</h2>
          <div class="sectionContent">
            <div class="actionBar">
              <button class="rounded addPost">
                <i class="material-icons">add</i>
              </button>
            </div>
            <div class="storyComments">
              <div class="previousComments">
                  <div class="user_comment" style="display:none;">
                    <div class="tfa_headshot" style="background: url('') 0% 0% / cover no-repeat;"></div>
                    <h4 class="user_comment_name"><a href="javascript:;"><span class="hname"></span></a></h4>
                    <p class="user_comment_text">
                      <span class="htext"></span>
                      <span class="byline"></span>
                    </p>
                  </div>
                </div>
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