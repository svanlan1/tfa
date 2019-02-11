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
      <div class="r80">

        <section class="homepage" id="ourMission">
          <h2><img src="../images/gavel.svg" alt="" /> Film Court <span class="instructions">Fiat justitia ruat caelum</span></h2>
          <div class="sectionContent">
            <div class="filmposter">
                <img src="" alt="" />
            </div>
            <h3 class="filmdetailh3"></h3>
            <div class="filmdetails">
                <ul>
                    <li id="director"><strong>Director</strong><span></span></li>
                    <li id="trailer"><strong>Trailer</strong><span></span></li>
                    <li id="updated"><strong>Submitted</strong><span></span></li>
                </ul>
            </div>
            <div class="charges">
                <dl></dl>
            </div>
            <div class="defenses">
                <dl></dl>
            </div>
            <div class="closingarguments">
                <h2>Closing arguments</h2>
                <p></p>
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
    <script src="review.js"></script>
  </body>
</html>