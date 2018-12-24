<?php require('../core/config.php'); 
	//if($user->is_logged_in()){ header('Location: home.php'); exit(); }
	$title = 'Tacoma Film Alliance - Films';
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
      <div class="r100">
        <section class="homepage" id="filmSpotlight">
          <h2><img src="../../images/spotlight.svg" alt="" /> December Spotlight</h2>
          <div class="sectionContent">
            <div class="banner">
              <iframe src="https://www.youtube.com/embed/D8CQ4Qu0gM4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
            </div>
            <div class="article">
              <h3>The String!</h3>
              <div class="byline">
                by Shea VanLaningham on Dec. 14th, 2018
              </div>
              <div class="actions">
                <span class="commentsDisplay">
                  <span class="commentsDisplay_number">4</span><br />comments</span>
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
              <p>This year's winner of the Wait A Minute Film Festival, hosted at the Blue Mouse Theater in November of 2018, had a lot of really great submissions!  The winner this year is a great 1 minute film by Tom Eastwood named "The String".  Watch it and comment letting everybody know what you think!</p>
            </div>
          </div>
        </section>   

        <section class="homepage" id="filmsDisplay">
          <div class="film" style="display: none;">
            <div class="iframe">
              <iframe src="4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
            </div>
            <div class="information">
              <span class="filmTitle"></span> <span class="instructions"></span>
            </div>
          </div>

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