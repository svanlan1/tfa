<?php require('../../../core/config.php'); 
	//if($user->is_logged_in()){ header('Location: home.php'); exit(); }
	$title = 'Tacoma Film Alliance - Add a resource';
	require('../../../layout/commonHead.php');
?>
  <body>
    <?php if($user->is_logged_in()) { 
        require('../../../layout/postNav.php');
      } else {
        require ('../../../layout/preNav.php');
      } 
    ?>
    <link rel="stylesheet" href="aboutus.css" />
    <main>
      <div class="r80">

      <section class="homepage" id="ourMission">
        <h2><img src="../../../images/alarm.svg" alt="" /> [MAIN HEAD]</h2>
        <div class="sectionContent" style="flex-flow: column;">
          <div class="full">
            <label for="resourceName">Name</label>
            <input type="text" id="resourceName" />
          </div>          
          <div class="full preUpload" style="text-align: center;">
            <label for="resourcePhotoUpload"><span class="screen-reader-only">Upload a photo of your resource</span></label>
            <input type="file" id="resourcePhotoUpload" class="screen-reader-only" data-name="resourcePhotoUpload" />
            <button class="fileUpload">
              <img src="/sandbox/images/upload.svg" alt="" />
              <span>Add a photo</span>
            </button>
            <span class="fileDisplay instructions"></span>
          </div>          
          <div class="full">
            <label for="resourceType">Type</label>
            <select id="resourceType">
              <option value=""></option>
              <option value="equipment">Equipment</option>
              <option value="location">Location</option>
            </select>
          </div>
          <div class="full">
            <label for="resourceDescription">Description</label>
            <textarea id="resourceDescription"></textarea>
          </div>
          <div class="full" style="text-align: center;">
            <button class="add" style="padding: 10px; width: 100px;">
              <i class="material-icons">cloud_upload</i>
                Add
            </button>
          </div>
        </div>
      </section>

      </div>

      <div class="r20">
        <section>
          <h2><img src="../../../images/notepad.svg" alt="" /> [ARTICLE HEAD]</h2>
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
        require('../../../layout/commonFooter.php');
        require('../../../includes/commonScripts.php');
    ?>
  </body>
</html>