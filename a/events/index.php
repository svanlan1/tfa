<?php require('../../core/config.php'); 
	//if($user->is_logged_in()){ header('Location: home.php'); exit(); }
	$title = 'Tacoma Film Alliance - Manage events';
	require('../../layout/commonHead.php');
?>
  <body>
    <?php require('../../layout/adminNav.php'); ?>
    <main>
      <div class="r75">
        <section class="homepage" id="ourMission">
          <h2><img src="../../images/calendar-white.svg" alt="" /> Manage events</h2>
          <div class="sectionContent" style="flex-flow: column;">
            <div class="container">
              <div class="row">
                <h3>Add a new event</h3>
              </div>
              <div class="half">
                <label for="eventName">Event name</label>
                <textarea style="height: 135px;" id="eventName" placeholder="Event name" aria-required="true"></textarea>
              </div>
              <div class="half datedeets">
                <label for="eventDate">Event date</label>
                <input type="text" id="eventDate" data-toggle="datepicker" placeholder="Date" aria-required="true" />
                <input id="startTime" style="margin: 10px 0;" type="text" aria-label="Start time" placeholder="Start time, xx:xx pm" aria-required="true" />
                <input id="endTime" style="margin: 10px 0;" type="text" aria-label="End time" placeholder="End time, xx:xx pm" aria-required="true" />
              </div>
              <div class="full">
                <label class="screen-reader-only" for="bannerUpload">Upload your file</label>
                <input type="file" id="bannerUpload" class="screen-reader-only" data-name="bannerUpload" aria-required="true" />
                <button class="fileUpload">
                  <img src="/sandbox/images/upload.svg" alt="">
                  <span>Select an event photo</span>
                </button>
              </div>
              <div class="full">
                <label for="eventDetails">Details</label>
                <textarea id="eventDetails"></textarea>
              </div>
              <div class="full" style="margin: 15px 0; background-color: #fefefe;">
                <fieldset>
                  <legend>What type of event is this?</legend>
                  <div>
                    <input type="radio" name="eventtype" id="generalmeeting" />
                    <label for="generalmeeting">General meetup</label>
                  </div>
                  <div>
                    <input type="radio" name="eventtype" id="slingshot" />
                    <label for="slingshot">Slingshot</label>
                  </div>
                  <div>
                    <input type="radio" name="eventtype" id="reelnight" />
                    <label for="reelnight">Open reel night</label>
                  </div>
                  <div>
                    <input type="radio" name="eventtype" id="other" />
                    <label for="other">Other</label>
                    <div class="other_rd_fld">
                      <input type="text" id="other_event_type" placeholder="Other" />
                    </div>
                  </div>
                </fieldset>
              </div>
              <div class="half">
                <label for="linkToMeetup">Link to meetup</label>
                <input type="text" id="linkToMeetup" placeholder="http://www.meetup.com/event_info" />
              </div>
              <div class="half">
                <label for="linkToFacebook">Link to facebook</label>
                <input type="text" id="linkToFacebook" placeholder="http://www.facebook.com/event_info" />
              </div>
              <div class="half">
                <label for="location">Location</label>
                <input type="text" id="location" placeholder="The Forum" />
              </div>
              <div class="half">
                <label for="linkToGmaps">Google maps shortcut</label>
                <input type="text" id="linkToGmaps" placeholder="https://goo.gl/maps/BKBqPs46tHz" />
              </div>
              <div class="row">
                <button class="add" id="addEvent">
                  <i class="material-icons">send</i>
                  Submit
                </button>
              </div>
              <div class="row">
                <h3>Previous events</h3>
                <ul id="prevevents"></ul>
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