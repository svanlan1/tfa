<?php require('../core/config.php'); 
  //if($user->is_logged_in()){ header('Location: home.php'); exit(); }
  $title = 'Tacoma Film Alliance - Slingshot';
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
        <section class="homepage" id="ourMission">
          <h2><img src="../images/slingshot.svg" alt="" /> Contact Slingshot</h2>
          <div class="sectionContent" style="flex-flow: column;">
            <div class="storyBanner" style="background: url('https://scontent-sea1-1.xx.fbcdn.net/v/t1.0-9/42873591_2369448709738075_3615000486152765440_o.jpg?_nc_cat=104&_nc_ht=scontent-sea1-1.xx&oh=a94e661469682e25ad98cb0d09484052&oe=5CB2A962') 0px -300px / cover no-repeat;"></div>
            <div class="storySetup">
              <div class="lede">Want to learn more about Slingshot?  Just fill out the form below and a member will get back to you shortly.  We look forward to meeting you!</div>
            </div>
            <div class="storyContent">
              <p>
                <label for="fullname">Your name</label>
                <input type="text" id="fullname" aria-required="true" placeholder="Your full name" />
              </p>
              <p>
                <label for="emailAddress">Email address</label>
                <input type="email" id="emailAddress" aria-required="true" placeholder="you@youremailaddress.com" />
              </p>
              <p>
                <label for="message">Message</label>
                <textarea id="message" aria-required="true" placeholder="Send us a message..."></textarea>
              </p>
              <p>
                <button class="submit" id="sendSlingshotMessage">
                  <i class="material-icons">send</i>
                  Send
                </button>
              </p>
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