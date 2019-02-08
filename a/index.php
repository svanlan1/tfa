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
              <table>
                <thead class="screen-reader-only">
                  <tr>
                    <th scope="col">Category</th>
                    <th scope="col">Created</th>
                    <th scope="col">Data</th>
                  </tr>
                </thead>
                <tbody>
                  <tr id="memberInfo"></tr>
                  <tr id="newsfeedInfo"></tr>
                  <tr id="messagesInfo"></tr>
                  <tr id="homepageVisits"></tr>
                </tbody>
              </table>
            </div>
          </div>
        </section>

      </div>
      <div class="r25">
        <article>
          <h2><img src="../images/notepad.svg" alt="" /> Next steps</h2>
          <ol class="eventList" style="font-weight: 700; font-size: .9rem;">
            <li>Film Court</li>
            <li>Add film</li>
            <li>Member profile pages</li>
            <li>Forgot password?</li>
          </ol>
        </article>
        <?php require('../layout/adminUserNav.php'); ?>
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
