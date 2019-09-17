        <article id="notification">
          <h3><i class="material-icons red" style="vertical-align: sub;">error_outline</i> Ruh roh!</h3>
          <p>
            You haven't filled out your information yet.  You can do so by going to <a href="/p/account/index.php?tab=myInfo">this link</a>.
          </p>
        </article>
        <article id="article_user">
          <div class="loader"></div>
          <div class="showHide">
            <div id="headshotReminder" role="tooltip" aria-label="You haven't set your headshot yet">
              <a href="javascript:;" data-close="headshotReminder" class="closeReminder" style="position: absolute; right: 0; margin-right: 5px;">
                <i class="material-icons">close</i>
              </a>
              <h3>Add your headshot!</h3>
              <p>
                Let other members of TFA know who you are by adding your headshot by clicking on the headshot button. 
              </p>
            </div>          
            <div class="tfa_headshot" style="margin-left: -4px;" tabindex="0" role="button" aria-label="Update your headshot" title="Update your headshot"></div>
            <h3 style="margin-left: 52px;">
              <span></span>
              <span></span>
            </h3>
            <ul class="postLinks" style="margin: 10px 0 0 0;">
              <!-- <li class="none additionalActions"></li> -->
              <!-- <li>
                <a class="search" href="javascript:;">
                  <i class="material-icons">search</i>
                </a>                
                <input type="search" id="searchSite" placeholder="Search site" style="width: 93%; margin: 5px;" />
              </li> -->
              <li>
                <a href="/p/feed/"><img src="/images/rss-black.svg" alt="" /> Newsfeed</a>
              </li>
              <li>
                <a href="/p/messages/" id="myMessages">
                  <img src="/images/mail.svg" alt="" /> 
                  <span></span> 
                  Messages
                </a>
              </li>
              <li>
                <a href="/p/account/index.php?tab=myInfo"><img src="/images/information.svg" alt="" /> Account info</a>
              </li>
              <li class="none publicProfile">
                <a href="/profiles/"><img src="/images/resume.svg" alt="" /> Profile</a>
              </li> 
            </ul>
            <h3>
                <a href="javascript:;" class="expandSection" aria-controls="userLinksList" aria-expanded="false">
                  <i class="material-icons">add_circle_outline</i>
                  Actions
                </a>
            </h3>
            <div id="userLinksList" class="none">
              <ul class="postLinks">
                <li><a href="/p/account/?tab=myPhotos"><img src="/images/picture.svg" alt="" /> Your photo gallery</a></li>
                <li><a href="/p/account/?tab=myPosts"><img src="/images/write-letter.svg" alt="" /> Your posts</a></li>
                <li><a href="/p/account/?tab=myFilms"><img src="/images/script.svg" alt="" /> Your films</a></li>
                <li><a href="/p/account/?tab=myBinder"><img src="/images/binders.svg" alt="" /> Your binder</a></li>
                <li><a href="/p/account/?tab=myResources"><img src="/images/swiss-knife.svg" alt="" /> Your resources</a></li>
                <li>
                  <hr />
                </li>  
                <li>
                  <a href="../../help/"><img src="/images/help-black.svg" alt="" /> Help</a>
                </li> 
                <li>
                  <a href="../feedback/"><img src="/images/write-letter.svg" alt="" /> Send feedback</a>
                </li>                             
              </ul>
            </div>
            <div style="display:none;">
              <h3>
                <a href="javascript:;" class="photoGallery" aria-expanded="true">
                  <i class="material-icons">
                    remove_circle_outline
                  </i>
                  Your headshots
                </a>
              </h3>
              <div class="photoSection"></div>
            </div>
          </div>
        </article>