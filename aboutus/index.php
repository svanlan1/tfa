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
          <div class="sectionContent" style="flex-flow: column;"></div>
        </section>
      </div>

      <div class="r20">
        <section>
          <h2><img src="../images/paper.svg" alt="" /> Previous minutes</h2>
          <div class="sectionContent">
            <ul class="eventList">
              <li>
                <h3>January 21st, 2019</h3>
                <a href="https://drive.google.com/open?id=17ImfT0icMR4CdAuVYsNXTb_5bsW-OxSicsx48Vmaif0" target="_blank">Link to minutes</a>
              </li>
              <li>
                <h3>January 7th, 2019</h3>
                <a href="https://drive.google.com/open?id=1jXq932lEbyQysg63Jmkyzr4R5M3RLdzmpfB7TzZNn70" target="_blank">Link to minutes</a>
              </li>
              <li>
                <h3>December 3rd, 2018</h3>
                <a href="https://drive.google.com/open?id=1qqg1W1sYxmNQNa1p5NxkpTmKK97TapZDn6EbK8DqfKk" target="_blank">Link to minutes</a>
              </li>
            </ul>
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