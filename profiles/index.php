<?php require('../core/config.php'); 
  //if($user->is_logged_in()){ header('Location: home.php'); exit(); }
  $title = 'Tacoma Film Alliance - Profiles';
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
          <div class="sectionContent" style="flex-flow: column;">          
          <div class="headshotWrap">
            <div class="headshotName">
                <span></span>
                <span></span>
              </div>              
              <div class="tfa_profile_headshot"></div>
              <h3 class="new" style="padding: 2px 0; text-indent: 2px;">Personal information</h3>
              <h4 class="sub">Location</h4>
              <div id="location" class="subinfo"></div>
              <h4 class="sub">Contact</h4>
              <div id="contact" class="subinfo"></div>
              <h4 class="sub">Website</h4>
              <div id="website" class="subinfo"></div>
              <h4 class="sub">Other links</h4>
              <div id="otherLinks" class="subinfo"></div>
              <h3 class="new" style="padding: 2px 0; text-indent: 2px;">Skills</h3>
              <h3 class="new" style="padding: 2px 0; text-indent: 2px;">Films</h3>
            </div>
            <div class="profile">
              <h3 class="new">Biography</h3>
              <div class="memberBiography"></div>
             
              <h3 class="new">Experience</h3>
              <div class="experience">
                <dl>
                  <dt>2014 - Present</dt>
                  <dd>I've been doing something</dd>
                </dl>
              </div>

              <h3 class="new" style="margin-top: 10px;">Video reel</h3>
              <div class="filmography">
                <ul>
                  <li>
                    <span class="poster">
                      <img src="../images/movie_poster.png" alt="Nothing yet!" />
                    </span>
                    <span class="filmDetails">
                      <p>
                        <strong>This user hasn't posted any films yet.  Bummer.</strong>
                      </p>
                    </span>
                  </li>                                
                </ul>
              </div>

              <h3 class="new" style="margin-top: 20px">Headshots/pictures</h3>
              <div class="sidePhotoGallery">
                <div class="none">
                  <img tabindex="0" role="button" src="" alt="" />
                </div>
              </div>              

              <h3 class="new" style="margin-top: 15px;">Interests</h3>
              <div class="interests"></div>
          </div>
        </section>
      </div>

      <div class="r25">
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