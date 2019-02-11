<?php require('../../core/config.php'); 
  if(!$user->is_logged_in()){ header('Location: index.php'); exit(); }
  if(!$user->isAdmin($_SESSION['admin']) ) { header('Location: ../index.php'); exit(); };
  $title = 'Tacoma Film Alliance - Administration - Add a film court review';
  require('../../layout/commonHead.php');
?>
  <body>
    <?php require('../../layout/adminNav.php'); ?>
    <main>
      <div class="r75">
        <section class="homepage" id="adminAddHomepagePost">
          <h2><img src="../../images/gavel.svg" alt="" /> Film Court - New Review</h2>
          <div class="sectionContent form">
            <div class="container">
              <div role="alert" class="alert error" tabindex="-1">
                <span class="exclamation">
                  <i class="material-icons">error_outline</i>
                </span>
                <span class="errorText">Please correct the outlined errors below</span>
              </div>
              <h3>The basics</h3>
              <div class="half">
                <label for="title">The Film</label>
                <input type="text" id="title" data-name="title" aria-required="true" />
              </div>
              <div class="half preUpload">
                <label for="banner">Banner image</label>
                <input aria-required="true" type="file" id="banner" class="screen-reader-only" data-name="banner" />
                <button class="fileUpload">
                <img src="../../images/upload.svg" alt="" />
                <span>Upload a file</span>
                </button>
                <img class="bannerDisplay" src="" alt="" />
              </div>
              <div class="half" style="margin-top: 25px;">
                <label for="trailer">Link to trailer</label>
                <input type="text" id="trailer" data-name="trailer" />
              </div>
              <div class="half" style="margin-top: 25px;">
                <label for="director">Director</label>
                <input type="text" id="director" data-name="director" />
              </div>
              <div class="full" style="margin-top: 25px;">
                <h3>Charges</h3>
                <a class="addCharge" href="javascript:;">Add a charge</a>
                <ol>
                  <li>
                    <label for="charge_1">Charge 1</label>
                    <!-- <input type="text" id="charge_1" data-count="1" /> -->
                    <textarea id="charge_1" data-count="1" class="editor" data-name="charge_1" name="charge_1" aria-label="Charge 1" data-type="charge" placeholder="Charge 1"></textarea>
                  </li>
                </ol>
              </div>
              <div class="full" style="margin-top: 25px;">
                <h3>Defenses</h3>
                <ol>
                  <li>
                    <label for="defense_1">Defense 1</label>
                    <textarea id="defense_1" data-count="1" class="editor" data-name="defense_1" name="defense_1" data-type="defense" aria-label="Defense 1" placeholder="Defense 1"></textarea>
                  </li>
                </ol>                
              </div>
              <div class="full" style="margin-top: 25px; border-top: solid 1px #c9c9c9; padding-top: 25px;">
                <h3 id="closingArgumentsHead">Closing Arguments</h3>
                <textarea aria-required="true" id="closingArguments" aria-labelledby="closingArgumentsHead" data-count="1" class="editor" data-name="closingArguments" name="closingArguments" placeholder="Closing Arguments"></textarea>
              </div>
              <div class="full" style="margin-top: 25px; border-top: solid 1px #c9c9c9; padding-top: 25px;">
                <button class="submit">
                  <i style="vertical-align: baseline" class="material-icons">send</i>
                  Submit
                </button>
                <button class="cancel">
                  <i style="vertical-align: baseline" class="material-icons">delete</i>
                  Cancel
                </button>
              </div>
            </div> 
          </div>
        </section>

      </div>
      <div class="r25">
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
