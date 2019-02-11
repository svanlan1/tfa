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
          <h2><img src="../images/administrator.svg" alt="" /> Administrative Panel</h2>
          <div class="sectionContent">
            <div class="container">
              <h3>At a glance</h3>
              <p>This landing page will contain information about the TFA website</p>
              <table>
                <thead class="screen-reader-only">
                  <tr>
                    <th scope="col">Category</th>
                    <th scope="col">Created</th>
                    <th scope="col">Data</th>
                  </tr>
                </thead>
                <tbody>
                  <tr id="memberInfo">
                    <td>Members</td>
                    <td class="instructions"> tacomafilmalliance.com users</td>
                    <td></td>
                  </tr>
                  <tr id="newsfeedInfo">
                    <td>Newsfeed posts</td>
                    <td class="instructions"> number of posts made by members on the newsfeed</td>
                    <td></td>
                  </tr>
                  <tr id="messagesInfo">
                    <td>Messages sent</td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr id="homepageVisits">
                    <td>Page visits</td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr id="filmsPosted">
                    <td>Films posted</td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr id="imagesUploaded">
                    <td>Files uploaded</td>
                    <td></td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </section>

      </div>
      <div class="r25">
        <?php require('../layout/adminUserNav.php'); ?>
        <article>
          <h2><img src="../images/notepad.svg" alt="" /> Next steps</h2>
          <ol class="eventList" style="font-weight: 700; font-size: .9rem;">
            <li>Add film</li>
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
  </body>
</html>
