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
      <div class="r100">

      <section class="homepage" id="addResourceSection">
        <h2><img src="../../../images/toolbox.svg" alt="" /> Add a resource</h2>
        <div class="sectionContent" style="display: block;">
          <div class="half">
            <label for="resourceName">Name</label>
            <input type="text" id="resourceName" />
          </div>          
          <div class="half preUpload" style="text-align: center; margin-bottom: 25px; padding-bottom: 25px;">
            <label for="resourcePhotoUpload"><span class="screen-reader-only">Upload a photo of your resource</span></label>
            <input type="file" id="resourcePhotoUpload" class="screen-reader-only" data-name="resourcePhotoUpload" />
            <button class="fileUpload">
              <img src="/sandbox/images/upload.svg" alt="" />
              <span>Add a photo</span>
            </button>
            <span class="fileDisplay instructions"></span>
          </div>          
          <div class="half" style="margin-bottom: 25px; padding-bottom: 25px;">
            <label for="resourceType">Type</label>
            <select id="resourceType">
              <option value=""></option>
              <option value="equipment">Equipment</option>
              <option value="location">Location</option>
            </select>
          </div>
          <div class="half">

          </div>
          <div class="full">
            <label for="resourceDescription">Description</label>
            <textarea id="resourceDescription"></textarea>
          </div>
          <div class="half" style="text-align: center;">
            <button class="add" style="padding: 10px; width: 100px;">
              <i class="material-icons">cloud_upload</i>
                Add
            </button>
          </div>
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