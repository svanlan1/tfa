<?php require('../../core/config.php'); 
	if(!$user->is_logged_in()){ header('Location: index.php'); exit(); }
	$title = 'Tacoma Film Alliance - My Account';
	require('../../layout/commonHead.php');
?>
  <body>
    <?php require('../../layout/postNav.php'); ?>
    <main>
      <div class="r75">
        <section class="account" id="myAccount">
          <h2><img src="/images/avatar.svg" alt="" /> My Account</h2>
          <div class="sectionContent" style="flex-flow: column;">
            <ul role="tabset">
              <li>
                <a role="tab" aria-controls="myPhotosDiv" href="javascript:;" aria-selected="true" data-id="myPhotos">Photos</a>
              </li>
              <li>
                <a role="tab" aria-controls="myPostsDiv" href="javascript:;" aria-selected="false" data-id="myPosts">Posts</a>
              </li>
              <li>
                <a role="tab" aria-controls="myFilmsDiv" href="javascript:;" aria-selected="false" data-id="myFilms">Films</a>
              </li>               
              <li>
                <a role="tab" aria-controls="myBinderDiv" href="javascript:;" aria-selected="false" data-id="myBinder">Binder</a>
              </li>
              <li>
                <a role="tab" aria-controls="myResourcesDiv" href="javascript:;" aria-selected="false" data-id="myResources">Resources</a>
              </li>
              <li>
                <a role="tab" aria-controls="myInfoDiv" href="javascript:;" aria-selected="false" data-id="myInfo">My info</a>
              </li>  
            </ul>
            <div role="tabpanel" id="myPhotosDiv" tabindex="-1">
                <div class="loader"></div>
                <div role="alert" class="alert normal none" tabindex="-1">
                  <span class="exclamation">
                    <i class="material-icons" style="color: #000;">send</i>
                  </span>
                  <span class="text">Uh oh</span>
                  <p>
                    You haven't posted anything yet :(
                  </p>
                  <p>
                    No need to worry!  You can share your work with the world on <a href="../feed/">this page</a>
                  </p>
                </div>
                <div class="myPhotoGallery" style="display:none;">
                      
                </div>
            </div>
            <div role="tabpanel" id="myPostsDiv" tabindex="-1">
                <div role="alert" class="alert normal" tabindex="-1" style="display: block;">
                  <span class="exclamation">
                    <i class="material-icons" style="color: #000;">group_work</i>
                  </span>
                  <span class="text">Uh oh</span>
                  <p>
                    You haven't posted anything yet :(
                  </p>
                  <p>
                    No need to worry!  You can share your work with the world on <a href="../feed/">this page</a>
                  </p>
                </div>
            </div>
            <div role="tabpanel" id="myFilmsDiv" tabindex="-1">
                <div role="alert" class="alert normal" tabindex="-1" style="display: block;">
                  <span class="exclamation">
                    <i class="material-icons" style="color: #000;">group_work</i>
                  </span>
                  <span class="text">Uh oh</span>
                  <p>
                    You haven't posted anything yet :(
                  </p>
                  <p>
                    No need to worry!  You can share your work with the world on <a href="../films/">this page</a>
                  </p>
                </div>
            </div>
            <div role="tabpanel" id="myBinderDiv" tabindex="-1">
              <div role="alert" class="alert normal" tabindex="-1" style="display: block;">
                <span class="exclamation">
                  <i class="material-icons" style="color: #000;">group_work</i>
                </span>
                <span class="text">Uh oh</span>
                <p>
                  You haven't posted anything yet :(
                </p>
                <p>
                  No need to worry!  You can share your work with the world on <a href="../feed/">this page</a>
                </p>
              </div>
              <div class="full">
                  <p class="instructions">
                    This is where you'll find all of the scripts that you've uploaded to all of your TFA projects.  Only people to who'm you've given access to will be able to access these files.
                  </p>

              </div>
              <div class="papers none">
                <div class="script">
                  <div class="title">
                    <a href="javascript:;">
                      <span>Ain't No Sun Shinin'</span>
                      <img src="../../images/script.svg" alt="" />
                    </a>
                  </div>
                  <div class="details">
                    <span class="byline">Dec. 21, 2018</span>
                  </div>
                </div>
              </div>
            </div>
            <div role="tabpanel" id="myResourcesDiv" tabindex="-1">
                <div role="alert" class="alert normal" tabindex="-1" style="display: block;">
                  <span class="exclamation">
                    <i class="material-icons" style="color: #000;">group_work</i>
                  </span>
                  <span class="text">Uh oh</span>
                  <p>
                    You haven't posted anything yet :(
                  </p>
                  <p>
                    No need to worry!  You can share your work with the world on <a href="../resources/">this page</a>
                  </p>
                </div>
                <ul class="binderList">
                  <li style="display: none;">
                    <div class="binderActions">
                      <a href="javascript:;" class="deleteUpload">
                        <i class="material-icons">
                          delete
                        </i>
                      </a>
                    </div>                    
                    <div>
                      <div class="binderIcon">
                        <a href="javascript:;" class="binderLink">
                          <i class="material-icons">landscape</i>
                        </a>
                      </div>
                      <div class="binderInfo">
                        <strong>Name: </strong><span class="binderDetail"></span><br />
                        <strong>Description: </strong><span class="binderDetail"></span>
                      </div>
                    </div>
                  </li>
                </ul>                
            </div>
            <div role="tabpanel" id="myInfoDiv" tabindex="-1">
              <h3>The basics</h3>
              <div style="margin-bottom: 25px;">
                <div class="half">
                  <label for="firstname">First name <span class="required instructions red">*</span><span class="instructions red none" id="fnErrMsg"> First name cannot be blank</span></label>
                  <input type="text" id="firstname" aria-required="true" aria-describedby="fnErrMsg" />
                  
                </div>
                <div class="half">
                  <label for="lastname">Last name <span class="required instructions red">*</span><span class="instructions red none" id="lnErrMsg"> Last name cannot be blank</span></label>
                  <input type="text" id="lastname" aria-required="true" aria-describedby="lnErrMsg" />
                  
                </div>
                <div class="half">
                  <label for="city">Location <span class="instructions">City and State</span></label>
                  <input type="text" id="city" />           
                </div>
                <div class="half">
                  <label for="phone">Phone number</label>
                  <input type="text" id="phone" />
                </div>
                <div class="half">
                  <label for="username">Username <span class="instructions"><a class="popover" data-text="This is a system feature and we are still in beta.  Until we get out of the beta, your email address and username cannot be changed." data-title="Why can't I change my username?"  href="javascript:;">Why can't I edit this?</a></span></label>
                  <input type="text" disabled id="username" />
                </div>
                <div class="half">
                  <label for="email">E-mail address <span class="instructions"><a class="popover" data-text="This is a system feature and we are still in beta.  Until we get out of the beta, your email address and username cannot be changed." data-title="Why can't I change my email address?" href="javascript:;">Why can't I edit this?</a></span></label>
                  <input type="text" disabled id="email" />
                </div> 
              </div>
              <h3>Roles</h3>
              <div style="margin-bottom: 25px;">
                <div class="half" style="border-right: solid 1px #e9e9e9;" id="primaryRoleInfo">
                  <h5 id="prih5">Primary role</h5>
                  <select id="role" aria-labelledby="prih5" data-label="primaryRole">
                    <option value=""></option>
                    <option value="actor">Actor</option>
                    <option value="actress">Actress</option>
                    <option value="director">Director</option>
                    <option value="writer">Writer</option>
                    <option value="cinematographer">Cinematographer</option>
                    <option value="editor">Editor</option>
                    <option value="sound">Sound engineer</option>
                    <option value="assistantdirector">Assistant Director</option>
                    <option value="locations">Location Scout</option>
                    <option value="music">Musician</option>
                    <option value="producer">Producer</option>
                  </select>
                  <div class="role_info" id="actorInfo">
                    <div class="row full">
                      <label for="actor_ageRange">Age range</label>
                      <select id="actor_ageRange" data-label="ageRange">
                        <option value="">No selection</option>
                        <option value="1825">18-25</option>
                        <option value="2635">26-35</option>
                        <option value="3645">36-45</option>
                        <option value="4655">46-55</option>
                        <option value="5665">56-65</option>
                        <option value="6675">66-75</option>
                        <option value="75plus">75+</option>
                      </select>
                    </div>
                    <div class="row full">
                      <label for="union">Union/Non-union</label>
                      <select id="union" data-label="union">
                        <option value="">No selection</option>
                        <option value="sag">SAG</option>
                        <option value="aftra">AFTRA</option>
                        <option value="sagaftra">SAG-AFTRA</option>
                        <option value="nonunion">Non-union</option>
                      </select>
                    </div>
                    <div class="row full">
                      <label for="representation">Representation <span class="instructions">(if applicable)</span></label>
                      <input type="text" id="representation" data-label="representation" />
                    </div>
                    <div class="row full">
                      <label for="imdb">Link to IMDB page</label>
                      <input type="text" id="imdb" data-label="imdb" />
                    </div>
                    <!-- <div class="row full">
                      <label for="actorbio">Short acting biography</label>
                      <textarea id="actorbio" data-label="bio"></textarea>
                    </div> -->
                  </div>
                  <div class="role_info" id="productionInfo">
                    <div class="row">
                      <label for="filmsDirected">Number of films</label>
                      <input type="text" data-type="range" id="filmsDirected" data-label="filmsDirected" />
                    </div>
                    <div class="row">
                      <label for="dir_imdb">Link to IMDB page</label>
                      <input type="text" id="dir_imdb" data-label="imdb" />
                    </div>
                    <!-- <div class="row full">
                      <label for="dirbio">Short biography</label>
                      <textarea id="dirbio" data-label="bio"></textarea>
                    </div>               -->
                  </div>
                  <div class="role_info" id="soundInfo"></div>
                  <div class="role_info" id="otherInfo"></div>          
                </div>
                <div class="half" style="margin-left: 10px;" id="secondaryRoleInfo">
                  <h5 id="sech5">Secondary role</h5>
                  <select id="secondaryrole" aria-labelledby="sech5" data-label="secondaryRole">
                    <option value=""></option>
                    <option value="actor">Actor</option>
                    <option value="actress">Actress</option>
                    <option value="director">Director</option>
                    <option value="writer">Writer</option>
                    <option value="cinematographer">Cinematographer</option>
                    <option value="editor">Editor</option>          
                    <option value="sound">Sound engineer</option>
                    <option value="assistantdirector">Assistant Director</option>
                    <option value="locations">Location Scout</option>
                    <option value="music">Musician</option>
                    <option value="producer">Producer</option>
                  </select> 
                  <div class="role_info" id="sec_actorInfo">
                    <div class="row full">
                      <label for="sec_actor_ageRange">Age range</label>
                      <select id="sec_actor_ageRange" data-label="ageRange">
                        <option value="">No selection</option>
                        <option value="1825">18-25</option>
                        <option value="2635">26-35</option>
                        <option value="3645">36-45</option>
                        <option value="4655">46-55</option>
                        <option value="5665">56-65</option>
                        <option value="6675">66-75</option>
                        <option value="75plus">75+</option>
                      </select>
                    </div>
                    <div class="row full">
                      <label for="sec_union">Union/Non-union</label>
                      <select id="sec_union" data-label="union">
                        <option value="">No selection</option>
                        <option value="sag">SAG</option>
                        <option value="aftra">AFTRA</option>
                        <option value="sagaftra">SAG-AFTRA</option>
                        <option value="nonunion">Non-union</option>
                      </select>
                    </div>
                    <div class="row full">
                      <label for="sec_representation">Representation <span class="instructions">(if applicable)</span></label>
                      <input type="text" id="sec_representation" data-label="representation" />
                    </div>
                    <div class="row full">
                      <label for="sec_imdb">Link to IMDB page</label>
                      <input type="text" id="sec_imdb" data-label="imdb" />
                    </div>
                    <!-- <div class="row full">
                      <label for="sec_actorbio">Short acting biography</label>
                      <textarea id="sec_actorbio" data-label="bio"></textarea>
                    </div> -->
                  </div>  
                  <div class="role_info" id="sec_productionInfo">
                    <div class="row">
                      <label for="sec_filmsDirected">Number of films</label>
                      <input type="text" data-type="range" id="sec_filmsDirected" data-label="filmsDirected" />
                    </div>
                    <div class="row">
                      <label for="sec_dir_imdb">Link to IMDB page</label>
                      <input type="text" id="sec_dir_imdb" data-label="imdb" />
                    </div>
                    <!-- <div class="row full">
                      <label for="sec_dirbio">Short biography</label>
                      <textarea id="sec_dirbio" data-label="bio"></textarea>
                    </div>                 -->
                  </div>
                  <div class="role_info" id="sec_soundInfo"></div>
                  <div class="role_info" id="sec_otherInfo"></div>              
                </div>
              </div>     
              <h3>Additional info</h3>
              <div style="margin-bottom: 25px;">
                <div class="half">
                  <label for="reel">Link to reel</label>
                  <input type="text" id="reel" />
                </div>
                <div class="half">
                  <label for="personalsite">Personal website</label>
                  <input type="text" id="personalsite" />
                </div>
                <div class="full">
                  <label for="bio">Biography</label>
                  <textarea id="bio"></textarea>
                </div>  
              </div>
              <h3 class="exec">Executive</h3>
              <div class="exec" style="margin-bottom: 25px;">
                <span class="instructions" style="font-size: 11px;">This section will only display for executive members of the Tacoma Film Alliance</span>       
                <div class="full">
                  <label for="exec_profile">Executive profile</label>
                  <textarea id="exec_profile"></textarea>
                </div>
              </div>
              <div style="margin-bottom: 25px;">
                <div class="full">
                  <button class="submit">
                    <i class="material-icons">
                      send
                    </i>
                    Submit
                  </button>
                </div>
              </div>              
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
