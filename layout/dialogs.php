<div class="modal"></div>
<div class="reminderModal"></div>
<div class="dialog" role="dialog" aria-labelledby="dialogh2" data-dialog-id="default">
	<div role="document">
		<h2 id="dialogh2">Dialog example</h2>
		<p>This is some text</p>
	</div>
</div>
<div class="dialog" role="dialog" aria-labelledby="sdialogh2" data-dialog-id="search">
	<div role="document" tabindex="-1">
		<a href="javascript:;" role="button" class="closeDialog">
			<i class="material-icons">clear</i>
		</a>
		<h2 id="sdialogh2">Search results <span class="byline"></span></h2>
		<div class="loader"></div>
		<div class="results showHide">
			<div class="members">
				<h3>Members</h3>
				<ul></ul>
			</div>
			<div class="posts">
				<h3>Posts</h3>
				<ul></ul>
			</div>
			<div class="films">
				<h3>Films</h3>
				<ul></ul>
			</div>
		</div>
	</div>
</div>
<div class="dialog" role="dialog" aria-label="User photo dialog" data-dialog-id="photos">
	<div role="document" tabindex="-1">
		<a href="javascript:;" role="button" class="closeDialog">
			<i class="material-icons">clear</i>
		</a>
		<div class="showHide">
			<div>
				<img />
			</div>
		</div>
	</div>
</div>
<div class="modal"></div>
<div class="dialog" role="dialog" aria-labelledby="hsdialogh2" data-dialog-id="headshot">
	<div class="loader" style="display:none;"></div>
	<div role="document">
		<a href="javascript:;" role="button" class="closeDialog">
			<i class="material-icons">clear</i>
		</a>		
		<h2 id="hsdialogh2">Change your headshot</h2>
        <div class="full preUpload" style="text-align: center;">
          <label for="banner"><span class="screen-reader-only">Upload a photo to change your headshot</span></label>
          <input type="file" id="headshot" class="screen-reader-only" data-name="headshot" />
          <button class="fileUpload">
            <img src="/sandbox/images/upload.svg" alt="" />
            <span>Upload a new headshot</span>
          </button>
          <img class="bannerDisplay" src="" alt="" />
        </div>	
        <span class="instructions" style="padding: 10px; font-weight: 500; border-top: solid 1px #ccc;">
        	Or, select one of your previously uploaded photos.  Please do not upload the same photo multiple times.  Server space costs money, yo.
        </span>	
		<div class="hsphotoGallery">

		</div>
		<div class="full" style="text-align: center;">
			<div class="errorText">
				<h3><i class="material-icons red">error_outline</i><span></span></h3>
				<p></p>
			</div>
			<button class="changeHeadshot">
				<i class="material-icons">cloud_upload</i>
				Upload
			</button>
		</div>
	</div>
</div>

<div class="dialog" role="dialog" aria-labelledby="sdialogh2" data-dialog-id="scriptUpload">
	<div class="loader" style="display:none;"></div>
	<div role="document">
		<a href="javascript:;" role="button" class="closeDialog">
			<i class="material-icons">clear</i>
		</a>		
		<h2 id="sdialogh2">Upload a script</h2>
        <div class="full preUpload" style="text-align: center;">
          <label for="scriptUpload"><span class="screen-reader-only">Upload a new script</span></label>
          <input type="file" id="scriptUpload" class="screen-reader-only" data-name="scriptUpload" />
          <button class="fileUpload">
            <img src="/sandbox/images/upload.svg" alt="" />
            <span>Select your script to upload</span>
          </button>
          <span class="fileDisplay instructions"></span>
        </div>
        <div class="full" style="display: block; text-align: center; margin: 15px 0 15px 0;">
        	<label for="ssTitle">Script title</label>
        	<input type="text" id="ssTitle" name="ssTitle" style="width: 50%;" />
        </div>
        <div class="full" style="display: block; text-align: center; margin: 15px 0 15px 0;">
        	<label for="ssProject">Project month</label>
        	<select id="ssProject" style="width: 50%;">
        		<option value=""></option>
        		<option value="january">January</option>
        		<option value="february">February</option>
        		<option value="march">March</option>
				<option value="april">April</option>
				<option value="may">May</option>
				<option value="june">June</option>
				<option value="july">July</option>
				<option value="august">August</option>
				<option value="september">September</option>
				<option value="october">October</option>
				<option value="november">November</option>
				<option value="december">December</option>
        	</select>
        </div>
		<div class="full" style="text-align: center;">
			<div class="errorText">
				<h3><i class="material-icons red">error_outline</i><span></span></h3>
				<span class="longDesc"></span>
			</div>
              <button class="scriptUpload">
                <i class="material-icons">cloud_upload</i>
                 Upload
               </button>
		</div>
	</div>
	<div class="successfullyUploaded">
		<i class="material-icons">check_circle</i>
		Successfully uploaded.
	</div>
</div>

<div class="dialog" role="dialog" aria-labelledby="pdialogh2" data-dialog-id="post" style='text-align: center;'>
	<div class="loader" style="display:none;"></div>
		<div role="document">
			<a href="javascript:;" role="button" class="closeDialog">
				<i class="material-icons">clear</i>
			</a>		
			<h2 id="sdialogh2" class="screen-reader-only">Add your post!</h2>
			<div class="container" style="padding: 25px 5px;">
				<label for="addPostTextarea" class="screen-reader-only">What do you want to say?</label>
				<textarea placeholder="What do you want to say?" aria-describedby="postCounter" maxlength="256" id="addPostTextarea"></textarea>
				<span class="counter" id="postCounter"><span>256</span> characters remaining</span>
				<div class="row">
					<button class="add submitPost">
						<i class="material-icons">send</i>
						Submit
					</button>
				</div>
			</div>
		</div>
	</div>
</div>