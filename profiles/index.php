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
          <h2><img src="/sandbox/images/user.svg" alt="" /> Tacoma Film Alliance</h2>
          <div class="sectionContent" style="flex-flow: column;">
            <div class="headshotWrap">
              <div class="tfa_profile_headshot"></div>
              <div class="headshotName">
                <span></span>
                <div></div>
              </div>
            </div>
            <div class="sidePhotoGallery">
                <div class="none">
                  <img tabindex="0" role="button" src="" alt="" />
                </div>
              </div>
            </div>
            <div class="profile">

              <h3 class="abs" style="margin-top: -20px;">Basic information</h3>
              <div class="memberInformation" style="margin-bottom: 40px;">
                <ul>
                  <li><strong>Location</strong><span id="location"></span></li>
                  <li><strong>Primary focus</strong><span id="primaryRole"></span></li>
                  <li><strong>Number of films</strong><span id="noOfFilms">0</span></li>
                  <li><strong>Secondary role</strong><span id="secondaryRole"></span></li>
                  <li><strong>Biography</strong><span id="bio"></span></li>
                  <li><strong>Personal website</strong><span id="personalSite"></span></li>
                </ul>
              </div>              

              <h3 class="abs">Best known for</h3>
              <div class="topRoles">
                <div>
                  <img src="../images/movie_poster.png" alt="Placeholder" />
                </div>
              </div>

              <h3 class="abs none" style="margin-top: 10px;">Headshots</h3>
              <div class="photoGallery">
                <div class="none">
                  <img src="" alt="" />
                </div>
              </div>

              <h3 class="abs" style="margin-top: 20px">Filmography</h3>
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
                  <!-- <li>
                    <span class="poster">
                      <img src="https://images-na.ssl-images-amazon.com/images/I/41%2BoU9FZUnL._SY445_.jpg" alt="Dead Bodies Everywhere" />
                    </span>
                    <span class="filmDetails">
                      <a href="javascript:;"><strong class="block">Dead Bodies Everywhere (2011)</strong></a>
                      <strong>Starring</strong><span>Shea VanLaningham, Rito Balducci, Cathy Flynn, Sarah Tongren, Melissa Marie Watson, Carissa Lund, Ron Rotondo, Steve Christopher</span>
                      <strong>Description</strong>
                      <span>
                        A group of friends go out for a nice cozy weekend away in the woods.  Unfortunately for them, they've happened upon Arthur Grigsby, legendary killer of The Lake.
                    </span>
                  </li> -->                                 
                </ul>
              </div>

              <h3 class="abs" style="margin-top: 15px;">Video reel</h3>
              <div class="films">
              <div style="text-align: center;">
                  <img src="../images/movie_reel.png" alt="" />
                </div>
                <div>
                  <img src="../images/movie_reel.png" alt="" />
                </div>
                <div>
                  <img src="../images/movie_reel.png" alt="" />
                </div>                                
              </div>

            </div>
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