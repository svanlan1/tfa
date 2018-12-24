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
                  <img src="https://images-na.ssl-images-amazon.com/images/I/41%2BoU9FZUnL._SY445_.jpg" alt="Dead Bodies Everywhere" />
                </div>
                <div>
                  <img src="https://pbs.twimg.com/profile_images/1615499472/image.jpg" alt="Adrien England" />
                </div>
                <div>
                  <img src="https://pics.filmaffinity.com/satanic_panic-221384956-large.jpg" alt="Satanic Panic" />
                </div>
                <div>
                  <img src="https://m.media-amazon.com/images/M/MV5BMjE3NzM0OTMzN15BMl5BanBnXkFtZTcwMTEyNjM3OA@@._V1_SY1000_CR0,0,762,1000_AL_.jpg" alt="Finding Virginia" />
                </div>
                <div>
                  <img src="https://m.media-amazon.com/images/M/MV5BMjIwNzIzNDI1Ml5BMl5BanBnXkFtZTcwMTExMjU5Mg@@._V1_.jpg" alt="Hermetica" />
                </div>
              </div>
              <h3 class="abs" style="margin-top: 6px;">Headshots</h3>
              <div class="photoGallery">
                <div class="none">
                  <img src="" alt="" />
                </div>
              </div>
              <ul>
                <li><strong>Location</strong><span>Tacoma, WA</span></li>
                <li><strong>Primary role</strong><span>Directing</span></li>
                <li><strong>Secondary role</strong><span>Editing</span></li>
                <li><strong>Number of films</strong><span>13</span></li>
                <li><strong>Biography</strong><span>Lorem ipsum some other bullshit will go in here.  I am hackerman.</span></li>
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
                      <img src="https://images-na.ssl-images-amazon.com/images/I/41%2BoU9FZUnL._SY445_.jpg" alt="Dead Bodies Everywhere" />
                    </span>
                    <span class="filmDetails">
                      <a href="javascript:;"><strong class="block">Dead Bodies Everywhere (2011)</strong></a>
                      <strong>Starring</strong><span>Shea VanLaningham, Rito Balducci, Cathy Flynn, Sarah Tongren, Melissa Marie Watson, Carissa Lund, Ron Rotondo, Steve Christopher</span>
                      <strong>Description</strong>
                      <span>
                        A group of friends go out for a nice cozy weekend away in the woods.  Unfortunately for them, they've happened upon Arthur Grigsby, legendary killer of The Lake.
                    </span>
                  </li>
                  <li>
                    <span class="poster">
                      <img src="https://pics.filmaffinity.com/satanic_panic-221384956-large.jpg" alt="Satanic Panic" />
                    </span>
                    <span class="filmDetails">
                      <a href="javascript:;"><strong class="block">Satanic Panic (2009)</strong></a>
                      <strong>Starring</strong><span>Mark Selz, Ron Rotondo, Cyn Dulay, Steve Christopher, Andy Schatner, Shea VanLaningham</span>
                      <strong>Description</strong>
                      <span>
                        Just the most god awful piece of shit movie that's ever been, created by a rich kid who had daddy's money but didn't know a fuckin' thing about making movies.  He was shit, and I got lost while making this movie.
                    </span>
                  </li>  
                  <li>
                    <span class="poster">
                      <img src="https://pbs.twimg.com/profile_images/1615499472/image.jpg" alt="Adrien England" />
                    </span>
                    <span class="filmDetails">
                      <a href="javascript:;"><strong class="block">Adrien England (2012)</strong></a>
                      <strong>Starring</strong><span>Shea VanLaningham, Catherine Flynn, Melissa Chirello, Rito Balducci, Steve Christopher, Ron Rotondo, others</span>
                      <strong>Description</strong>
                      <span>
                        The Angel of Death is wreaking havoc across the city to fulfill his ultimate purpose; Chaos.
                    </span>
                  </li>                                   
                </ul>
              </div>
              <h3 class="abs" style="margin-top: 35px;">Video reel</h3>
              <div class="films">
                <div>
                  <iframe src="https://www.youtube.com/embed/OkGn5tyG2u8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div>
                  <iframe src="https://www.youtube.com/embed/wxs9LPX7mLo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div>
                  <iframe src="https://www.youtube.com/embed/VfCIb2Hvb90" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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