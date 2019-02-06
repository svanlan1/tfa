<?php require('../../core/config.php'); 
  //if($user->is_logged_in()){ header('Location: home.php'); exit(); }
  $title = 'Tacoma Film Alliance - Submit feedback';
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
      <div class="r80">
        <section class="homepage" id="ourMission">
          <h2><img src="../../images/customer-review.svg" alt="" /> Submit feedback</h2>
          <div class="sectionContent" style="flex-flow: column;">
            <div class="storyBanner" style="background: url('https://scontent-sea1-1.xx.fbcdn.net/v/t1.15752-9/s2048x2048/41949913_1571580419654945_2250675713369702400_n.jpg?_nc_cat=101&_nc_ht=scontent-sea1-1.xx&oh=451815318e0d244531c9d7d47a332498&oe=5CB2B545') 0px -200px / cover no-repeat;"></div>
            <div class="storySetup">
              <div class="lede">Any feedback you want to submit is great!</div>
            </div>
            <div class="storyContent">
              <p>
                <label for="message">Your feedback</label>
                <textarea id="message" aria-required="true" placeholder="Send us a message..."></textarea>
              </p>
              <p>
                <input type="checkbox" id="anonymous" style="display: inline-block;" />
                <label for="anonymous" style="display: inline-block;">Do you want this feedback to be anonymous? </label>
                <br />
                <span style="padding-left: 25px; font-size: .8rem;" class="instructions">Don't worry, it's really anonymous</span>
              </p>
              <p>
                <button class="submit" id="sendFeedback">
                  <i class="material-icons">send</i>
                  Submit
                </button>
              </p>
            </div>
          </div>
        </section>
      </div>

      <div class="r20">
        <?php if($user->is_logged_in()) { 
            require('../../layout/userNav.php');
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