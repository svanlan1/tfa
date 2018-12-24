<?php require('../../core/config.php'); 
  //if($user->is_logged_in()){ header('Location: home.php'); exit(); }
  $title = 'Tacoma Film Alliance - Profiles';
  require('../../layout/commonHead.php');
?>
  <body>
    <?php if($user->is_logged_in()) { 
        require('../../layout/postNav.php');
      } else {
        require ('../../layout/preNav.php');
      } 
    ?>
    <link rel="stylesheet" href="aboutus.css" />
    <main>
      <div class="r80">

        <section class="homepage" id="ourMission">
          <h2><img src="../../images/alarm.svg" alt="" /> [MAIN HEAD]</h2>
          <div class="sectionContent">
            To Support and Promote Greater Puget Sound Motion Picture Artists via Resources, Networking, and Education in a Mutually Supportive Alliance.
          </div>
        </section>
      </div>

      <div class="r20">
        <section>
          <h2><img src="../../images/notepad.svg" alt="" /> [ARTICLE HEAD]</h2>
          <div class="sectionContent">
            <ul class="eventList">
              <li>
                <h3>[LI HEAD]</h3>
                <a href="javascript:;">[LINK TEXT]</a>
              </li>
            </ul>
          </div>
        </section>
      </div>

    </main>
    <!-- JS -->
    <?php 
        require('../../layout/commonFooter.php');
        require('../../includes/commonScripts.php');
    ?>
  </body>
</html>