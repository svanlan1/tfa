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
                So as you've noticed, the website is going through a bit of a redesign.  Joe came up with this awesome new design over the weekend and I'm (Shea) working through converting everything over.  In the coming weeks, this site should really start to take shape.  On this page, you'll be able to:
                <ul>
                  <li>Edit, remove posts that violate our rules</li>
                  <li>Manage members</li>
                  <li>Add new film jury reviews</li>
                  <li>Add content to the public and post-login homepages</li>
                  <li>Manage the WAM pages</li>
                  <li>Manage the Slingshot pages</li>
                </ul>
              </p>
            </div>
          </div>
        </section>

      </div>
      <div class="r25">
        <article>
          <h2><img src="../../images/notepad.svg" alt="" /> To do list</h2>
          <ol class="eventList">
            <li>Build account page</li>
            <li>Build post-login homepage</li>
            <li>Build new post-login films page</li>
            <li>Build film jury page</li>
            <li>Newsfeed</li>
            <li>Search</li>
            <li>Profile pages</li>
            <li>Resources
              <ul><li>- Locations</li><li>- Equipment</li></ul>
            </li>
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
