<?php require('../core/config.php'); 
  //if($user->is_logged_in()){ header('Location: home.php'); exit(); }
  $title = 'Tacoma Film Alliance - Film Court';
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
          <h2><img src="../images/gavel.svg" alt="" /> Film Court <span class="instructions">Fiat justitia ruat caelum</span></h2>
          <div class="sectionContent">
            <p>
              <span style="font-weight:400;">Movies, like all forms of art have good and bad entries. There are some that are widely loved by most people who view them and others that are just as well known for being hated. That being said, even the worst movies will still have fans in most cases. It may be that only a very small percentage of the film&rsquo;s audience &ldquo;gets the picture&rdquo;, or it could be that some people just have unique tastes that the film can satisfy. </span>
            </p>

            <p>
              <span style="font-weight: 400;">Whatever the reason, we all have our guilty pleasures. Here, these &ldquo;bad&rdquo; movies will have their case defended by the most qualified fan we could find for each one. Will these reviews change the wide spread hate of these films into pure love? Doubtful. But if you are so inclined, give the review a read, and if you are intrigued, give the film another chance with a more open mind. Maybe, just maybe, you might find a gem among the &ldquo;bad movies&rdquo;&hellip;</span>
            </p>

            <h3>Most recent reviews</h3>
            <ul class="currentReviews"></ul>
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