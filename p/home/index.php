<?php require('../../core/config.php'); 
	if(!$user->is_logged_in()){ header('Location: index.php'); exit(); }
	$title = 'Tacoma Film Alliance';
	require('../../layout/commonHead.php');
?>
  <body>
    <?php require('../../layout/postNav.php'); ?>
    <main>
      <div class="r75">
      <section class="homepage" id="filmSpotlight">
          <!-- <h2><img src="/sandbox/images/spotlight.svg" alt="" /> Spotlight</h2> -->
          <h2 class="header"><img src="../../images/spotlight_header.png" alt="Spotlight" /></h2>
          <div class="loader"></div>
          <div class="showHide">
            <div class="sectionContent">
              <div class="banner">
                <img src="" alt="homepage banner" />
              </div>
              <div class="article">
                <h3><a></a></h3>
                <div class="byline">
                  
                </div>
                <div class="actions">
                  <span class="commentsDisplay">
                    <span class="commentsDisplay_number">0</span><br />comments</span>
                  <span style="padding-top: 5px;">
                    <button class="facebook">
                      <i class="material-icons">thumb_up_alt</i> Like
                    </button>
                  </span>
                  <span style="padding-top: 5px;">
                    <button class="twitter">
                      <img src="/sandbox/images/twitter.svg" alt="" /> Tweet</button>
                  </span>
                </div>
                <p></p>
              </div>
            </div>
          </div>
        </section>


        <section class="homepage" id="latestNews">
          <!-- <h2><img src="/sandbox/images/alarm.svg" alt="" /> Latest news</h2> -->
          <h2 class="header"><img src="../../images/latest_news_header.png" alt="Latest news" /></h2>
          <div class="loader"></div>
          <div class="showHide">
            <div class="sectionContent" style="display:none;">
              <div class="article">
                <h3><a></a></h3>
                <div class="byline"></div>
                <div class="actions">
                  <span class="commentsDisplay">
                    <span class="commentsDisplay_number">0</span> comments</span>
                  <span>
                    <button class="facebook">
                      <i class="material-icons">thumb_up_alt</i> Like
                    </button>
                  </span>
                  <span>
                    <button class="twitter">
                      <img src="/sandbox/images/twitter.svg" alt="" /> Tweet</button>
                  </span>
                </div>
                <p>
                  
                </p>
              </div>
              <div class="banner">
                <iframe width="380" height="300" src="" allowfullscreen=""></iframe>
                <img />           
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
    <!-- <script src="script.js"></script> -->
    
  </body>
</html>
