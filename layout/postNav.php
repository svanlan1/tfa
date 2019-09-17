<?php require('dialogs.php'); ?>
<header>
	<div role="presentation" id="socialMedia">
		<span>
			
		</span>
	</div>
	<div role="banner" id="mainBanner" aria-label="Main banner">
		<h1>
			<a href="/index.php">
				<img src="/images/tfalogoweb_new.png" alt="Tacoma Film Alliance" />
			</a>
		</h1>
	</div>
	<div class="mobileNav"></div>
	<nav class="desktop">
	    <ul>
	    	<li class="hasSubmenu">
	        	<a aria-expanded="false" href="javascript:;">Members <img src="/images/down-arrow.svg" alt="Submenu, collapsed" /></a>
	        	<ul class="submenu">
	        		<li><a href="/p/feed/">Newsfeed</a></li>
	        		<li><a href="/p/films/">Films</a></li>
	        		<li><a href="/profiles/search.php">Profiles</a></li>
	        	</ul>
	    	</li>
	        <li class="hasSubmenu">
	        	<a aria-expanded="false" href="javascript:;">Resources <img src="/images/down-arrow.svg" alt="Submenu, collapsed" /></a>
	        	<ul class="submenu">
	        		<li><a href="/p/resources?type=location">Locations</a></li>
	        		<li><a href="/p/resources?type=equipment">Equipment</a></li>
				</ul>	        	
	        </li>
	    	<li class="hasSubmenu">
	        	<a aria-expanded="false" href="javascript:;">TFA <img src="/images/down-arrow.svg" alt="Submenu, collapsed" /></a>
	        	<ul class="submenu">
					<li><a href="/aboutus/">About us</a></li>
	        		<li><a href="/p/slingshot/">Slingshot</a></li>
	        		<li><a href="/p/wam/">WAM</a></li>
					<?php
						if( $user->isAdmin($_SESSION['admin']) ) {
							echo "<li><a href='/a/'>Admin panel</a></li>";
						}	
					?>	        		
	        	</ul>
	    	</li>
	        <li>
	        	<a href="/p/account/">Account</a>
	        </li>
	        <li><a href="/events/">Events</a></li>
	        <li><a href="/reviews/">Reviews</a></li>
	        <li><a href="http://www.tacomafilmalliance.com/forum/">Forum</a></li>
	        <li>
				<a href="https://www.facebook.com/groups/TacomaFilmAlliance/" target="_blank">
					<img class="i24" src="/images/facebook-logo-orange.png" alt="Facebook, opens in a new window" />
				</a>	        	
	        </li>
	        <li>
	        	<a href="http://www.twitter.com" target="_blank">
	        		<img class="i24" src="/images/twitter-logo-orange.png" alt="Twitter" />
	        	</a>
	        </li>
	        <li>
				<a href="https://www.youtube.com/channel/UCRxUXBNEXaLJBX9YyKUet8g" target="_blank">
					<img class="i24" src="/images/youtube-logo-orange.png" alt="Youtube, opens in a new window" />
				</a>
	        </li>
	        <li>
				<a href="https://www.meetup.com/TacomaFilmAlliance/" target="_blank">
					<img class="i30" src="/images/meetup-logo-orange.png" alt="Meetup, opens in a new window" />
				</a>
	        </li>
			<?php
				if( $user->isAdmin($_SESSION['admin']) ) {
					echo "<li class='bordered' style='text-align: center; margin-right: 0;'><a title='Administrator panel' href='/a/'><img class='i24' src='/images/admin_panel.png' alt='Administrators only' /></a></li>";
				}	
			?>	        
	        <li class="bordered"><a href="/logout/">Logout</a></li>
	    </ul>
	</nav>
</header>