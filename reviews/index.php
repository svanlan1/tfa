<?php require('../core/config.php'); 
	//if($user->is_logged_in()){ header('Location: home.php'); exit(); }
	$title = 'Tacoma Film Alliance - Film Court';
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

        <section class="homepage" id="filmSpotlight">
          <h2><img src="/sandbox/images/spotlight.svg" alt="" /> Spotlight</h2>
          <div class="sectionContent">
            <div class="banner">
              <img src="https://cdn.vox-cdn.com/thumbor/iXlaC9fjNJ0XBV3t7_qNLBKBol8=/148x0:1768x1215/1200x800/filters:focal(148x0:1768x1215)/cdn.vox-cdn.com/uploads/chorus_image/image/46650366/bttf.0.0.png" alt="homepage banner" />
            </div>
            <div class="article">
              <h3>Back to the Future</h3>
              <div class="byline">
                by Mike West on Dec. 16th, 2018
              </div>
              <div class="actions">
                <span class="commentsDisplay">
                  <span class="commentsDisplay_number">12</span><br />comments</span>
                <span style="padding-top: 5px;">
                  <button class="facebook">
                    <i class="material-icons">thumb_up_alt</i> Like
                  </button>
                </span>
                <span style="padding-top: 5px;">
                  <button class="twitter">
                    <img src="../images/twitter.svg" alt="" /> Tweet</button>
                </span>
              </div>
              <div class="verdict">
                <h3><img src="/sandbox/images/justice.svg" alt="" /> Verdict <span class="innocent"> INNOCENT</span></h3>
              </div>
              <p>
              Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
            </div>
          </div>
        </section>
      </div>

      <div class="r20">
        <section>
          <h2 style="font-size: 1.5rem; padding: 5px;"><img src="../../images/notepad.svg" alt="" /> Previously featured reviews</h2>
          <div class="sectionContent">
            <ul class="eventList">
              <li>
                <h3>Lord of the rings</h3>
                <span class="instructions">by Shea VanLaningham</span>
                <p>
                  blah blah blah
                </p>
              </li>
            </ul>
          </div>
        </section>
      </div>

    </main>
    <!-- JS -->
    <?php 
        require('../layout/commonFooter.php');
        require('../includes/commonScripts.php');
    ?>
  </body>
</html>