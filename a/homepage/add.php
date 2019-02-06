<?php require('../../core/config.php'); 
  if(!$user->is_logged_in()){ header('Location: index.php'); exit(); }
  if(!$user->isAdmin($_SESSION['admin']) ) { header('Location: ../index.php'); exit(); };
  $title = 'Tacoma Film Alliance - Administration - Add homepage post';
  require('../../layout/commonHead.php');
?>
  <body>
    <?php require('../../layout/adminNav.php'); ?>
    <main>
      <div class="r75">
        <section class="homepage" id="adminAddHomepagePost">
          <h2><img src="../../images/live.svg" alt="" /> Add homepage post</h2>
          <div class="sectionContent form">
              <div class="container">
                <div role="alert" class="alert error" tabindex="-1">
                  <span class="exclamation">
                    <i class="material-icons">error_outline</i>
                  </span>
                  <span class="errorText"></span>
                </div>
                <h3>The basics</h3>
                <div class="half">
                  <label for="title">Title</label>
                  <input type="text" id="title" data-name="title" />
                </div>
                <div class="half preUpload">
                  <label for="banner">Banner image</label>
                  <input type="file" id="banner" class="screen-reader-only" data-name="banner" />
                  <button class="fileUpload">
                    <img src="../../images/upload.svg" alt="" />
                    Upload a file
                  </button>
                  <img class="bannerDisplay" src="" alt="" />
                </div>
              </div>   
              <div class="container">
                <div class="r100" style="margin-bottom: 20px;">
                  <label for="lead" style="display: inline-block;">Lead</label><span class="instructions" style="margin-left: 10px;"> this is what will display when many stories are displayed at once</span>
                  <textarea id="lead" data-name="lead" style="height: 100px;"></textarea>
                </div>
                <div class="r100">
                  <label for="post" style="display: inline-block;">Post text</label><span class="instructions" style="margin-left: 10px;"> everything you want to tell the readers</span>
                  <textarea id="post" class="editor" data-name="post" name="post" aria-label="Post text" placeholder="Post text"></textarea>
                </div>  
              </div>
              <div class="container">
                <h3>Media</h3>
                <div class="clone">
                  <div class="r20" style="display: inline-block; width: 20%; vertical-align: top;">
                    <label for="platform-0">Platform</label>
                    <select id="platform-0" data-name="media">
                      <option value=""></option>
                      <option value="youtube">YouTube</option>
                      <option value="vimeo">Vimeo</option>
                      <option value="facebook">Facebook</option>
                    </select>
                  </div>
                  <div class="r75" style="width: 70%; display: inline-block; vertical-align: top; margin-left: 20px;">
                    <div>
                      <label for="media-0" data-num="0">Link to video</label>
                      <input type="text" id="media-0" aria-describedby="media_help-0" data-num="0" data-name="media" />
                      <span id="media_help-0" style="font-size: .8rem;">Only paste the URL, not the entire &lt;iframe /&gt; element.</span>
                    </div>
                  </div>
                </div>
                <div class="newArea"></div>
                <div class="r100">
                  <button class="add_media">
                    <i class="material-icons">add_circle</i>
                    Add another
                  </button>
                </div>
              </div>       
          </div>
        </section>

      </div>
      <div class="r25">
        <article>
          <h2><img src="../../images/notepad.svg" alt="" /> Actions</h2>
          <p class="instructions" style="font-size: .8rem; padding: 5px; border-bottom: solid 1px #ccc;">Before submitting, be sure that you've added all pertinent information to your post.  Currently, editing isn't a thing, so until I get that built, CHECK TWICE SUBMIT ONCE :) </p>
          <div style="padding: 5px; border-bottom: solid 1px #ccc;">
            <fieldset>
              <legend>Display on</legend>
              <div class="screen-reader-only">
                <input type="checkbox" checked id="dispOnPre" data-name="preLogin" />
                <label for="dispOnPre">Pre-login homepage</label>
              </div>
              <div class="screen-reader-only">
                <input type="checkbox" checked id="dispOnPost" data-name="postLogin" />
                <label for="dispOnPost">Post-login homepage</label>
              </div>
              <div>
                <input type="checkbox" id="exFeatured" data-name="featured" />
                <label for="exFeatured">Featured on pre-login homepage</label>
                <span class="instructions" id="exFeaturedHelp" style="font-size: .7rem; padding: 3px 10px 10px 10px;"><strong><i style="vertical-align: bottom; font-size: 1rem;" class="material-icons red">error_outline</i> Warning!</strong> Selecting this changes the featured posting on the public facing homepage.  Be very sure that you want to do this.</span>
              </div>
              <div>
                <input type="checkbox" id="inFeatured" data-name="featured" />
                <label for="inFeatured">Featured on post-login homepage</label>
              </div>              
            </fieldset>
          </div>
          <div class="sideActionButtons">
              <button class="cancel">
                <i class="material-icons">clear</i>
                Cancel
              </button>

              <button class="submit">
                <i class="material-icons">send</i>
                Save
              </button>              
          </div>
        </article>
      </div>
    </main>






    <!-- JS -->
    <?php 
        require('../../layout/commonFooter.php');
        require('../../includes/commonScripts.php');
    ?>
  </body>
</html>
