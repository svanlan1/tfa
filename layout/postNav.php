<?php require('dialogs.php'); ?>
<header>
	<div role="presentation" id="socialMedia">
		<span>
			February 18th @ The Forum - TFA Monthly Meetup
		</span>
	</div>
	<div role="banner" id="mainBanner" aria-label="Main banner">
		<h1>
			<a href="/sandbox/">
				<img src="/sandbox/images/tfalogoweb_new.png" alt="Tacoma Film Alliance" />
			</a>
		</h1>
	</div>
	<nav>
	    <ul>
	    	<!-- <li class="tfa_headshot"></li> -->
	    	<li class="hasSubmenu">
	        	<a aria-expanded="false" href="javascript:;">Members <img src="/sandbox/images/down-arrow.svg" alt="Submenu, collapsed" /></a>
	        	<ul class="submenu">
	        		<li><a href="/sandbox/p/feed/">Newsfeed</a></li>
	        		<li><a href="/sandbox/p/films/">Films</a></li>
	        		<li><a href="/sandbox/profiles/?id=16">Profiles</a></li>
	        	</ul>
	    	</li>
	        <li class="hasSubmenu">
	        	<a aria-expanded="false" href="javascript:;">Resources <img src="/sandbox/images/down-arrow.svg" alt="Submenu, collapsed" /></a>
	        	<ul class="submenu">
	        		<li><a href="/sandbox/p/resources?type=location">Locations</a></li>
	        		<li><a href="/sandbox/p/resources?type=equipment">Equipment</a></li>
				</ul>	        	
	        </li>
	    	<li class="hasSubmenu">
	        	<a aria-expanded="false" href="javascript:;">TFA <img src="/sandbox/images/down-arrow.svg" alt="Submenu, collapsed" /></a>
	        	<ul class="submenu">
	        		<li><a href="/sandbox/p/tfa/">Meetings</a></li>
	        		<li><a href="/sandbox/p/slingshot/">Slingshot</a></li>
	        		<li><a href="/sandbox/p/wam/">WAM</a></li>
					<?php
						if( $user->isAdmin($_SESSION['admin']) ) {
							echo "<li><a href='../../a/'>Admin panel</a></li>";
						}	
					?>	        		
	        	</ul>
	    	</li>
	        <li>
	        	<a href="/sandbox/p/account/">Account</a>
	        </li>
	        <li><a href="/sandbox/events/">Events</a></li>
	        <li><a href="/sandbox/p/reviews/">Reviews</a></li>
	        <li><a href="forum/">Forum</a></li>
	        <li>
				<a href="https://www.facebook.com/groups/TacomaFilmAlliance/" target="_blank">
					<img class="i24" src="/sandbox/images/facebook-logo-orange.png" alt="Facebook, opens in a new window" />
				</a>	        	
	        </li>
	        <li>
	        	<a href="http://www.twitter.com" target="_blank">
	        		<img class="i24" src="/sandbox/images/twitter-logo-orange.png" alt="Twitter" />
	        	</a>
	        </li>
	        <li>
				<a href="https://www.youtube.com/channel/UCRxUXBNEXaLJBX9YyKUet8g" target="_blank">
					<img class="i24" src="/sandbox/images/youtube-logo-orange.png" alt="Youtube, opens in a new window" />
				</a>
	        </li>
	        <li>
				<a href="https://www.meetup.com/TacomaFilmAlliance/" target="_blank">
					<img class="i24" src="/sandbox/images/meetup-logo-orange.png" alt="Meetup, opens in a new window" />
				</a>
	        </li>
			<?php
				if( $user->isAdmin($_SESSION['admin']) ) {
					echo "<li class='bordered' style='text-align: center; margin-right: 0;'><a title='Administrator panel' href='../../a/'><img class='i24' src='/sandbox/images/admin.svg' alt='Administrators only' /></a></li>";
				}	
			?>	        
	        <li class="bordered"><a href="/sandbox/logout/">Logout</a></li>
	    </ul>
	</nav>
</header>