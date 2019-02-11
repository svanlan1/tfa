<?php require('../core/config.php'); 
	//if($user->is_logged_in()){ header('Location: home.php'); exit(); }
	$title = 'Tacoma Film Alliance - Accessibility';
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

        <section class="homepage" id="ourMission">
          <h2><img src="../images/accessibility.svg" alt="" /> Accessibility</h2>
          <div class="sectionContent" style="flex-flow: column;">
            <div class="container">
              <h3>Our accessibility committment</h3>
              <p>At the Tacoma Film Alliance, we are dedicated to facilitating any person who wishes to use our website or join our community.  On the web we are committed to providing an accessible experience for any and all users.  We follow the Web Content Accessibility Guidelines (WCAG 2.1 AA) and use the Accessible Rich Internet Applications (ARIA 1.1) specification</p>
              <h3>We want your feedback!</h3>
              <p>If you come across anything on this site that you find to be inaccessible, please <a href="/sandbox/contact/?refer=a11y">contact us</a> and let us know how we can make it better.</p>
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