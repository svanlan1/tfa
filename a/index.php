<?php require('../core/config.php'); 
	if(!$user->is_logged_in()){ header('Location: index.php'); exit(); }
  if(!$user->isAdmin($_SESSION['admin']) ) { header('Location: ../index.php'); exit(); };
	$title = 'Tacoma Film Alliance';
	require('../layout/commonHead.php');
?>
  <body>
    <?php require('../layout/adminNav.php'); ?>
    <main>
      <div class="r75">
        <section class="homepage" id="filmSpotlight">
          <h2><img src="../images/live.svg" alt="" /> Updates</h2>
          <div class="sectionContent">
            <div class="banner">
              <img src="https://assets.classicfm.com/2014/34/thinkstock-violin-photos9-1409319924-view-0.jpg" />
            </div>
            <div class="article">
              <h3>Welcome all administrators!</h3>
              <div class="byline">
                by Shea VanLaningham on Dec. 17, 2018
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
                    <img src="../../images/twitter.svg" alt="" /> Tweet</button>
                </span>
              </div>
              <p>
                Hey everyone!  Welcome to the new and improved Tacoma Film Alliance website.  From this panel, you will all be able to manage key pieces of functionality on the site.  This includes, but is not limited to:
                <ul>
                  <li>Removing inappropriate member posts (racist, sexist, attacks, etc.)  We won't be removing any posts that aren't in some way ugly, period.  We're not censors.</li>
                  <li>Adding/editing homepage posts that all members/potential members will see.  I'll show you how this works.</li>
                  <li>Adding a Film Court review</li>
                  <li>Checking and replying to messages.</li>
                  <li>Member group management (WAM, Slingshot, Execs)</li>
                </ul>
              </p>
            </div>
          </div>
        </section>

      </div>
      <div class="r25">
        <article>
          <h2><img src="../images/notepad.svg" alt="" /> Next steps</h2>
          <ol class="eventList" style="font-weight: 700; font-size: .9rem;">
            <li>
              Film Court
              <ul style="font-size: .75rem; font-weight: 400;">
                <li>Add a review, Mike has designed</li>
                <li>Allow creator to edit/delete review</li>
                <li>Allow users to comment</li>
                <li>All reviews will be public facing, so no login required to view.</li>
              </ul>
            </li>
            <li>Wire up Newsfeed</li>
            <li>Member profile pages</li>
            <li>Forgot password?</li>
          </ol>
        </article>
      </div>
    </main>






    <!-- JS -->
    <?php 
        require('../layout/commonFooter.php');
        require('../includes/commonScripts.php');
    ?>
    <script src="script.js"></script>
  </body>
</html>
