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
			<span class="screen-reader-only">Close search dialog</span>
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
			<span class="screen-reader-only">Close photos dialog</span>
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
			<span class="screen-reader-only">Close add headshot dialog</span>
		</a>	
		<h2 id="hsdialogh2">Change your headshot</h2>
        <div class="full preUpload" style="text-align: center;">
          <label for="banner"><span class="screen-reader-only">Upload a photo to change your headshot</span></label>
          <input type="file" id="headshot" class="screen-reader-only" data-name="headshot" />
          <button class="fileUpload">
            <img src="/images/upload.svg" alt="" />
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
			<span class="screen-reader-only">Close upload script dialog</span>
		</a>	
		<h2 id="sdialogh2">Upload a script</h2>
        <div class="full preUpload" style="text-align: center;">
          <label for="scriptUpload"><span class="screen-reader-only">Upload a new script</span></label>
          <input type="file" id="scriptUpload" class="screen-reader-only" data-name="scriptUpload" />
          <button class="fileUpload">
            <img src="/images/upload.svg" alt="" />
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
				<span class="screen-reader-only">Close add post dialog</span>
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

<div class="dialog" role="dialog" aria-labelledby="messdialogh2" data-dialog-id="sendMessage">
	<a href="javascript:;" role="button" class="closeDialog">
		<i class="material-icons">clear</i>
		<span class="screen-reader-only">Close send message dialog</span>
	</a>
	<div role="document">
		<h2 id="messdialogh2">Send a message</h2>
		<div class="container" style="padding: 0px 5px 25px 5px;">
			<p class="row instructions">
				Begin typing to search for the member you want to message
			</p>
			<div class="row" style="margin: 10px;">
				<label class="screen-reader-only">Send message to</label>
				<input type="search" id="sendToMember" placeholder="Who are you sending this to?" style="width: 97.5%; padding: 20px; text-indent: 5px;" />
			</div>
			<div class="row msgSearchResults">
				<ul></ul>
			</div>
			<div class="row" style="margin: 10px;">
				<textarea id="userMessageText" aria-label="What's your message?" placeholder="Your message"></textarea>
			</div>
			<div class="row" style="margin: 10px 0 10px 10px; padding: 5px">
				<button class="add">
					<i class="material-icons">send</i>
					Send
				</button>
			</div>
		</div>
	</div>
</div>

<div class="dialog" role="dialog" aria-labelledby="addfilmdialogh2" data-dialog-id="addFilm">
	<a href="javascript:;" role="button" class="closeDialog">
		<i class="material-icons">clear</i>
		<span class="screen-reader-only">Close add film dialog</span>
	</a>
	<div role="document">
		<h2 class="screen-reader-only" id="addfilmdialogh2">
			Add your film
		</h2>
	</div>
	<div class="formFields">
		<div>
			<label for="filmTitle">Film title</label>
			<input type="text" id="filmTitle" placeholder="Enter your film title" data-field="name" />
		</div>
		<div>
			<label for="filmLink">Link to film</label>
			<input type="text" id="filmLink" placeholder="https://www.youtube.com/watch?v=_JLAmQjDiRM" data-field="link" />
		</div>		
		<div>
			<label for="filmSynopsis">Synopsis</label>
			<textarea id="filmSynopsis" placeholder="A brief description of the film" data-field="descrip"></textarea>
		</div>
		<div>
			<fieldset>
				<legend>Select your role(s)</legend>	
				<span>
					<input id="director" type="checkbox" />
					<label for="director">Director</label>
				</span>
				<span>
					<input id="writer" type="checkbox" />
					<label for="writer">Writer</label>
				</span>
				<span>
					<input id="producer" type="checkbox" />
					<label for="producer">Producer</label>
				</span>
				<span>
					<input id="executiveProducer" type="checkbox" />
					<label for="executiveProducer">Executive producer</label>
				</span>
				<span>
					<input id="leadActor" type="checkbox" />
					<label for="leadActor">Lead actor</label>
				</span>
				<span>
					<input id="supportingActor" type="checkbox" />
					<label for="supportingActor">Supporting actor</label>
				</span>						
				<span>
					<input id="cinematographer" type="checkbox" />
					<label for="cinematographer">Cinematographer</label>
				</span>
				<span>
					<input id="audioEngineer" type="checkbox" />
					<label for="audioEngineer">Sound</label>
				</span>
				<span>
					<input id="editor" type="checkbox" />
					<label for="editor">Editor</label>
				</span>
				<span>
					<input id="vfx" type="checkbox" />
					<label for="vfx">Visual effects</label>
				</span>
			</fieldset>
		</div>
		<div>
			<label for="budget">Budget</label>
			<select id="budget" data-field="budget">
				<option value=""></option>
				<option value="under10k">Under 10k</option>
				<option value="under100k">Under 100k</option>
				<option value="under1mil">Under 1 million</option>
				<option value="over1mil">Over 1 million</option>
			</select>
		</div>
		<div>
			<label for="releaseDate">Release date</label>
			<input type="text" id="releaseDate" data-toggle="datepicker" placeholder="Select a date" aria-required="true">
		</div>
	</div>
</div>

<div class="dialog" role="dialog" aria-labelledby="readmessageh2" data-dialog-id="readmessage">
	<a href="javascript:;" role="button" class="closeDialog">
		<i class="material-icons">clear</i>
		<span class="screen-reader-only">Close message dialog</span>
	</a>	
	<div role="document">
		<div class="dialogcontainer">
			<h2 class="screen-reader-only" id="dialogh2">Read message</h2>
			<div class="fromheadshot"></div>
			<h3 class="fromname"></h3>
			<div class="msgdetails"></div>
			<p>This is some text</p>
			<div class="row"><a href="javascript:;" class="replyToMsg">Reply</a></div>
			<div class="row replyDiv">
				<label class="screen-reader-only" for="replyTextarea">Reply</label>
				<textarea id="replyTextarea" placeholder="Reply"></textarea>
				<div class="row">
					<button class="sendReplyToUser">
						<i class="material-icons" aria-hidden="true">send</i>
						Send reply
					</button>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="dialog" role="dialog" aria-labelledby="dialogh2" data-dialog-id="messagesent">
	<a href="javascript:;" role="button" class="closeDialog">
		<i class="material-icons">clear</i>
		<span class="screen-reader-only">Close message sent dialog</span>
	</a>	
	<div role="document">
		<h2 id="dialogh2">Success!</h2>
		<p>Your message has been sent.  Someone from the TFA will get back to you within 24 hours.</p>
	</div>
</div>

<div class="dialog" role="dialog" aria-labelledby="dialogh2" data-dialog-id="filmreviewsubmission">
	<a href="javascript:;" role="button" class="closeDialog">
		<i class="material-icons">clear</i>
		<span class="screen-reader-only">Close film review dialog</span>
	</a>	
	<div class="loader"></div>
	<div role="document" class="showHide" style="display: none;">
		<h2 id="dialogh2">Success!</h2>
		<p>Your review has been submitted.  You should be able to view upon closure of this dialog.</p>
	</div>
</div>