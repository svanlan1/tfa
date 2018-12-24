<?php require('../core/config.php'); 
	//if($user->is_logged_in()){ header('Location: home.php'); exit(); }
	$title = 'Tacoma Film Alliance - [PAGENAME]';
	require('../layout/commonHead.php');
?>
  <body>
    <?php if($user->is_logged_in()) { 
        require('../layout/postNav.php');
      } else {
        require ('../layout/preNav.php');
      } 
    ?>
    <link rel="stylesheet" href="aboutus.css" />
    <main>
      <div class="r80">

        <section class="homepage" id="ourMission">
          <h2><img src="../../images/alarm.svg" alt="" /> [MAIN HEAD]</h2>
          <div class="sectionContent" style="flex-flow: column;">
            <div class="row">
              <h3>Why use the Tacoma Film Alliance website?</h3>
              <p>
                While we are just getting started, we have a lot of goals for the site.  We want it to become the best resource for all of your filmmaking needs.  This includes databases full of the local actors/actresses, writers, directors, editors, audio engineers, music supervisors, etc.  The more people sign up, the more people you'll be able to find!  So be sure to tell all of your motion picture artists friends about it.
              </p>
            </div>  
            <div class="row">
              <h3>Are you just trying to create another crappy social media site?</h3>
              <p>
                No.  This isn't Facebook and we don't ever want it to be.  What we do want is for this site to become <strong>your</strong> resource for finding local talent and shoot locations.  We'll also be communicating all of the fun events and happenings that we'll be hosting!
              </p>
            </div>                
            <div class="row">
              <h3>What is the Tacoma Film Alliance</h3>
              <p>
                The Tacoma Film Alliance is a collective of filmmakers and artists in the Greater Puget Sound area that are passionate about making films, and want to have fun doing it.  We are a registered non-profit with the state of Washington and strive to support and promote motion picture artists via resources, networking, and education.
              </p>
            </div>
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
        require('../layout/commonFooter.php');
        require('../includes/commonScripts.php');
    ?>
  </body>
</html>