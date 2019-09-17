<?php require('../core/config.php'); 
  //if($user->is_logged_in()){ header('Location: home.php'); exit(); }
  $title = 'Tacoma Film Alliance - Slingshot';
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
        <h2 class="header"><img src="../images/slingshot_header.png" alt="Film spotlight" title="" style=""></h2>
          <div class="sectionContent" style="flex-flow: column;">
            <div class="storyBanner" style="background: url('/images/slingshot_film.jpg') 0px center / cover no-repeat;"></div>
            <div class="storySetup">
              <span class="byline">by Slingshot Committee on September 12th, 2019</span>
              <div class="lede">What is Slingshot?</div>
            </div>
            <div class="storyContent">
              <p>
                Slingshot is a monthly project produced by the Tacoma Film Alliance.  The goal of Slingshot is to produce at least 1 short film per month, with the goal of building your confidence and experience in filmmaking.
              </p>
              <div>
                <h3>Be a part of the new Slingshot!</h3>
                <div class="inputs">
                  <label for="fullname">Full name<span class="red required">*</span></label>
                  <input type="text" aria-required="true" id="fullname" style="width: 95%;" />
                </div>

                <div class="inputs">
                  <label for="email">Email address<span class="red required">*</span></label>
                  <input type="email" aria-required="true" id="email" style="width: 95%;" />
                </div>

                <fieldset style="margin-top: 25px;">
                  <legend>What roles are you most interested in?<span style="width: auto;" class="red required">*</span></legend>
                  <span><input type="checkbox" id="writer" /><label for="writer">Writer</label></span>
                  <span><input type="checkbox" id="directing" /><label for="directing">Director</label></span>
                  <span><input type="checkbox" id="editing" /><label for="editing">Editor</label></span>
                  <span><input type="checkbox" id="acting" /><label for="acting">Acting</label></span>
                  <span><input type="checkbox" id="camera" /><label for="camera">Camera person</label></span>
                  <span><input type="checkbox" id="sound" /><label for="sound">Sound engineer</label></span>
                  <span><input type="checkbox" id="lighting" /><label for="lighting">Lighting</label></span>
                  <span><input type="checkbox" id="producing" /><label for="producing">Producer</label></span>
                  <span><input type="checkbox" id="productionAssistant" /><label for="productionAssistant">Production assistant</label></span>
                  <span><input type="checkbox" id="makeup" /><label for="makeup">Makeup</label></span>
                  <span><input type="checkbox" id="other" /><label for="other">Other</label></span>
                  <span class="otherFieldDisplay">
                    <label for="otherField">Other</label>
                    <input type="text" id="otherField" />
                  </span>
                </fieldset>

                <div>
                  <label for="equipment">What equipment do you have?<span class="red required">*</span></label>
                  <textarea aria-required="true" id="equipment"></textarea>
                </div>
                <div>
                  <label for="shortbio">Tell us a little bit about yourself<span class="red required">*</span></label>
                  <textarea aria-required="true" id="shortbio"></textarea>
                </div>
              </div>
              <button class="register">
                <i class="material-icons">
                    send
                </i>
                 Sign up!
              </button>              
            </div>
          </div>
        </section>
        <!-- <section class="homepage" id="previousSlingshotFilms">
          <h2 class="header"><img src="../images/slingshot_header.png" alt="Film spotlight" title="" style=""></h2>
          <div class="storyContent">
            <h3>Previous Slingshot films</h3>
              <div class="slingshotFilm">
                <div>
                  <a href="https://www.youtube.com/watch?v=w-C8FjatCrw&list=PLRAvO_vjT7KvGDiemZ5BEnHIcN6uKe6Pp"><img src="images/nightGuest.jpg" alt="Night Guest" /></a>
                </div>
                <div>
                  <h3>Night Guest</h3>
                  <div class="instructions"> by Mike West</div>
                </div>
                
                
              </div>
          </div>          
        </section> -->
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