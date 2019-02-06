<?php require('../../core/config.php'); 
  if(!$user->is_logged_in()){ header('Location: index.php'); exit(); }
  if(!$user->isAdmin($_SESSION['admin']) ) { header('Location: ../index.php'); exit(); };
  $title = 'Tacoma Film Alliance - Administration - Messages';
  require('../../layout/commonHead.php');
?>
  <body>
    <?php require('../../layout/adminNav.php'); ?>
    <main>
      <div class="r80">
        <section class="homepage" id="filmSpotlight">
          <h2><img src="../../images/content.svg" alt="" /> Messages</h2>
          <div class="sectionContent">
            <table>
              <thead>
                <tr>
                  <th scope="col">
                    <span class="screen-reader-only">Mark as read</span>
                    <input type="checkbox" aria-label="Mark all as read" id="markAllAsRead" />
                  </th>
                  <th scope="col">Name</th>
                  <th scope="col">Subject</th>
                  <th scope="col">Message</th>
                  <th scope="col">Sent on</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>
        </section>

      </div>
      <div class="r20">
        <?php require('../../layout/adminUserNav.php'); ?>
      </div>
    </main>
    <!-- JS -->
    <?php 
        require('../../layout/commonFooter.php');
        require('../../includes/commonScripts.php');
    ?>
  </body>
</html>
