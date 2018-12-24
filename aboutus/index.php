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
          <h2><img src="../../images/alarm.svg" alt="" /> Our Mission</h2>
          <div class="sectionContent">
            To Support and Promote Greater Puget Sound Motion Picture Artists via Resources, Networking, and Education in a Mutually Supportive Alliance.
          </div>
        </section>

        <section class="homepage" id="Executives">
          <h2><img src="../../images/spotlight.svg" alt="" /> Executives</h2>
          <div class="sectionContent" style="flex-flow: column;">
            <div class="execMember">
              Chris Burrows
            </div>
            <div class="execMember">
              Joe Kephart
            </div>
            <div class="execMember">
              Dave Ewing
            </div>
            <div class="execMember">
              Jolene
            </div>
            <div class="execMember">
              John Kephart
            </div>
            <div class="execMember">
              Mike West
            </div>
            <div class="execMember">
              Shea VanLaningham
            </div>
          </div>
        </section>
      </div>

      <div class="r20">
        <section>
          <h2><img src="../../images/notepad.svg" alt="" /> Previous minutes</h2>
          <div class="sectionContent">
            <ul class="eventList">
              <li>
                <h3>December 3rd, 2018</h3>
                <a href="javascript:;">Link to minutes</a>
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