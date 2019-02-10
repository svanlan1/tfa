<?php require('../core/config.php'); 
	//if($user->is_logged_in()){ header('Location: home.php'); exit(); }
	$title = 'Tacoma Film Alliance - About us';
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
          <h2><img src="../images/mission.svg" alt="" /> Our Mission</h2>
          <div class="sectionContent">
            <p>To Support and Promote Greater Puget Sound Motion Picture Artists via Resources, Networking, and Education in a Mutually Supportive Alliance.</p>
          </div>
        </section>

        <section class="homepage" id="Executives">
          <h2><img src="../images/executive.svg" alt="" /> Executives</h2>
          <div class="loader"></div>
          <div class="sectionContent showHide" style="flex-flow: column;"></div>
        </section>
      </div>

      <div class="r20">
        <section>
          <h2><img src="../images/paper.svg" alt="" /> Previous minutes</h2>
          <div class="loader"></div>
          <div class="sectionContent showHide">
            <ul class="eventList"></ul>
          </div>
        </section>
      </div>

    </main>
    <!-- JS -->
    <?php 
        require('../layout/commonFooter.php');
        require('../includes/commonScripts.php');
    ?>
  </body>
</html>