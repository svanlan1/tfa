<?php require('../core/config.php'); 
  if($user->is_logged_in()){ header('Location: home.php'); exit(); }
  $title = 'Tacoma Film Alliance - Login';
  require('../layout/commonHead.php');
?>
  <body>
    <?php require('../layout/preNav.php'); ?>
    <link rel="stylesheet" href="aboutus.css" />
    <main>
      <div class="r70">
        <section class="homepage" id="memberBenefits">
          <h2><img src="../../images/graph.svg" alt="" /> Member Benefits</h2>
          <div class="sectionContent">
            <ul class="benefits">
              <li>
                <img src="/sandbox/images/computer.svg" alt="" /> Get access to our Talent database and find your cast and crew for your next project!
                <p class="instructions">There are currently <span id="membersnumber"></span> members in the TFA!</p>
              </li>
              <li>
                <img src="/sandbox/images/business-meeting.svg" alt="" /> Meet other local artists interested in all aspects of filmmaking and grow your production company!
                <p class="instructions">We're a great group and want to film with you!</p>
              </li>
              <li>
                <img src="/sandbox/images/movie-projector.svg" alt="" /> Proudly share your films with other members and get feedback!
                <p class="instructions">Watch <span id="filmsnumber"></span> films inside of the TFA website!</p>
              </li>
            </ul>
          </div>
        </section>
      </div>  

      <div class="r25" style="margin-right: 1%;">
        <section class="homepage" id="loginPanel" style="padding: 0 10px 0 0;">
          <h2><img src="../../images/login.svg" alt="" /> Login</h2>
          <div class="sectionContent" style="flex-direction: column;">
            <div class="row">
              <label for="username">Username<span class="instructions red required">*</span></label>
              <input type="text" id="username" name="username" aria-required="true" aria-describedby="usernameErrorMsg" />
              <span id="usernameErrorMsg" class="inputErrorMsg instructions red">Username cannot be blank</span>
            </div>
            <div class="row">
              <label for="password">Password<span class="instructions red required">*</span></label>
              <input type="password" id="password" name="password" aria-required="true" aria-describedby="passwordErrorMsg" />
              <span id="passwordErrorMsg" class="inputErrorMsg instructions red">Password cannot be blank</span>
            </div>
            <div class="row">
              <button class="login service">
                <i class="material-icons" style="vertical-align: baseline;">send</i>
                Login
              </button>
            </div>
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