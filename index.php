<?php require('core/config.php'); 
	if($user->is_logged_in()){ header('Location: p/home/'); exit(); }
	// require('../getMember.php');
	$title = 'Tacoma Film Alliance';
	require('layout/commonHead.php');
?>
  <body>
    <?php require('layout/preNav.php'); ?>
    <main>
      <div class="r75">
        <section class="homepage" id="filmSpotlight">
          <h2 class="header"><img src="images/spotlight_header.png" alt="Spotlight" /></h2>
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
                      <img src="images/twitter.svg" alt="" /> Tweet</button>
                  </span>
                </div>
                <p></p>
              </div>
            </div>
          </div>
        </section>

        <section class="homepage" id="latestNews">
          <h2 class="header"><img src="images/latest_news_header.png" alt="Latest news" /></h2>
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
                      <img src="images/twitter.svg" alt="" /> Tweet</button>
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
        <article>
          <h2 class="header"><img src="images/events_header.png" alt="Events" /></h2>
          <ul class="eventList">
            <li>
              <h3><a href="javascript:;"></a></h3>
              <div class="eventTimes"><span></span><span><strong></strong> - <strong></strong></span></div>
              <div class="eventLocation"></div>
            </li>
          </ul>
        </article>
        <article id="2018WamWinners">
          <h2 class="header"><img src="images/wam_winners_header.png" alt="WAM Winners" /></h2>
          <ul class="eventList">
            <li style="display:none;">
              <h3><span><img alt="" src="" /></span><a href="javascript:;"></a></h3>
              <div class="description"></div>
            </li>
          </ul>
        </article>
      </div>
    </main>






    <!-- JS -->
    <?php 
        require('layout/commonFooter.php');
        require('includes/commonScripts.php');
    ?>
    <script src="js/homepage.js"></script>
  </body>
</html>
