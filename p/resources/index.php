<?php require('../../core/config.php'); 
  //if($user->is_logged_in()){ header('Location: home.php'); exit(); }
  $title = 'Tacoma Film Alliance - Resources';
  require('../../layout/commonHead.php');
?>
  <body>
    <?php if($user->is_logged_in()) { 
        require('../../layout/postNav.php');
      } else {
        require ('../../layout/preNav.php');
      } 
    ?>
    <main>
      <div class="r75">

        <section class="columns" id="resourcesLanding">
          <h2><img src="../../images/toolbox.svg" alt="" /> Resources</h2>
          <div class="sectionContent">
            <div class="full" style="padding-left: 10px;">
              <button class="addResource">
                <i class="material-icons">add_circle</i>
                 Add a resource
              </button>
            </div>
            <div class="full"">
              <ul class="binderList" style="margin-top: 10px;">
                <li style="display: none;">
                  <div class="binderActions">
                    <a href="javascript:;" class="deleteUpload">
                      <i class="material-icons">
                        details
                      </i>
                    </a>
                  </div>                    
                  <div>
                    <div class="binderIcon" style="vertical-align: top;">
                      <a href="javascript:;" class="binderLink" style="color: #000;">
                        <i class="material-icons">camera_alt</i>
                      </a>
                    </div>
                    <div class="binderInfo">
                      <strong>Name: </strong><span class="binderDetail"></span><br />
                      <strong>Details: </strong><span class="binderDetail"></span><br />
                      <strong>Member: </strong><span class="binderDetail"></span>
                    </div>
                  </div>
                </li>
              </ul>              
            </div> 
          </div>
        </section>
      </div>

      <div class="r25">
        <?php
          require('../../layout/userNav.php');
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