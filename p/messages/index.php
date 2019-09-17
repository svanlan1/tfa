<?php require('../../core/config.php'); 
	if(!$user->is_logged_in()){ header('Location: /index.php'); exit(); }
	$title = 'Tacoma Film Alliance - Messages';
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
      <div class="r75">
        <section class="homepage" id="ourMission">
          <h2><img src="../../images/mail-white.svg" alt="" /> Messages</h2>
          <div class="sectionContent" style="flex-flow: columns;">
            <div class="ccontainer">
              <button class="rounded">
                <i aria-hidden="true" class="material-icons">add</i>
                <span class="screen-reader-only">Send a new message</span>
              </button>
              <div class="actionsRow">
                <a href="javascript:;" id="recMsgs" aria-selected="true">Received</a>
                <a href="javsacript:;" id="sentMsgs" aria-selected="false">Sent</a>
              </div>
              <table class="container" id="receivedMsgs">
                <thead>
                  <tr>
                    <th scope="col">
                      <span class="screen-reader-only">Select all</span>
                      <input type="checkbox" aria-label="Select all" title="Select all" />
                    </th>
                    <th scope="col">From</th>
                    <th scope="col">Sent</th>
                    <th scope="col">Message</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
              <table class="container" id="sentMsgsTable">
                <thead>
                  <tr>
                    <th scope="col">
                      <span class="screen-reader-only">Select all</span>
                      <input type="checkbox" aria-label="Select all" title="Select all" />
                    </th>
                    <th scope="col">To</th>
                    <th scope="col">Sent</th>
                    <th scope="col">Message</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>              
            </div>
          </div>
        </section>
      </div>

      <div class="r25">
        <?php
          require('../../layout/userNav.php');
        ?>
      </div>

    </main>
    <!-- JS -->
    <?php 
        require('../../layout/commonFooter.php');
        require('../../includes/commonScripts.php');
    ?>
  </body>
</html>