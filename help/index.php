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

        <section class="columns" id="generalHelp">
          <h2><img src="/sandbox/images/help.svg" alt="" /> General</h2>
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

        <section class="columns" id="siteUsage">
          <h2><img src="/sandbox/images/help.svg" alt="" /> Usage</h2>
          <div class="sectionContent" style="flex-flow: column;">  
            <div class="row">
              <h3>How do I update my profile?</h3>
              <p>
                In the top level navigation, click on 'My Account'<br /><br />
                <img src="images/help_myacct.png" alt="" /><br /><br />
                Once that page loads, in the sub-level tabs, find "My Info", and you'll see a form that will allow you to change all of your personal information.  <br /><br />
                <img src="images/help_myinfo.png" alt="" /><br /><br />
                <strong>None of your information will ever leave this site.  None of it is required (though we suggest you enter your name, role, headshot, and biography).</strong><br />  The information will <strong>only</strong> ever be used within the confines of this website.
              </p>
            </div>
            <div class="row">
              <h3>What do we do with the data that you enter?</h3>
              <p>
                Like, nothing.  We're creating databases FOR YOU TO USE, and that's it.  We will never look at the data you enter in the database, and will never <strong>EVER</strong> change or sell your information.  This site is for you, and if you're not happy with what we're offering, please <a href="contact.php">contact us</a> and let us know how we can do better.
              </p>
            </div>          
            <div class="row">
              <h3>How do I change my profile picture</h3>
              <p>
                Your profile picture is displayed to you on all of the TFA website pages.  In order to change it, click on the circular avatar that displays.<br /><br />
                <img src="images/help_profile_pic.png" alt="" style="width: 350px;"/><br /><br />
                Once you've clicked the avatar, a dialog will display asking you to select the photo that you want to upload.<br /><br />
                <img src="images/help_profile_pic_dialog.png" alt="" style="width: 350px;" />
              </p>
            </div>
            <div class="row">
              <h3>How can people find me for their next project?</h3>
              <p>
                In order for you to be searchable in our database, you must fill out your information located on the <a href="http://tacomafilmalliance.com/sandbox/profile.php?tab=myInfo">My info page</a>.  Once you fill in your information and update your headshot, you'll be listed in our talent database.  <strong>Note:</strong> You will not show up in this list until you fill in your information.  It is important to do so!
              </p>
            </div>
            <div class="row">
              <h3>What is the "Project creator"?</h3>
              <p></p>
            </div>  
            <div class="row">
              <h3>What's the "Slingshot" and how do I join?</h3>
              <p></p>
            </div>
            <div class="row">
              <h3>What's the WAM?</h3>
              <p></p>
            </div>  
            <div class="row">
              <h3>How do I find cast/crew for my next project?</h3>
              <p></p>
            </div>
          </div>
        </section>      
      </div>

      <div class="r20">
        <?php if($user->is_logged_in()){ require('../layout/userNav.php'); } ?>
      </div>

    </main>
    <!-- JS -->
    <?php 
        require('../layout/commonFooter.php');
        require('../includes/commonScripts.php');
    ?>
  </body>
</html>