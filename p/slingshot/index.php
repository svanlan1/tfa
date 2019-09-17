<?php require('../../core/config.php'); 
  //if($user->is_logged_in()){ header('Location: home.php'); exit(); }
  $title = 'Tacoma Film Alliance - Slingshot';
  require('../../layout/commonHead.php');
?>
  <body>
    <?php if($user->is_logged_in()) { 
        require('../../layout/postNav.php');
      } else {
        require ('../../layout/preNav.php');
      } 
    ?>
    <main>
      <div class="r80">
        <section class="homepage" id="ourMission">
          <h2><img src="../../images/slingshot.svg" alt="" /> Slingshot</h2>
          <div class="sectionContent" style="flex-flow: column;">
            <div class="storyBanner" style="background: url('/images/slingshot_film.jpg') 0px center / cover no-repeat;"></div>
            <div class="storySetup">
              <span class="byline">by Shea VanLaningham on Jan 25, 2018 at 11:59am</span>
              <div class="lede">What is Slingshot?</div>
            </div>
            <div class="storyContent">
              <p>
                Slingshot is a monthly project produced by the Tacoma Film Alliance.  The goal of Slingshot is to produce at least 1 short film per month, with the goal of building your confidence and experience in filmmaking.
              </p>
            </div>
          </div>
        </section>
      </div>

      <div class="r20">
        <article id="slingshot_actions">
          <h3><i class="material-icons red" style="vertical-align: sub;">error_outline</i> Actions</h3>
          <div class="full">
            <button class="addProject" style="width: 96%;">
              <i class="material-icons">
                add_circle_outline
              </i>
              Request to join
            </button> 
            </div>
          <!-- <div class="full">           
            <button class="addScript">
              <i class="material-icons">
                publish
              </i>
              Submit a script
            </button>
          </div>           -->
        </article>
        <?php require('../../layout/userNav.php'); ?>
      </div>

    </main>
    <!-- JS -->
    <?php 
        require('../../layout/commonFooter.php');
        require('../../includes/commonScripts.php');
    ?>
  </body>
</html>