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
            <div class="storyComments">
              <div class="previousComments">
                  <div class="user_comment">
                    <div class="tfa_headshot" style="background: url(&quot;/sandbox/uploads/1545688437.jpg&quot;) 0% 0% / cover no-repeat;"></div>
                    <h4 class="user_comment_name">Shea VanLaningham <span class="byline">on Feb 2, 2019 at 11:26pm</span></h4>
                    <p class="user_comment_text">Hey, this is a new site!</p>
                  </div>
                  <div class="user_comment">
                    <div class="tfa_headshot" style="background: url(&quot;/sandbox/uploads/1545613775.jpg&quot;) 0% 0% / cover no-repeat;"></div>
                    <h4 class="user_comment_name">Tester Man <span class="byline">on Jan 30, 2019 at 7:48pm</span></h4>
                    <p class="user_comment_text">Don't pat yourself on the back too quickly...</p>
                  </div>
                  <div class="user_comment">
                    <div class="tfa_headshot" style="background: url(&quot;/sandbox/uploads/1545333073.jpeg&quot;) 0% 0% / cover no-repeat;"></div>
                    <h4 class="user_comment_name">Mr. Administrator <span class="byline">on Dec 24, 2018 at 07:43am</span></h4>
                    <p class="user_comment_text">Use it.  Click on it.  The new site still arrives.</p>
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