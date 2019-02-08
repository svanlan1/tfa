<?php require('../../core/config.php'); 
	//if($user->is_logged_in()){ header('Location: home.php'); exit(); }
	$title = 'Tacoma Film Alliance - Update ticker';
	require('../../layout/commonHead.php');
?>
  <body>
    <?php require('../../layout/adminNav.php'); ?>
    <main>
      <div class="r75">

        <section class="homepage" id="ourMission">
          <h2><img src="../../images/ticker.svg" alt="" /> Add meeting minutes</h2>
          <div class="sectionContent" style="flex-flow: column;">
            <div class="container">
              <p>In the past we have discussed making our meeting minutes public to all.  In an effort to achieve that transparency, we're now able to upload the files that Dave (thanks Dave!) creates for all to see.  Just follow the steps below to upload the file.</p>
              <p>
                Upload either a .PDF or .DOC file.  These files will be displayed to all visitors to the "About us" page.
              </p>
              <div class="row stepped" data-disp="initial">
                <fieldset>
                  <legend>Are you submitting a file or a link?</legend>
                  <div>
                    <input type="radio" name="mtype" id="mtypefile" />
                    <label for="mtypefile">File upload</label>
                  </div>
                  <div>
                    <input type="radio" name="mtype" id="mtypelink" />
                    <label for="mtypelink">Link to the minutes</label>
                  </div>
                </fieldset>
              </div>
              <div class="row stepped" data-disp="upload">
                <label class="screen-reader-only" for="minuteUpload">Upload your file</label>
                <input type="file" id="minuteUpload" class="screen-reader-only" data-name="minutesUpload" />
                <button class="fileUpload">
                  <img src="/sandbox/images/upload.svg" alt="">
                  <span>Select the file to upload</span>
                </button>
              </div>
              <div class="row stepped" data-disp="link">
                <label for="linkToMinutes">Enter the link:</label>
                <input type="text" id="linkToMinutes" />
              </div>
              <div class="row stepped" data-disp="type">
                <fieldset>
                  <legend>What type of meeting was this?</legend>
                  <div>
                    <input type="radio" name="ttype" id="execsonly" />
                    <label for="execsonly">Executive meeting (first Monday)</label>
                  </div>
                  <div>
                    <input type="radio" name="ttype" id="generalmeeting" />
                    <label for="generalmeeting">General Meetup (third Monday)</label>
                  </div>
                </fieldset>
              </div>
              <div class="row stepped" data-disp="monday">
                <label for="mondays" class="screen-reader-only">Select which meeting</label>
                <select id="mondays">
                  <option value=""></option>
                </select>
              </div>
              <div class="row stepped" data-disp="wednesday">
                <label for="wednesdays" class="screen-reader-only">Select which meeting</label>
                <select id="wednesdays">
                  <option value=""></option>
                </select>
              </div>
              <div class="row">
                <button class="add addMinutes" id="addMinutes">
                  <i class="material-icons">send</i>
                  Submit
                </button>
              </div>
              <div class="row">
                <h3>Previous meeting minutes</h3>
                <ul id="prevmins"></ul>
              </div>
            </div>
          </div>
        </section>
      </div>

      <div class="r25">
        <?php
          if($user->is_logged_in()) {
            require('../../layout/adminUserNav.php');
          } else {
            require('../../layout/genericArticle.php');
          }
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