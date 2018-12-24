<?php require('../core/config.php'); 
	//if($user->is_logged_in()){ header('Location: home.php'); exit(); }
	$title = 'Tacoma Film Alliance - Events';
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
          <section class="homepage" id="upcomingEvents">
            <h2><img src="../images/calendar.svg" alt="" /> Upcoming events</h2>
            <div class="loader"></div>
            <div class="showHide">
              <div class="sectionContent">
                <div class="banner">
                  <img src="" alt="" />
                </div>
                <div class="article">
                  <h3></h3>
                  <div class="byline"></div>
                  <div class="actions">
                    <span class="commentsDisplay">
                      <span class="commentsDisplay_number">0</span><br>comment(s)</span>
                    <span>
                      <a href="" class="maps">
                        <img src="/sandbox/images/google.svg" alt="" />
                      </a>
                    </span>
                    <span>
                      <a href="" class="meetup">
                        <img src="/sandbox/images/meetup.svg" alt="" />
                      </a>
                    </span>
                  </div>
                  <p></p>              
                </div>
              </div>
            </div>
          </section>
        </div>
      

      <div class="r20">
        <section>
          <h2><img src="../images/calendar.svg" alt="" /> Past events</h2>
          <div class="sectionContent">
            <ul class="eventList">
              <li>
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