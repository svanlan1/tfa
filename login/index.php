<?php require('../core/config.php'); 
  if($user->is_logged_in()){ header('Location: home.php'); exit(); }
  $title = 'Tacoma Film Alliance - Login';
  require('../layout/commonHead.php');
?>
  <body>
    <?php require('../layout/preNav.php'); ?>
    <main>
      <div class="r70">
        <section class="homepage" id="memberBenefits">
          <h2 class="header" style="position: absolute;">
            <img src="../images/member_benefits.png" alt="Member benefits" />
          </h2>
          <div class="sectionContent" style="margin: 0;">
            <ul class="benefits">
              <li style="background: url(../images/some_background_3.png) no-repeat;background-size: cover; height: 400px;padding: 0;width: 100%;border: 0;margin: 0;">
                <p>Access a growing talent database to find your cast and crew for your next project!</p>
                <img src="../images/slingshot_logo.png" alt="Slingshot" />
              </li>
              <li style="background: url(../images/some_background_1.jpg) no-repeat;background-size: cover; height: 400px;padding: 0;width: 100%;border: 0;margin: 0;">
                <p>Be the first to know about our upcoming film contests!</p>
                <img src="../images/wam_login.png" alt="Wait A Minute Film Festival" />
              </li>
              <li style="background: url(../images/some_background_2.jpg) no-repeat;background-size: cover; height: 400px;padding: 0;width: 100%;border: 0;margin: 0;">
                <p>Meet other local artists interested in all aspects of filmmaking!</p>
                <p>We're a great group and want to film with you!</p>
                <img src="../images/local_productions.png" alt="Local productions" />
              </li>
              <li style="background: url(../images/some_background_4.jpg) no-repeat;background-size: cover; height: 400px;padding: 0;width: 100%;border: 0;margin: 0;">
                <p>Proudly share your films with other members of the film community and get feedback!</p>
              </li>
            </ul>
          </div>
        </section>
      </div>  

      <div class="r25" style="margin-right: 1%;">
        <section class="homepage" id="loginPanel" style="padding: 0 10px 0 0;">
          <h2 class="header"><img src="../images/login_header.png" alt="Login" /></h2>
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