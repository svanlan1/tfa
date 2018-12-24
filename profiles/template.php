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
      <div class="r80">

        <section class="homepage" id="ourMission">
          <h2><img src="/sandbox/images/user.svg" alt="" /> Tacoma Film Alliance</h2>
          <div class="sectionContent" style="flex-flow: column;">
            <div class="headshotWrap">
              <div class="tfa_profile_headshot"></div>
              <div class="headshotName"></div>
            </div>
            <div class="profile">
              <h3 class="abs">Best known for</h3>
              <div class="topRoles">
                <div>
                  <img src="" alt="" />
                </div>
                <div>
                  <img src="" alt="Adrien England" />
                </div>
                <div>
                  <img src="" alt="" />
                </div>
                <div>
                  <img src="" alt="" />
                </div>
                <div>
                  <img src="" alt="" />
                </div>
              </div>
              <ul>
                <li><strong>Location</strong><span>Tacoma, WA</span></li>
                <li><strong>Primary role</strong><span></span></li>
                <li><strong>Secondary role</strong><span></span></li>
                <li><strong>Number of films</strong><span></span></li>
                <li><strong>Biography</strong><span></span></li>
                <li class="links">
                  <span>
                    <a href="javascript:;" class="imdb">
                      <img src="/sandbox/images/imdb.svg" alt="IMDB" />
                    </a>
                  </span>
                </li>
              </ul>
              <h3 class="abs" style="margin-top: 6px;">Filmography</h3>
              <div class="filmography">
                <ul>
                  <li>
                    <span class="poster">
                      <img src="" alt="" />
                    </span>
                    <span class="filmDetails">
                      <a href="javascript:;"><strong class="block"></strong></a>
                      <strong>Starring</strong><span></span>
                      <strong>Description</strong>
                      <span>
                        
                    </span>
                  </li>                                  
                </ul>
              </div>
              <h3 class="abs" style="margin-top: 35px;">Video reel</h3>
              <div class="films">
                <div>
                  <iframe src="" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div>
                  <iframe src="" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div>
                  <iframe src="0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
              </div>
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
  </body>
</html>