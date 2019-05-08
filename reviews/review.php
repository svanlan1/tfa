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
          <div class="loader"></div>
          <div class="sectionContent" style="display: none;">
            <div class="reviewBanner">
              <!-- <div class="userByLine">by Mike West</div> -->
            </div>
            <h3 id="title"></h3>
            <div class="row fdeets">
              <div>
                <strong>directed by</strong>
                <span id="director"></span>
              </div>
              <div>
                <strong>submitted on</strong>
                <span id="updated"></span>
              </div>
              <div>
                <strong>trailer</strong>
                <span id="trailer"></span>
              </div>
              <div class="row fsummary">
                <span id="image">
                </span>
                <span id="summary"></span>
              </div>
            </div>
            <div class="row fcharges">
              <ul id="charges"></ul>
            </div>
            <div class="row fca">
              <h3>Closing arguments</div>
              <div id="closingarguments"></div>
            </div>

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



            <!-- <div class="filmposter">
                <img src="" alt="" />
            </div>
            <h3 class="filmdetailh3"></h3>
            <div class="byline" id="by"></div>
            <div class="filmdetails">
                <ul>
                    <li id="director"><strong>Director</strong><span></span></li>
                    <li id="trailer"><strong>Trailer</strong><span></span></li>
                    <li id="updated"><strong>Submitted</strong><span></span></li>
                    <li id="summary"><strong>Summary</strong><span></span></li>
                    <li id="chargeList">
                      <strong>Charges</strong>
                      <span><ol></ol></span>
                    </li>
                </ul>
            </div>
            <div class="charges">
                <dl></dl>
            </div>
            <div class="defenses">
                <dl></dl>
            </div>
            <hr aria-hidden="true" />
            <div class="closingarguments">
                <h2 class="review">Closing arguments</h2>
                <p></p>
            </div> -->
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